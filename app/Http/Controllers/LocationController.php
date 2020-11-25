<?php

namespace App\Http\Controllers;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\Media;
use Auth;
class LocationController extends Controller
{
    public $location;
    public function __construct()
    {
        $this->location = new Location();
    }

    public function index(){
        $locations = $this->location->list_locations();
        return view('admin.location.index', compact(['locations']));
    }

    /**
     * @param Request $req
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $req)
    {
        
        $this->validate($req, [
            'country' => ['required','unique:location,country,'. $req -> id],
            'country_code' => 'required|max:190',
            'thumbnail' => 'required',
        ], [
            'country.required' => 'Country field need filled',
            'country.max'=>'Country need less than 190 characters',
            'country_code.required' => 'Country code field need filled',
            'country_code.max'=>'Country code need less than 190 characters',
            'thumbnail' => 'Thumbnail field need filled',
        ]);
        $files = $req->file('thumbnail');
        if ($files) {
            foreach ($files as $file) {
                $fc = new FileController();
                $store_info = $fc->store_file($file);
                if($store_info->id){
                    $req['media_id'] =  $store_info->id;
                }else{
                   $req['media_id'] = null;
                }
            }
        }
        $data =$req->toArray();
        $res = $this->location->_update($data);
        return redirect()->back();
    }
    /**
     * @param Request $req
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function delete(Request $req)
    {
        if($req->id){
            $status =  $this->location->_delete($req->id);
           return redirect()->back();
        }
        return redirect()->back();
    }
    /**
    * @author khaihoangdev@gmail.com
    * @desc this return a list of countries in json format
    * @return json
    * @time 16h:03/12/2018
    */
    public function _countries(){

    }
    /**
    * @author khaihoangdev@gmail.com
    * @desc this return a list of states in json format
    * @requries country name
    * @return json
    * @time 16h:03/12/2018
    */
    public function _states(Request $req){
      $data = $req->toArray();
      if(array_key_exists("_country",$data)){
        $country = trim($data["_country"]);
        $states = $this->location->_states($country);
        $cities = $this->location->_cities(["_country"=>$country,"_state"=>""]);
        return Response()->json(["states" => $states, "cities" => $cities]);
      }

    }
    /**
    * @author khaihoangdev@gmail.com
    * @desc this return a list of states in json format
    * @requries sate or country name
    * @return json
    * @time 16h:03/12/2018
    */
    public function _cities(Request $req){
      $data = $req->toArray();
      if(array_key_exists("_state",$data) && array_key_exists("_country",$data) ){
        $state = trim($data["_state"]);
        $country = trim($data["_country"]);
        $cities = $this->location->_cities(["_country"=>$country,"_state"=>$state]);
        
        return Response()->json(["cities"=>$cities]);
      }

    }
}
