<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Traits\ApiUrl;
use App\Models\BusinessSetting;
use DataTables;
use DB;

class CategoryController extends Controller
{
    use ApiUrl;

    public function categoryList(Request $request)
    {
        if ($request->ajax()) {
            $mediaUrl = env('AWS_MEDIA_URL');
            $token = Cache::get('api_token');
            if ($token) {
                $categories = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $token
                ])->get($this->getApiUrl() . 'superadmin/categorylist');
                $categories = json_decode($categories);
                $data = [];
                if ($categories) $data = $categories->table_categories;

                return Datatables::of($data)
                    // ->addIndexColumn()
                    ->addColumn('service_category_name', function ($data) {
                        return $data->service_category ? $data->service_category->name : '---';
                    })
                    ->editColumn('parent_category', function ($data) {
                        if ($data->parent) {
                            return $data->parent->name;
                        } else {
                            return '---';
                        }
                    })
                    ->editColumn('banner', function ($data) use($mediaUrl){
                        if ($data->banner) {
                            return '<img src="' . $mediaUrl . $data->banner->file_name . '" width="50px" height="50px">';
                        } else {
                            return '---';
                        }
                    })
                    ->editColumn('icon', function ($data) use($mediaUrl){
                        if ($data->icon) {
                            return '<img src="' . $mediaUrl . $data->icon->file_name . '" style="width:60px;"/>';
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
                    ->editColumn('tabed', function ($data) {
                        $active = '';
                        $checked = '';
                        if ($data->tabed) {
                            $active = 'active';
                            $checked = 'checked';
                        }
                        $switch = '<div class="toggle-btn ' . $active . '">
                                        <input type="checkbox" onclick="tab(' . $data->id . ')" class="cb-value tab' . $data->id . '" ' . $checked . '/>
                                        <span class="round-btn"></span>
                                    </div>';
                        return $switch;
                    })
                    ->editColumn('mobile_top', function ($data) {
                        $active = '';
                        $checked = '';
                        if ($data->mobile_top) {
                            $active = 'active';
                            $checked = 'checked';
                        }
                        $switch = '<div class="toggle-btn ' . $active . '">
                                        <input type="checkbox" onclick="MobileTop(' . $data->id . ')" class="cb-value mobileTop' . $data->id . '" ' . $checked . '/>
                                        <span class="round-btn"></span>
                                    </div>';
                        return $switch;
                    })
                    ->editColumn('action', function ($data) {
                        $btn = '<form action="' . route('category.delete') . '" method="post" id="delete-form' . $data->id . '"><input type="hidden" name="_token" value="' . csrf_token() . '" /><input type="hidden" value="' . $data->id . '" name="id" /></form>';
                        $btn .= '<a href="' . route('category.edit', ['id' => $data->id]) . '" style="color:#061880;" title="Edit"><i class="material-icons">edit</i></a>';
                        $btn .= '<a href="javascript:;" title="Delete" style="color:#061880;" onclick="deleteCategory(' . $data->id . ')"><i class="material-icons">delete</i></a>';
                        return $btn;
                    })
                    ->rawColumns(['parent_category', 'banner', 'icon', 'featured', 'tabed', 'mobile_top', 'action'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }
        $page = 'manage_category';
        return view('superadmin.sellers.manage_category.category_list', compact('page'));
    }

    public function featureCategory(Request $request)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $feature = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->post($this->getApiUrl() . 'superadmin/featurecategory', ['id' => $request->category_id]);

            $feature = json_decode($feature);
            return 1;
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function unfeatureCategory(Request $request)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $unfeature = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->post($this->getApiUrl() . 'superadmin/unfeaturecategory', ['id' => $request->category_id]);

            $unfeature = json_decode($unfeature);
            return 1;
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function tabCategory(Request $request)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $feature = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->post($this->getApiUrl() . 'superadmin/tabcategory', ['id' => $request->category_id]);

            $feature = json_decode($feature);
            return 1;
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function untabCategory(Request $request)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $feature = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->post($this->getApiUrl() . 'superadmin/untabcategory', ['id' => $request->category_id]);
            $feature = json_decode($feature);
            return 1;
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function mobileTopCategory(Request $request)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $feature = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->post($this->getApiUrl() . 'superadmin/mobiletopcategory', ['id' => $request->category_id]);

            $feature = json_decode($feature);
            return 1;
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function unMobileTopCategory(Request $request)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $feature = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->post($this->getApiUrl() . 'superadmin/unmobiletopcategory', ['id' => $request->category_id]);
            $feature = json_decode($feature);
            return 1;
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function addCategory()
    {
        $token = Cache::get('api_token');
        if ($token) {
            $categories = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->get($this->getApiUrl() . 'superadmin/categorylist');
            $categories = json_decode($categories);
            $category_list = [];
            if ($categories) {
                $category_list = $categories->option_categories;
            }

            $service_categories = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->post($this->getApiUrl() . 'service-category-x');

            $service_categories = json_decode($service_categories);
            $service_category_list = [];
            if ($service_categories) {
                $service_category_list = $service_categories->data->Sercice_Categorise;
            }
            $page = 'manage_category';
            return view('superadmin.sellers.manage_category.add_category', compact('category_list', 'service_category_list', 'page'));
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function addCategorySubmit(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'service_category' => 'required',
            'type' => 'required'
        ]);
        $token = Cache::get('api_token');
        if ($token) {
            $data = [
                'name' => $request->name,
                'service_category_id' => $request->service_category,
                'parent_category' => $request->parent_category,
                'type' => $request->type,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description
            ];
            $category = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ]);
            if ($request->file('banner')) {
                $category = $category->attach('banner_img', file_get_contents($request->file('banner')), $request->file('banner')->getClientOriginalName());
            }
            if ($request->file('icon')) {
                $category = $category->attach('icon_img', file_get_contents($request->file('icon')), $request->file('icon')->getClientOriginalName());
            }
            $category = $category->post($this->getApiUrl() . 'superadmin/addcategory', $data);

            $category = json_decode($category);
            // return $category;
            if ($category) {
                return redirect()->route('category.list')->with('success_message', $category->message);
            } else {
                return redirect()->back()->with('error_message', 'Something went wrong');
            }
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function deleteCategory(Request $request)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $data = [
                'id' => $request->id
            ];
            $category = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ]);
            $category = $category->post($this->getApiUrl() . 'superadmin/deletecategory', $data);

            $category = json_decode($category);
            if ($category) {
                return redirect()->route('category.list')->with('success_message', $category->message);
            } else {
                return redirect()->back()->with('error_message', 'Something went wrong');
            }
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function editCategory($id)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $category = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->get($this->getApiUrl() . 'superadmin/categorybyid/' . $id);
            $category = json_decode($category);
            if ($category) {
                $category = $category->category;
            }
            $categories = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->get($this->getApiUrl() . 'superadmin/categorylist');
            $categories = json_decode($categories);
            $category_list = [];
            if ($categories) $category_list = $categories->option_categories;

            $service_categories = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->post($this->getApiUrl() . 'service-category-x');

            $service_categories = json_decode($service_categories);
            $service_category_list = [];
            if ($service_categories) {
                $service_category_list = $service_categories->data->Sercice_Categorise;
            }
            $page = 'manage_category';
            return view('superadmin.sellers.manage_category.edit_category', compact('category', 'category_list', 'service_category_list', 'page'));
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function editCategorySubmit(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'service_category' => 'required',
            'type' => 'required'
        ]);
        $token = Cache::get('api_token');
        if ($token) {
            $data = [
                'id' => $request->id,
                'name' => $request->name,
                'service_category_id' => $request->service_category,
                'parent_category' => $request->parent_category,
                'type' => $request->type,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description
            ];
            $category = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ]);
            if ($request->file('banner')) {
                $category = $category->attach('banner_img', file_get_contents($request->file('banner')), $request->file('banner')->getClientOriginalName());
            }
            if ($request->file('icon')) {
                $category = $category->attach('icon_img', file_get_contents($request->file('icon')), $request->file('icon')->getClientOriginalName());
            }
            $category = $category->post($this->getApiUrl() . 'superadmin/updatecategory', $data);

            $category = json_decode($category);
            if ($category) {
                return redirect()->route('category.list')->with('success_message', $category->message);
            } else {
                return redirect()->back()->with('error_message', 'Something went wrong');
            }
        } else {
            return redirect()->route('super.admin.login');
        }
    }
    public function beedamalHomeSectionCategories(){
        $page = 'dashboard';
        $section_1 = Category::find(get_setting('home_category_section_1'));
        $section_2 = Category::find(get_setting('home_category_section_2'));
        $section_3 = Category::find(get_setting('home_category_section_3'));
        $categories = Category::where([['parent_id', '=', 0], ['service_category_id', '=', 6]])->get();
        return view('superadmin.section_banner.index', compact('page','categories', 'section_1', 'section_3', 'section_3'));
    }
    public function updateBeedamalHomeSectionCategories(Request $request)
    {
        $validate = $request->validate([
            'section_name_1' => 'required',
            'section_1_value' => 'required',
            'section_name_2' => 'required',
            'section_2_value' => 'required',
            'section_name_3' => 'required',
            'section_3_value' => 'required',
        ]);
        $section_name_1 = BusinessSetting::where('type', 'home_category_section_1_name')->first();
        $section_name_1->value = $request->section_name_1;
        $section_name_1->save();

        $section_value_1 = BusinessSetting::where('type', 'home_category_section_1')->first();
        $section_value_1->value = $request->section_1_value;
        $section_value_1->save();
        
        $section_name_2 = BusinessSetting::where('type', 'home_category_section_2_name')->first();
        $section_name_2->value = $request->section_name_2;
        $section_name_2->save();

        $section_value_2 = BusinessSetting::where('type', 'home_category_section_2')->first();
        $section_value_2->value = $request->section_2_value;
        $section_value_2->save();

        $section_name_3 = BusinessSetting::where('type', 'home_category_section_3_name')->first();
        $section_name_3->value = $request->section_name_3;
        $section_name_3->save();

        $section_value_3 = BusinessSetting::where('type', 'home_category_section_3')->first();
        $section_value_3->value = $request->section_3_value;
        $section_value_3->save();

        return redirect()->back()->with('success_message','Blog post has been created successfully');

    }
}
