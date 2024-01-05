<?php

namespace Modules\Category\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {

        $searchTerm=$request->search;
        if($searchTerm){
            $categories=Category::query()->where('name','LIKE','%'.$searchTerm.'%')->paginate(20);
            return view('category::index',compact('categories'));
        }
        $categories=Category::latest()->paginate(20);

        return view('category::index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('category::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'status'=>'required',
        ]);
        $data=[
            'name'=>$request->name,
            'status'=>$request->status,
        ];
        Category::insert($data);
        session()->flash('Success','Category Added Successfully');
        return redirect()->route('category');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('category::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        if(!$id){
            session()->flash('error','Something is wrong');
            return redirect()->back();
        }
        $category=Category::find($id);

        return view('category::edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        if(!$id){
            session()->flash('error','Something is wrong');
            return redirect()->back();
        }
        $category=Category::find($id);
        if($category){

            $request->validate([
                'name'=>'required',
                'status'=>'required',
            ]);
            $data=[
                'name'=>$request->name,
                'status'=>$request->status,
            ];
            $category->update($data);
            session()->flash('success','Category Updated Successfully');
            return redirect()->route('category');
        }
        session()->flash('error','Something is wrong');
        return redirect()->route('category');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        if (!$id) {
            session()->flash('error', 'Something went Wrong!!');
            return redirect()->route('users.index');
        }

        $category = Category::find($id);
        if ($category) {
            $category->delete();
            session()->flash('success', 'Category deleted successfully');
            return redirect()->route('category');
        }

        session()->flash('error', 'Something went Wrong!!');
        return redirect()->route('category');
    }
}
