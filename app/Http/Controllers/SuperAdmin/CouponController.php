<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Coupon;
use App\Models\CouponPivot;
use App\SellerService;
use App\User;
use App\Shop;
use App\ServiceCategory;

class CouponController extends Controller
{
    public function couponList(Request $request)
    {
        if($request->ajax()) {
                $data = Coupon::all();
                return Datatables::of($data)
                    // ->addIndexColumn()
                    ->editColumn('service', function ($data) {
                        return $data->service_category ? $data->service_category->name : '--';
                    })
                    ->editColumn('start_date', function ($data) {
                        return date('Y-m-d', $data->start_date);
                    })
                    ->editColumn('end_date', function ($data) {
                        return date('Y-m-d', $data->end_date);
                    })
                    ->editColumn('action', function ($data) {
                        $btn = '<form action="'.route('service.coupon.delete').'" method="post" id="delete-form'.$data->id.'"><input type="hidden" name="_token" value="'.csrf_token().'" /><input type="hidden" value="'.$data->id.'" name="id" /></form>';
                        $btn .= '<a href="'.route('service.coupon.edit', ['id' => $data->id]).'" style="color:#061880;" title="Edit"><i class="material-icons">edit</i></a>';
                        $btn .= '<a href="javascript:;" title="Delete" style="color:#061880;" onclick="deleteCoupon('.$data->id.')"><i class="material-icons">delete</i></a>';
                        return $btn;
                    })
                    ->rawColumns(['start_date', 'end_date', 'service', 'action'])
                    ->make(true);
        }
        $page = 'manage_coupon';
        return view('superadmin.sellers.manage_coupon.coupon_list', compact('page'));
    }

    public function addCoupon()
    {
        $service_categories = ServiceCategory::whereIn('category_type', [2, 1])->get();
        $users = User::activeUsers()->select('id', 'name')->get();
        $active_seller_services = SellerService::where('status', 1)->pluck('id');
        $shops = Shop::whereIn('seller_service_id', $active_seller_services)->select('id', 'name')->get();
        $page = 'manage_coupon';
        return view('superadmin.sellers.manage_coupon.add_coupon', compact('page', 'service_categories', 'users', 'shops'));
    }

    public function addCouponSubmit(Request $request)
    {
        $validate = $request->validate([
            'code' => 'required|unique:coupons,code',
            'discount' => 'required',
            'discount_type' => 'required',
            'limit_per_user' => 'required',
            'max_discount' => 'requiredIf:discount_type,==,percent',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $coupon = new Coupon();
        $coupon->code = $request->code;
        $coupon->service_category_id = $request->service;
        $coupon->discount = $request->discount;
        $coupon->discount_type = $request->discount_type;
        $coupon->min_cart_amount = $request->min_cart_amount;
        $coupon->limit_per_user = $request->limit_per_user;
        $coupon->max_discount = $request->max_discount;
        $coupon->start_date = strtotime($request->start_date);
        $coupon->end_date = strtotime($request->end_date);
        $coupon->save();
        if(isset($request->users)) $coupon->users()->sync($request->users);
        if(isset($request->shops)) $coupon->shops()->sync($request->shops);
        return redirect()->route('service.coupon.list')->with('success_message', 'Coupon added successfully');
    }

    public function deleteCoupon(Request $request)
    {
            $coupon = Coupon::where('id', $request->id)->first();
            $coupon->delete();
            $coupon->users()->detach();
            $coupon->shops()->detach();
            return redirect()->route('service.coupon.list')->with('success_message', 'Coupon deleted successfully');
    }

    public function editCoupon($id)
    {
        $service_categories = ServiceCategory::whereIn('category_type', [2, 1])->get();
        $users = User::activeUsers()->select('id', 'name')->get();
        $active_seller_services = SellerService::where('status', 1)->pluck('id');
        $shops = Shop::whereIn('seller_service_id', $active_seller_services)->select('id', 'name')->get();
        $coupon = Coupon::with(['service_category', 'users', 'shops'])->where('id', $id)->first();
        $existingUsers = $coupon->users->pluck('id');
        $existingShops = $coupon->shops->pluck('id');
        $page = 'manage_coupon';
        return view('superadmin.sellers.manage_coupon.edit_coupon', compact('page', 'service_categories', 'users', 'shops', 'coupon', 'existingUsers', 'existingShops'));
    }

    public function editCouponSubmit(Request $request)
    {
        $validate = $request->validate([
            'code' => 'required|unique:coupons,code,'.$request->id,
            'discount' => 'required',
            'discount_type' => 'required',
            'max_discount' => 'requiredIf:discount_type,==,percent',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $coupon = Coupon::where('id', $request->id)->first();
        $coupon->code = $request->code;
        $coupon->service_category_id = $request->service;
        $coupon->discount = $request->discount;
        $coupon->discount_type = $request->discount_type;
        $coupon->min_cart_amount = $request->min_cart_amount;
        $coupon->limit_per_user = $request->limit_per_user;
        $coupon->max_discount = $request->max_discount;
        $coupon->status = $request->status;
        $coupon->start_date = strtotime($request->start_date);
        $coupon->end_date = strtotime($request->end_date);
        $coupon->update();
        if(isset($request->users)) $coupon->users()->sync($request->users);
        if(isset($request->shops)) $coupon->shops()->sync($request->shops);
        return redirect()->route('service.coupon.list')->with('success_message', 'Coupon updated successfully');
    }
}
