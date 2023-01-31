<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Constants\CategoryType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Http\Traits\ApiUrl;
use App\Models\VehicleSubType;
use App\Models\VehicleType;
use App\ServiceCategory;
use App\TransportVehicleType;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use DB;

class VehicleTypeController extends Controller
{
    use ApiUrl;

    //Vehicle category
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $token = Cache::get('api_token');
            if ($token) {
                $data = TransportVehicleType::with('service_category')->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('name', function ($data) {
                        return $data->name;
                    })
                    ->addColumn('service_category_name', function ($data) {
                        if (!$data->service_category) return 'N/A';
                        return $data->service_category->name;
                    })
                    ->editColumn('icon_name', function ($data) {
                        if (!$data->icon_name) return 'N/A';
                        return '<img height="50px" width="50px" src="' . env('AWS_MEDIA_URL') . $data->icon_name . '" >';
                    })
                    ->editColumn('action', function ($data) {
                        $active = '';
                        $checked = '';
                        if ($data->status == 1) {
                            $active = 'active';
                            $checked = 'checked';
                        }
                        return '<a href="' . url('transport/vehicle/edit/' . $data->id) . '" style="color:#061880;" title="Edit"><i class="material-icons">edit</i></a> '
                            . '<div class="toggle-btn ' . $active . '">
                            <input type="checkbox" onclick="approve(' . $data->id . ')" class="cb-value approve' . $data->id . '" ' . $checked . '/>
                            <span class="round-btn"></span>
                        </div>';
                    })
                    ->rawColumns(['action', 'icon_name'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }
        $page = 'manage_vehicle_category';
        return view('superadmin.transport.vehicle.index', compact('page'));
    }

    public function create()
    {
        $serviceCategories = ServiceCategory::where('category_type',CategoryType::TRANSPORT)->get();
        $page = 'manage_vehicle_category';
        return view('superadmin.transport.vehicle.create', compact('page', 'serviceCategories'));
    }

    public function store(Request $request)
    {
        try{
            $validate = $request->validate([
                'service_category_id' => 'required',
                'name' => 'required',
                'icon_name' => 'required',
                'cost_for_km' => 'required',
                'cost_per_min' => 'required',
                'base_fare' => 'required',
                'time_fare' => 'required',
                'no_of_seats' => 'required'
            ]);
            $file = Storage::disk('s3')->put('public/uploads/all', $request->file('icon_name'));
            $path = Storage::disk('s3')->url($file);
            $data = [
                'service_category_id' => $request->service_category_id,
                'name' => $request->name,
                'icon_name' => substr($path, 45, 200),
                'cost_for_km' => $request->cost_for_km,
                'cost_per_min' => $request->cost_per_min,
                'weight_limit' => $request->weight_limit,
                'dimension_limit' => $request->dimension_limit,
                'base_fare' => $request->base_fare,
                'time_fare' => $request->time_fare,
                'no_of_seats' => $request->no_of_seats,
                'rental_cost_for_km' => $request->rental_cost_for_km,
                'rental_amount_for_1hour' => $request->rental_amount_for_1hour,
                'rental_km_limit_for_1hour' => $request->rental_km_limit_for_1hour,
                'status' => 1
            ];
            TransportVehicleType::create($data);
            $message = "Vehicle Added successfully!";
            return redirect()->route('superadmin.transport.vehicle-category.index')->with('success_message', $message);
        }catch(\Exception $e){
            return redirect()->back()->with('error_message', 'Something Went Wrong!');
        }
    }

    public function edit($id)
    {
        $serviceCategories = ServiceCategory::where('category_type',CategoryType::TRANSPORT)->get();
        $vehicleType = TransportVehicleType::find($id);
        $page = 'manage_vehicle_category';
        return view('superadmin.transport.vehicle.edit', compact('page', 'serviceCategories', 'vehicleType'));
    }

    public function update(Request $request)
    {
        try{
            $validate = $request->validate([
                'id' => 'required',
                'service_category_id' => 'required',
                'name' => 'required',
                'cost_for_km' => 'required',
                'cost_per_min' => 'required',
                'base_fare' => 'required',
                'time_fare' => 'required',
                'no_of_seats' => 'required'
            ]);
            $trransportVehicleType = TransportVehicleType::find($request->id);
            
            $data = [
                'service_category_id' => $request->service_category_id,
                'name' => $request->name,
                'cost_for_km' => $request->cost_for_km,
                'cost_per_min' => $request->cost_per_min,
                'weight_limit' => $request->weight_limit,
                'dimension_limit' => $request->dimension_limit,
                'base_fare' => $request->base_fare,
                'time_fare' => $request->time_fare,
                'no_of_seats' => $request->no_of_seats,
                'rental_cost_for_km' => $request->rental_cost_for_km,
                'rental_amount_for_1hour' => $request->rental_amount_for_1hour,
                'rental_km_limit_for_1hour' => $request->rental_km_limit_for_1hour,
                'status' => 1
            ];

            if($request->file('icon_name'))
            {
                if(Storage::disk('s3')->exists('public/'.$trransportVehicleType->icon_name))  Storage::disk('s3')->delete('public/'.$trransportVehicleType->icon_name);
                $file = Storage::disk('s3')->put('public/uploads/all', $request->file('icon_name'));
                $path = Storage::disk('s3')->url($file);
                $data['icon_name'] = substr($path, 45, 200);
            }

            $trransportVehicleType->update($data);
            $message = "Vehicle Updated successfully!";
            return redirect()->route('superadmin.transport.vehicle-category.index')->with('success_message', $message);
        }catch(\Exception $e){
            return redirect()->back()->with('error_message', 'Something Went Wrong!');
        }
    }

    public function approve(Request $request)
    {
        $vehicleType = TransportVehicleType::find($request->id);
        $vehicleType->status = !$vehicleType->status;
        $vehicleType->update();
        $vehicleType = json_decode($vehicleType);
        return $vehicleType;
    }

    // Vehicle type

    public function vehicleTypeList(Request $request)
    {
        if ($request->ajax()) {
            $token = Cache::get('api_token');
            if ($token) {
                $data = VehicleType::with('serviceCategories')->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('service_category_name', function ($data) {
                        if (count($data->serviceCategories) == 0) return 'N/A';
                        $serviceName = '';
                        foreach($data->serviceCategories as $service) $serviceName .= $service->name.', ';
                        return rtrim($serviceName, ', ');
                    })
                    ->editColumn('image', function ($data) {
                        if (!$data->image) return 'N/A';
                        $mediaUrl = env('AWS_MEDIA_URL');
                        return '<img height="50px" width="50px" src="' . $mediaUrl . $data->image . '" >';
                    })
                    ->editColumn('action', function ($data) {
                        $active = '';
                        $checked = '';
                        if ($data->status == 'show') {
                            $active = 'active';
                            $checked = 'checked';
                        }
                        return '<a href="'.route('transport.vehicle-sub-type.assign', ['id' => $data->id]).'" style="color:#061880;" title="Assign Vehicle Sub-Type"><i class="material-icons">add</i></a><a href="' . url('transport/vehicle-type/edit/' . $data->id) . '" style="color:#061880;" title="Edit"><i class="material-icons">edit</i></a>'
                            . '<div class="toggle-btn ' . $active . '">
                            <input type="checkbox" onclick="changeStatus(' . $data->id . ')" class="cb-value approve' . $data->id . '" ' . $checked . '/>
                            <span class="round-btn"></span>
                        </div>';
                    })
                    ->rawColumns(['action', 'image'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }
        $page = 'manage_vehicle_type';
        return view('superadmin.transport.vehicle_type.index', compact('page'));
    }

    public function vehicleTypecreate()
    {
        $serviceCategories = ServiceCategory::where('category_type',CategoryType::TRANSPORT)->get();
        $page = 'manage_vehicle_type';
        return view('superadmin.transport.vehicle_type.create', compact('page', 'serviceCategories'));
    }

    public function vehicleTypestore(Request $request)
    {
        $request->validate([
            'service_category_id' => 'required',
            'name' => 'required',
            'image' => 'required|image'
        ]);
        try{
            $file = Storage::disk('s3')->put('public/uploads/all', $request->file('image'));
            $path = Storage::disk('s3')->url($file);
            $data = [
                'service_category_id' => $request->service_category_id,
                'name' => $request->name,
                'image' => substr($path, 45, 200)
            ];
            $vehicleType = VehicleType::create($data);
            $vehicleType->serviceCategories()->sync($request->service_category_id);
            $message = "Vehicle type added successfully!";
            return redirect()->route('transport.vehicle-type.list')->with('success_message', $message);
        }catch(\Exception $e){
            return redirect()->back()->with('error_message', 'Something Went Wrong!');
        }
    }

    public function vehicleTypeedit($id)
    {
        $serviceCategories = ServiceCategory::where('category_type',CategoryType::TRANSPORT)->get();
        $vehicleType = VehicleType::with('serviceCategories')->find($id);
        $existingServices = [];
        if(count($vehicleType->serviceCategories) > 0) $existingServices = $vehicleType->serviceCategories->pluck('id');
        $page = 'manage_vehicle_type';
        return view('superadmin.transport.vehicle_type.edit', compact('page', 'serviceCategories', 'vehicleType', 'existingServices'));
    }

    public function vehicleTypeupdate(Request $request)
    {
        $request->validate([
            'service_category_id' => 'required',
            'name' => 'required'
        ]);
        try{
            $vehicleType = VehicleType::find($request->id);
            $data = [
                'id' => $request->id,
                'service_category_id' => $request->service_category_id,
                'name' => $request->name,
            ];
            if($request->file('image'))
            {
                if(Storage::disk('s3')->exists('public/'.$vehicleType->image))  Storage::disk('s3')->delete('public/'.$vehicleType->image);
                $file = Storage::disk('s3')->put('public/uploads/all', $request->file('image'));
                $path = Storage::disk('s3')->url($file);
                $data['image'] = substr($path, 45, 200);
            }
            $vehicleType->update($data);
            $vehicleType->serviceCategories()->sync($request->service_category_id);
            $message = "Vehicle type updated successfully!";
            return redirect()->route('transport.vehicle-type.list')->with('success_message', $message);
        }catch(\Exception $e){
            return redirect()->back()->with('error_message', 'Something Went Wrong!');
        }
    }

    public function vehicleTypevisible(Request $request)
    {
        $vehicleType = VehicleType::find($request->id);
        $vehicleType->status = $vehicleType->status == 'show' ? 'hide' : 'show';
        $vehicleType->update();
        $vehicleType = json_decode($vehicleType);
        return $vehicleType;
    }
    
    public function assignVehicleSubType($id, Request $request)
    {
        if ($request->ajax()) {
            $token = Cache::get('api_token');
            if ($token) {
                $vehicleSubTypes = VehicleSubType::where('vehicle_type_id', $id)->get();
                return Datatables::of($vehicleSubTypes)
                    ->addIndexColumn()
                    ->editColumn('image', function ($vehicleSubTypes) {
                        $mediaUrl = env('AWS_MEDIA_URL');
                        $image = $vehicleSubTypes->image ? '<img src="'.$mediaUrl.$vehicleSubTypes->image.'" style="width:50px;height:50px"/>' : 'N/A';
                        return $image;
                    })
                    ->editColumn('action', function ($vehicleSubTypes) {
                        $active = '';
                        $checked = '';
                        if ($vehicleSubTypes->status == 'show') {
                            $active = 'active';
                            $checked = 'checked';
                        }
                        $btn = '';
                        $btn .= '<a href="javascript:;" style="color:#061880;" title="Edit" onclick="setValue('
                        .$vehicleSubTypes->id.','.'`'
                        .$vehicleSubTypes->name.'`,`'
                        .$vehicleSubTypes->image.'`,`'
                        .$vehicleSubTypes->has_color.'`,`'
                        .$vehicleSubTypes->has_other_info.'`,`'
                        .$vehicleSubTypes->has_number_of_seats.'`,`'
                        .$vehicleSubTypes->has_baby_seat.'`,`'
                        .$vehicleSubTypes->has_handicap_access.'`,`'
                        .$vehicleSubTypes->has_ride_category.'`,`'
                        .$vehicleSubTypes->has_max_load_weight.'`,`'
                        .$vehicleSubTypes->has_user_seat
                        .'`)"><i class="material-icons">edit</i></a><div class="toggle-btn ' . $active . '">
                                <input type="checkbox" onclick="changeStatus(' . $vehicleSubTypes->id . ')" class="cb-value approve' . $vehicleSubTypes->id . '" ' . $checked . '/>
                                <span class="round-btn"></span>
                                </div>';
                        return $btn;
                    })
                    ->rawColumns(['image', 'action'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }
        $page = 'manage_vehicle_type';
        return view('superadmin.transport.vehicle_type.assign_vehicle_sub_type', compact('id', 'page'));
    }

    public function assignVehicleSubTypeSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        try{
            if($request->vehicle_sub_type_id)
            {
                $data = [
                    'id' => $request->vehicle_sub_type_id,
                    'name' => $request->name,
                    'has_color' => $request->has_color ? 1 : 0,
                    'has_other_info' => $request->has_other_info ? 1 : 0,
                    'has_number_of_seats' => $request->has_number_of_seats ? 1 : 0,
                    'has_baby_seat' => $request->has_baby_seat ? 1 : 0,
                    'has_handicap_access' => $request->has_handicap_access ? 1 : 0,
                    'has_ride_category' => $request->has_ride_category ? 1 : 0,
                    'has_max_load_weight' => $request->has_max_load_weight ? 1 : 0,
                    'has_user_seat' => $request->has_user_seat ? 1 : 0
                ];
                $vehicleSubType = VehicleSubType::find($request->vehicle_sub_type_id);
                if($request->file('image'))
                {
                    if(Storage::disk('s3')->exists('public/'.$vehicleSubType->image))  Storage::disk('s3')->delete('public/'.$vehicleSubType->image);
                    $file = Storage::disk('s3')->put('public/uploads/all', $request->file('image'));
                    $path = Storage::disk('s3')->url($file);
                    $data['image'] = substr($path, 45, 200);
                }
                $vehicleSubType->update($data);
            }
            else
            {
                $file = Storage::disk('s3')->put('public/uploads/all', $request->file('image'));
                $path = Storage::disk('s3')->url($file);
                $data = [
                    'vehicle_type_id' => $request->id,
                    'name' => $request->name,
                    'image' => substr($path, 45, 200),
                    'has_color' => $request->has_color ? 1 : 0,
                    'has_other_info' => $request->has_other_info ? 1 : 0,
                    'has_number_of_seats' => $request->has_number_of_seats ? 1 : 0,
                    'has_baby_seat' => $request->has_baby_seat ? 1 : 0,
                    'has_handicap_access' => $request->has_handicap_access ? 1 : 0,
                    'has_ride_category' => $request->has_ride_category ? 1 : 0,
                    'has_max_load_weight' => $request->has_max_load_weight ? 1 : 0,
                    'has_user_seat' => $request->has_user_seat ? 1 : 0
                ];
                VehicleSubType::create($data);
            }
            $message = "Vehicle sub-type added successfully!";
            return redirect()->back()->with('success_message', $message);
        }catch(\Exception $e){
            return redirect()->back()->with('error_message', 'Something Went Wrong!');
        }
    }

    public function vehicleSubTypevisible(Request $request)
    {
        $vehicleSubType = VehicleSubType::find($request->id);
        $vehicleSubType->status = $vehicleSubType->status == 'show' ? 'hide' : 'show';
        $vehicleSubType->update();
        $vehicleSubType = json_decode($vehicleSubType);
        return $vehicleSubType;
    }
}
