<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Traits\ApiUrl;
use DataTables;

class DeliveryZoneController extends Controller
{
    use ApiUrl;

    public function deliveryZoneList(Request $request)
    {
        if($request->ajax())
        {
            $token = getToken();
            $zones = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->get($this->getApiUrl().'delivery_zone/list/'.session()->get('user_info')->user_id);
            $zones = json_decode($zones);
            $data = $zones->zones;
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('country', function($data){
                    return $data->country?$data->country->name:'--';
                })
                ->addColumn('action', function($data){
                    $actionBtn = '<form action="'.route('delete.delivery.zone').'" id="delete-form'.$data->id.'" method="post"><input type="hidden" value="'.csrf_token().'" name="_token"/><input type="hidden" value="'.$data->id.'" name="id"/></form><a href="'.route('edit.delivery.zone', ['id'=>$data->id]).'" class="edit btn btn-info btn-xs"><i class="fas fa-edit"></i></a>';
                    $actionBtn .= '&nbsp;<a href="javascript:;" class="edit btn btn-danger btn-xs" onclick="deleteDeliveryZone('.$data->id.')"><i class="fas fa-trash-restore-alt"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['country', 'action'])
                ->make(true);
            
        } 
        $parent = 'shop_setting';
        $page = 'shop_setting';
        return view('store_owner.shop_setting.delivery_zone_list', compact('page', 'parent'));
    }

    public function addDeliveryZone()
    {
        $token = getToken();
        $countries = Http::withHeaders([
            'Authorization' => 'Bearer '.$token
        ])->get($this->getApiUrl().'countrylist');
        $countries = json_decode($countries);
        $country_list = [];
        if($countries)
        {
            $country_list = $countries->countries;
        }
        $parent = 'shop_setting';
        $page = 'shop_setting';
        return view('store_owner.shop_setting.add_delivery_zone', compact('page', 'parent', 'country_list'));
    }

    public function addDeliveryZoneSubmit(Request $request)
    {
        $validate = $request->validate([
            'city' => 'required',
            'country' => 'required',
            'cost' => 'required'
        ]);
        $token = getToken();
        $data = [
            'name' => $request->city,
            'country_id' => $request->country,
            'cost' => $request->cost,
            'seller_id' => session()->get('user_info')->user_id
        ];
        $zone = Http::withHeaders([
            'Authorization' => 'Bearer '.$token
        ])->post($this->getApiUrl().'deliveryzoneadd', $data);
        $zone = json_decode($zone);
        return redirect()->route('delivery.zone.list')->with('success_message', 'Delivery zone added successfully');
    }

    public function editDeliveryZone($id)
    {
        $token = getToken();
        $countries = Http::withHeaders([
            'Authorization' => 'Bearer '.$token
        ])->get($this->getApiUrl().'countrylist');
        $countries = json_decode($countries);
        $country_list = [];
        if($countries)
        {
            $country_list = $countries->countries;
        }
        $delivery_zone = Http::withHeaders([
            'Authorization' => 'Bearer '.$token
        ])->get($this->getApiUrl().'deliveryzonebyid/'.$id);
        $delivery_zone = json_decode($delivery_zone);
        $zone = null;
        if($delivery_zone)
        {
            $zone = $delivery_zone->zone;
        }
        $parent = 'shop_setting';
        $page = 'shop_setting';
        return view('store_owner.shop_setting.edit_delivery_zone', compact('page', 'parent', 'country_list', 'zone'));
    }

    public function editDeliveryZoneSubmit(Request $request)
    {
        $validate = $request->validate([
            'city' => 'required',
            'country' => 'required',
            'cost' => 'required'
        ]);
        $token = getToken();
        $data = [
            'name' => $request->city,
            'id' => $request->id,
            'country_id' => $request->country,
            'cost' => $request->cost
        ];
        $zone = Http::withHeaders([
            'Authorization' => 'Bearer '.$token
        ])->post($this->getApiUrl().'deliveryzoneupdate', $data);
        $zone = json_decode($zone);
        return redirect()->route('delivery.zone.list')->with('success_message', 'Delivery zone updated successfully');
    }

    public function deleteDeliveryZone(Request $request)
    {
        $token = getToken();
        $data = [
            'id' => $request->id
        ];
        $zone = Http::withHeaders([
            'Authorization' => 'Bearer '.$token
        ])->post($this->getApiUrl().'deliveryzonedelete', $data);
        $zone = json_decode($zone);
        return redirect()->route('delivery.zone.list')->with('success_message', 'Delivery zone deleted successfully');
    }
}
