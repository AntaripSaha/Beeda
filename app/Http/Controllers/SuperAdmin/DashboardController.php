<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use App\Http\Traits\ApiUrl;
use App\BusinessSetting;
use App\Models\Video;
use App\Upload;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Constants\BusinessSettingTypes;
use App\Ride;
use App\Seller;
use App\ServiceCategory;
use App\User;

class DashboardController extends Controller
{
    use ApiUrl;

    public function dashboard()
    {
        $page = 'dashboard';
        $total_sellers = User::where('user_type', 'seller')->get()->count();
        $total_provider = 0;
        $total_rides = 0;
        $total_services = ServiceCategory::get()->count();
        return view('superadmin.dashboard.dashboard', compact('page', 'total_sellers', 'total_provider', 'total_rides', 'total_services'));
    }

    public function list()
    {
        $slideVideos = Video::all();
        $default_video = BusinessSetting::where('type',BusinessSettingTypes::DEFAULT_VIDEO)->first();
        $video = Upload::find($default_video->value);
        
        $page = "movie";
        return view('movie.index', compact('video', 'slideVideos', 'page'));
    }
    public function descriptionUpdate()
    {
        $token = getToken();
        if ($token) {
            $data = [
                'id' => 1
            ];
            $feature = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ]); 
            $feature = $feature->get($this->getApiUrl() . 'description-update');
            $feature = json_decode($feature);
            if($feature){
                return redirect()->back()->with('success_message', "Updated successfully.");
            }
            else{
                return redirect()->back()->with('success_message', "Failed to update!");
            }
            return redirect()->back()->with('success_message', 'Updated');
        }
        else{
            return redirect()->back()->with('success_message', 'Authorization Problem!');
        }
    }
    public function update(Request $request){
        $token = getToken();
        if ($token) {
            $data = [
                'id' => 1
            ];
            $feature = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ]); 
            if($request->file('file')){
                $feature = $feature->attach('file', file_get_contents($request->file('file')), $request->file('file')->getClientOriginalName());
            }
            $feature = $feature->post($this->getApiUrl() . 'movie/upload_default_video', $data);
            $feature = json_decode($feature);
            if($feature){
                return redirect()->route('movie.index')->with('success_message', "Video uploaded successfully.");
            }
            else{
                return redirect()->route('movie.index')->with('success_message', "Video failed to uploade!");
            }
        }
        else{
            return redirect()->back()->with('success_message', 'Authorization Problem!');
        }
    }
    public function editVideo($id){
        $video = Video::find($id);
        $page = "movie";
        return view('movie.edit', compact('video', 'page'));
    }

    public function updateVideo(Request $req, $id){
        $video = Video::find($id);
        $video->product_name = $req->product_name;
        $video->description = $req->description;
        $video->price = $req->price;

        if($req->file('video')){
            $upload = Upload::find($video->video);
            $file = $req->file('video');
            $name = $req->file('video')->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            $size = $req->file('video')->getSize();
            if(Storage::disk('s3')->exists('public/'.$upload->file_name))
            {
                Storage::disk('s3')->delete('public/'.$upload->file_name);
            }
            if(!env('AWS_ON'))
            {
                $file_name = rand().'.'.$ext;
                $file->move('public/uploads/all/', $file_name);
                $upload->file_name = 'uploads/all/'.$file_name;
            }
            else
            {
                $file = Storage::disk('s3')->put('public/uploads/all', $req->file('video'));
                $path = Storage::disk('s3')->url($file);
                $upload->file_name = substr($path, 45, 200);
            }
            $upload->file_original_name = $name;
            $upload->extension = $ext;
            $upload->type = "video";
            $upload->file_size = $size;
            $upload->save();

        }
        if($req->file('image')){
            $upload = Upload::find($video->image);
            $file = $req->file('image');
            $name = $req->file('image')->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            $size = $req->file('image')->getSize();
            if(Storage::disk('s3')->exists('public/'.$upload->file_name))
            {
                Storage::disk('s3')->delete('public/'.$upload->file_name);
            }
            if(!env('AWS_ON'))
            {
                $file_name = rand().'.'.$ext;
                $file->move('public/uploads/all/', $file_name);
                $upload->file_name = 'uploads/all/'.$file_name;
            }
            else
            {
                $file = Storage::disk('s3')->put('public/uploads/all', $req->file('image'));
                $path = Storage::disk('s3')->url($file);
                $upload->file_name = substr($path, 45, 200);
            }
            $upload->file_original_name = $name;
            $upload->extension = $ext;
            $upload->type = "image";
            $upload->file_size = $size;
            $upload->save();

        }
        $video->save();
        return redirect()->route('movie.index')->with('success_message', "Video uploaded successfully!");
    }
    public function createVideo(){
        $page = "movie";
        return view('movie.create', compact('page'));
    }
    public function storeVideo(Request $req){
        $video = new Video;
        $video->product_name = $req->product_name;
        $video->description = $req->description;
        $video->price = $req->price;

        if($req->file('video')){
            $upload = new Upload;
            $file = $req->file('video');
            $name = $req->file('video')->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            $size = $req->file('video')->getSize();
            if(!env('AWS_ON'))
            {
                $file_name = rand().'.'.$ext;
                $file->move('public/uploads/all/', $file_name);
                $upload->file_name = 'uploads/all/'.$file_name;
            }
            else
            {
                $file = Storage::disk('s3')->put('public/uploads/all', $req->file('video'));
                $path = Storage::disk('s3')->url($file);
                $upload->file_name = substr($path, 45, 200);
            }
            $upload->file_original_name = $name;
            $upload->extension = $ext;
            $upload->type = "image";
            $upload->file_size = $size;
            $upload->save();
            $video->video = $upload->id; 

        }
        if($req->file('image')){
            $upload = new Upload;
            $file = $req->file('image');
            $name = $req->file('image')->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            $size = $req->file('image')->getSize();
            if(!env('AWS_ON'))
            {
                $file_name = rand().'.'.$ext;
                $file->move('public/uploads/all/', $file_name);
                $upload->file_name = 'uploads/all/'.$file_name;
            }
            else
            {
                $file = Storage::disk('s3')->put('public/uploads/all', $req->file('image'));
                $path = Storage::disk('s3')->url($file);
                $upload->file_name = substr($path, 45, 200);
            }
            $upload->file_original_name = $name;
            $upload->extension = $ext;
            $upload->type = "image";
            $upload->file_size = $size;
            $upload->save();
            $video->image = $upload->id; 
        }
        $video->save();
        return redirect()->route('movie.index')->with('success_message', "Video uploade successfully!");
    }
    public function deleteVideo($id){
        $video = Video::find($id);
        $video->delete();
        return redirect()->route('movie.index')->with('success_message', "Video deleted successfully!");
    }
}
