<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\PackageAttribute;
use App\PackageAttributeValue;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class PackageAttributeController extends Controller
{
    public function index(Request $request)
    {
        try{
            if($request->ajax()) {
                $token = Cache::get('api_token');
                if ($token) {
                    $packageAttributes = PackageAttribute::with('packageTypes','packageAttributeValue')->get();
                    $data = [];
                    if ($packageAttributes) {
                        $data = $packageAttributes;
                    }
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->editColumn('is_required', function ($data) {
                            return $data['is_required'] ? 'Yes' : 'No';
                        })
                        ->editColumn('units', function ($data) {
                            if($data->units)
                            {
                                $units = json_decode($data->units);
                                $txt = '';
                                foreach($units as $unit) $txt .= $unit.',';
                                return trim($txt, ',');

                            }
                            return 'N/A';
                        })
                        ->addColumn('package', function($data){
                            $txt = '';
                            foreach($data->packageTypes as $package)
                            {
                                $txt.= $package->title. ',';
                            }
                            return trim($txt, ',');
                        })
                        ->editColumn('action', function ($data) {
                            $btn = '<a href="'.route('transport.courier.package-attribute.assign.attribute.value', ['id' => $data->id]).'" style="color:#061880;" title="Assign Value"><i class="material-icons">add</i></a> | ';
                            $btn .= '<a href="'.route('transport.courier.package-attribute.edit', ['id' => $data->id]).'" style="color:#061880;" title="Edit"><i class="material-icons">edit</i></a>';
                            // $btn .= '<a href="' .route('worlds-brands.delete', ['id' => $data->id]).'"><i class="material-icons">delete</i></a>';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
                } else {
                    return redirect()->route('super.admin.login');
                }
            }



            $page = 'transport_manage_service';
            return view('superadmin.transport.courier.package-attributes.index',compact('page'));
        }catch (\Exception $e) {
            return view('superadmin.error_page', ['error' => $e->getMessage()]);
        }
    }

    public function create()
    {
        try{
            $page = 'manage_transport_service';
            return view('superadmin.transport.courier.package-attributes.create',compact('page'));
        }catch (\Exception $e) {
            return view('superadmin.error_page', ['error' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);
        try{
            $units = explode(',', $request->units);
            $packageAttribute = PackageAttribute::create([
                'title' => $request->title,
                'units' => count($units) ? json_encode($units) : null,
                'is_required' => $request->is_required ? 1 : 0,
                'input_type' => $request->input_type
            ]);
            if($packageAttribute) return redirect()->route('transport.courier.package-attribute.list')->with('success_message', 'Package attribute created successfully');
        }catch (\Exception $e) {
            return view('superadmin.error_page', ['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try{
            $packageAttribute = PackageAttribute::find($id);
            if(!$packageAttribute) return redirect()->route('transport.courier.package-attribute.list')->with('error_message', 'Sorry, package attribute not found');
            $page = 'manage_transport_service';
            return view('superadmin.transport.courier.package-attributes.edit',compact('page', 'packageAttribute'));
        }catch (\Exception $e) {
            return view('superadmin.error_page', ['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);
        try{
            $units = explode(',', $request->units);
            $packageAttribute = PackageAttribute::find($request->id)->update([
                'title' => $request->title,
                'units' => count($units) ? json_encode($units) : null,
                'is_required' => $request->is_required ? 1 : 0,
                'input_type' => $request->input_type
            ]);
            if($packageAttribute) return redirect()->route('transport.courier.package-attribute.list')->with('success_message', 'Package attribute updated successfully');
        }catch (\Exception $e) {
            return view('superadmin.error_page', ['error' => $e->getMessage()]);
        }
    }

    public function assignAttributeValue($id)
    {
        try{
            $inputType = PackageAttribute::find($id);
            if($inputType) $inputType = $inputType->input_type;
            $page = 'manage_transport_service';
            return view('superadmin.transport.courier.package-attributes.attribute-value',compact('page', 'id','inputType'));
        }catch (\Exception $e) {
            return view('superadmin.error_page', ['error' => $e->getMessage()]);
        }
    }

    public function getPackageAttributeValues($id)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $packageAttributeValues = PackageAttributeValue::where('package_attribute_id', $id)->get();
            return Datatables::of($packageAttributeValues)
                ->addIndexColumn()
                ->editColumn('icon', function ($packageAttributeValue) {
                    $icon = $packageAttributeValue->icon ? '<img src="'.$packageAttributeValue->icon.'" style="width:50px;height:50px"/>' : 'N/A';
                    return $icon;
                })
                ->editColumn('action', function ($packageAttributeValue) {
                    $btn = '';
                    $btn .= '<a href="javascript:;" style="color:#061880;" title="Edit" onclick="setValue('.$packageAttributeValue->id.','.'`'.$packageAttributeValue->title.'`,`'.$packageAttributeValue->value.'`'.',`'.$packageAttributeValue->icon.'`)"><i class="material-icons">edit</i></a>';
                    return $btn;
                })
                ->rawColumns(['icon', 'action'])
                ->make(true);
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function assignValue(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);
        try{
            if($request->attribute_value_id)
            {
                $iconExists = PackageAttributeValue::find($request->attribute_value_id);
                $icon = $iconExists->icon;
                if($request->hasFile('icon')) {
                    $file = Storage::disk('s3')->put('public/uploads/all', $request->file('icon'));
                    $path = Storage::disk('s3')->url($file);
                    // $file_name = env('APP_ENV')!='production' ? $path : substr($path, 45, 200);
                    $icon = $path;
                    if(Storage::disk('s3')->exists($iconExists->icon)) Storage::disk('s3')->delete($iconExists->icon);
                }

                $packageAttributeValue = PackageAttributeValue::find($request->attribute_value_id)->update([
                    'title' => $request->title,
                    'value' => $request->value,
                    'icon' => $icon
                ]);
            }
            else
            {
                $icon = null;
                if($request->hasFile('icon')) {
                    $file = Storage::disk('s3')->put('public/uploads/all', $request->file('icon'));
                    $path = Storage::disk('s3')->url($file);
                    // $file_name = env('APP_ENV')!='production' ? $path : substr($path, 45, 200);
                    $icon = $path;
                }
                $packageAttributeValue = PackageAttributeValue::create([
                    'package_attribute_id' => $request->attribute_id,
                    'title' => $request->title,
                    'value' => $request->value,
                    'icon' => $icon
                ]);
            }
            if($packageAttributeValue) return redirect()->back()->with('success_message', 'Attribute value '.($request->attribute_value_id ? 'updated' : 'assigned').' successfully');
        }catch (\Exception $e) {
            return view('superadmin.error_page', ['error' => $e->getMessage()]);
        }
    }
}
