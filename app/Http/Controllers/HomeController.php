<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Repositories\ResponseRepository;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
    }
    public function getHomeSection(){
   
      return $this->response->jsonResponse(false,"Home Content Fetched Successfully",Home::all(), 200);

    }


   




  public function updateHomeSectionOne(Request $request){
  
   Log::info($request);
  

   $HomeSectionOne = Home::firstOrNew();

   
    return $this->response->jsonResponse(false,'update home section Successfully',  $HomeSectionOne->update([
      

      $HomeSectionOne->POne_SecOne_TxtOne = is_null($request->POne_SecOne_TxtOne) ?  $HomeSectionOne->POne_SecOne_TxtOne : $request->POne_SecOne_TxtOne,
  
      $HomeSectionOne->POne_SecOne_TxtTwo = is_null($request->POne_SecOne_TxtTwo) ?  $HomeSectionOne->POne_SecOne_TxtTwo : $request->POne_SecOne_TxtTwo,
      $HomeSectionOne->POne_SecOne_Img = is_null($request->POne_SecOne_Img) ?  $HomeSectionOne->POne_SecOne_Img : $request->POne_SecOne_Img,
      
     $HomeSectionOne->POne_SecTwo_Txt = is_null($request->POne_SecTwo_Txt) ?  $HomeSectionOne->POne_SecTwo_Txt : $request->POne_SecTwo_Txt,
     
      $HomeSectionOne->POne_SecTwo_Img = is_null($request->POne_SecTwo_Img) ?  $HomeSectionOne->POne_SecTwo_Img : $request->POne_SecTwo_Img,
    
      $HomeSectionOne->POne_SecThree_ImgOne = is_null($request->POne_SecThree_ImgOne) ?  $HomeSectionOne->POne_SecThree_ImgOne : $request->POne_SecThree_ImgOne,
     
      $HomeSectionOne->POne_SecThree_ImgTwo_sub_one = is_null($request->POne_SecThree_ImgTwo_sub_one) ?  $HomeSectionOne->POne_SecThree_ImgTwo_sub_one : $request->POne_SecThree_ImgTwo_sub_one,
      $HomeSectionOne->	POne_SecThree_ImgTwo_sub_two = is_null($request->	POne_SecThree_ImgTwo_sub_two) ?  $HomeSectionOne->	POne_SecThree_ImgTwo_sub_two : $request->	POne_SecThree_ImgTwo_sub_two,
      $HomeSectionOne->	POne_SecThree_ImgTwo_sub_three = is_null($request->	POne_SecThree_ImgTwo_sub_three) ?  $HomeSectionOne->	POne_SecThree_ImgTwo_sub_three : $request->	POne_SecThree_ImgTwo_sub_three,
      
      $HomeSectionOne->POne_SecThree_ImgThree = is_null($request->POne_SecThree_ImgThree) ?  $HomeSectionOne->POne_SecThree_ImgThree : $request->POne_SecThree_ImgThree,
   
      $HomeSectionOne->POne_SecThree_Txt = is_null($request->POne_SecThree_Txt) ?  $HomeSectionOne->POne_SecThree_Txt : $request->POne_SecThree_Txt,
      $HomeSectionOne->POne_SecThree_ImgFour = is_null($request->POne_SecThree_ImgFour) ?  $HomeSectionOne->POne_SecThree_ImgFour : $request->POne_SecThree_ImgFour,
      $HomeSectionOne->POne_SecFour_Txt = is_null($request->POne_SecFour_Txt) ?  $HomeSectionOne->POne_SecFour_Txt : $request->POne_SecFour_Txt,
      $HomeSectionOne->POne_SecFour_Img = is_null($request->POne_SecFour_Img) ?  $HomeSectionOne->POne_SecFour_Img : $request->POne_SecFour_Img,
         ]), 201);
    
    

   
}

public function updateHomeSectionOneImage(Request $request)
{
    $SectionOneImage = Home::first();
    if($request->hasFile('image')) {
        $uploadUrl = $this->response->cloudinaryImage($request->file('image'), 'home','section_one_main_image');
        Log::info('url = '.$uploadUrl);
        return $this->response->jsonResponse(false, 'Home image uploaded successfully', Home::first()->update(['POne_SecOne_Img' => $uploadUrl]), 201);
   } else {
        return $this->response->jsonResponse(true, 'Image Size is too high', [], 202);
    }
}

}
