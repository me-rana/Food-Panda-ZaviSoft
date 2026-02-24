<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Newsletter;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function index(){
        $perpage = 9;
        $products = Product::latest()->paginate($perpage);
        return view('frontend.home', compact('products'));
    }
    public function myquery(Request $request){
        $perpage = 9;
        $products = Product::where('name','LIKE','%'.$request->myquery.'%')->latest()->paginate($perpage);
        return view('frontend.home',compact('products'))->with('i',(request()->input('page',1)-1)*$perpage);
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function contact_submitted(Request $request) : RedirectResponse{
        $request->validate(
                [
                    'name'  =>  'required',
                    'email' => 'required|email',
                    'subject' => 'required',
                    'message' => 'required'
                ]);
        $datas = ['name', 'email', 'subject', 'message'];
        $contact = new Contact();
        foreach ($datas as $data){
            $contact->$data = $request->$data;
        }
        $contact->save();
        return redirect()->back()->with('message','Your form submitted Successfully');
    }
    public function product_details($id){
        $product = Product::where('id',$id)->first();
        $products = Product::latest()->limit(4)->get();
        return view('frontend.view', compact('product','products'));
    }
    public function newsletter(Request $request)  : RedirectResponse{
        $request->validate(
            [
                'name'  =>  'required',
                'email' => 'required|email'
            ]);
        $newsletter = new Newsletter();
        $newsletter->name = $request->name;
        $newsletter->email = $request->email;
        $newsletter->save();
        return redirect()->back()->with('newsletter', 'Thanks for submitting email for Newsletter.');
    }
}
