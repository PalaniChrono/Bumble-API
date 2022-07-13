<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\bookus;
use App\Models\homebookus;
use App\Models\ExtraEventDetails;
use App\Repositories\ResponseRepository;

class bookusController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
        $this->storeRules = [
            'bride_name'=> 'required',
            'groom_name' => 'required',
            // 'event_name' => 'required',
            // 'event_date' => 'required',
            // 'event_time' => 'required',
            // 'venue' => 'required',
            // 'city' => 'required',
            'enquire_name' => 'required',
            'enquire_mobile_no' => 'required',
            // 'email_id' => 'required',


        ];
        $this->homeBookusStoreRules = [

            'name' => 'required',
            'mobile' => 'required',



        ];
    }
    public function storebookus(Request $request)
    {
        $validate = $this->response->validate($request->all(), $this->storeRules);
        if($validate === true) {
            $input = $request->all();
            Log::info("input = ".json_encode($input));

            $create = bookus::create([
                 'bride_name' => $input['bride_name'] ,
                 'groom_name'=> $input['groom_name'],
                 'enquire_name'=> $input['enquire_name'],
                 'enquire_mobile_no'=> $input['enquire_mobile_no'],
                 'email_id'=> $input['email_id']

             ])->latest('id')->first();

            $appointmentId = $create->id;

            $variationId = [];
            if($create){
                foreach ($input['variation'] as $variation) {
                    $productVariation =  ExtraEventDetails::create([
                        'book_us_id' => $appointmentId,
                         'event_name' => $variation['event_name'],
                         'event_date'=> $variation['event_date'],
                         'event_time' => $variation['event_time'],
                         'venue' => $variation['venue'],
                         'city' => $variation['city'],
                        //  'enquire_name' => $variation['enquire_name'],
                        //  'enquire_mobile_no' => $variation['enquire_mobile_no'],
                        //  'email_id' => $variation['email_id']
                     ]);

                 }
            }
        return $this->response->jsonResponse(false, 'Book Event Created Successfully',$create,$productVariation, 205);

        } else {
            return $validate;
        }
    }

    public function getbookus(){
        return $this->response->jsonResponse(false,"Testimony Content Fetched Successfully",bookus::with('extraevent')->orderBy('id', 'desc')->get(), 200);
      }

      public function getbookusById($id){
      $data['extradetails'] = ExtraEventDetails::where('book_us_id', $id)->get();
      $data['perosndetails'] = bookus::where('id', $id)->first();

        return $this->response->jsonResponse(false,"Testimony Content Fetched Successfully",$data, 200);

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
