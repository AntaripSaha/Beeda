<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Attribute;
use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Traits\ApiUrl;
use Yajra\DataTables\Facades\DataTables;

class AttributeController extends Controller
{
    use ApiUrl;

    public function attributeList(Request $request)
    {
        if($request->ajax()) {
            $token = Cache::get('api_token');
            if ($token) {
                /*
                $attributes = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $token
                ])->get($this->getApiUrl() . 'superadmin/attributelist');
                $attributes = json_decode($attributes);
                $data = [];
                if ($attributes) {
                    $data = $attributes->attributes;
                }
                */
                return Datatables::of($data = Attribute::all())
                    ->addIndexColumn()
                    ->editColumn('action', function ($data) {
                        $btn = '<form action="'.route('service.attribute.delete').'" method="post" id="delete-form'.$data->id.'"><input type="hidden" name="_token" value="'.csrf_token().'" /><input type="hidden" value="'.$data->id.'" name="id" /></form>';
                        $btn .= '<a href="'.route('service.attribute.edit', ['id' => $data->id]).'" style="color:#061880;" title="Edit"><i class="material-icons">edit</i></a>';
                        $btn .= '<a href="javascript:;" title="Delete" style="color:#061880;" onclick="deleteAttribute('.$data->id.')"><i class="material-icons">delete</i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }
        $page = 'manage_attribute';
        return view('superadmin.sellers.manage_attribute.attribute_list', compact('page'));
    }

    public function addAttribute()
    {
        $page = 'manage_attribute';
        return view('superadmin.sellers.manage_attribute.add_attribute', compact('page'));
    }

    public function addAttributeSubmit(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);
        $token = Cache::get('api_token');
        if ($token) {
            /*
            $data = [
                'name' => $request->name
            ];
            $attribute = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->post($this->getApiUrl() . 'superadmin/attributeadd', $data);
            $attribute = json_decode($attribute);
            */
            $attribute = new Attribute();
            $attribute->name = $request->name;
            $attribute->save();
            return redirect()->route('service.attribute.list')->with('success_message', 'Attribute added successfully');
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function deleteAttribute(Request $request)
    {
        $token = Cache::get('api_token');
        if ($token) {
            /*
            $data = [
                'id' => $request->id
            ];
            $attribute = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->post($this->getApiUrl() . 'superadmin/attributedelete', $data);
            $attribute = json_decode($attribute);
            */
            $attribute = Attribute::where('id', $request->id)->first();
            $attribute->delete();
            return redirect()->route('service.attribute.list')->with('success_message', 'Attribute deleted successfully');
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function editAttribute($id)
    {
        $token = Cache::get('api_token');
        /*
        $attribute = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->get($this->getApiUrl() . 'superadmin/attributebyid/'.$id);    
        $attribute = json_decode($attribute);
        $attr = null;
        if($attribute)
        {
            $attr = $attribute->attribute;
        }
        */
        if ($token) {
            $attr = Attribute::where('id', $id)->first();
            $page = 'manage_attribute';
            return view('superadmin.sellers.manage_attribute.edit_attribute', compact('page', 'attr'));
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function editAttributeSubmit(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);
        $token = Cache::get('api_token');
        if ($token) {
            /*
            $data = [
                'id' => $request->id,
                'name' => $request->name
            ];
            $attribute = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->post($this->getApiUrl() . 'superadmin/attributeupdate', $data);
            $attribute = json_decode($attribute);
            */
            $attribute = Attribute::where('id', $request->id)->first();
            $attribute->name = $request->name;
            $attribute->update();

            return redirect()->route('service.attribute.list')->with('success_message', 'Attribute updated successfully');
        } else {
            return redirect()->route('super.admin.login');
        }
    }
}



