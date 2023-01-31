<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\EmiTerm;
use App\Models\Loan;
use App\Models\LoanRequiredDocument;
use App\Models\LoanType;
use App\Models\User;
use App\Traits\TransactionTrait;
use App\Upload;
use DB;
use Exception;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LoanController extends Controller
{
    use TransactionTrait;
    public function index(Request $request){
        try{
            if($request->ajax()) {
                $data = Loan::with(['user'=>function($q){
                        $q->select('id', 'name', 'first_name', 'last_name');
                    }, 'loan_type'=>function($q){
                        $q->select('id', 'loan_type', 'type');
                    }, 'emi_term'=>function($q){
                        $q->select('id', 'term_month', 'interest_rate_reguler');
                    }])->orderBy('id', 'desc')->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('appliedBy', function ($data) {
                        return $data->user->name ? $data->user->name : $data->user->fist_name. " ". $data->user->last_name;
                    })
                    ->editColumn('name', function ($data) {
                        return $data->first_name. " " . $data->list_name;
                    })
                    ->editColumn('loanType', function ($data) {
                        return $data->loan_type->loan_type;
                    })
                    ->addColumn('emiTerm', function ($data) {
                        return $data->emi_term->term_month;
                    })
                    ->editColumn('totalPay', function ($data) {
                        if($data->loan_type->type == "Regular") return $data->amount + (($data->amount*$data->emi_term->interest_rate_reguler)/100);
                        else return $data->amount + (($data->amount*$data->interest_rate)/100);
                    })
                    ->editColumn('interestRate', function ($data) {
                        if($data->loan_type->type == "Regular") return $data->emi_term->interest_rate_reguler;
                        else return $data->interest_rate;
                        
                    })
                    ->editColumn('action', function ($data) {
                        return '<a href="/loan/show/'. $data->id .'" title="Delete" style="color:#061880;"><i class="material-icons">info</i></a>';
                    })
                    ->rawColumns(['amount', 'interestRate', 'loan_status', 'deposit_in', 'totalPay','emiTerm','loanType','name', 'appliedBy', 'action'])
                    ->make(true);
            }
            $page = 'loan';
            return view('superadmin.loan.index',compact('page'));
        }catch (\Exception $e) {
            return failedResponse($e->getMessage());
        }
    }
    public function loanTypes(Request $request){
        try{
            $data = LoanType::with(['loan_image'=>function($q){
                $q->select('id', 'file_name');
            }, 'max_emi_term'=>function($q){
                $q->select('id', 'term_month', 'interest_rate_reguler');
            }])->orderBy('id', 'desc')->get();
            // return $data[0]->emi_term;
            if($request->ajax()) {
                
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('image', function ($data) {
                        if($data->loan_image) return '<img height="50px" width="50px" src="'. env('AWS_MEDIA_URL').$data->loan_image->file_name. '" >';
                        else                    return "--";
                    })
                    ->editColumn('max_emi_term', function ($data) {
                        if($data->type == "Regular")    return "--";  
                        else                            return $data->max_emi_term->term_month;
                    })
                    ->editColumn('status', function ($data) {
                        if($data->status == 0)    return "Inactive";  
                        else                            return "Active";
                    })
                    ->editColumn('name', function ($data) {
                        return $data->loan_type;  
                    })
                    // ->editColumn('action', function ($data) {
                    //     return '<a href="/loan/show/'. $data->id .'" title="Delete" style="color:#061880;"><i class="material-icons">info</i></a>';
                    // })
                    ->rawColumns(['image', 'max_emi_term', 'status', 'name'])
                    ->make(true);
            }
            $page = 'loan_types';
            return view('superadmin.loan.loan_type',compact('page'));
        }catch (\Exception $e) {
            return failedResponse($e->getMessage());
        }
    }
    public function addLoanTypes(){
        try
        {
            $emi_terms =EmiTerm::all();
            $required_document = LoanRequiredDocument::where('status', 1)->get();
            $page = 'loan_types';
            return view('superadmin.loan.create_loan_type',compact('page', 'emi_terms', 'required_document'));
        }
        catch(Exception $e)
        {
            return failedResponse($e->getMessage());
        }
    }
    public function storeLoanType(Request $request)
    {
        try
        {
            if($request->hasFile('image')){
                $upload = new Upload();
                $extension = strtolower($request->file('image')->getClientOriginalExtension());
    
                if(isset($type[$extension])){
                    $upload->file_original_name = null;
                    $arr = explode('.', $request->file('image')->getClientOriginalName());
                    for($i=0; $i < count($arr)-1; $i++){
                        if($i == 0){
                            $upload->file_original_name .= $arr[$i];
                        }
                        else{
                            $upload->file_original_name .= ".".$arr[$i];
                        }
                    }
                    if (env('AWS_ON')) {
    
                        if(env('APP_ENV')=='production')
                        {
                            //Magic..
                            $tempImgName = rand(10,100) . '.' . $extension;
                            // $tempPath = env('APP_URL')=='https://staging.beedamall.com/' ? '/var/www/html/beedamall/html/src/uploads/all/'  . $tempImgName : '/var/www/html/src/uploads/all/' . $tempImgName;
                            // ImageOptimizer::optimize($request->file('aiz_file'), $tempPath);
                            //Magic..
    
                            //another magic
                            if($extension == "png" || $extension == "jpeg" || $extension == "jpg"){
                                $imagePath = $request->file('image');
                                switch ($extension) {
                                    case "png":
                                        $im = imagecreatefrompng($imagePath);
                                        $newImagePath = str_replace("png", "webp", $imagePath);
                                        $quality = 50;
    
                                        //Create the webp image.
                                        imagewebp($im, $newImagePath, $quality);
                                        break;
                                    case "jpeg":
                                        $im = imagecreatefromjpeg($imagePath);
                                        $newImagePath = str_replace("jpeg", "webp", $imagePath);
                                        $quality = 50;
    
                                        //Create the webp image.
                                        imagewebp($im, $newImagePath, $quality);
                                        break;
                                    case "jpg":
                                        $im = imagecreatefromjpeg($imagePath);
                                        $newImagePath = str_replace("jpg", "webp", $imagePath);
                                        $quality = 50;
    
                                        //Create the webp image.
                                        imagewebp($im, $newImagePath, $quality);
                                        break;
                                    default:
                                        break;
                                }
                            }
    
                            $publicPath = public_path('/uploads/all/') . $tempImgName;
                            $publicPath = str_replace('/public', '', $publicPath);
                            
                            $awsFileName = rand(100000,999999) . '.' . $extension;
    
                            // $file = Storage::disk('s3')->put('public/uploads/all/' . $awsFileName, file_get_contents($publicPath));
                            // $path = env('AWS_MEDIA_URL').'uploads/all/'.$awsFileName;
                            // $path = substr($path, 45, 200);
                            $file = Storage::disk('s3')->put('public/uploads/all', $request->file('image'));
                            $path = Storage::disk('s3')->url($file);
                            $path = substr($path, 45, 200);
                        }
                        else
                        {
                            if($extension == "png" || $extension == "jpeg" || $extension == "jpg"){
                                $imagePath = $request->file('image');
    
                                //Create an image object.
                                // $im = imagecreatefrompng($imagePath);
                                switch ($extension) {
                                    case "png":
                                        $im = imagecreatefrompng($imagePath);
                                        $newImagePath = str_replace("png", "webp", $imagePath);
                                        //Quality. 1-100.
                                        $quality = 50;
    
                                        //Create the webp image.
                                        imagewebp($im, $newImagePath, $quality);
                                        break;
                                    case "jpeg":
                                        $im = imagecreatefromjpeg($imagePath);
                                        $newImagePath = str_replace("jpeg", "webp", $imagePath);
                                        //Quality. 1-100.
                                        $quality = 50;
    
                                        //Create the webp image.
                                        imagewebp($im, $newImagePath, $quality);
                                        break;
                                    case "jpg":
                                        $im = imagecreatefromjpeg($imagePath);
                                        $newImagePath = str_replace("jpg", "webp", $imagePath);
                                        //Quality. 1-100.
                                        $quality = 50;
    
                                        //Create the webp image.
                                        imagewebp($im, $newImagePath, $quality);
                                        break;
                                    default:
                                        break;
                                }
                            }
    
    
                            
                            
                            $file = Storage::disk('s3')->put('public/uploads/all', $request->file('image'));
                            $path = Storage::disk('s3')->url($file);
                            $path = substr($path, 45, 200);
                        }
                        $size = $request->file('image')->getSize();
                    }
                    else
                    {
                        $path = $request->file('image')->store('uploads/all', 'local');
                        $size = $request->file('image')->getSize();
                    }
    
                    if($type[$extension] == 'image' && get_setting('disable_image_optimization') != 1){
                        try {
                            
                            $img = Image::make($request->file('image')->getRealPath())->encode();
                            $height = $img->height();
                            $width = $img->width();
                            if($width > $height && $width > 1500){
                                $img->resize(1500, null, function ($constraint) {
                                    $constraint->aspectRatio();
                                });
                            }elseif ($height > 1500) {
                                $img->resize(null, 800, function ($constraint) {
                                    $constraint->aspectRatio();
                                });
                            }
                            $img->save(base_path('public/').$path);
                            clearstatcache();
                            $size = $img->filesize();
    
                        } catch (\Exception $e) {
                            //dd($e);
                        }
                    }
                    
                    $upload->extension = $extension == "png" || $extension == "jpeg" || $extension == "jpg" ? "webp" : $extension;
                    $upload->file_name = $path;
                    $upload->user_id = session()->get('user_info')->user_id;
                    $upload->type = $type[$upload->extension];
                    $upload->file_size = $size;
                    $upload->save();
                }
            }   
            $loan = Loan::create([
                'loan_type' => $request->loan_type,
                'basis' => $request->basis,
                'image' => $upload->id,
                'image_background' => $request->image_bg_color,
                'man_amount_background' => $request->max_amount_bg_color,
                'max_amount' => $request->max_amount,
                'max_emi_term_id' => $request->max_emi_term_id,
                'interest_rate' => $request->interest_rate,
                'processing_fee' => $request->processing_fee,
                'type' => $request->type,
                'status' => 1,
                'late_penalty_percentage' => $request->late_penalty_percentage,
                'advance_pay_decrease_percentage' => $request->advance_pay_decrease_percentage,
                'min_emi_percentage' => $request->min_emi_percentage

            ]);
        }
        catch(Exception $e)
        {
            $page = 'loan_types';
            return view('superadmin.loan.loan_type',compact('page'));
            return failedResponse($e->getMessage());
        }
    }
    public function show($id){
        $loan = Loan::with(['user'=>function($q){
                $q->select('id', 'name', 'first_name', 'last_name');
            }, 'loan_type'=>function($q){
                $q->select('id', 'loan_type', 'type');
            }, 'emi_term'=>function($q){
                $q->select('id', 'term_month', 'interest_rate_reguler');
            },
            'loan_document'=>function($q){
                $q->with(['image'=>function($q){
                        $q->select('id', 'file_name');
                    },
                    'document_name'=>function($q){
                        $q->select('id', 'name');
                    }    
                ]);
            }])
            ->where('id', $id)
            ->first();
        $page = 'loan';
        return view('superadmin.loan.show',compact('page', 'loan'));
    }
    public function changeStatus(Request $request){
        try{
            DB::beginTransaction();
            // $user_id = User::find($request->user_id);
            $loan = Loan::find($request->id);
            $loan->loan_status = $request->loan_status;
            $loan->save();
            if($request->loan_status == "Accepted") $transfer = $this->loanTransaction($request->user_id, $loan->id, $request->loan_status, $loan->deposit_in,$loan->amount );
            // if(!$transfer->status) return failedResponse($transfer->message);
            DB::commit();
            return response()->json([
                "status" => true,
                "message" => "Successfully changed loan status."
            ]);
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error_message', 'Something went wrong');
        }
    }
}
