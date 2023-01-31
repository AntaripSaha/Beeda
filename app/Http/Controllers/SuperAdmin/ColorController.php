<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Color;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Traits\ApiUrl;
use Yajra\DataTables\Facades\DataTables;

class ColorController extends Controller
{
    use ApiUrl;

    public function colorList(Request $request)
    {
        if($request->ajax()) {
            $token = Cache::get('api_token');
            if ($token) {
                /*
                $colors = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $token
                ])->get($this->getApiUrl() . 'superadmin/colorlist');
                $colors = json_decode($colors);
                $data = [];
                if ($colors) {
                    $data = $colors->colors;
                }
                */
                return Datatables::of($data = Color::all())
                    ->addIndexColumn()
                    ->editColumn('color', function ($data) {
                        return '<div style="width:50px;height:50px;background-color: '.$data->code.'"></div>';
                    })
                    ->editColumn('action', function ($data) {
                        $btn = '<form action="'.route('service.color.delete').'" method="post" id="delete-form'.$data->id.'"><input type="hidden" name="_token" value="'.csrf_token().'" /><input type="hidden" value="'.$data->id.'" name="id" /></form>';
                        $btn .= '<a href="'.route('service.color.edit', ['id' => $data->id]).'" style="color:#061880;" title="Edit"><i class="material-icons">edit</i></a>';
                        $btn .= '<a href="javascript:;" title="Delete" style="color:#061880;" onclick="deleteColor('.$data->id.')"><i class="material-icons">delete</i></a>';
                        return $btn;
                    })
                    ->rawColumns(['color', 'action'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }
        $page = 'manage_color';
        return view('superadmin.sellers.manage_color.color_list', compact('page'));
    }

    public function addColor()
    {
        $page = 'manage_color';
        return view('superadmin.sellers.manage_color.add_color', compact('page'));
    }

    public function addColorSubmit(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'color' => 'required'
        ]);
        $token = Cache::get('api_token');
        if ($token) {
            /*
            $data = [
                'name' => $request->name,
                'code' => $request->color
            ];
            $color = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->post($this->getApiUrl() . 'superadmin/coloradd', $data);
            $color = json_decode($color);
            */
            $color = new Color();
            $color->name = str_replace(' ', '', trim($request->name));
            $color->code = $request->color;
            $color->save();
            return redirect()->route('service.color.list')->with('success_message', 'Color added successfully');
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function deleteColor(Request $request)
    {
        $token = Cache::get('api_token');
        if ($token) {
            /*
            $data = [
                'id' => $request->id
            ];
            $color = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->post($this->getApiUrl() . 'superadmin/colordelete', $data);
            $color = json_decode($color);
            */
            $color = Color::where('id', $request->id)->first();
            $color->delete();
            return redirect()->route('service.color.list')->with('success_message', 'Color deleted successfully');
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function editColor($id)
    {
        $token = Cache::get('api_token');
        if ($token) {
            /*
            $color = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->get($this->getApiUrl() . 'superadmin/colorbyid/'.$id);   
            $color = json_decode($color);
            $clr = null;
            if($color)
            {
                $clr = $color->color;
            }
            */
            $clr = Color::where('id', $id)->first();
            $page = 'manage_color';
            return view('superadmin.sellers.manage_color.edit_color', compact('page', 'clr'));
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function editColorSubmit(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'color' => 'required'
        ]);
        $token = Cache::get('api_token');
        if ($token) {
            /*
            $data = [
                'id' => $request->id,
                'name' => $request->name,
                'code' => $request->color
            ];
            $color = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->post($this->getApiUrl() . 'superadmin/colorupdate', $data);
            $color = json_decode($color);
            */
            $color = Color::where('id', $request->id)->first();
            $color->name = str_replace(' ', '', trim($request->name));
            $color->code = $request->color;
            $color->update();
            return redirect()->route('service.color.list')->with('success_message', 'Color updated successfully');
        } else {
            return redirect()->route('super.admin.login');
        }
    }
}
