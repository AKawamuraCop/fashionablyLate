<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
  {
    $categories = Category::all();

    return view('index', compact('categories'));
  }

  public function confirm(ContactRequest $request)
  {
  //   $tell1 =$request->input('tell1');
  //   $tell2 =$request->input('tell2');
  //   $tell3 =$request->input('tell3');
  //   $tell = $tell1. '-'. $tell2. '-'. $tell3;
    $contact = $request->only(['first_name','last_name','tell','tell1','tell2','tell3','gender','email','address','building','category_id','detail']);
    //contact['tell'] = $tell;
    // $categories = Category::all();
    $category = Category::find($contact['category_id'])->content;
    return view('confirm', compact('contact','category'));
  }

  public function store(ContactRequest $request)
  {
    if($request->input('back') == 'back'){
    return redirect('/')
      ->withInput();
    }
    $tell1 =$request->input('tell1');
    $tell2 =$request->input('tell2');
    $tell3 =$request->input('tell3');
    $tell = $tell1. '-'. $tell2. '-'. $tell3;
    $contact = $request->only(['first_name','last_name','gender','email','address','category_id','detail']);
    $contact['tell'] = $tell;
    Contact::create($contact);

    return view('thanks');

  }

  //モーダル
  public function modal()
  {
    return view('modal');
  }

}
