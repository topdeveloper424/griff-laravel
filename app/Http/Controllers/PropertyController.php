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

class PropertyController extends Controller{

    public function getUserID(){
        $useremail = Session::get('useremail');
        $username = Session::get('username');
        $row = DB::table('user')->where('username',$username)->where('email',$useremail)->get();

        return $row[0]->id;
    }

    public function propertyPage(){
        if(!Session::get('useremail')) return Redirect('/');
        $id = $this->getUserID();
        $properties = DB::table('b_property')->where('user_id',$id)->paginate(5);

        $dirName = public_path('/storage').'/uploads/b-property/';
        $nameArray = scandir($dirName,1);

        foreach ($properties as $property) {
            $photo = '';
            foreach ($nameArray as $name){
                $pos = strpos($name,'.');
                $file_name = substr($name,0,$pos);
                if($file_name == $property->id){
                    $photo = $name;
                }
            }
            $property->files = $photo;

        }

//        echo json_encode($properties);
//        exit;
        return view('property/b_property_page',['properties'=>$properties]);
    }
    public function addPropertyPage(){
        if(!Session::get('useremail')) return Redirect('/');
        return view('property/add_b_property');
    }

    public function createProperty(Request $request){
        if(!Session::get('useremail')) return Redirect('/');
        $user_id = $this->getUserID();
        $property_name = '';
        if($request->has('property_name')){
            $property_name = $request->input('property_name');
        }

        $year_built = '';
        if($request->has('year_built')){
            $year_built = $request->input('year_built');
        }
        $mls = '';
        if($request->has('mls')){
            $mls = $request->input('mls');
        }

        $address = '';
        if($request->has('address')){
            $address = $request->input('address');
        }
        $city = '';
        if($request->has('city')){
            $city = $request->input('city');
        }

        $state= '';
        if($request->has('state')){
            $state = $request->input('state');
        }

        $zipcode= '';
        if($request->has('zipcode')){
            $zipcode = $request->input('zipcode');
        }

        $country = '';
        if($request->has('country')){
            $country = $request->input('country');
        }

        $latitude = '';
        if($request->has('latitude')){
            $latitude = $request->input('latitude');
        }
        $longitude = '';
        if($request->has('longitude')){
            $longitude = $request->input('longitude');
        }

        $property_type = false;

        if($request->has('property_type')){
            if($request->input('property_type') == 1){
                $property_type = true;
            }else{
                $property_type = false;

            }
        }

        $beds = '';
        if($request->has('beds')){
            $beds = $request->input('beds');
        }

        $baths = '';
        if($request->has('baths')){
            $baths = $request->input('baths');
        }

        $size_sq = '';
        if($request->has('size_sq')){
            $size_sq = $request->input('size_sq');
        }
        $parking = '';
        if($request->has('parking')){
            $parking = $request->input('parking');
        }
        $market_rent = '';
        if($request->has('market_rent')){
            $market_rent = $request->input('market_rent');
        }
        $deposit = '';
        if($request->has('deposit')){
            $deposit = $request->input('deposit');
        }
        $units = '';
        if($request->has('unit_json')){
            $units = $request->input('unit_json');
        }
        $purchase_info = '';
        if($request->has('purchase_json')){
            $purchase_info = $request->input('purchase_json');
        }
        $loan_info = '';
        if($request->has('loan_json')){
            $loan_info = $request->input('loan_json');
        }


        $id = DB::select('SELECT MAX(id) AS max_id FROM b_property');
        $max_id = $id[0]->max_id + 1;

        if($request->hasfile('photo')){
            $this->validate($request, [
                'photo' => 'required',
                'photo.*' => 'mimes:jpg,JPEG,jpeg,png,gif,svg'
            ]);

            $files = $request->file('photo');
            $fileName = $max_id.".".$files[0]->getClientOriginalExtension();
            echo $fileName;
            $files[0]->move(public_path('/storage').'/uploads/b-property/',$fileName);
        }


        $title_path = public_path('/storage').'/uploads/documents/title';
        $tax_path = public_path('/storage').'/uploads/documents/tax';
        $survey_path = public_path('/storage').'/uploads/documents/survey';
        $deed_path = public_path('/storage').'/uploads/documents/deed';
        $ass_path =  public_path('/storage').'/uploads/documents/ass';
        $other_path = public_path('/storage').'/uploads/documents/other';
        if($request->hasfile('doc_title')){
            $this->validate($request, [
                'doc_title' => 'required',
            ]);
            if(!file_exists($title_path)){
                mkdir($title_path, 0770);
            }
            $count = 0;
            foreach ($request->file('doc_title')as $file){
                $count += 1;
                $fileName = $max_id."-title".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move(public_path('/storage').'/uploads/documents/title/',$fileName);
            }
        }
        if($request->hasfile('doc_tax')){
            $this->validate($request, [
                'doc_tax' => 'required',
            ]);
            if(!file_exists($tax_path)){
                mkdir($tax_path, 0770);
            }
            $count = 0;
            foreach ($request->file('doc_tax')as $file){
                $count += 1;
                $fileName = $max_id."-tax".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move(public_path('/storage').'/uploads/documents/tax/',$fileName);
            }
        }

        if($request->hasfile('doc_survey')){
            $this->validate($request, [
                'doc_survey' => 'required',
            ]);
            if(!file_exists($survey_path)){
                mkdir($survey_path, 0770);
            }
            $count = 0;
            foreach ($request->file('doc_survey')as $file){
                $count += 1;
                $fileName = $max_id."-survey".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move(public_path('/storage').'/uploads/documents/survey/',$fileName);
            }
        }

        if($request->hasfile('doc_deed')){
            $this->validate($request, [
                'doc_deed' => 'required',
            ]);
            if(!file_exists($deed_path)){
                mkdir($deed_path, 0770);
            }
            $count = 0;
            foreach ($request->file('doc_deed')as $file){
                $count += 1;
                $fileName = $max_id."-deed".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move(public_path('/storage').'/uploads/documents/deed/',$fileName);
            }
        }
        if($request->hasfile('doc_ass')){
            $this->validate($request, [
                'doc_ass' => 'required',
            ]);
            if(!file_exists($ass_path)){
                mkdir($ass_path, 0770);
            }
            $count = 0;
            foreach ($request->file('doc_ass')as $file){
                $count += 1;
                $fileName = $max_id."-ass".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move(public_path('/storage').'/uploads/documents/ass/',$fileName);
            }
        }
        if($request->hasfile('doc_other')){
            $this->validate($request, [
                'doc_other' => 'required',
            ]);
            if(!file_exists($other_path)){
                mkdir($other_path, 0770);
            }
            $count = 0;
            foreach ($request->file('doc_other')as $file){
                $count += 1;
                $fileName = $max_id."-other".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move(public_path('/storage').'/uploads/documents/other/',$fileName);
            }
        }

        if($request->hasfile('purchase_files')){
            $this->validate($request, [
                'purchase_files' => 'required',
            ]);
            $count = 0;
            foreach ($request->file('purchase_files')as $file){
                $count += 1;
                $fileName = $max_id."-".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move(public_path('/storage').'/uploads/purchase/',$fileName);
            }
        }

        $data['user_id'] = $user_id;
        $data['name'] = $property_name;
        $data['year_built'] = $year_built;
        $data['mls'] = $mls;
        $data['address'] = $address;
        $data['city'] = $city;
        $data['state'] = $state;
        $data['zipcode'] = $zipcode;
        $data['country'] = $country;
        $data['beds'] = $beds;
        $data['baths'] = $baths;
        $data['size'] = $size_sq;
        $data['parking'] = $parking;
        $data['market_rent'] = $market_rent;
        $data['deposit'] = $deposit;
        $data['units'] = $units;
        $data['purchase_info'] = $purchase_info;
        $data['loan_info'] = $loan_info;
        $data['property_type'] = $property_type;
        $data['latitude'] = $latitude;
        $data['longitude'] = $longitude;

        DB::table('b_property')->insert($data);

        return Redirect::route('b-properties');

    }

    public function viewPropertyPage(Request $request){
        if(!Session::get('useremail')) return Redirect('/');
        $user_id = $this->getUserID();
        $id = $request->input('property_id');
        $row = DB::table('b_property')->where('user_id',$user_id)->where('id',$id)->get();


        $dirName = public_path('/storage').'/uploads/purchase/';
        $nameArray = scandir($dirName,1);

        $document = array();
        $counter = 0;
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            $file_name = substr($name,0,$pos);
            if($file_name == $row[0]->id){
                $document[$counter] = $name;
                $counter ++;
            }
        }

        $row[0]->purchase_documents = $document;

        $title_path = public_path('/storage').'/uploads/documents/title';
        $tax_path = public_path('/storage').'/uploads/documents/tax';
        $survey_path = public_path('/storage').'/uploads/documents/survey';
        $deed_path = public_path('/storage').'/uploads/documents/deed';
        $ass_path =  public_path('/storage').'/uploads/documents/ass';
        $other_path = public_path('/storage').'/uploads/documents/other';

        $nameArray = scandir($title_path,1);
        $document = array();
        $counter = 0;
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            $file_name = substr($name,0,$pos);
            if($file_name == $row[0]->id){
                $document[$counter] = $name;
                $counter ++;
            }
        }
        $row[0]->doc_title = $document;

        $nameArray = scandir($tax_path,1);
        $document = array();
        $counter = 0;
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            $file_name = substr($name,0,$pos);
            if($file_name == $row[0]->id){
                $document[$counter] = $name;
                $counter ++;
            }
        }
        $row[0]->doc_tax= $document;

        $nameArray = scandir($survey_path,1);
        $document = array();
        $counter = 0;
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            $file_name = substr($name,0,$pos);
            if($file_name == $row[0]->id){
                $document[$counter] = $name;
                $counter ++;
            }
        }
        $row[0]->doc_survey= $document;


        $nameArray = scandir($deed_path,1);
        $document = array();
        $counter = 0;
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            $file_name = substr($name,0,$pos);
            if($file_name == $row[0]->id){
                $document[$counter] = $name;
                $counter ++;
            }
        }
        $row[0]->doc_deed= $document;

        $nameArray = scandir($ass_path,1);
        $document = array();
        $counter = 0;
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            $file_name = substr($name,0,$pos);
            if($file_name == $row[0]->id){
                $document[$counter] = $name;
                $counter ++;
            }
        }
        $row[0]->doc_ass= $document;

        $nameArray = scandir($other_path,1);
        $document = array();
        $counter = 0;
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            $file_name = substr($name,0,$pos);
            if($file_name == $row[0]->id){
                $document[$counter] = $name;
                $counter ++;
            }
        }
        $row[0]->doc_other= $document;


        return view('property/b_property_view',['property'=>$row[0]]);
    }

    public function removePropertyPage(Request $request){
        if(!Session::get('useremail')) return Redirect('/');
        $user_id = $this->getUserID();
        $id = $request->input('property_id');
        DB::table('b_property')->where('user_id',$user_id)->where('id',$id)->delete();

        $dirName = public_path('/storage').'/uploads/b-property/';
        $nameArray = scandir($dirName,1);
        foreach ($nameArray as $name){
            $pos = strpos($name,'.');
            if($pos !=false){
                $realid = substr($name,0,$pos);
                if($id == $realid){
                    unlink(public_path('/storage').'/uploads/b-property/'.$name);
                }
            }
        }

        $title_path = public_path('/storage').'/uploads/documents/title';
        $tax_path = public_path('/storage').'/uploads/documents/tax';
        $survey_path = public_path('/storage').'/uploads/documents/survey';
        $deed_path = public_path('/storage').'/uploads/documents/deed';
        $ass_path =  public_path('/storage').'/uploads/documents/ass';
        $other_path = public_path('/storage').'/uploads/documents/other';

        $nameArray = scandir($title_path,1);
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            if($pos !=false){
                $realid = substr($name,0,$pos);
                if($id == $realid){
                    unlink(public_path('/storage').'/uploads/documents/title/'.$name);
                }
            }
        }
        $nameArray = scandir($tax_path,1);
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            if($pos !=false){
                $realid = substr($name,0,$pos);
                if($id == $realid){
                    unlink(public_path('/storage').'/uploads/documents/tax/'.$name);
                }
            }
        }
        $nameArray = scandir($survey_path,1);
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            if($pos !=false){
                $realid = substr($name,0,$pos);
                if($id == $realid){
                    unlink(public_path('/storage').'/uploads/documents/survey/'.$name);
                }
            }
        }

        $nameArray = scandir($deed_path,1);
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            if($pos !=false){
                $realid = substr($name,0,$pos);
                if($id == $realid){
                    unlink(public_path('/storage').'/uploads/documents/deed/'.$name);
                }
            }
        }
        $nameArray = scandir($ass_path,1);
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            if($pos !=false){
                $realid = substr($name,0,$pos);
                if($id == $realid){
                    unlink(public_path('/storage').'/uploads/documents/ass/'.$name);
                }
            }
        }

        $nameArray = scandir($other_path,1);
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            if($pos !=false){
                $realid = substr($name,0,$pos);
                if($id == $realid){
                    unlink(public_path('/storage').'/uploads/documents/other/'.$name);
                }
            }
        }

        $dirName = public_path('/storage').'/uploads/purchase/';
        $nameArray = scandir($dirName,1);
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            if($pos !=false){
                $realid = substr($name,0,$pos);
                if($id == $realid){
                    unlink(public_path('/storage').'/uploads/purchase/'.$name);
                }
            }
        }

        $dirName = public_path('/storage').'/uploads/units/';
        $nameArray = scandir($dirName,1);
        foreach ($nameArray as $name){
            $pos = strpos($name,'.');
            if($pos !=false){
                $realid = substr($name,0,$pos);
                if($id == $realid){
                    unlink(public_path('/storage').'/uploads/purchase/'.$name);
                }
            }
        }

        return Redirect::route('b-properties');
    }

    public function editPropertyPage(Request $request){
        if(!Session::get('useremail')) return Redirect('/');

        $user_id = $this->getUserID();
        $id = $request->input('property_id');
        $row = DB::table('b_property')->where('user_id',$user_id)->where('id',$id)->get();

        $dirName = public_path('/storage').'/uploads/b-property/';
        $nameArray = scandir($dirName,1);

            $photo = '';
            foreach ($nameArray as $name){
                $pos = strpos($name,'.');
                $file_name = substr($name,0,$pos);
                if($file_name == $row[0]->id){
                    $photo = $name;
                }
            }
        $row[0]->files = $photo;

        $dirName = public_path('/storage').'/uploads/purchase/';
        $nameArray = scandir($dirName,1);

        $document = array();
        $counter = 0;
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            $file_name = substr($name,0,$pos);
            if($file_name == $row[0]->id){
                $document[$counter] = $name;
                $counter ++;
            }
        }
        $row[0]->purchase_documents = $document;


        $title_path = public_path('/storage').'/uploads/documents/title';
        $tax_path = public_path('/storage').'/uploads/documents/tax';
        $survey_path = public_path('/storage').'/uploads/documents/survey';
        $deed_path = public_path('/storage').'/uploads/documents/deed';
        $ass_path =  public_path('/storage').'/uploads/documents/ass';
        $other_path = public_path('/storage').'/uploads/documents/other';

        $nameArray = scandir($title_path,1);
        $document = array();
        $counter = 0;
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            $file_name = substr($name,0,$pos);
            if($file_name == $row[0]->id){
                $document[$counter] = $name;
                $counter ++;
            }
        }
        $row[0]->doc_title = $document;

        $nameArray = scandir($tax_path,1);
        $document = array();
        $counter = 0;
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            $file_name = substr($name,0,$pos);
            if($file_name == $row[0]->id){
                $document[$counter] = $name;
                $counter ++;
            }
        }
        $row[0]->doc_tax= $document;

        $nameArray = scandir($survey_path,1);
        $document = array();
        $counter = 0;
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            $file_name = substr($name,0,$pos);
            if($file_name == $row[0]->id){
                $document[$counter] = $name;
                $counter ++;
            }
        }
        $row[0]->doc_survey= $document;


        $nameArray = scandir($deed_path,1);
        $document = array();
        $counter = 0;
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            $file_name = substr($name,0,$pos);
            if($file_name == $row[0]->id){
                $document[$counter] = $name;
                $counter ++;
            }
        }
        $row[0]->doc_deed= $document;

        $nameArray = scandir($ass_path,1);
        $document = array();
        $counter = 0;
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            $file_name = substr($name,0,$pos);
            if($file_name == $row[0]->id){
                $document[$counter] = $name;
                $counter ++;
            }
        }
        $row[0]->doc_ass= $document;

        $nameArray = scandir($other_path,1);
        $document = array();
        $counter = 0;
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            $file_name = substr($name,0,$pos);
            if($file_name == $row[0]->id){
                $document[$counter] = $name;
                $counter ++;
            }
        }
        $row[0]->doc_other= $document;


        return view('property/edit_b_property',['property'=>$row[0]]);

    }

    public function updatePropertyPage(Request $request){
        if(!Session::get('useremail')) return Redirect('/');
        $user_id = $this->getUserID();
        $property_name = '';
        if($request->has('property_name')){
            $property_name = $request->input('property_name');
        }

        $year_built = '';
        if($request->has('year_built')){
            $year_built = $request->input('year_built');
        }
        $mls = '';
        if($request->has('mls')){
            $mls = $request->input('mls');
        }

        $address = '';
        if($request->has('address')){
            $address = $request->input('address');
        }
        $city = '';
        if($request->has('city')){
            $city = $request->input('city');
        }

        $state= '';
        if($request->has('state')){
            $state = $request->input('state');
        }

        $zipcode= '';
        if($request->has('zipcode')){
            $zipcode = $request->input('zipcode');
        }

        $country = '';
        if($request->has('country')){
            $country = $request->input('country');
        }

        $latitude = '';
        if($request->has('latitude')){
            $latitude = $request->input('latitude');
        }
        $longitude = '';
        if($request->has('longitude')){
            $longitude = $request->input('longitude');
        }

        $property_type = false;

        if($request->has('property_type')){
            if($request->input('property_type') == 1){
                $property_type = true;
            }else{
                $property_type = false;

            }
        }

        $beds = '';
        if($request->has('beds')){
            $beds = $request->input('beds');
        }

        $baths = '';
        if($request->has('baths')){
            $baths = $request->input('baths');
        }

        $size_sq = '';
        if($request->has('size_sq')){
            $size_sq = $request->input('size_sq');
        }
        $parking = '';
        if($request->has('parking')){
            $parking = $request->input('parking');
        }
        $market_rent = '';
        if($request->has('market_rent')){
            $market_rent = $request->input('market_rent');
        }
        $deposit = '';
        if($request->has('deposit')){
            $deposit = $request->input('deposit');
        }
        $units = '';
        if($request->has('unit_json')){
            $units = $request->input('unit_json');
        }
        $purchase_info = '';
        if($request->has('purchase_json')){
            $purchase_info = $request->input('purchase_json');
        }
        $loan_info = '';
        if($request->has('loan_json')){
            $loan_info = $request->input('loan_json');
        }

        $property_id = $request->input('property_id');


        if($request->hasfile('photo')){
            $this->validate($request, [
                'photo' => 'required',
                'photo.*' => 'mimes:jpg,JPEG,jpeg,png,gif,svg'
            ]);

            $files = $request->file('photo');
            $fileName = $property_id.".".$files[0]->getClientOriginalExtension();
            $files[0]->move(public_path('/storage').'/uploads/b-property/',$fileName);
        }

        $title_path = public_path('/storage').'/uploads/documents/title';
        $tax_path = public_path('/storage').'/uploads/documents/tax';
        $survey_path = public_path('/storage').'/uploads/documents/survey';
        $deed_path = public_path('/storage').'/uploads/documents/deed';
        $ass_path =  public_path('/storage').'/uploads/documents/ass';
        $other_path = public_path('/storage').'/uploads/documents/other';
        if($request->hasfile('doc_title')){
            $this->validate($request, [
                'doc_title' => 'required',
            ]);
            if(!file_exists($title_path)){
                mkdir($title_path, 0770);
            }
            $file_array = scandir($title_path,1);
            $count = count($file_array);
            foreach ($request->file('doc_title')as $file){
                $count += 1;
                $fileName = $property_id."-title".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move(public_path('/storage').'/uploads/documents/title/',$fileName);
            }
        }
        if($request->hasfile('doc_tax')){
            $this->validate($request, [
                'doc_tax' => 'required',
            ]);
            if(!file_exists($tax_path)){
                mkdir($tax_path, 0770);
            }
            $file_array = scandir($tax_path,1);
            $count = count($file_array);
            foreach ($request->file('doc_tax')as $file){
                $count += 1;
                $fileName = $property_id."-tax".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move(public_path('/storage').'/uploads/documents/tax/',$fileName);
            }
        }

        if($request->hasfile('doc_survey')){
            $this->validate($request, [
                'doc_survey' => 'required',
            ]);
            if(!file_exists($survey_path)){
                mkdir($survey_path, 0770);
            }
            $file_array = scandir($survey_path,1);
            $count = count($file_array);
            foreach ($request->file('doc_survey')as $file){
                $count += 1;
                $fileName = $property_id."-survey".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move(public_path('/storage').'/uploads/documents/survey/',$fileName);
            }
        }

        if($request->hasfile('doc_deed')){
            $this->validate($request, [
                'doc_deed' => 'required',
            ]);
            if(!file_exists($deed_path)){
                mkdir($deed_path, 0770);
            }
            $file_array = scandir($deed_path,1);
            $count = count($file_array);
            foreach ($request->file('doc_deed')as $file){
                $count += 1;
                $fileName = $property_id."-deed".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move(public_path('/storage').'/uploads/documents/deed/',$fileName);
            }
        }
        if($request->hasfile('doc_ass')){
            $this->validate($request, [
                'doc_ass' => 'required',
            ]);
            if(!file_exists($ass_path)){
                mkdir($ass_path, 0770);
            }
            $file_array = scandir($ass_path,1);
            $count = count($file_array);
            foreach ($request->file('doc_ass')as $file){
                $count += 1;
                $fileName = $property_id."-ass".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move(public_path('/storage').'/uploads/documents/ass/',$fileName);
            }
        }
        if($request->hasfile('doc_other')){
            $this->validate($request, [
                'doc_other' => 'required',
            ]);
            if(!file_exists($other_path)){
                mkdir($other_path, 0770);
            }
            $file_array = scandir($other_path,1);
            $count = count($file_array);
            foreach ($request->file('doc_other')as $file){
                $count += 1;
                $fileName = $property_id."-other".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move(public_path('/storage').'/uploads/documents/other/',$fileName);
            }
        }


        if($request->hasfile('purchase_files')){
            $this->validate($request, [
                'purchase_files' => 'required',
            ]);
            $count = 0;
            foreach ($request->file('purchase_files')as $file){
                $count += 1;
                $fileName = $property_id."-".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move(public_path('/storage').'/uploads/purchase/',$fileName);
            }
        }

        $data['user_id'] = $user_id;
        $data['name'] = $property_name;
        $data['year_built'] = $year_built;
        $data['mls'] = $mls;
        $data['address'] = $address;
        $data['city'] = $city;
        $data['state'] = $state;
        $data['zipcode'] = $zipcode;
        $data['country'] = $country;
        $data['beds'] = $beds;
        $data['baths'] = $baths;
        $data['size'] = $size_sq;
        $data['parking'] = $parking;
        $data['market_rent'] = $market_rent;
        $data['deposit'] = $deposit;
        $data['units'] = $units;
        $data['purchase_info'] = $purchase_info;
        $data['loan_info'] = $loan_info;
        $data['property_type'] = $property_type;
        $data['latitude'] = $latitude;
        $data['longitude'] = $longitude;


        DB::table('b_property')->where('id',$property_id)->update($data);

        return Redirect::route('b-properties');
    }

    public function unitPage(){
        if(!Session::get('useremail')) return Redirect('/');
        $id = $this->getUserID();
        $properties = DB::table('b_property')->where('user_id',$id)->paginate(5);

        $dirName = public_path('/storage').'/uploads/b-property/';
        $nameArray = scandir($dirName,1);

        foreach ($properties as $property) {
            $photo = '';
            foreach ($nameArray as $name){
                $pos = strpos($name,'.');
                $file_name = substr($name,0,$pos);
                if($file_name == $property->id){
                    $photo = $name;
                }
            }
            $property->files = $photo;

        }
        return view('property/b_units_page',['properties'=>$properties]);
    }

    public function editUnitPage(Request $request){
        if(!Session::get('useremail')) return Redirect('/');
        $property_id = $request->input('property_id');
        $row = DB::table('b_property')->where('id',$property_id)->get();

        $photo_path = public_path('/storage').'/uploads/units/'.$property_id;

        if(! file_exists($photo_path)){
            mkdir($photo_path, 0770);
        }

        $title_path = public_path('/storage').'/uploads/units/title-'.$property_id;
        if(! file_exists($title_path)){
            mkdir($title_path, 0770);
        }
        $tax_path = public_path('/storage').'/uploads/units/tax-'.$property_id;
        if(! file_exists($tax_path)){
            mkdir($tax_path, 0770);
        }
        $survey_path = public_path('/storage').'/uploads/units/survey-'.$property_id;
        if(! file_exists($survey_path)){
            mkdir($survey_path, 0770);
        }
        $deed_path = public_path('/storage').'/uploads/units/deed-'.$property_id;
        if(! file_exists($deed_path)){
            mkdir($deed_path, 0770);
        }
        $ass_path =  public_path('/storage').'/uploads/units/ass-'.$property_id;
        if(! file_exists($ass_path)){
            mkdir($ass_path, 0770);
        }
        $other_path = public_path('/storage').'/uploads/units/other-'.$property_id;
        if(! file_exists($other_path)){
            mkdir($other_path, 0770);
        }

        if($request->has('idx')){
            $idx = $request->input('idx');

            $nameArray = scandir($photo_path,1);
            $photo_file = null;
            foreach ($nameArray as $name){
                $pos = strpos($name,'.');
                $file_name = substr($name,0,$pos);
                if($file_name == $idx){
                    $photo_file = $name;
                }
            }
            $row[0]->photo = $photo_file;


            $nameArray = scandir($title_path,1);
            $document = array();
            $counter = 0;
            foreach ($nameArray as $name){
                $pos = strpos($name,'-');
                $file_name = substr($name,0,$pos);
                if($file_name == $idx){
                    $document[$counter] = $name;
                    $counter ++;
                }
            }
            $row[0]->doc_title = $document;

            $nameArray = scandir($tax_path,1);
            $document = array();
            $counter = 0;
            foreach ($nameArray as $name){
                $pos = strpos($name,'-');
                $file_name = substr($name,0,$pos);
                if($file_name == $idx){
                    $document[$counter] = $name;
                    $counter ++;
                }
            }
            $row[0]->doc_tax= $document;

            $nameArray = scandir($survey_path,1);
            $document = array();
            $counter = 0;
            foreach ($nameArray as $name){
                $pos = strpos($name,'-');
                $file_name = substr($name,0,$pos);
                if($file_name == $idx){
                    $document[$counter] = $name;
                    $counter ++;
                }
            }
            $row[0]->doc_survey= $document;


            $nameArray = scandir($deed_path,1);
            $document = array();
            $counter = 0;
            foreach ($nameArray as $name){
                $pos = strpos($name,'-');
                $file_name = substr($name,0,$pos);
                if($file_name == $idx){
                    $document[$counter] = $name;
                    $counter ++;
                }
            }
            $row[0]->doc_deed= $document;

            $nameArray = scandir($ass_path,1);
            $document = array();
            $counter = 0;
            foreach ($nameArray as $name){
                $pos = strpos($name,'-');
                $file_name = substr($name,0,$pos);
                if($file_name == $idx){
                    $document[$counter] = $name;
                    $counter ++;
                }
            }
            $row[0]->doc_ass= $document;

            $nameArray = scandir($other_path,1);
            $document = array();
            $counter = 0;
            foreach ($nameArray as $name){
                $pos = strpos($name,'-');
                $file_name = substr($name,0,$pos);
                if($file_name == $idx){
                    $document[$counter] = $name;
                    $counter ++;
                }
            }
            $row[0]->doc_other= $document;

            return view('property/m_unit_edit',['property'=>$row[0],'idx'=>$request->input('idx')]);

        }else{
            $nameArray = scandir($photo_path,1);
            $photo_file = null;
            foreach ($nameArray as $name){
                $pos = strpos($name,'.');
                $file_name = substr($name,0,$pos);
                if($file_name == '0'){
                    $photo_file = $name;
                }
            }
            $row[0]->photo = $photo_file;

            $nameArray = scandir($title_path,1);
            $document = array();
            $counter = 0;
            foreach ($nameArray as $name){
                $pos = strpos($name,'-');
                if(!$pos && strlen($name) > 4){
                    $document[$counter] = $name;
                    $counter ++;
                }
            }
            $row[0]->doc_title = $document;


            $nameArray = scandir($tax_path,1);
            $document = array();
            $counter = 0;
            foreach ($nameArray as $name){
                $pos = strpos($name,'-');
                if(!$pos && strlen($name) > 4){
                    $document[$counter] = $name;
                    $counter ++;
                }
            }
            $row[0]->doc_tax= $document;

            $nameArray = scandir($survey_path,1);
            $document = array();
            $counter = 0;
            foreach ($nameArray as $name){
                $pos = strpos($name,'-');
                if(!$pos && strlen($name) > 4){
                    $document[$counter] = $name;
                    $counter ++;
                }
            }
            $row[0]->doc_survey= $document;


            $nameArray = scandir($deed_path,1);
            $document = array();
            $counter = 0;
            foreach ($nameArray as $name){
                $pos = strpos($name,'-');
                if(!$pos && strlen($name) > 4){
                    $document[$counter] = $name;
                    $counter ++;
                }
            }
            $row[0]->doc_deed= $document;

            $nameArray = scandir($ass_path,1);
            $document = array();
            $counter = 0;
            foreach ($nameArray as $name){
                $pos = strpos($name,'-');
                if(!$pos && strlen($name) > 4){
                    $document[$counter] = $name;
                    $counter ++;
                }
            }
            $row[0]->doc_ass= $document;

            $nameArray = scandir($other_path,1);
            $document = array();
            $counter = 0;
            foreach ($nameArray as $name){
                $pos = strpos($name,'-');
                if(!$pos && strlen($name) > 4){
                    $document[$counter] = $name;
                    $counter ++;
                }
            }
            $row[0]->doc_other= $document;



            return view('property/s_unit_edit',['property'=>$row[0]]);
        }
    }

    public function removeUnit(Request $request){
        if(!Session::get('useremail')) return Redirect('/');
        $property_id = $request->input('property_id');
        $idx = $request->input('idx');
        $property = DB::table('b_property')->where('id',$property_id)->get();
        $units = json_decode($property[0]->units);
        $updated_units = array();
        $count = 0;
        $real_count = 0;
        foreach ($units as $unit) {
            if($count != $idx){
                $updated_units[$real_count] = $unit;
                $real_count ++;
            }
            $count ++;
        }

        $data['units'] = json_encode($updated_units);
        DB::table('b_property')->where('id',$property_id)->update($data);

        $title_path = public_path('/storage').'/uploads/units/title-'.$property_id;
        $tax_path = public_path('/storage').'/uploads/units/tax-'.$property_id;
        $survey_path = public_path('/storage').'/uploads/units/survey-'.$property_id;
        $deed_path = public_path('/storage').'/uploads/units/deed-'.$property_id;
        $ass_path =  public_path('/storage').'/uploads/units/ass-'.$property_id;
        $other_path = public_path('/storage').'/uploads/units/other-'.$property_id;

        $photo_path = public_path('/storage').'/uploads/units/'.$property_id;
        $nameArray = scandir($photo_path,1);
        foreach ($nameArray as $name){
            $pos = strpos($name,'.');
            $file_name = substr($name,0,$pos);
            if($file_name == $idx){
                unlink($photo_path.$name);
            }
        }

        $nameArray = scandir($title_path,1);
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            if($pos !=false){
                $realid = substr($name,0,$pos);
                if($idx == $realid){
                    unlink($title_path.$name);
                }
            }
        }
        $nameArray = scandir($tax_path,1);
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            if($pos !=false){
                $realid = substr($name,0,$pos);
                if($idx == $realid){
                    unlink($tax_path.$name);
                }
            }
        }
        $nameArray = scandir($survey_path,1);
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            if($pos !=false){
                $realid = substr($name,0,$pos);
                if($idx == $realid){
                    unlink($survey_path.$name);
                }
            }
        }

        $nameArray = scandir($deed_path,1);
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            if($pos !=false){
                $realid = substr($name,0,$pos);
                if($idx == $realid){
                    unlink($deed_path.$name);
                }
            }
        }
        $nameArray = scandir($ass_path,1);
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            if($pos !=false){
                $realid = substr($name,0,$pos);
                if($idx == $realid){
                    unlink($ass_path.$name);
                }
            }
        }

        $nameArray = scandir($other_path,1);
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            if($pos !=false){
                $realid = substr($name,0,$pos);
                if($idx == $realid){
                    unlink($other_path.$name);
                }
            }
        }


        return Redirect::route('b-units');

    }
    public function updateSingleUnit(Request $request){
        if(!Session::get('useremail')) return Redirect('/');
        $property_id = $request->input('property_id');

        $beds = '';
        if($request->has('beds')){
            $beds = $request->input('beds');
        }
        $baths = '';
        if($request->has('beds')){
            $baths = $request->input('baths');
        }
        $size = 0;
        if($request->has('size_sq')){
            $size = $request->input('size_sq');
        }
        $parking = '';
        if($request->has('parking')){
            $parking = $request->input('parking');
        }
        $market_rent = '';
        if($request->has('market_rent')){
            $market_rent = $request->input('market_rent');
        }
        $deposit = '';
        if($request->has('deposit')){
            $deposit = $request->input('deposit');
        }

        $data['beds'] = $beds;
        $data['baths'] = $baths;
        $data['size'] = $size;
        $data['parking'] = $parking;
        $data['market_rent'] = $market_rent;
        $data['deposit'] = $deposit;

        DB::table('b_property')->where('id',$property_id)->update($data);

        $title_path = public_path('/storage').'/uploads/units/title-'.$property_id;
        if(! file_exists($title_path)){
            mkdir($title_path, 0770);
        }

        $tax_path = public_path('/storage').'/uploads/units/tax-'.$property_id;
        if(! file_exists($tax_path)){
            mkdir($tax_path, 0770);
        }
        $survey_path = public_path('/storage').'/uploads/units/survey-'.$property_id;
        if(! file_exists($survey_path)){
            mkdir($survey_path, 0770);
        }
        $deed_path = public_path('/storage').'/uploads/units/deed-'.$property_id;
        if(! file_exists($deed_path)){
            mkdir($deed_path, 0770);
        }
        $ass_path =  public_path('/storage').'/uploads/units/ass-'.$property_id;
        if(! file_exists($ass_path)){
            mkdir($ass_path, 0770);
        }
        $other_path = public_path('/storage').'/uploads/units/other-'.$property_id;
        if(! file_exists($other_path)){
            mkdir($other_path, 0770);
        }

        $photo_path = public_path('/storage').'/uploads/units/'.$property_id;
        if(! file_exists($photo_path)){
            mkdir($photo_path, 0770);
        }

        if($request->hasfile('photo')){
            $this->validate($request, [
                'photo' => 'required',
                'photo.*' => 'mimes:jpg,JPEG,jpeg,png,gif,svg'
            ]);

            $files = $request->file('photo');
            $fileName = "0.".$files[0]->getClientOriginalExtension();
            $files[0]->move($photo_path,$fileName);
        }


        if($request->hasfile('doc_title')){
            $this->validate($request, [
                'doc_title' => 'required',
            ]);
            if(!file_exists($title_path)){
                mkdir($title_path, 0770);
            }
            $nameArray = scandir($title_path,1);
            $count = count($nameArray);
            foreach ($request->file('doc_title')as $file){
                $count += 1;
                $fileName = "title".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move($title_path ,$fileName);
            }
        }
        if($request->hasfile('doc_tax')){
            $this->validate($request, [
                'doc_tax' => 'required',
            ]);
            if(!file_exists($tax_path)){
                mkdir($tax_path, 0770);
            }
            $nameArray = scandir($tax_path,1);
            $count = count($nameArray);
            foreach ($request->file('doc_tax')as $file){
                $count += 1;
                $fileName = "tax".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move($tax_path,$fileName);
            }
        }

        if($request->hasfile('doc_survey')){
            $this->validate($request, [
                'doc_survey' => 'required',
            ]);
            if(!file_exists($survey_path)){
                mkdir($survey_path, 0770);
            }
            $nameArray = scandir($survey_path,1);
            $count = count($nameArray);
            foreach ($request->file('doc_survey')as $file){
                $count += 1;
                $fileName = "survey".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move($survey_path,$fileName);
            }
        }

        if($request->hasfile('doc_deed')){
            $this->validate($request, [
                'doc_deed' => 'required',
            ]);
            if(!file_exists($deed_path)){
                mkdir($deed_path, 0770);
            }
            $nameArray = scandir($deed_path,1);
            $count = count($nameArray);
            foreach ($request->file('doc_deed')as $file){
                $count += 1;
                $fileName = "deed".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move($deed_path,$fileName);
            }
        }
        if($request->hasfile('doc_ass')){
            $this->validate($request, [
                'doc_ass' => 'required',
            ]);
            if(!file_exists($ass_path)){
                mkdir($ass_path, 0770);
            }
            $nameArray = scandir($ass_path,1);
            $count = count($nameArray);
            foreach ($request->file('doc_ass')as $file){
                $count += 1;
                $fileName = "ass".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move($ass_path,$fileName);
            }
        }
        if($request->hasfile('doc_other')){
            $this->validate($request, [
                'doc_other' => 'required',
            ]);
            if(!file_exists($other_path)){
                mkdir($other_path, 0770);
            }
            $nameArray = scandir($other_path,1);
            $count = count($nameArray);
            foreach ($request->file('doc_other')as $file){
                $count += 1;
                $fileName = "other".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move($other_path,$fileName);
            }
        }

        return Redirect::action('PropertyController@editUnitPage',['property_id'=>$property_id]);
    }

    public function updateMultiUnit(Request $request){
        if(!Session::get('useremail')) return Redirect('/');
        $property_id = $request->input('property_id');
        $idx = $request->input('idx');
        $unit_no = $request->input('unit_no');
        $unit_type = '';
        if ($request->has('unit_type')){
            $unit_type = $request->input('unit_type');
        }

        $unit_size = '';
        if ($request->has('unit_size')){
            $unit_size  = $request->input('unit_size');
        }
        $unit_beds = '';
        if ($request->has('unit_beds')){
            $unit_beds  = $request->input('unit_beds');
        }
        $unit_baths  = '';
        if ($request->has('unit_baths')){
            $unit_baths  = $request->input('unit_baths');
        }
        $unit_rent  = '';
        if ($request->has('unit_rent')){
            $unit_rent  = $request->input('unit_rent');
        }

        $unit_deposit  = '';
        if ($request->has('unit_deposit')){
            $unit_deposit  = $request->input('unit_deposit');
        }

        $property = DB::table('b_property')->where('id',$property_id)->get();

        $units = json_decode($property[0]->units);
        $counter = 0;
        foreach ($units as $unit){
            if($counter == $idx){
                $unit->unit_no = $unit_no;
                $unit->unit_type = $unit_type;
                $unit->unit_size = $unit_size;
                $unit->unit_beds = $unit_beds;
                $unit->unit_baths = $unit_baths;
                $unit->unit_rent = $unit_rent;
                    $unit->unit_deposit = $unit_deposit;
            }
        }

        $data['units'] = json_encode($units);
        DB::table('b_property')->where('id',$property_id)->update($data);


        $title_path = public_path('/storage').'/uploads/units/title-'.$property_id;
        $tax_path = public_path('/storage').'/uploads/units/tax-'.$property_id;
        $survey_path = public_path('/storage').'/uploads/units/survey-'.$property_id;
        $deed_path = public_path('/storage').'/uploads/units/deed-'.$property_id;
        $ass_path =  public_path('/storage').'/uploads/units/ass-'.$property_id;
        $other_path = public_path('/storage').'/uploads/units/other-'.$property_id;

        $photo_path = public_path('/storage').'/uploads/units/'.$property_id;

        if($request->hasfile('photo')){
            $this->validate($request, [
                'photo' => 'required',
                'photo.*' => 'mimes:jpg,JPEG,jpeg,png,gif,svg'
            ]);

            $files = $request->file('photo');
            $fileName = $idx.".".$files[0]->getClientOriginalExtension();
            $files[0]->move($photo_path,$fileName);
        }

        if($request->hasfile('doc_title')){
            $this->validate($request, [
                'doc_title' => 'required',
            ]);
            if(!file_exists($title_path)){
                mkdir($title_path, 0770);
            }
            $nameArray = scandir($title_path,1);
            $count = count($nameArray);
            foreach ($request->file('doc_title')as $file){
                $count += 1;
                $fileName = $idx."-title".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move($title_path,$fileName);
            }
        }
        if($request->hasfile('doc_tax')){
            $this->validate($request, [
                'doc_tax' => 'required',
            ]);
            if(!file_exists($tax_path)){
                mkdir($tax_path, 0770);
            }
            $nameArray = scandir($tax_path,1);
            $count = count($nameArray);
            foreach ($request->file('doc_tax')as $file){
                $count += 1;
                $fileName = $idx."-tax".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move($tax_path,$fileName);
            }
        }

        if($request->hasfile('doc_survey')){
            $this->validate($request, [
                'doc_survey' => 'required',
            ]);
            if(!file_exists($survey_path)){
                mkdir($survey_path, 0770);
            }
            $nameArray = scandir($survey_path,1);
            $count = count($nameArray);
            foreach ($request->file('doc_survey')as $file){
                $count += 1;
                $fileName = $idx."-survey".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move($survey_path,$fileName);
            }
        }

        if($request->hasfile('doc_deed')){
            $this->validate($request, [
                'doc_deed' => 'required',
            ]);
            if(!file_exists($deed_path)){
                mkdir($deed_path, 0770);
            }
            $nameArray = scandir($deed_path,1);
            $count = count($nameArray);
            foreach ($request->file('doc_deed')as $file){
                $count += 1;
                $fileName = $idx."-deed".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move($deed_path,$fileName);
            }
        }
        if($request->hasfile('doc_ass')){
            $this->validate($request, [
                'doc_ass' => 'required',
            ]);
            if(!file_exists($ass_path)){
                mkdir($ass_path, 0770);
            }
            $nameArray = scandir($ass_path,1);
            $count = count($nameArray);
            foreach ($request->file('doc_ass')as $file){
                $count += 1;
                $fileName = $idx."-ass".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move($ass_path,$fileName);
            }
        }
        if($request->hasfile('doc_other')){
            $this->validate($request, [
                'doc_other' => 'required',
            ]);
            if(!file_exists($other_path)){
                mkdir($other_path, 0770);
            }
            $nameArray = scandir($other_path,1);
            $count = count($nameArray);
            foreach ($request->file('doc_other')as $file){
                $count += 1;
                $fileName = $idx."-other".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move($other_path,$fileName);
            }
        }
        return redirect('/edit-b-unit?property_id='.$property_id.'&idx='.$idx);
    }
}