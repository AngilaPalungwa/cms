<?php

namespace Modules\Login\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('login::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function register()
    {
        return view('login::register');
    }



    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function submit(Request $request)
    {
       $request->validate([
           'name'=>'required',
           'email' =>'required|email|unique:App\Models\User,email',
           'username'=>'required|unique:App\Models\User,username',
           'password' =>'required|min:6',
       ]);
        DB::beginTransaction();
       $data = [
           'name' => strip_tags($request->name),
           'email' => $request->email,
           'username' => strip_tags($request->username),
           'password' => bcrypt($request->password),
           'status' =>'active'
       ];

       $user_id =  User::insertGetId($data);
      if($user_id){
          $details_data = [
              'address' => $request->address,
              'designation' => $request->designation,
              'user_id' => $user_id
          ];
        $status = UserDetails::insert($details_data);

        if($status){
            DB::commit();
            Mail::to($request->email)->send(new RegisterMail($request->username));
        }

        return  redirect()->route('login');

      }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('login::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('login::edit');
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
