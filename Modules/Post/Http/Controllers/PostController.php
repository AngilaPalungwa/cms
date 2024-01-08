<?php

namespace Modules\Post\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request  $request)
    {
        $search = $request->search;
        if($search){
            $query = Post::with('category','author')->query();

            $query->where('title','LIKE', '%'.$search.'%')
                ->orWhere('slug','LIKE', '%'.$search.'%')
                ->orWhere('created_at','LIKE', '%'.$search.'%');

            $posts = $query->paginate(10);
            return view('post::index', compact('posts'));
        }
        $posts =   Post::with('category','author')->paginate(10);
        return view('post::index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */

    function details($slug)
    {

        if(!$slug){
            return  redirect()->back();
        }

        $data['post'] =  Post::where('slug', $slug)->first();
        $data['trendings'] = Post::with(['category' => function ($query) {
            $query->where('name','trending');
        }])->take(2)->get();
        if($data['post']){
            return view('frontend.postDetails', $data);
        }

        session()->flash('error','Something Went Wrong!');
        return  redirect()->route('home');

    }


    public function create()
    {
        $data['categories'] = Category::all();
        return view('post::create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
       $request->validate([
           'category_id' => 'required',
           'title' => 'required',
           'description' =>'required',
           'status' =>'required',
//           'featured_image' =>'required_if:featured_image,true|mime:jpeg'
       ]);

        $data = [
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' =>Str::slug($request->title),
            'description' => $request->description,
            'status' =>$request->status,
            'created_by' => auth()->guard('admin')->user()->id,
        ];

        $imagePath = '';
       if($request->has('featured_image') && $request->file('featured_image')){
           $file = $request->file('featured_image');
           $newName =  time().'-'.rand(10,99999).$file->getClientOriginalExtension();
           $path =  public_path('/uploads');
           $file->move($path,$newName);
           $data['featured_image'] =  $newName;
       }

       Post::insert($data);

       $request->session()->flash('success','Post Added Successfully');
       return  redirect()->route('posts');




    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('post::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('post::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
