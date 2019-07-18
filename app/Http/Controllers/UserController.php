<?php
/**
 * Created by PhpStorm.
 * User: WON
 * Date: 4/16/2019
 * Time: 9:39 PM
 */
namespace App\Http\Controllers;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use DateTime;

class UserController extends Controller{

    public function getUserID(){
        $useremail = Session::get('useremail');
        $username = Session::get('username');
        $row = DB::table('user')->where('username',$username)->where('email',$useremail)->get();
        return $row[0]->id;
    }

    public function landing_page(){

        return view('landing');

    }
    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $pass=md5($password);
        try{
            $users=DB::table('user')->where('email',$email)->where('password',$pass)->get();
            if(count($users)){
                Session::put('useremail', $users[0]->email);
                Session::put('username', $users[0]->username);
                Session::save();
                $this->makeUploadDir();
                return Redirect::route('dashboard');
            }else{
                return view('management/login',['error'=>'Email or Password is incorrect!']);
            }
        }catch (\Exception $exception){
            return view('management/login',['error'=>'Something went wrong!']);
        }
    }

    public function loginPage(){
        return view('management/login');
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:user|max:255',
            'email' => 'required|unique:user|max:255',
            'password'=>'required|max:255',
        ]);
        if($validator->fails()){
            return view('management/register',['error'=>'Something went wrong!']);
        }
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        $confirm = $request->input('confirm');
        if ($password != $confirm){
            return view('management/register',['error'=>'Password does not match with confirm password!']);
        }
        $pass = md5($password);
        $data['username'] = $username;
        $data['email'] = $email;
        $data['password'] = $pass;
        $data['join_date'] = date('Y-m-d H:i:s');
        try{
            DB::table('user')->insert($data);
            return Redirect::route('login');
        }catch (\Exception $exception){
            return view('management/register',['error'=>'Something went wrong!']);
        }

    }

    public function registerPage(){
        return view('management/register');
    }

    public function dashboard(){
        if(!Session::get('useremail')) return Redirect('/');
        $id = $this->getUserID();
        $property_num = DB::table('property')->where('user_id',$id)->count('id');
        $cart_num = DB::table('user_cart')->where('user_id',$id)->count('id');
        $user_num = DB::table('user')->count('id');
        return view('management/dashboard',['property_num'=>$property_num,'cart_num'=>$cart_num,'user_num'=>$user_num]);
    }

    public function makeUploadDir(){
        $upload_path = public_path('/storage').'/uploads';
        $b_property_path = public_path('/storage').'/uploads/b-property';
        $documents = public_path('/storage').'/uploads/documents';
        $property = public_path('/storage').'/uploads/property';
        $purchase = public_path('/storage').'/uploads/purchase';
        $units = public_path('/storage').'/uploads/units';

        $title_path = public_path('/storage').'/uploads/documents/title';
        $tax_path = public_path('/storage').'/uploads/documents/tax';
        $survey_path = public_path('/storage').'/uploads/documents/survey';
        $deed_path = public_path('/storage').'/uploads/documents/deed';
        $ass_path =  public_path('/storage').'/uploads/documents/ass';
        $other_path = public_path('/storage').'/uploads/documents/other';

        if(!file_exists($upload_path)){
            mkdir($upload_path, 0770);
        }
        if(!file_exists($b_property_path)){
            mkdir($b_property_path, 0770);
        }
        if(!file_exists($documents)){
            mkdir($documents, 0770);
        }
        if(!file_exists($property)){
            mkdir($property, 0770);
        }
        if(!file_exists($purchase)){
            mkdir($purchase, 0770);
        }
        if(!file_exists($units)){
            mkdir($units, 0770);
        }
        if(!file_exists($title_path)){
            mkdir($title_path, 0770);
        }
        if(!file_exists($tax_path)){
            mkdir($tax_path, 0770);
        }
        if(!file_exists($survey_path)){
            mkdir($survey_path, 0770);
        }
        if(!file_exists($deed_path)){
            mkdir($deed_path, 0770);
        }
        if(!file_exists($ass_path)){
            mkdir($ass_path, 0770);
        }
        if(!file_exists($other_path)){
            mkdir($other_path, 0770);
        }

    }

}