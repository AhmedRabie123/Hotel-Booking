<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class AdminFaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::get();
        return view('admin.faq_view', compact('faqs'));
    }

    public function faq_create()
    {
        return view('admin.faq_create');
    }

    public function faq_store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq = new Faq();

        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        return redirect()->route('admin_faq_view')->with('success', 'FAQ Saved Successfully');
    }

    public function faq_edit($id)
    {
        $faq_single = Faq::where('id', $id)->first();
        return view('admin.faq_edit', compact('faq_single'));
    }

    public function faq_update(Request $request, $id)
    {
        $faq = Faq::where('id', $id)->first();


        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);


        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->update();

        return redirect()->route('admin_faq_view')->with('success', 'FAQ Updated Successfully');
    }

    public function faq_delete($id)
    {
        $faq_single = Faq::where('id', $id)->first();
        $faq_single->delete();

        return redirect()->route('admin_faq_view')->with('success', 'FAQ Deleted Successfully');
    }
}
