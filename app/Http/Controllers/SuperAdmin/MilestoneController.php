<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Milestone;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class MilestoneController extends Controller
{
    public function index(Request $request){
        try
        {
            if ($request->ajax()) 
            {
                $data = Milestone::orderBy('id', 'desc')->where('status', true)->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('icon', function ($data) {
                        if (!$data->icon) return 'N/A';
                        return '<img height="50px" width="50px" src="'. $data->icon . '" >';
                    })
                    ->editColumn('value_type', function ($data) {
                        if ($data->value_type == 'five_star') return '5 Star';
                        elseif($data->value_type == 'trip_completed') return 'Trip Completed';
                        elseif($data->value_type == 'days_with_beeda') return 'Days with Beeda';
                    })
                    ->editColumn('action', function ($data) {
                        return '<a href="' . url('transport/milestone/edit/' . $data->id) . '" style="color:#061880;" title="Edit"><i class="material-icons">edit</i></a> ';
                    })
                    ->rawColumns(['icon', 'value_type', 'action'])
                    ->make(true);
            }
            
            $page = 'manage_milestone';
            return view('superadmin.transport.milestone.index', compact('page'));

        }
        catch(Exception $e)
        {
            return redirect()->back()->with('error_message', 'Something Went Wrong!');
        }
    }
    
    public function create(Request $request)
    {
        $page = 'manage_milestone';
        return view('superadmin.transport.milestone.create', compact('page'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required',
            'value_type' => 'required',
            'value' => 'required'
        ]);
        try{
            if($request->hasFile('icon')){
                $file = Storage::disk('s3')->put('public/uploads/all', $request->file('icon'));
                $path = Storage::disk('s3')->url($file);
            }
            $data = [
                'name' => $request->name ? $request->name : null,
                'value_type' => $request->value_type,
                'value' => $request->value,
                'icon' => isset($path) ? $path : null
            ];
            Milestone::create($data);
            $message = "Milestone type added successfully!";
            return redirect()->route('transport.milestone.list')->with('success_message', $message);
        }catch(\Exception $e){
            return redirect()->back()->with('error_message', 'Something Went Wrong!');
        }
    }
    public function edit($id)
    {
        $milestone = Milestone::find($id);
        $page = 'manage_milestone';
        return view('superadmin.transport.milestone.edit', compact('page', 'milestone'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'value_type' => 'required',
            'value' => 'required'
        ]);
        try{
            $milestone = Milestone::where('id', $id)->first();
            if($request->hasFile('icon')){
                $file = Storage::disk('s3')->put('public/uploads/all', $request->file('icon'));
                $path = Storage::disk('s3')->url($file);
                if(Storage::disk('s3')->exists($milestone->icon)) Storage::disk('s3')->delete($milestone->icon);
            }
            $data = [
                'name' => $request->name ? $request->name : null,
                'value_type' => $request->value_type,
                'value' => $request->value,
                'icon' => isset($path) ? $path : $milestone->icon
            ];
            $milestone->update($data);
            $message = "Milestone type updated successfully!";
            return redirect()->route('transport.milestone.list')->with('success_message', $message);
        }catch(\Exception $e){
            return redirect()->back()->with('error_message', 'Something Went Wrong!');
        }
    }
}
