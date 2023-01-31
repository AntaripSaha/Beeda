<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Traits\ApiUrl;
use DataTables;
use Illuminate\Support\Str;

class RealestateController extends Controller
{
    use ApiUrl;

    public function addProperty($id)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $categories = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->get($this->getApiUrl() . 'real_estate_categories');

            $categories = json_decode($categories);

            $data = new \stdClass();    
            if ($categories) {
                $data->category = $categories->category;
            }
            $parent = $id;
            $page = 'add_property';
            $shop_id = $id;
            return view('store_owner.realestate.add_property',compact('page','parent', 'data', 'shop_id'));

        } else {
            return redirect()->route('login.login');
        }
    }

    public function addPropertySubmit(Request $request)
    {
        $validate = $request->validate([
            'property_name' => 'required',
            'property_type' => 'required',  
            'category' => 'required',
            'description' => 'required',
            'thumbnail_image' => 'required',
            'bed' => 'required',
            'bath' => 'required',
            'area' => 'required',
            'price' => 'required',
            'address' => 'required',
            'interior_status' => 'required',
            'interior_living_area' => 'required',
            'interior_type' => 'required',
            'interior_year_built' => 'required',
            'interior_life_styles' => 'required',
            'exterior_status' => 'required',
            'exterior_living_area' => 'required',
            'exterior_type' => 'required',
            'exterior_year_built' => 'required',
            'exterior_life_styles' => 'required',
            'area_status' => 'required',
            'area_living_area' => 'required',
            'area_type' => 'required',
            'area_year_built' => 'required',
            'area_life_styles' => 'required',
        ]);
        $token = Cache::get('api_token');
        $property_add = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ]);
        $tags = explode(',', $request->tags);
        $tags_array = [];
        for ($i = 0; $i < count($tags); $i++) {
            $tag_object = new \stdClass;
            $tag_object->value = $tags[$i];
            $tags_array[] = $tag_object;
        }
        $tags = [json_encode($tags_array)];
        $response = Http::get("https://maps.googleapis.com/maps/api/place/details/json?place_id=".$request->place_id."&fields=photo&key=".env('GOOGLE_API_KEY'));
        $response = json_decode($response);
        $photo_ref = $response->result->photos[0]->photo_reference;
        $response1 =  Http::get("https://maps.googleapis.com/maps/api/place/photo?maxwidth=1000
        &photo_reference=".$photo_ref."&key=".env('GOOGLE_API_KEY'));
        $file = $response1->body();
        $data = [
            ['name' => 'name', 'contents' => $request->property_name],
            ['name' => 'shop_id', 'contents' => $request->shop_id],
            ['name' => 'user_id', 'contents' => session()->get('user_info')->user_id],
            ['name' => 'added_by', 'contents' => 'seller'],
            ['name' => 'category_id', 'contents' => $request->category],
            ['name' => 'tags', 'contents' => json_encode($tags)],
            ['name' => 'video_provider', 'contents' => $request->video_provider],
            ['name' => 'video_link', 'contents' => $request->video_link],
            ['name' => 'unit_price', 'contents' => $request->price],
            ['name' => 'description', 'contents' => $request->description],
            ['name' => 'meta_title', 'contents' => $request->meta_title],
            ['name' => 'meta_description', 'contents' => $request->meta_description],
            ['name' => 'property_type', 'contents' => $request->property_type],
            ['name' => 'bed', 'contents' => $request->bed],
            ['name' => 'bath', 'contents' => $request->bath],
            ['name' => 'area', 'contents' => $request->area],
            ['name' => 'plot_area', 'contents' => $request->plot_area],
            ['name' => 'address', 'contents' => $request->address],
            ['name' => 'longitude', 'contents' => $request->address_long],
            ['name' => 'latitude', 'contents' => $request->address_lat],
            ['name' => 'interior_status', 'contents' => $request->interior_status],
            ['name' => 'interior_living_area', 'contents' => $request->interior_living_area],
            ['name' => 'interior_type', 'contents' => $request->interior_type],
            ['name' => 'interior_year_built', 'contents' => $request->interior_year_built],
            ['name' => 'interior_life_styles', 'contents' => $request->interior_life_styles],
            ['name' => 'exterior_status', 'contents' => $request->exterior_status],
            ['name' => 'exterior_living_area', 'contents' => $request->exterior_living_area],
            ['name' => 'exterior_type', 'contents' => $request->exterior_type],
            ['name' => 'exterior_year_built', 'contents' => $request->exterior_year_built],
            ['name' => 'exterior_life_styles', 'contents' => $request->exterior_life_styles],
            ['name' => 'area_status', 'contents' => $request->area_status],
            ['name' => 'area_living_area', 'contents' => $request->area_living_area],
            ['name' => 'area_type', 'contents' => $request->area_type],
            ['name' => 'area_year_built', 'contents' => $request->area_year_built],
            ['name' => 'area_life_styles', 'contents' => $request->area_life_styles],
            ['name' => 'address_img', 'contents' => $file],
            ['name' => 'place_id', 'contents' => $request->place_id],

        ];

        if ($request->file('thumbnail_image')) {
            $property_add->attach('thumbnail_img', file_get_contents($request->file('thumbnail_image')), $request->file('thumbnail_image')->getClientOriginalName());
        }
        if ($request->file('meta_image')) {
            $property_add->attach('meta_img', file_get_contents($request->file('meta_image')), $request->file('meta_image')->getClientOriginalName());
        }
        if ($request->gallery_images && count($request->gallery_images) > 0) {
            foreach ($request->gallery_images as $key => $value) {
                $property_add = $property_add->attach('photos[' . $key . ']', file_get_contents($value), $value->getClientOriginalName());
            }
        }
        $property_add = $property_add->post($this->getApiUrl() . 'property/upload', $data);
        $property_add = json_decode($property_add);
        if($property_add->status)
        {
            return redirect()->route('realestate.property.list', ['id' => $request->shop_id])->with('success_message', 'Property added successfully');
        }
        else
        {
            return redirect()->route('realestate.property.list', ['id' => $request->shop_id])->with('error_message', 'Something went wrong');
        }
    }

    public function propertyList($id, Request $request)
    {
      if($request->ajax())
       {
            $token = Cache::get('api_token');
            $properties = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->post($this->getApiUrl().'property/list', [
                'seller_id' => session()->get('user_info')->user_id
            ]);
            $properties = json_decode($properties);
            $data = $properties->properties;
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('category', function($data){
                    return $data->category ? $data->category->name:'';
                })
                ->editColumn('property_type', function($data){
                    $variants = '';
                    if($data->property_type == 0)
                    {
                        return "Sell";
                    }
                    else
                    {
                        return "Rent";
                    }
                    
                })
                ->editColumn('price', function($data){
                    return number_format($data->unit_price, 2);
                    
                })
                ->editColumn('published', function($data){
                    $active = '';
                    $checked = '';
                    if($data->published)
                    {
                        $active = 'active';
                        $checked = 'checked';
                    }
                    $switch = '<div class="toggle-btn '.$active.'">
                                    <input type="checkbox" onclick="publish('.$data->id.')" class="cb-value publish'.$data->id.'" '.$checked.'/>
                                    <span class="round-btn"></span>
                                </div>';
                    return $switch;
                })
                ->editColumn('image', function($data){
                    $image = '';
                    if($data->thumbnail)
                    {
                        $image .= '<img src="'.assetUrl().$data->thumbnail->file_name.'" style="width:70px;height:50px;"/>';
                    }
                    else
                    {
                        return $image .= '---';
                    }
                    return $image;
                })
                ->addColumn('options', function($data){
                    $actionBtn = '<a href="'.route('realestate.edit.property', ['id'=>$data->id, 'shop_id' => $data->shop_id]).'" class="edit btn btn-info btn-xs"><i class="fas fa-edit"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['property_type','category','published','image','price','options'])
                ->make(true);
            
       }
        $parent = $id;
        $service_category_id = $id;
        $page = 'property_list';
        return view('store_owner.realestate.property_list', compact('parent', 'page', 'service_category_id'));
    }

    public function publishProperty(Request $request)
    {
        $token = Cache::get('api_token');
        $publish_property = Http::withHeaders([
            'Authorization' => 'Bearer '.$token
        ])->post($this->getApiUrl().'property/publish', [
            'id' => $request->property_id
        ]);
        $publish_property = json_decode($publish_property);
        return response()->json(['status'=>true, 'data'=> $publish_property]);
    }

    public function editProperty($id, $shop_id)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $categories = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->get($this->getApiUrl() . 'real_estate_categories');

            $categories = json_decode($categories);

            $data = new \stdClass();    
            if ($categories) {
                $data->category = $categories->category;
            }
            $property = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->get($this->getApiUrl() . 'singleproperty/'.$id);    
            $property_data = json_decode($property);   
            $parent = $shop_id;
            $page = 'edit_property';
            $shop_id = $shop_id;
            return view('store_owner.realestate.edit_property',compact('page','parent', 'data', 'property_data','shop_id'));

        } else {
            return redirect()->route('login.login');
        }
    }

    public function editPropertySubmit(Request $request)
    {
        $validate = $request->validate([
            'property_name' => 'required',
            'property_type' => 'required',  
            'category' => 'required',
            'description' => 'required',
            'bed' => 'required',
            'bath' => 'required',
            'area' => 'required',
            'price' => 'required',
            'address' => 'required',
            'interior_status' => 'required',
            'interior_living_area' => 'required',
            'interior_type' => 'required',
            'interior_year_built' => 'required',
            'interior_life_styles' => 'required',
            'exterior_status' => 'required',
            'exterior_living_area' => 'required',
            'exterior_type' => 'required',
            'exterior_year_built' => 'required',
            'exterior_life_styles' => 'required',
            'area_status' => 'required',
            'area_living_area' => 'required',
            'area_type' => 'required',
            'area_year_built' => 'required',
            'area_life_styles' => 'required',
        ]);
        $token = Cache::get('api_token');
        $property_update = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ]);
        $tags = explode(',', $request->tags);
        $tags_array = [];
        for ($i = 0; $i < count($tags); $i++) {
            $tag_object = new \stdClass;
            $tag_object->value = $tags[$i];
            $tags_array[] = $tag_object;
        }
        $tags = [json_encode($tags_array)];
        $response = Http::get("https://maps.googleapis.com/maps/api/place/details/json?place_id=".$request->place_id."&fields=photo&key=".env('GOOGLE_API_KEY'));
        $response = json_decode($response);
        $photo_ref = $response->result->photos[0]->photo_reference;
        $response1 =  Http::get("https://maps.googleapis.com/maps/api/place/photo?maxwidth=1000
        &photo_reference=".$photo_ref."&key=".env('GOOGLE_API_KEY'));
        $file = $response1->body();
        $data = [
            ['name' => 'name', 'contents' => $request->property_name],
            ['name' => 'id', 'contents' => $request->property_id],
            ['name' => 'user_id', 'contents' => session()->get('user_info')->user_id],
            ['name' => 'added_by', 'contents' => 'seller'],
            ['name' => 'category_id', 'contents' => $request->category],
            ['name' => 'tags', 'contents' => json_encode($tags)],
            ['name' => 'video_provider', 'contents' => $request->video_provider],
            ['name' => 'video_link', 'contents' => $request->video_link],
            ['name' => 'unit_price', 'contents' => $request->price],
            ['name' => 'description', 'contents' => $request->description],
            ['name' => 'meta_title', 'contents' => $request->meta_title],
            ['name' => 'meta_description', 'contents' => $request->meta_description],
            ['name' => 'bed', 'contents' => $request->bed],
            ['name' => 'property_type', 'contents' => $request->property_type],
            ['name' => 'bath', 'contents' => $request->bath],
            ['name' => 'area', 'contents' => $request->area],
            ['name' => 'plot_area', 'contents' => $request->plot_area],
            ['name' => 'address', 'contents' => $request->address],
            ['name' => 'longitude', 'contents' => $request->address_long],
            ['name' => 'latitude', 'contents' => $request->address_lat],
            ['name' => 'interior_status', 'contents' => $request->interior_status],
            ['name' => 'interior_living_area', 'contents' => $request->interior_living_area],
            ['name' => 'interior_type', 'contents' => $request->interior_type],
            ['name' => 'interior_year_built', 'contents' => $request->interior_year_built],
            ['name' => 'interior_life_styles', 'contents' => $request->interior_life_styles],
            ['name' => 'exterior_status', 'contents' => $request->exterior_status],
            ['name' => 'exterior_living_area', 'contents' => $request->exterior_living_area],
            ['name' => 'exterior_type', 'contents' => $request->exterior_type],
            ['name' => 'exterior_year_built', 'contents' => $request->exterior_year_built],
            ['name' => 'exterior_life_styles', 'contents' => $request->exterior_life_styles],
            ['name' => 'area_status', 'contents' => $request->area_status],
            ['name' => 'area_living_area', 'contents' => $request->area_living_area],
            ['name' => 'area_type', 'contents' => $request->area_type],
            ['name' => 'area_year_built', 'contents' => $request->area_year_built],
            ['name' => 'area_life_styles', 'contents' => $request->area_life_styles],
            ['name' => 'address_img', 'contents' => $file],
            ['name' => 'place_id', 'contents' => $request->place_id],

        ];
        $test_file = public_path().'/'.'test.png';
        $test_file = str_replace("/public","", $test_file);
        $property_update = $property_update->attach('test_img', file_get_contents($test_file), 'test.png');
        if ($request->file('thumbnail_image')) {
            $property_update->attach('thumbnail_img', file_get_contents($request->file('thumbnail_image')), $request->file('thumbnail_image')->getClientOriginalName());
        }
        if ($request->file('meta_image')) {
            $property_update->attach('meta_img', file_get_contents($request->file('meta_image')), $request->file('meta_image')->getClientOriginalName());
        }
        if ($request->gallery_images && count($request->gallery_images) > 0) {
            foreach ($request->gallery_images as $key => $value) {
                $property_update = $property_update->attach('photos[' . $key . ']', file_get_contents($value), $value->getClientOriginalName());
            }
        }
        $property_update = $property_update->post($this->getApiUrl() . 'property/update', $data);
        $property_update = json_decode($property_update);
        if($property_update->status)
        {
            return redirect()->route('realestate.property.list', ['id'=> $request->shop_id])->with('success_message', 'Property updated successfully');

        }
        else
        {
            return redirect()->route('realestate.property.list', ['id'=> $request->shop_id])->with('error_message', 'Something went wrong');
        }
    }

    public function scheduleList($id, Request $request)
    {
      if($request->ajax())
       {
            $token = Cache::get('api_token');
            $schedule_list = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->post($this->getApiUrl().'schedule/list', [
                'seller_id' => session()->get('user_info')->user_id
            ]);
            $schedule_list = json_decode($schedule_list);
            $data = $schedule_list->schedule_list;
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('property', function($data){
                    return $data->property ? $data->property->name:'';
                })
                ->editColumn('date_time', function($data){
                    return $data->date.' '.$data->time;
                    
                })
                ->editColumn('status', function($data){
                    if($data->status == 0)
                    {
                        return '<span class="badge badge-danger">Pending</span>';
                    }
                    if($data->status == 1)
                    {
                        return '<span class="badge badge-info">Confirmed</span>';
                    }
                    if($data->status == 2)
                    {
                        return '<span class="badge badge-success">Meeting Done</span>';
                    }
                    
                })
                ->editColumn('viewed', function($data){ 
                    if($data->viewed == 0)
                    {
                        return '<i class="fa fa-eye" aria-hidden="true"></i>';
                    }
                    else
                    {
                        return '<i class="fa fa-check text-success" aria-hidden="true"></i>';

                    }
                })
                ->addColumn('options', function($data){
                    $btn_color = '';
                    $icon_class = '';
                    $btn_text = '';
                    if($data->status == 0)
                    {
                        $btn_color = '#00C3E5';
                        $icon_class = 'fa fa-check';
                        $btn_text = 'Confirm';
                    }
                    if($data->status == 1)
                    {
                        $btn_color = '#9EC800';
                        $icon_class = 'far fa-handshake';
                        $btn_text = 'Done Meeting';
                    }
                    $actionBtn = '';
                    if($data->status != 2)
                    {
                        $actionBtn = '<form action="'.route('realestate.schedule.status.change', ['id' => $data->property->shop_id]).'" method="post"><input type="hidden" name="_token" value="'.csrf_token().'" /><input type="hidden" name="schedule_id" value="'.$data->id.'" /><button class="btn btn-xs" style="background-color: '.$btn_color.';border-color: '.$btn_color.';color:white;" type="submit"><i class="'.$icon_class.'"></i> '.$btn_text.'</button></form>';
                    }
                    $actionBtn .= '<br><a href="'.route('realestate.schedule.details', ['schedule_id'=>$data->id, 'id' => $data->property->shop_id]).'" class="btn btn-sm" style="background-color: #061880;border-color: #061880;color:white;" type="submit"><i class="fas fa-info-circle"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['property', 'date_time', 'status', 'viewed', 'options'])
                ->make(true);
            
        }
        $parent = $id;
        $service_category_id = $id;
        $page = 'schedule_list';
        return view('store_owner.realestate.schedule_list', compact('parent', 'page', 'service_category_id'));
    }

    public function changeScheduleStatus($id, Request $request)
    {
        $token = Cache::get('api_token');
        $status_schedule = Http::withHeaders([
            'Authorization' => 'Bearer '.$token
        ])->post($this->getApiUrl().'schedule/status', [
            'schedule_id' => $request->schedule_id
        ]);
        $status_schedule = json_decode($status_schedule);
        return redirect()->route('realestate.schedule.list', ['id' => $id])->with('success_message', 'Schedule status changed successfully'); 
    }

    public function shortScheduleList(Request $request)
    {
        $token = Cache::get('api_token');
        if($token)
        {
            $schedules = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->get($this->getApiUrl().'schedule/shortschedulelist/'.session()->get('user_info')->user_id);
            $schedules = json_decode($schedules);
            return $schedules;
        }
    }

    public function scheduleDetails($schedule_id, $id)
    {
        $token = Cache::get('api_token');
        if($token)
        {
            $schedule = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->get($this->getApiUrl().'schedule/details/'.$schedule_id);
            $schedule = json_decode($schedule)->schedule;
            $parent = $id;
            $service_category_id = $id;
            $page = 'schedule_details';
            return view('store_owner.realestate.schedule_details', compact('parent', 'service_category_id', 'page', 'schedule'));
        }
        
    }

    public function firebaseTest()
    {
        return view('store_owner.realestate.firebase');
    }
}
