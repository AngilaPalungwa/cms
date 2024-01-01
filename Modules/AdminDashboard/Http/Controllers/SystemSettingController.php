<?php

namespace Modules\AdminDashboard\Http\Controllers;

use App\Services\SettingService;
use App\Utils\SettingUtils;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SystemSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index( SettingService  $settingService)
    {
        return view('admindashboard::system_setting',compact('settingService'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admindashboard::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

        $request->validate([
            'email' =>'required|email',
            'name' =>'required',
        ]);
        $logoName = '';

        if($request->has('logo') && $request->file('logo')){
            //check if exists
                if(SettingUtils::get('system_logo')){
                    if( file_exists(public_path().'/uploads/'.SettingUtils::get('system_logo'))){
                        unlink(public_path().'/uploads/'.SettingUtils::get('system_logo'));
                    }
                }

            $file = $request->file('logo');
            $newName = $logoName = time().'-'.rand(10,999999999).'-'. $file->getClientOriginalName();
            $path = public_path('/uploads/');
            $file->move($path, $newName);
        }

        SettingUtils::set('system_name',$request->name);
        SettingUtils::set('system_email',$request->email);
        SettingUtils::set('system_phone',$request->phone);
        SettingUtils::set('system_footer',$request->footer);
        SettingUtils::set('system_logo',$logoName);
        SettingUtils::set('system_facebook',$request->facebook);
        SettingUtils::set('system_insta',$request->insta);

        return  redirect()->back();

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admindashboard::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admindashboard::edit');
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
