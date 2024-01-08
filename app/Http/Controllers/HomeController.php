<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public  function index()
    {
      $data['posts'] =  Post::with('category')->latest()->take(5)->get();
      $data['breakings'] =  Post::with(['category' => function ($query) {
          $query->where('name','=', 'breaking')->where('status','active');
      }])->get();

      $data['featured'] =  Post::with(['category' => function ($query) {
            $query->where('name','=', 'featured')->where('status','active');
        }])->get();

      $data['tags'] =  Category::latest()->take(10)->get();
       return view('frontend.index', $data);

    }
}
