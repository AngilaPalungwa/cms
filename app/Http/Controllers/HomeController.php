<?php

namespace App\Http\Controllers;

use App\Mail\SubscribeMail;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public  function index()
    {
      $data['posts'] =  Post::with(['category','comments','comments.replies','author' => function ($query) {
          $query->select('id', 'name')->with('profile:profile');
      }])->latest()->take(5)->get();

      $data['trendings'] =  Post::orderByDesc('views')->take(5)->get();
      $data['breakings'] =  Post::whereHas('category' , function ($query) {
          $query->where('name','=', 'breaking')->where('status','active');
      })->get();

      $data['featured'] =  Post::whereHas('category' , function ($query) {
            $query->where('name','=', 'featured')->where('status','active');
        })->get();

      $data['tags'] =  Category::latest()->take(10)->get();
       return view('frontend.index', $data);

    }

    public  function searchPost(Request $request)
    {
        if($request->search){
           $query =  Post::query();
           $query->where('title','LIKE','%'.$request->search.'%')
                ->orWhere('slug','LIKE','%'.$request->search.'%')
                ->orWhere('description','LIKE','%'.$request->search.'%')
               ->orWhereHas('category',function ($q) use ($request){
                   $q->where('name','LIKE','%'.$request->search.'%');
               });
           $posts = $query->get();
            return  view('postSearchResult',compact('posts'));

        }
        return redirect()->back();

    }

    public  function searchByCategory($categoryName){
        if(!$categoryName){
            return redirect()->back();
        }

        $posts = Post::whereHas('category',function ($query) use ($categoryName){
           $query->where('name','LIKE','%'.$categoryName.'%');
        })->get();
        return  view('postSearchResult',compact('posts'));
    }

    public function newsLetter(Request $request)
    {
        $request->validate([
            'email' =>'required|email'
        ]);

        Mail::to($request->email)->send(new SubscribeMail());
        $request->session()->flash('success','Subscribed');
        return redirect()->route('home');

    }
}
