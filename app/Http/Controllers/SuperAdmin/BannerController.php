<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Traits\ApiUrl;
use DataTables;

class BannerController extends Controller
{
    use ApiUrl;

    public function bannerList(Request $request)
    {
        if($request->ajax()) {
            $token = Cache::get('api_token');
            if ($token) {
                $banners = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $token
                ])->get($this->getApiUrl() . 'superadmin/bannerlist');
                $banners = json_decode($banners);
                $data = [];
                if ($banners) {
                    $data = $banners->banners;
                }
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('banner', function ($data) {
                        return '<img src="' . (env('AWS_ON') ? env('AWS_MEDIA_URL') : env('NATIVE_MEDIA_URL')) .$data->photo.'" style="width:160px;height:60px;"/>';
                    })
                    ->editColumn('url', function ($data) {
                        return '<a href="'.$data->url.'" target="_blank">'.$data->url.'</a>';
                    })
                    ->editColumn('service', function ($data) {
                        return $data->service_category ? $data->service_category->name : '---';
                    })
                    ->editColumn('shop', function ($data) {
                        return $data->shop ? $data->shop->name : '---';
                    })
                    ->editColumn('product', function ($data) {
                        return $data->product ? $data->product->name : '---';
                    })
                    ->editColumn('published', function ($data) {
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
                    ->editColumn('action', function ($data) {
                        // $btn = '<form action="'.route('service.attribute.delete').'" method="post" id="delete-form'.$data->id.'"><input type="hidden" name="_token" value="'.csrf_token().'" /><input type="hidden" value="'.$data->id.'" name="id" /></form>';
                        $btn = '<a href="'.route('banner.edit', ['id' => $data->id]).'" style="color:#061880;" title="Edit"><i class="material-icons">edit</i></a>';
                        // $btn .= '<a href="javascript:;" title="Delete" style="color:#061880;" onclick="deleteAttribute('.$data->id.')"><i class="material-icons">delete</i></a>';
                        return $btn;
                    })
                    ->rawColumns(['banner', 'url', 'service', 'published', 'action'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }
        $page = 'manage_banner';
        return view('superadmin.banner.banner_list', compact('page'));
    }

    public function editBanner($id)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $banner = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->get($this->getApiUrl() . 'superadmin/bannerbyid/'.$id);
            $banner = json_decode($banner);
            $banner_data = null;
            if($banner)
            {
                $banner_data = $banner->banner;
            }
            $service_categories = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->post($this->getApiUrl().'service-category-x');

            $service_categories = json_decode($service_categories);
            $service_category_list = [];
            if($service_categories)
            {
                    $service_category_list = $service_categories->data->Sercice_Categorise;
            }
            $page = 'manage_banner';
            return view('superadmin.banner.edit_banner', compact('page', 'banner_data', 'service_category_list'));
        } else {
            return redirect()->route('super.admin.login');
        }
        
    }

    public function editBannerSubmit(Request $request)
    {
        $validate = $request->validate([
            'position' => 'required',
            'published' => 'required'
        ]);
        $token = Cache::get('api_token');
        if ($token) {
            $data = [
                'id' => $request->id,
                'position' => $request->position,
                'published' => $request->published,
                'url' => $request->url ? $request->url : '#'
            ];
            $banner = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ]);
            if($request->file('photo'))
            {
                $banner = $banner->attach('banner_img', file_get_contents($request->file('photo')), $request->file('photo')->getClientOriginalName());
            }
            $banner = $banner->post($this->getApiUrl() . 'superadmin/bannerupdate', $data);
            $banner = json_decode($banner);
            
            return redirect()->route('banner.list')->with('success_message', 'Banner updated successfully');
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function addBanner()
    {
        $token = Cache::get('api_token');
        if ($token) {
            $service_categories = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->post($this->getApiUrl().'service-category-x');

            $service_categories = json_decode($service_categories);
            $service_category_list = [];
            if($service_categories)
            {
                    $service_category_list = $service_categories->data->Sercice_Categorise;
            }
            $page = 'manage_banner';
            return view('superadmin.banner.add_banner', compact('page', 'service_category_list'));
        } else {
            return redirect()->route('super.admin.login');
        }
        
    }

    public function addBannerSubmit(Request $request)
    {
        $validate = $request->validate([
            'position' => 'required',
            'photo' => 'required',
            'published' => 'required',
            'service_category' => 'required'
        ]);
        $token = Cache::get('api_token');
        if ($token) {
            $data = [
                'position' => $request->position,
                'published' => $request->published,
                'service_category_id' => $request->service_category,
                'url' => $request->url ? $request->url : '#',
                'product_id' => $request->product,
                'shop_id' => $request->shop,
                'type' => $request->type
            ];
            $banner = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ]);
            if($request->file('photo'))
            {
                $banner = $banner->attach('banner_img', file_get_contents($request->file('photo')), $request->file('photo')->getClientOriginalName());
            }
            $banner = $banner->post($this->getApiUrl() . 'superadmin/banneradd', $data);
            $banner = json_decode($banner);
            
            return redirect()->route('banner.list')->with('success_message', 'Banner uploaded successfully');
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function publishBanner(Request $request)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $data = [
                'id' => $request->banner_id
            ];
            $publish = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->post($this->getApiUrl() . 'superadmin/bannerpublish', $data);
            $publish = json_decode($publish);           
            return $publish;
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function serviceCategoryProducts(Request $request)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $products = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->get($this->getApiUrl() . 'superadmin/servicecategoryproducts/'.$request->id);
            $products = json_decode($products);           
            return $products;
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function serviceCategoryShops(Request $request)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $shops = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->get($this->getApiUrl() . 'superadmin/servicecategoryshops/'.$request->id);
            $shops = json_decode($shops);           
            return $shops;
        } else {
            return redirect()->route('super.admin.login');
        }
    }
}
