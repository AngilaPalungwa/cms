<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public  function index()
    {
        $data['categories'] = Category::where('status','active')->take(5)->get();
        $data['breakings'] = Category::with('posts')->where('name','breaking')->get();
        dd($data);
       return view('frontend.index', $data);

    }
}
