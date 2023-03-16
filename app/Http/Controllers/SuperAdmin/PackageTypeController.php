<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Constants\ServiceCategoryType;
use App\Http\Controllers\Controller;
use App\Models\PackageTypeAttribute;
use App\PackageAttribute;
use App\PackageType;
use App\TransportVehicleType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PackageTypeController extends Controller
{
    public function index(Request $request)
    {   
        if($request->ajax()) {
            $token = getToken();
            if ($token) {
                $packageTypes = PackageType::get();
                return Datatables::of($packageTypes)
                    ->addIndexColumn()
                    ->editColumn('has_fragile_items', function($data){
                        if($data->has_fragile_items)  return '<span class="badge badge-success">Yes</span>';
                        return '<span class="badge badge-danger">No</span>';
                    })
                    ->editColumn('need_assistance', function($data){
                        if($data->need_assistance)  return '<span class="badge badge-success">Yes</span>';
                        return '<span class="badge badge-danger">No</span>';
                    })
                    ->editColumn('has_liability', function($data){
                        if($data->has_liability)  return '<span class="badge badge-success">Yes</span>';
                        return '<span class="badge badge-danger">No</span>';
                    })
                    ->editColumn('action', function ($packageTypes) {
                        $btn = '<a href="'.route('transport.courier.package-type.assign.attribute', ['id' => $packageTypes->id]).'" style="color:#061880;" title="Assign Attribute"><i class="material-icons">style</i></a> | ';
                        $btn .= '<a href="'.route('transport.courier.package-type.assign.vehicle', ['id' => $packageTypes->id]).'" style="color:#061880;" title="Assign Vehicle"><i class="material-icons">directions_bike</i></a> | ';
                        $btn .= '<a href="'.route('transport.courier.package-type.edit', ['id' => $packageTypes->id]).'" style="color:#061880;" title="Edit"><i class="material-icons">edit</i></a>';
                        // $btn .= '<a href="' .route('worlds-brands.delete', ['id' => $packageTypes->id]).'"><i class="material-icons">delete</i></a>';
                        return $btn;
                    })
                    ->rawColumns(['has_fragile_items', 'need_assistance', 'has_liability', 'action'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }
        $page = 'manage_transport_service';
        return view('superadmin.transport.courier.package-types.index',compact('page'));
    }

    public function create()
    {
        try{
            $page = 'manage_transport_service';
            return view('superadmin.transport.courier.package-types.create',compact('page'));
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
            $packageType = PackageType::create([
                'title' => $request->title,
                'description' => $request->description,
                'has_fragile_items' => $request->has_fragile_items ? 1 : 0,
                'need_assistance' => $request->need_assistance ? 1 : 0,
                'has_liability' => $request->has_liability ? 1 : 0
            ]);
            if($packageType) return redirect()->route('transport.courier.package-type.list')->with('success_message', 'Package type created successfully');
        }catch (\Exception $e) {
            return view('superadmin.error_page', ['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try{
            $packageType = PackageType::find($id);
            if(!$packageType) return redirect()->route('transport.courier.package-type.list')->with('error_message', 'Sorry, package type not found');
            $page = 'manage_transport_service';
            return view('superadmin.transport.courier.package-types.edit',compact('page', 'packageType'));
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
            $packageType = PackageType::find($request->id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'has_fragile_items' => $request->has_fragile_items ? 1 : 0,
                'need_assistance' => $request->need_assistance ? 1 : 0,
                'has_liability' => $request->has_liability ? 1 : 0
            ]);
            if($packageType) return redirect()->route('transport.courier.package-type.list')->with('success_message', 'Package type updated successfully');
        }catch (\Exception $e) {
            return view('superadmin.error_page', ['error' => $e->getMessage()]);
        }
    }

    public function assignPackageAttribute($id)
    {
        try{
            $packageAttributes = PackageAttribute::get();
            $packageTypes = DB::table('package_type_attributes')->where('package_type_id', $id)->pluck('package_attribute_id')->toArray();
            $page = 'manage_transport_service';
            return view('superadmin.transport.courier.package-types.assign-attribute',compact('page', 'packageAttributes', 'id', 'packageTypes'));
        }catch (\Exception $e) {
            return view('superadmin.error_page', ['error' => $e->getMessage()]);
        }
    }

    public function storePackageAttribute(Request $request)
    {
        $request->validate([
            'attributes' => 'required'
        ]);
        try{
            $packageType = PackageType::find($request['id'])->packageAttributes()->sync($request['attributes']);
            if($packageType) return redirect()->route('transport.courier.package-type.list')->with('success_message', 'Package attribute assigned successfully');
        }catch (\Exception $e) {
            return view('superadmin.error_page', ['error' => $e->getMessage()]);
        }
    }

    public function assignVehicle($id)
    {
        try{
            $transportVehicleType = TransportVehicleType::where('service_category_id', ServiceCategoryType::COURIER)->get();
            $packageTypeVehicles = DB::table('package_type_vehicles')->where('package_type_id', $id)->pluck('transport_vehicle_type_id')->toArray();
            $page = 'manage_transport_service';
            return view('superadmin.transport.courier.package-types.assign-vehicle',compact('page', 'transportVehicleType', 'id', 'packageTypeVehicles'));
        }catch (\Exception $e) {
            return view('superadmin.error_page', ['error' => $e->getMessage()]);
        }
    }

    public function storePackageTypeVehicle(Request $request)
    {
        $request->validate([
            'vehicles' => 'required'
        ]);
        try{
            $packageType = PackageType::find($request['id'])->packageTypeVehicles()->sync($request['vehicles']);
            if($packageType) return redirect()->route('transport.courier.package-type.list')->with('success_message', 'Vehicle assigned successfully');
        }catch (\Exception $e) {
            return view('superadmin.error_page', ['error' => $e->getMessage()]);
        }
    }
}
