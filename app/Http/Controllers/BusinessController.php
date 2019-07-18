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


class BusinessController extends Controller{

    public function profile(){
        if(!Session::get('useremail')) return Redirect('/');
        $email = Session::get('useremail');

        $profile = DB::table('user')->where('email',$email)->get();

        echo json_encode($profile);
        exit;
    }

    public function signOut(){
        Session::flush();
        return Redirect('/');
    }

    public function addPropertyPage(){
        if(!Session::get('useremail')) return Redirect('/');

        return view('business/add_property');

    }

    public function createProperty(Request $request){
        if(!Session::get('useremail')) return Redirect('/');
        $useremail = Session::get('useremail');
        $username = Session::get('username');
        $row = DB::table('user')->where('username',$username)->where('email',$useremail)->get();
        $data['user_id'] = $row[0]->id;
        $property_name = $request->input('property_name');
        $data['property_name'] = $property_name;
        if($request->has('description')){
            $data['description'] = $request->input('description');
        }
        if($request->has('address')){
            $data['address'] = $request->input('address');
        }
        if($request->has('in_mile')){
            $miles = $request->input('in_mile');
            $data['miles'] = $miles;
        }

        if($request->has('latitude')){
            $data['latitude'] = $request->input('latitude');
        }
        if($request->has('longitude')){
            $data['longitude'] = $request->input('longitude');
        }

        if($request->has('neighborhood')){
            $data['neighborhood'] = $request->input('neighborhood');
        }
        if($request->has('city')){
            $data['city'] = $request->input('city');
        }
        if($request->has('zipcode')){
            $data['zipcode'] = $request->input('zipcode');
        }
        $for_sale = [];
        if($request->has('by_agent')){
            $for_sale['by_agent'] = 1;
        }else{
            $for_sale['by_agent'] = 0;

        }
        if($request->has('by_owner')){
            $for_sale['by_owner'] = 1;
        }else{
            $for_sale['by_owner'] = 0;
        }
        if($request->has('new_construction')){
            $for_sale['new_construction'] = 1;
        }else{
            $for_sale['new_construction'] = 0;
        }
        if($request->has('foreclosures')){
            $for_sale['foreclosures'] = 1;
        }else{
            $for_sale['foreclosures'] = 0;
        }
        if($request->has('coming_soon')){
            $for_sale['coming_soon'] = 1;
        }else{
            $for_sale['coming_soon'] = 0;
        }
        $data['for_sale'] = json_encode($for_sale);

        $potential_listings = [];
        if($request->has('foreclosed')){
            $potential_listings['foreclosed'] = 1;
        }else{
            $potential_listings['foreclosed'] = 0;
        }
        if($request->has('pre_foreclosure')){
            $potential_listings['pre_foreclosure'] = 1;
        }else{
            $potential_listings['pre_foreclosure'] = 0;
        }
        if($request->has('make_me_move')){
            $potential_listings['make_me_move'] = 1;
        }else{
            $potential_listings['make_me_move'] = 0;
        }
        $data['potential_listings'] = json_encode($potential_listings);

        if($request->has('for_rent')){
            $data["for_rent"] = 1;
        }
        if($request->has('recently_sold')){
            $data["recently_sold"] = 1;
        }
        if($request->has('open_houses')){
            $data["open_houses"] = 1;
        }
        if($request->has('pending_under')){
            $data["pending_under"] = 1;
        }

        if($request->has('min_price')){
            $data["min_price"] = $request->input('min_price');
        }
        if($request->has('max_price')){
            $data["max_price"] = $request->input('max_price');
        }
        if($request->has('beds')){
            $data["beds"] = $request->input('beds');
        }
        $home_types = [];
        if($request->has('houses')){
            $home_types['houses'] = 1;
        }else{
            $home_types['houses'] = 0;
        }
        if($request->has('apartments')){
            $home_types['apartments'] = 1;
        }else{
            $home_types['apartments'] = 0;
        }
        if($request->has('condos')){
            $home_types['condos'] = 1;
        }else{
            $home_types['condos'] = 0;
        }
        if($request->has('townhomes')){
            $home_types['townhomes'] = 1;
        }else{
            $home_types['townhomes'] = 0;
        }
        if($request->has('manufactured')){
            $home_types['manufactured'] = 1;
        }else{
            $home_types['manufactured'] = 0;
        }
        if($request->has('lots_land')){
            $home_types['lots_land'] = 1;
        }else{
            $home_types['lots_land'] = 0;
        }

        $data["home_types"] = json_encode($home_types);

        $for_rent = [];
        if($request->has('for_rent')){
            $for_rent['for_rent'] = 1;
        }else{
            $for_rent['for_rent'] = 0;
        }

        if($request->has('recently_sold')){
            $for_rent['recently_sold'] = 1;
        }else{
            $for_rent['recently_sold'] = 0;
        }
        if($request->has('open_houses')){
            $for_rent['open_houses'] = 1;
        }else{
            $for_rent['open_houses'] = 0;
        }
        if($request->has('pending_under')){
            $for_rent['pending_under'] = 1;
        }else{
            $for_rent['pending_under'] = 0;
        }
        $data['for_rent'] = json_encode($for_rent);


        if($request->has('baths')){
            $data['baths'] = $request->input('baths');
        }
        if($request->has('square_feet_min')){
            $data['square_feet_min'] = $request->input('square_feet_min');
        }
        if($request->has('square_feet_max')){
            $data['square_feet_max'] = $request->input('square_feet_max');
        }
        if($request->has('lot_size')){
            $data['lot_size'] = $request->input('lot_size');
        }
        if($request->has('year_built_min')){
            $data['year_built_min'] = $request->input('year_built_min');
        }
        if($request->has('year_built_max')){
            $data['year_built_max'] = $request->input('year_built_max');
        }

        if($request->has('max_hoa')){
            $data['max_hoa'] = $request->input('max_hoa');
        }
        if($request->has('days_on_zillow')){
            $data['days_on_zillow'] = $request->input('days_on_zillow');
        }

        if($request->has('keywords')){
            $data['keywords'] = $request->input('keywords');
        }

        if($request->hasfile('photo')){
            $this->validate($request, [
                'photo' => 'required',
                'photo.*' => 'mimes:jpg,JPEG,jpeg,png,gif,svg'
            ]);
            DB::table('property')->insert($data);

            $id = DB::select('SELECT MAX(id) AS max_id FROM property');
            $max_id = $id[0]->max_id;
            $count = 0;
            foreach ($request->file('photo')as $file){
                $count += 1;
                $fileName = $max_id."-".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move(public_path('/storage').'/uploads/property/',$fileName);
            }
        }
        return Redirect::route('add-property');
    }

    public function updateProperty(Request $request){
        if(!Session::get('useremail')) return Redirect('/');
        $useremail = Session::get('useremail');
        $username = Session::get('username');
        $id = $request->input('property_id');
        $row = DB::table('user')->where('username',$username)->where('email',$useremail)->get();
        $user_id = $row[0]->id;
        $property_name = $request->input('property_name');
        $data['property_name'] = $property_name;
        if($request->has('description')){
            $data['description'] = $request->input('description');
        }
        if($request->has('address')){
            $data['address'] = $request->input('address');
        }
        if($request->has('latitude')){
            $data['latitude'] = $request->input('latitude');
        }
        if($request->has('longitude')){
            $data['longitude'] = $request->input('longitude');
        }
        if($request->has('in_mile')){
            $miles = $request->input('in_mile');
            $data['miles'] = $miles;
        }

        if($request->has('neighborhood')){
            $data['neighborhood'] = $request->input('neighborhood');
        }
        if($request->has('city')){
            $data['city'] = $request->input('city');
        }
        if($request->has('zipcode')){
            $data['zipcode'] = $request->input('zipcode');
        }
        $for_sale = [];
        if($request->has('by_agent')){
            $for_sale['by_agent'] = 1;
        }else{
            $for_sale['by_agent'] = 0;

        }
        if($request->has('by_owner')){
            $for_sale['by_owner'] = 1;
        }else{
            $for_sale['by_owner'] = 0;
        }
        if($request->has('new_construction')){
            $for_sale['new_construction'] = 1;
        }else{
            $for_sale['new_construction'] = 0;
        }
        if($request->has('foreclosures')){
            $for_sale['foreclosures'] = 1;
        }else{
            $for_sale['foreclosures'] = 0;
        }
        if($request->has('coming_soon')){
            $for_sale['coming_soon'] = 1;
        }else{
            $for_sale['coming_soon'] = 0;
        }
        $data['for_sale'] = json_encode($for_sale);

        $potential_listings = [];
        if($request->has('foreclosed')){
            $potential_listings['foreclosed'] = 1;
        }else{
            $potential_listings['foreclosed'] = 0;
        }
        if($request->has('pre_foreclosure')){
            $potential_listings['pre_foreclosure'] = 1;
        }else{
            $potential_listings['pre_foreclosure'] = 0;
        }
        if($request->has('make_me_move')){
            $potential_listings['make_me_move'] = 1;
        }else{
            $potential_listings['make_me_move'] = 0;
        }
        $data['potential_listings'] = json_encode($potential_listings);

        if($request->has('for_rent')){
            $data["for_rent"] = 1;
        }
        if($request->has('recently_sold')){
            $data["recently_sold"] = 1;
        }
        if($request->has('open_houses')){
            $data["open_houses"] = 1;
        }
        if($request->has('pending_under')){
            $data["pending_under"] = 1;
        }

        if($request->has('min_price')){
            $data["min_price"] = $request->input('min_price');
        }
        if($request->has('max_price')){
            $data["max_price"] = $request->input('max_price');
        }
        if($request->has('beds')){
            $data["beds"] = $request->input('beds');
        }
        $home_types = [];
        if($request->has('houses')){
            $home_types['houses'] = 1;
        }else{
            $home_types['houses'] = 0;
        }
        if($request->has('apartments')){
            $home_types['apartments'] = 1;
        }else{
            $home_types['apartments'] = 0;
        }
        if($request->has('condos')){
            $home_types['condos'] = 1;
        }else{
            $home_types['condos'] = 0;
        }
        if($request->has('townhomes')){
            $home_types['townhomes'] = 1;
        }else{
            $home_types['townhomes'] = 0;
        }
        if($request->has('manufactured')){
            $home_types['manufactured'] = 1;
        }else{
            $home_types['manufactured'] = 0;
        }
        if($request->has('lots_land')){
            $home_types['lots_land'] = 1;
        }else{
            $home_types['lots_land'] = 0;
        }

        $data["home_types"] = json_encode($home_types);

        $for_rent = [];
        if($request->has('for_rent')){
            $for_rent['for_rent'] = 1;
        }else{
            $for_rent['for_rent'] = 0;
        }

        if($request->has('recently_sold')){
            $for_rent['recently_sold'] = 1;
        }else{
            $for_rent['recently_sold'] = 0;
        }
        if($request->has('open_houses')){
            $for_rent['open_houses'] = 1;
        }else{
            $for_rent['open_houses'] = 0;
        }
        if($request->has('pending_under')){
            $for_rent['pending_under'] = 1;
        }else{
            $for_rent['pending_under'] = 0;
        }
        $data['for_rent'] = json_encode($for_rent);


        if($request->has('baths')){
            $data['baths'] = $request->input('baths');
        }
        if($request->has('square_feet_min')){
            $data['square_feet_min'] = $request->input('square_feet_min');
        }
        if($request->has('square_feet_max')){
            $data['square_feet_max'] = $request->input('square_feet_max');
        }
        if($request->has('lot_size')){
            $data['lot_size'] = $request->input('lot_size');
        }
        if($request->has('year_built_min')){
            $data['year_built_min'] = $request->input('year_built_min');
        }
        if($request->has('year_built_max')){
            $data['year_built_max'] = $request->input('year_built_max');
        }

        if($request->has('max_hoa')){
            $data['max_hoa'] = $request->input('max_hoa');
        }
        if($request->has('days_on_zillow')){
            $data['days_on_zillow'] = $request->input('days_on_zillow');
        }

        if($request->has('keywords')){
            $data['keywords'] = $request->input('keywords');
        }



        DB::table('property')->where('user_id',$user_id)->where('id',$id)->update($data);

        if($request->hasfile('photo')){
            $this->validate($request, [
                'photo' => 'required',
                'photo.*' => 'mimes:jpg,JPEG,jpeg,png,gif,svg'
            ]);
            $dirName = public_path('/storage').'/uploads/property/';
            $nameArray = scandir($dirName,1);
            foreach ($nameArray as $name){
                $pos = strpos($name,'-');
                if($pos !=false){
                    $realid = substr($name,0,$pos);
                    if($id == $realid){
                        unlink(public_path('/storage').'/uploads/property/'.$name);
                    }
                }
            }
            $count = 0;
            foreach ($request->file('photo')as $file){
                $count += 1;
                $fileName = $id."-".$count.'.'.$file->getClientOriginalExtension();
                echo $fileName;
                $file->move(public_path('/storage').'/uploads/property/',$fileName);
            }
        }
        return Redirect::route('properties');

    }

    public function propertyPage(Request $request){
        if(!Session::get('useremail')) return Redirect('/');
        $useremail = Session::get('useremail');
        $username = Session::get('username');

        $row = DB::table('user')->where('username',$username)->where('email',$useremail)->get();

        $properties = DB::table('property')->where('user_id',$row[0]->id)->paginate(5);
        $dirName = public_path('/storage').'/uploads/property/';
        $nameArray = scandir($dirName,1);
        foreach ($properties as $property) {
            $count = 0;
            $realNameArray = array();
            foreach ($nameArray as $name){
                $pos = strpos($name,'-');
                if($pos !=false){
                    $realid = substr($name,0,$pos);
                    if($property->id == $realid){
                        $realNameArray[$count] = $name;
                        $count ++;
                    }
                }
            }

            $property->files = $realNameArray;
        }
        return view('business/property_page',['properties'=>$properties]);
    }

    public function propertyDetail(Request $request){
        if(!Session::get('useremail')) return Redirect('/');
        $id = $request->input('property_id');
        $property = DB::table('property')->where('id',$id)->get();
        $dirName = public_path('/storage').'/uploads/property/';
        $nameArray = scandir($dirName,1);
        $realNameArray = array();
        $count = 0;
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            if($pos !=false){
                $realid = substr($name,0,$pos);
                if($property[0]->id == $realid){
                    $realNameArray[$count] = $name;
                    $count ++;
                }
            }
        }

        $property[0]->files = $realNameArray;
        $username = Session::get('username');
        return view('business/property_detail',['property'=>$property,'username'=>$username]);
    }

    public function propertyRemove(Request $request){
        if(!Session::get('useremail')) return Redirect('/');
        $id = $request->input('property_id');
        DB::table('property')->where('id',$id)->delete();
        $dirName = public_path('/storage').'/uploads/property/';
        $nameArray = scandir($dirName,1);
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            if($pos !=false){
                $realid = substr($name,0,$pos);
                if($id == $realid){
                    unlink(public_path('/storage').'/uploads/property/'.$name);
                }
            }
        }
        return Redirect::route('business/properties');
    }

    public function propertyEdit(Request $request){
        if(!Session::get('useremail')) return Redirect('/');
        $id = $request->input('property_id');
        $property = DB::table('property')->where('id',$id)->get();

        $dirName = public_path('/storage').'/uploads/property/';
        $nameArray = scandir($dirName,1);
        $realNameArray = array();
        $count = 0;
        foreach ($nameArray as $name){
            $pos = strpos($name,'-');
            if($pos !=false){
                $realid = substr($name,0,$pos);
                if($property[0]->id == $realid){
                    $realNameArray[$count] = $name;
                    $count ++;
                }
            }
        }

        $property[0]->files = $realNameArray;


        return view('business/edit_property',['property'=>$property[0]]);
    }

    public function search(Request $request){
        if(!Session::get('useremail')) return Redirect('/');
        $id = $request->input('property_id');
        $property = DB::table('property')->where('id',$id)->get();
        return view('business/search_result',['property'=>$property[0]]);
    }

    public function searchResult(Request $request){
        if(!Session::get('useremail')) return Redirect('/');
        $params = array(
            'spt' => 'homes',
            'status' => '000000',
            'lt' => '000000',
            'ht' => '000000',
            'pr' => ',',
            'mp' => ',',
            'bd' => '0,',
            'ba' => '0',
            'sf' => ',',
            'lot' => '0',
            'yr' => ',',
            'singlestory' => '0',
            'hoa' => '0,',
            'pho' => '0',
            'pets' => '0',
            'parking' => '0',
            'laundry' => '0',
            'income-restricted' => '0',
            'fr-bldg' => '0',
            'condo-bldg' => '0',
            'furnished-apartments' => '0',
            'cheap-apartments' => '0',
            'studio-apartments' => '0',
            'pnd' => '0',
            'red' => '0',
            'zso' => '0',
            'att' => '',
            'days' => 'any',
            'ds' => 'all',
            'pmf' => '0',
            'pf' => '0',
            'sch' => '100111',
            'zoom' => '12',
            'rect' => '-88283601,42500358,-88206697,42538820',
            'p' => '1',
            'sort' => 'globalrelevanceex',
            'search' => 'maplist',
            'listright' => 'true',
            'isMapSearch' => 'true',
            'zoom' => '12',
        );

        if($request->has('rect')){
            $params['rect'] = $request->input('rect');
        }

        $params['p'] = $request->input('page');
        $by_agent = '0';
        if ($request->input('by_agent') == 'true'){
            $by_agent = '1';
        }

        $params['pr'] = $request->input('price_range');
        $by_owner = '0';
        if ($request->input('by_owner') == 'true'){
            $by_owner = '1';
        }

        $new_construction = '0';
        if ($request->input('new_construction') == 'true'){
            $new_construction = '1';
        }
        $foreclosures = '0';
        if ($request->input('foreclosures') == 'true'){
            $foreclosures = '1';
        }

        $coming_soon = '0';
        if ($request->input('coming_soon') == 'true'){
            $coming_soon = '1';
        }


        if ($request->input('foreclosed') == 'true'){
            $params['pmf'] = '1';
        }
        if ($request->input('pre_foreclosure') == 'true'){
            $params['pf'] = '1';
        }
        $make_me_move = '0';
        if ($request->input('make_me_move') == 'true'){
            $make_me_move = '1';
        }

        $for_rent = '0';
        if ($request->input('for_rent') == 'true'){
            $for_rent = '1';
        }

        $recently_sold = '0';
        if ($request->input('recently_sold') == 'true'){
            $recently_sold = '1';
        }

        $open_houses = '0';
        if ($request->input('open_houses') == 'true'){
            $open_houses = '1';
        }

        $pending_under = '0';
        if ($request->input('pending_under') == 'true'){
            $pending_under = '1';
        }
        $params['lt'] = $by_agent.$by_owner.$foreclosures.$new_construction.$open_houses.$coming_soon;

        $params['status'] = '1'.$make_me_move.$recently_sold.'0'.$for_rent.'0';

        $params['pnd'] = $pending_under;

        $houses = '0';
        if ($request->input('houses') == 'true'){
            $houses = '1';
        }
        $apartments = '0';
        if ($request->input('apartments') == 'true'){
            $apartments = '1';
        }
        $condos = '0';
        if ($request->input('condos') == 'true'){
            $condos = '1';
        }
        $townhomes = '0';
        if ($request->input('townhomes') == 'true'){
            $townhomes = '1';
        }
        $manufactured = '0';
        if ($request->input('manufactured') == 'true'){
            $manufactured = '1';
        }
        $lots_land = '0';
        if ($request->input('lots_land') == 'true'){
            $lots_land = '1';
        }
        $params['ht'] = $houses.$condos.$apartments.$manufactured.$lots_land.$townhomes;

        $params['bd'] = $request->input('beds') . ',';
        $params['ba'] = $request->input('baths') . ',';
        $square_feet_min = '';
        if($request->has('square_feet_min')){
            $square_feet_min = $request->input('square_feet_min');
        }
        $square_feet_max = '';
        if($request->has('square_feet_max')){
            $square_feet_max = $request->input('square_feet_max');
        }
        $params['sf'] = $square_feet_min.','.$square_feet_max;
        $params['lot'] = $request->input('lot_size') . ',';

        $year_built_min = '';
        if($request->has('year_built_min')){
            $year_built_min = $request->input('year_built_min');
        }
        $year_built_max = '';
        if($request->has('year_built_max')){
            $year_built_max = $request->input('year_built_max');
        }

        $params['yr'] = $year_built_min.','.$year_built_max;

        if($request->input('max_hoa') == '0'){
            $params['hoa'] = '0,';
        }else{
            $params['hoa'] = '0,'.$request->input('max_hoa');
        }

        $params['days'] = $request->input('days_on_zillow');
        if($request->has('keywords')){
            $params['att'] = $request->input('keywords');

        }

        $url = 'https://www.zillow.com/search/GetResults.htm?'.http_build_query($params);

        $command = 'python scrape.py "'.$url.'"';
        $answer = exec($command);
        if($answer == ""){
            echo "error";
            exit;
        }
        echo $answer;
    }

    public function houseDetail(Request $request){
        if(!Session::get('useremail')) return Redirect('/');

        $zpid = $request->input('zpid');

        $command = 'python detail.py "'.$zpid.'"';
        $answer = exec($command);
        $json_array = json_decode($answer);

        return view('business/house_detail',['detail'=>$json_array->data]);
    }

    public function getUserID(){
        $useremail = Session::get('useremail');
        $username = Session::get('username');
        $row = DB::table('user')->where('username',$username)->where('email',$useremail)->get();

        return $row[0]->id;

    }

    public function addCart(Request $request){
        if(!Session::get('useremail')) return Redirect('/');
        $jsondata = $request->input('house_data');
        $user_id = $this->getUserID();
        $data['user_id'] = $user_id;
        $data['data'] = $jsondata;
        try{
            $row = DB::table('user_cart')->where('user_id',$user_id)->where('data',$jsondata)->get();
            if(count($row) > 0){
                echo "dup";
            }else{
                DB::table('user_cart')->insert($data);
                echo "success";
            }
            exit;
        }catch (\Exception $exception){
            echo "error";
            exit;

        }
    }


    public function removeCart(Request $request){
        if(!Session::get('useremail')) return Redirect('/');
        $id = $request->input('id');
        DB::table('user_cart')->where('id',$id)->delete();
        echo "success";

    }

    public function watchListPage(Request $request){
        if(!Session::get('useremail')) return Redirect('/');
        $id = $this->getUserID();
        $rows = DB::table('user_cart')->where('user_id',$id)->get();

        return view('business/user_list_view',['lists'=>$rows]);

    }

}
