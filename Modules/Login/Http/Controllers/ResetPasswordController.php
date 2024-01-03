<?php

namespace Modules\Login\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('login::passwordResetForm');
    }


    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);

        $token = Str::random(50);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
     Mail::to($request->email)->send(new ForgotPasswordMail($token));
     $request->session()->flash('success','Please check you inbox');
     return redirect()->back();

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function showResetForm($token)
    {
        if(!$token){
            session()->flash('error','Something went wrong');
            return  redirect()->route('login');
        }

        return view('login::finalResetForm', compact('token'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function handleReset(Request $request, $token)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

      $user = DB::table('password_resets')->where([
            'email' =>$request->email,
            'token' => $token
        ]) ->first();

      if($user){
          User::where('email', $request->email)->update(['password' => bcrypt($request->password)]);

//          Mail::to($request->email)->send();
          session()->flash('success','Password Updated');
          return redirect()->route('login');
      }else{
          session()->flash('error','Something went wrong');
          return redirect()->route('login');
      }
      dd('done');
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
