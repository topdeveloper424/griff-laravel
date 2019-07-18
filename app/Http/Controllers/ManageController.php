<?php

namespace App\Http\Controllers;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class ManageController extends Controller
{

    public function aboutusPage(){
        return view('management/about_us');
    }
    public function contactusPage(){
        return view('management/contact_us');
    }

    public function settingsPage(){
        if(!Session::get('useremail')) return Redirect('/');
        $useremail = Session::get('useremail');
        $username = Session::get('username');

        return view('management/settings',['useremail'=>$useremail,'username'=>$username]);
    }

    public function changePersonal(Request $request){
        if(!Session::get('useremail')) return Redirect('/');
        $useremail = Session::get('useremail');
        $username = Session::get('username');
        $newName = $request->input('username');
        $newEmail = $request->input('email');
        $data['username'] = $newName;
        $data['email'] = $newEmail;
        try{
            DB::table('user')->where('username',$username)->where('email',$useremail)->update($data);
            Session::flush();
            Session::put('useremail', $newEmail);
            Session::put('username', $newName);
            Session::save();
        }catch (\Exception $exception){
            echo "error";
        }
        echo "success";
    }

    public function changePassword(Request $request){
        if(!Session::get('useremail')) return Redirect('/');
        $useremail = Session::get('useremail');
        $username = Session::get('username');
        $curPass = $request->input('currentPass');
        $newPass = $request->input('newPassword');
        $mdCurPass = md5($curPass);
        try{
            $row = DB::table('user')->where('username',$username)->where('email',$useremail)->get();
            if($mdCurPass != $row[0]->password){
                echo "failed";
                exit;
            }
            $mdNewPass = md5($newPass);
            $data['password'] = $mdNewPass;
            DB::table('user')->where('username',$username)->where('email',$useremail)->update($data);
        }catch (\Exception $exception){
            echo "error";
            exit;
        }

        echo "success";
    }


}
