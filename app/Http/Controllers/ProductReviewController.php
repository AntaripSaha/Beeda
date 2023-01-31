<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Traits\ApiUrl;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ProductReviewController extends Controller
{
    use ApiUrl;

    public function productReviews(Request $request)
    {
        $token = Cache::get('api_token');
        if ($token) {
            /*
            $product_reviews = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->get($this->getApiUrl() . 'seller/products/reviews/' . session()->get('user_info')->user_id);
            $product_reviews = json_decode($product_reviews);
            if ($product_reviews) {
                $product_reviews = $product_reviews->reviews->data;
            }
            */
            $user_id = session()->get('user_info')->user_id;

            $product_reviews = DB::table('reviews')
                    ->orderBy('id', 'desc')
                    ->join('products', 'reviews.model_id', '=', 'products.id')
                    ->join('users', 'reviews.user_id', '=', 'users.id')
                    ->where('products.user_id', $user_id)
                    ->select('reviews.*','users.name as user_name','products.name','products.slug')
                    ->distinct()
                    ->get();

            foreach ($product_reviews as $key => $value) {
                $review = \App\Review::where('id', $value->id)->first();
                $review->viewed = 1;
                $review->save();
            }
            
            if ($request->ajax()) {
                $data = $product_reviews;

                return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('product_name', function ($data) {
                        return isset($data->name) ? $data->name : '-';
                    })
                    ->editColumn('customer', function ($data) {
                        return isset($data->user_name) ? $data->user_name : '-';
                    })
                    ->editColumn('rating', function ($data) {
                        $star = '';
                        $product_star = $data->rating;
                        if (isset($product_star)) {
                            for ($i = 0; $i < $product_star; $i++) {
                                $star .= '<span class="fa fa-star checked"></span>';
                            }
                            for ($i = 0; $i < (5 - $product_star); $i++) {
                                $star .= '<span class="fa fa-star"></span>';
                            }
                        }
                        return $star;
                    })
                    ->editColumn('comment', function ($data) {
                        return isset($data->comment) ? $data->comment : '-';
                    })
                    ->editColumn('published', function ($data) {
                        if ($data->status == 1) {
                            return '<i class="fa fa-check-circle" style="color:#60b760;" aria-hidden="true"></i>';
                        } else {
                            return '<i class="fas fa-times-circle" style="color:#ef5555"></i>';
                        }
                    })
                    ->rawColumns(['product_name', 'customer', 'rating', 'comment', 'published'])
                    ->make(true);
            }
            $parent = 'seller';
            $page = 'product_review';
            return view('store_owner.product_reviews.product_reviews', compact('product_reviews', 'parent', 'page'));
        } else {
            return redirect()->route('login.login');
        }
    }
}
