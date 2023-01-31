<?php

namespace App\Http\Controllers\SuperAdmin;      

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SellerService;
use App\Constants\ServiceCategoryType;
use App\Models\Property;
use App\User;
use DataTables;

class RealEstateAgentController extends Controller
{
    public function agentList(Request $request)
    {
        if ($request->ajax()) {
            $seller_services = SellerService::where('service_category_id', ServiceCategoryType::REAL_ESTATE)->pluck('seller_id');
            $agents = User::with(['properties'])->whereIn('id', $seller_services)->get();
            $data = $agents;
            return Datatables::of($data)
                ->editColumn('properties', function ($data) {
                    if(!$data->properties) return 0;
                    return '<a href="' . route('service.agent.property.list', ['agent_id' => $data->id]) . '" class="btn btn-sm btn-info">View (' . $data->properties->count() . ')</a>';
                })
                ->rawColumns(['properties'])
                ->make(true);
        }
        $page = 'manage_service';
        return view('superadmin.sellers.manage_service.agent_list', compact('page'));
    }

    public function agentPropertyList($agent_id, Request $request)
    {
        if ($request->ajax()) {
            $properties = Property::with(['thumbnail', 'category'])->where('user_id', $agent_id)->get();
            $data = $properties;
            return Datatables::of($data)
            ->editColumn('image', function ($data) {
                if ($data->thumbnail) {
                    if (env('AWS_ON')) {
                        return '<img src="' . assetUrl() . $data->thumbnail->file_name . '" style="width:50px;height:50px;"/>';
                    }
                    return '<img src="'. assetUrl() . $data->thumbnail->file_name . '" style="width:50px;"/>';
                } else {
                    return '---';
                }
            })
            ->editColumn('category', function ($data) {
                if ($data->category) { 
                    return $data->category->name;
                } else {
                    return '---';
                }
            })
            ->editColumn('featured', function ($data) {
                $active = '';
                $checked = '';
                if ($data->featured) {
                    $active = 'active';
                    $checked = 'checked';
                }
                $switch = '<div class="toggle-btn ' . $active . '">
                                <input type="checkbox" onclick="feature(' . $data->id . ')" class="cb-value feature' . $data->id . '" ' . $checked . '/>
                                <span class="round-btn"></span>
                            </div>';
                return $switch;
            })
            ->editColumn('recommended', function ($data) {
                $active = '';
                $checked = '';
                if ($data->recommended) {
                    $active = 'active';
                    $checked = 'checked';
                }
                $switch = '<div class="toggle-btn ' . $active . '">
                                <input type="checkbox" onclick="recommend(' . $data->id . ')" class="cb-value recommend' . $data->id . '" ' . $checked . '/>
                                <span class="round-btn"></span>
                            </div>';
                return $switch;
            })
            ->rawColumns(['image', 'category', 'featured', 'recommended'])
            ->make(true);
        }
        $page = 'manage_service';
        return view('superadmin.sellers.manage_service.agent_property_list', compact('page', 'agent_id'));
    }

    public function featureAgentProperty(Request $request)
    {
        $property = Property::where('id', $request->property_id)->first();
        $property->featured = !$property->featured;
        if($property->update())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function recommendAgentProperty(Request $request)
    {
        $property = Property::where('id', $request->property_id)->first();
        $property->recommended = !$property->recommended;
        if($property->update())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
