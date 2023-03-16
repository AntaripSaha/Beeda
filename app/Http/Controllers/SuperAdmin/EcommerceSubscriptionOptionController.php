<?php

namespace App\Http\Controllers\SuperAdmin;

use App\EcommerceSubscriptionOption;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EcommerceSubscriptionOptionController extends Controller
{
    public function index(Request $request)
    {
        $allOptions = EcommerceSubscriptionOption::all();
        $page = 'option';
        return view('superadmin.ecommerce.options.index', compact('page', 'allOptions'));
    }

    public function create(Request $request)
    {
        $page = 'option';
        return view('superadmin.ecommerce.options.add', compact('page'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
        ]);

        $option = new EcommerceSubscriptionOption;
        $option->title = $request->title;
        $option->status = $request->status;
        $option->save();
        return redirect()->route('option.index')->with('success_message','Option has been created successfully');
    }

    public function editOption($id)
    {
        $option = EcommerceSubscriptionOption::find($id);
        $page = 'option';
        return view('superadmin.ecommerce.options.edit', compact('option', 'page'));
    }

    public function updateOption(Request $request)
    {        
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'id' => 'required',
        ]);

        $blog = EcommerceSubscriptionOption::find($request->id);
        $blog->status = $request->status;
        $blog->title = $request->title;

        $blog->save();

        return redirect()->route('option.index')->with('success_message','Option has been updated successfully');

    }


    public function deleteOption($id)
    {
        $blog = EcommerceSubscriptionOption::find($id);
        $blog->delete();
        return redirect()->route('option.index')->with('success_message','Option has been deleted successfully');
    }

}
