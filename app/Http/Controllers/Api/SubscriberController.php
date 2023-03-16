<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    public function index()
    {
        try{
            $subscriber = Subscriber::all();
            return successResponse("success", $subscriber);
        }
        catch (\Exception $e){
            return failedResponse($e->getMessage());
        }
    }
    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                    "email" => "required",
                ]
            );

            if ($validator->fails()) {
                return response()->json(['status' => false, 'status_code' => 500, 'message' => $validator->errors()->first()]);
            }
            $subscriber = Subscriber::where('email', $request->email)->first();

            if ($subscriber == null) {
                $subscriber = new Subscriber;
                $subscriber->email = $request->email;
                $subscriber->save();
                //            $this->sendMail($request->email, $subscriber);
                return successResponse('You have subscribed successfully');
            } else {
                return failedResponse('You are  already a subscriber');
            }
        }
        catch(\Exception $e)
        {
            return failedResponse($e->getMessage());
        }
    }
}
