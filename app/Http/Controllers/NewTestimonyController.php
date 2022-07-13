<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewTestimony;
use Illuminate\Support\Facades\Log;
use App\Repositories\ResponseRepository;


class NewTestimonyController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
        $this->storeRules = [
            'author' => 'required',
            'testimony_description' => 'required',
            // 'testimony_image' => 'required',


        ];
    }

    public function findCategory($id) {
        return NewTestimony::find($id);
    }
    public function getAllTestimony(){

        return $this->response->jsonResponse(false,"New Testimony Content Fetched Successfully",NewTestimony::orderBy('id', 'desc')->get(), 200);

      }
      public function getActiveAllTestimony(){

        return $this->response->jsonResponse(false,"New Testimony Content Fetched Successfully",NewTestimony::where('active_status', 1)->orderBy('id', 'desc')->get(), 200);

      }

      public function store(Request $request)
      {
          $validate = $this->response->validate($request->all(), $this->storeRules);
          if($validate === true) {
              return $this->response->jsonResponse(false, $this->response->message('New Testimony', 'store'), NewTestimony::create($request->all()), 200);
          } else {
              return $validate;
          }
      }
      public function update(Request $request, $id)
      {
          $validate = $this->response->validate($request->all(), [
              'author' => 'required',
              'testimony_description' => 'required'
          ]);
          if($validate === true) {
              return $this->response->jsonResponse(false, $this->response->message('New Testimony', 'update'), $this->findCategory($id)->update($request->all()), 200);
          } else {
              return $validate;
          }
      }
  
      public function show($id)
      {
          return $this->response->jsonResponse(false, $this->response->message('newTestimony', 'show'), $this->findCategory($id), 200);
      }

      public function newTestimonySwitch($id) {
        $category = $this->findCategory($id);
        if($category) {
            $value = $category->active_status === 1 ? 0 : 1;
            $msg = $value === 0 ? 'Deactivated': 'Activated';
            return $this->response->jsonResponse(false, 'New Testimony '.$msg.' SuccessFully', $category->update(['active_status' => $value]), 200);
        }
        return $this->response->jsonResponse(true, 'New Testimony  Not Exists',[], 201);
    }
    public function destroy($id)
    {
        $category = $this->findCategory($id);
        if($category) {
            return $this->response->jsonResponse(false, $this->response->message('New Testimony', 'destroy'), $category->delete(), 200);
        }
        return $this->response->jsonResponse(true, 'New Testimony Not Exists',[], 201);
    }

     //image update for testimony_image
     public function imageUpdateTestimony(Request $request)
     {
         $getCategory = $this->findCategory($request['category_id']);
         if($request->hasFile('category_image')) {
             $uploadUrl = $this->response->cloudinaryImage($request->file('category_image'), 'testimony', $getCategory->category_slug);
             return $this->response->jsonResponse(false, $this->response->message('Testimony', 'image'), $getCategory->update(['testimony_image' => $uploadUrl]), 201);
         } else {
             return $this->response->jsonResponse(true, 'Image Size is too high', [], 201);
         }
     }
 
}
