<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Constants\LoanStatus;
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
use Validator;

class LoanController extends Controller
{
    use TransactionTrait;
    public function index(Request $request){
        try{
            $data = Loan::with(['user'=>function($q){
                $q->select('id', 'name', 'first_name', 'last_name');
            }, 'loan_type'=>function($q){
                $q->select('id', 'loan_type', 'type');
            }, 'emi_term'=>function($q){
                $q->select('id', 'term_month', 'interest_rate_reguler');
            }])->orderBy('id', 'desc')->get();
            if($request->ajax()) {

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
                        return '<a href="/loan/show/'. $data->id .'" title="See" style="color:#061880;"><i class="material-icons">info</i></a>';
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
                    ->editColumn('action', function ($data) {
                        return '<a href="edit/'. $data->id .'" title="Edit" style="color:#061880;"><i class="material-icons">info</i></a>';
                    })
                    ->rawColumns(['image', 'max_emi_term', 'status', 'name', 'action'])
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
            $page = 'loan_types';
            return view('superadmin.loan.create_loan_type',compact('page', 'emi_terms'));
        }
        catch(Exception $e)
        {
            return failedResponse($e->getMessage());
        }
    }
    public function storeLoanType(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'loan_type' => 'required',
            'basis' => 'required',
            'image' => 'required',
            'image_bg_color' => 'required',
            'max_amount_bg_color' => 'required',
            'max_amount' => 'required',
            'max_emi_term_id' => 'required',
            'interest_rate' => 'required',
            'processing_fee' => 'required',
            'type' => 'required',
            'late_penalty_percentage' => 'required',
            'advance_pay_decrease_percentage' => 'required',
            'min_emi_percentage' => 'required'
        ]);
        if ($validate->fails()) return $validate->errors()->first();
        if(count($request->doc_name) != count($request->demo_image)) return failedResponse("Document names count does not matches the Document files count!");
        try{
            DB::beginTransaction();
            $image_id = uploadImage($request->image);

            $loan = LoanType::create([
                'loan_type' => $request->loan_type,
                'basis' => $request->basis,
                'image' => $image_id,
                'image_background' => $request->image_bg_color,
                'max_amount_background' => $request->max_amount_bg_color,
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
            foreach($request->demo_image as $key=>$doc_image)
            {
                $loan_required_doc = LoanRequiredDocument::create([
                    'name' =>$request->doc_name[$key],
                    'demo_image' => uploadImage($doc_image),
                    'loan_type_id' =>$loan->id,
                    'status' => 1
                ]);
            }
            $page = 'loan';
            DB::commit();
            return redirect()->route('loan.types', compact('page'))->with('success_message','Loan Type has been created successfully');
        }
        catch(Exception $e)
        {
            DB::rollback();
            $page = 'loan_types';
            // return view('superadmin.loan.loan_type',compact('page'));
            // return redirect()->back()->with('error_message', $e->getMessage());
            return $e->getMessage();
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
    public function edit($id)
    {
        try
        {
            $loan_type = LoanType::with(['loan_image', 'max_emi_term', 'documents'=>function($q){
                $q->with('image');
            }])->where('id', $id)->first();
            $emi_terms =EmiTerm::all();
            $page = 'loan_types';
            return view('superadmin.loan.edit',compact('page', 'emi_terms', 'loan_type'));
        }
        catch(Exception $e)
        {
            return failedResponse($e->getMessage());
        }
    }
    public function updateLoanType(Request $request)
    {
//        dd($request->new_demo_image);
//        dd($request->update_demo_image);
//        dd($request->existing_image_id);
        $validate = Validator::make($request->all(), [
            'loan_type_id' => 'required',
            'loan_type' => 'required',
            'basis' => 'required',
            'image_bg_color' => 'required',
            'max_amount_bg_color' => 'required',
            'max_amount' => 'required',
            'max_emi_term_id' => 'required',
            'processing_fee' => 'required',
            'type' => 'required',
            'late_penalty_percentage' => 'required',
            'advance_pay_decrease_percentage' => 'required',
            'min_emi_percentage' => 'required'
        ]);
        $page = 'loan_types';
        if ($validate->fails()) return redirect()->route('loan.types', compact('page'))->with('success_message',$validate->errors()->first());
        try{
            DB::beginTransaction();

            $ids = array();
            if(isset($request->existing_image_id)){
                foreach($request->existing_image_id as $key=>$id)
                {
                    $ids[] = (int)$id;
                    LoanRequiredDocument::where('id', (int)$id)->update(['name' => $request->doc_name[$key]]);
                }
            }
            $loan_type = LoanType::with('documents')->find($request->loan_type_id);
            $doc_ids =$loan_type->documents->pluck('id')->toArray();
            $del_ids=array_diff($doc_ids,$ids);
            if (isset($del_ids))  LoanRequiredDocument::whereIn('id', $del_ids)->delete();
            if(isset($request->update_demo_image))
            {
                foreach($request->update_demo_image as $key=>$img)
                    {
                        $img_id = LoanRequiredDocument::where('id', (int)$request->update_demo_image_id[$key])->first();
                        updateImage($img_id->demo_image, $img);
                    }
            }
            if($request->hasFile('image'))
            {
                updateImage($loan_type->image, $request->image);
            }
            $loan_type->update([
                'loan_type'                         => $request->loan_type,
                'basis'                             => $request->basis,
                'image_background'                  => $request->image_bg_color,
                'max_amount_background'             => $request->max_amount_bg_color,
                'max_amount'                        => $request->max_amount,
                'max_emi_term_id'                   => $request->max_emi_term_id,
                'interest_rate'                     => $request->type == "Reglar" ? null : $request->interest_rate,
                'processing_fee'                    => $request->processing_fee,
                'type'                              => $request->type,
                'status'                            => $request->status,
                'late_penalty_percentage'           => $request->late_penalty_percentage,
                'advance_pay_decrease_percentage'   => $request->advance_pay_decrease_percentage,
                'min_emi_percentage'                => $request->min_emi_percentage,
            ]);
//            dd($request->demo_image);
            if(isset($request->new_demo_image)){
                foreach($request->new_demo_image as $key=>$name)
                {
                    LoanRequiredDocument::create([
                        'name' =>$request->doc_name[$key],
                        'demo_image' => uploadImage($name),
                        'loan_type_id' =>$request->loan_type_id,
                        'status' => 1
                    ]);
                }
            }
            DB::commit();
            $page = 'loan_types';
            return redirect()->route('loan.types', compact('page'))->with('success_message','Loan Type has been updated successfully');
        }
        catch(Exception $e)
        {
            DB::rollback();
            $page = 'loan_types';
            return redirect()->route('loan.types', compact('page'))->with('success_message',$e->getMessage());
        }
    }
    public function changeStatus(Request $request){
        try{
            DB::beginTransaction();
//            $user_id = User::find($request->user_id);
            $loan = Loan::find($request->id);
            $loan->loan_status = $request->loan_status;
            $loan->save();
            if($request->loan_status == LoanStatus::APPROVED)
                $transfer = $this->loanTransaction($request->user_id, $loan->id, $request->loan_status, $loan->deposit_in,$loan->amount );
//            dd($transfer);
            DB::commit();
            if($transfer->status)
                return response()->json([
                    "status" => true,
                    "message" => "Successfully changed loan statussss."
                ]);
            else
                return response()->json([
                    "status" => false,
                    "message" => $transfer->message
                ]);
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error_message', 'Something went wrong');
        }
    }
}
