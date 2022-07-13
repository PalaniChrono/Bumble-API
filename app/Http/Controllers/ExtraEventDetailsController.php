<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\bookus;
use App\Models\ExtraEventDetails;
use App\Repositories\ResponseRepository;

class ExtraEventDetailsController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
        $this->storeRules = [
            'bride_name'=> 'required',
            'groom_name' => 'required',
            'event_name' => 'required',
            'event_date' => 'required',
            'event_time' => 'required',
            'venue' => 'required',
            'city' => 'required',
            'enquire_name' => 'required',
            'enquire_mobile_no' => 'required',
            // 'email_id' => 'required',


        ];
        $this->homeBookusStoreRules = [

            'name' => 'required',
            'mobile' => 'required',



        ];
    }

    public function storeextraevent(Request $request){
        $validate = $this->response->validate($request->all(), $this->storeRules);
        if($validate === true) {
            return $this->response->jsonResponse(false, "Testimony Created Successfully", ExtraEventDetails::create($request->all()), 200);
        } else {
            return $validate;
        }
    }

    public function getextraevent(){

        return $this->response->jsonResponse(false,"Testimony Content Fetched Successfully",ExtraEventDetails::orderBy('event_date', 'desc')->get(), 200);

      }

      public function storehomebookus(Request $request){
        $validate = $this->response->validate($request->all(), $this->homeBookusStoreRules);
        if($validate === true) {
            return $this->response->jsonResponse(false, "Testimony Created Successfully", homebookus::create($request->all()), 200);
        } else {
            return $validate;
        }
    }


    public function gethomebookus(){

        return $this->response->jsonResponse(false,"Testimony Content Fetched Successfully",homebookus::all(), 200);

      }
    //
}
