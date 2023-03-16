<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Traits\ApiUrl;
use DataTables;
use App\RequiredDocument;

class DocumentController extends Controller
{
    use ApiUrl;

    public function documentList(Request $request)
    {
        try{
            if ($request->ajax()) {
                $token = getToken();
                if ($token) {
                    $data = RequiredDocument::with('service')->get();
                    return Datatables::of($data)
                        ->editColumn('service', function ($data) {
                            if (!$data->service) return 'N/A';
                            return $data->service->name;
                        })
                        ->editColumn('status', function ($data) {
                            $active = '';
                            $checked = '';
                            if ($data->status) {
                                $active = 'active';
                                $checked = 'checked';
                            }
                            $switch = '<div class="toggle-btn ' . $active . '">
                                            <input type="checkbox" onclick="approve(' . $data->id . ')" class="cb-value approve' . $data->id . '" ' . $checked . '/>
                                            <span class="round-btn"></span>
                                        </div>';
                            return $switch;
                        })
                        ->editColumn('action', function ($data) {
                            $btn = '';
                            $btn .= '<a href="' . route('document.edit', ['id' => $data->id]) . '" style="color:#061880;" title="Edit"><i class="material-icons">edit</i></a>';
                            return $btn;
                        })
                        ->rawColumns(['service', 'status', 'action'])
                        ->make(true);
                } else {
                    return redirect()->route('super.admin.login');
                }
            }
            $page = 'manage_document';
            return view('superadmin.sellers.manage_document.document_list', compact('page'));
        }catch (\Exception $e) {
            $error = $e->getMessage();
            return view('superadmin.error_page', compact('error'));
        }
    }

    public function addDocument()
    {
        $token = getToken();
        if ($token) {
            $service_categories = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->post($this->getApiUrl() . 'service-category-x');

            $service_categories = json_decode($service_categories);
            $service_category_list = [];
            if ($service_categories) {
                $service_category_list = $service_categories->data->Sercice_Categorise;
            }
            $page = 'manage_document';
            return view('superadmin.sellers.manage_document.add_document', compact('service_category_list', 'page'));
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function addDocumentSubmit(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'service_category' => 'required'
        ]);
        $token = getToken();
        if ($token) {
            $document = new RequiredDocument();
            $document->name = $request->name;
            $document->service_category_id = $request->service_category;
            $document->save();
            return redirect()->route('document.list')->with('success_message',$document ? 'Document added successfully' : 'Something went wrong');
        }
        return redirect()->route('super.admin.login');
    }

    public function approveDocument(Request $request)
    {
        $token = getToken();
        if ($token) {
            RequiredDocument::find($request->document_id)->toggleStatus()->update();
            return 1;
        }
        return redirect()->route('super.admin.login');
    }

    public function editDocument($id)
    {
        $token = getToken();
        if ($token) {
            $service_categories = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->post($this->getApiUrl() . 'service-category-x');

            $service_categories = json_decode($service_categories);
            $service_category_list = [];
            if ($service_categories) {
                $service_category_list = $service_categories->data->Sercice_Categorise;
            }
            $document = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->get($this->getApiUrl() . 'superadmin/documentbyid/' . $id);

            $document = json_decode($document);

            $doc = null;
            if ($document) {
                $doc = $document->document;
            }

            $page = 'manage_document';
            return view('superadmin.sellers.manage_document.edit_document', compact('page', 'service_category_list', 'doc'));
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function editDocumentSubmit(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'service_category' => 'required'
        ]);
        $token = getToken();
        if ($token) {
            $document = RequiredDocument::find($request->id);
            $document->name = $request->name;
            $document->service_category_id = $request->service_category;
            $document->update();
            return redirect()->route('document.list')->with('success_message', $document ? 'Document added successfully' : 'Something went wrong');
        }
        return redirect()->route('super.admin.login');
    }
}
