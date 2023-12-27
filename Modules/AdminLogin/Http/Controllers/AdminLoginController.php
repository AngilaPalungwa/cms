<?php

namespace Modules\AdminLogin\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        return view('adminlogin::login');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function submit(Request  $request)
    {
        $request->validate([
            'email' =>'email|required',
            'password' => 'required|min:6'
        ]);

        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();

        if($user){
            if($user->password){
                if(Hash::check($password, $user->password)){
                    Auth::guard('admin')->login($user);
                    return  redirect()->route('admin.dashboard');
                }
                $request->session()->flash('error',"Password doesn't match/not set");
                return  redirect()->back();
            }else{
                $request->session()->flash('error',"Password doesn't match/not set");
                return  redirect()->back();
            }

        }

        $request->session()->flash('error','User Not found');
        return  redirect()->back();

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function logout(Request $request)
    {
       if(\auth()->guard('admin')->check()){
           Auth::guard('admin')->logout();
           $request->session()->flash('success','Logged Out !');
           return  redirect()->route('admin.login');
       }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('adminlogin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('adminlogin::edit');
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
