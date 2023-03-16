<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

use App\Category;
use App\BeedaBlog;
use App\Upload;
use App\User;

class BlogController extends Controller
{
    public function index(Request $request)
    {
    	try{
            $validator = Validator::make($request->all(), [
                    "per_page" => "required",
                    "page" => "required"
                ]
            );

            if ($validator->fails()) {
                return response()->json(['status' => false, 'status_code' => 500, 'message' => $validator->errors()->first()]);
            }

            $blogPosts = BeedaBlog::with(['category'=> function($query){
                    $query->select('id', 'name');
                },'user'=> function($query){
                    $query->select('id', 'name', 'first_name', 'last_name');
                }, 'thumbnail_img'=> function($query){
                    $query->select('id', 'file_original_name', 'file_name');
                }, 'img'=> function($query){
                    $query->select('id', 'file_original_name', 'file_name');
                }, 'metaImg'=> function($query){
                    $query->select('id', 'file_original_name', 'file_name');
                }])
                ->where('status', 1)->orderBy('id', 'desc')->distinct()->paginate($request->per_page);

            return response()->json(['status' => true, 'status_code' => 200, 'message' => 'success', 'posts' => $blogPosts]);
        }
        catch(Exception $e) {
            return response()->json(['status' => false, 'status_code' => 500, 'message' => $e->getMessage()]);
        }
    }

    public function allBlogs(Request $request)
    {
    	try{
            $blogPosts = BeedaBlog::with(['category'=> function($query){
                    $query->select('id', 'name');
                },'user'=> function($query){
                    $query->select('id', 'name', 'first_name', 'last_name');
                }, 'thumbnail_img'=> function($query){
                    $query->select('id', 'file_original_name', 'file_name');
                }, 'img'=> function($query){
                    $query->select('id', 'file_original_name', 'file_name');
                }, 'metaImg'=> function($query){
                    $query->select('id', 'file_original_name', 'file_name');
                }])
                ->where('status', 1)->orderBy('id', 'desc')->distinct()->get();

            return response()->json(['status' => true, 'status_code' => 200, 'message' => 'success', 'posts' => $blogPosts]);
        }
        catch(Exception $e) {
            return response()->json(['status' => false, 'status_code' => 500, 'message' => $e->getMessage()]);
        }
    }

    public function show(Request $requst, $slug)
    {
    	try{
            $blogPosts = BeedaBlog::with(['category'=> function($query){
                    $query->select('id', 'name');
                },'user'=> function($query){
                    $query->select('id', 'name', 'first_name', 'last_name');
                }, 'thumbnail_img'=> function($query){
                    $query->select('id', 'file_original_name', 'file_name');
                }, 'img'=> function($query){
                    $query->select('id', 'file_original_name', 'file_name');
                }, 'metaImg'=> function($query){
                    $query->select('id', 'file_original_name', 'file_name');
                }])
                ->where(['status' => 1, 'slug' => $slug])->first();

            return response()->json(['status' => true, 'status_code' => 200, 'message' => 'success', 'post' => $blogPosts]);
        }
        catch(Exception $e) {
            return response()->json(['status' => false, 'status_code' => 500, 'message' => $e->getMessage()]);
        }
    }
}
