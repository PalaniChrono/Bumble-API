<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controller\HomeController;
use App\Http\Controller\CourseController;

Route::get('set', function () {
    Artisan::call('optimize');
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    return "Optimization Cache is set";
});
Route::get('clear', function () {
    Artisan::call('optimize:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    // Artisan::call('composer:autoload');

    return "Optimization Cache is Cleared";
});

//Ecommerce Admin Panel
Route::get('hb', 'UserController@hb');
//HomeSection
Route::get('/getHomeSection', 'HomeController@getHomeSection');
Route::put('/updateHomeSectionOne','HomeController@updateHomeSectionOne');
Route::put('/updateHomeSectionOneImage','HomeController@updateHomeSectionOneImage');


//CourseSection
Route::get('/getCourseSection', 'CourseController@getCourseSection');
Route::put('/updateCourseSectionOne','CourseController@updateCourseSectionOne');

//OtherCourseSection
Route::get('/getOtherCourseSection', 'OtherCourseController@getOtherCourseSection');
Route::put('/updateOtherCourseSectionOne','OtherCourseController@updateOtherCourseSectionOne');
Route::put('/updateOtherCourseSectionTwo','OtherCourseController@updateOtherCourseSectionTwo');
Route::put('/updateOtherCourseSectionThree','OtherCourseController@updateOtherCourseSectionThree');

//TrainerSection
Route::get('/getTrainerSection', 'TrainerController@getTrainerSection');
Route::put('/updateTrainerSectionOne','TrainerController@updateTrainerSectionOne');
// Route::post('/updateImage','TrainerController@imageUpload');


//LashtalkSection
Route::get('/getLashtalkSection', 'LashtalkController@getLashtalkSection');
Route::put('/updateLashtalkSectionOne','LashtalkController@updateLashtalkSectionOne');



//ContactSection
Route::get('/getContactSection', 'ContactController@getContactSection');
Route::put('/updateContactSectionOne','ContactController@updateContactSectionOne');


//TestimonySection
Route::get('/getTestimony', 'TestimonyController@getTestimony');
Route::get('getTestimonyById/{id}', 'TestimonyController@getTestimonyById');
Route::put('updateTestimony','TestimonyController@updateTestimony');
Route::post('/updateImageById','TestimonyController@imageUpload');
Route::post('storeTestimony', 'TestimonyController@storeTestimony');

//NewTestimonySection
Route::apiResource('newTestimony', 'NewTestimonyController');
Route::get('getAllTestimony', 'NewTestimonyController@getAllTestimony');
Route::get('getActiveAllTestimony', 'NewTestimonyController@getActiveAllTestimony');
Route::get('newTestimonySwitch/{id}', 'NewTestimonyController@newTestimonySwitch');
Route::get('searchCategory/{search}', 'NewTestimonyController@searchCategory');
Route::post('imageUpdateTestimony', 'NewTestimonyController@imageUpdateTestimony');

//bumbleHome
Route::get('/getHomeBanner','BumbleController@getHomeBanner');

Route::post('/updateImage','BumbleController@updateHomeBanner');
Route::get('/getHomeContent','BumbleHomeCardController@getHomeContent');
Route::put('/updateHomeCard1','BumbleHomeCardController@updateHomeCard1');
Route::put('/updateHomeCard2','BumbleHomeCardController@updateHomeCard2');
Route::put('/updateHomeCard3','BumbleHomeCardController@updateHomeCard3');
Route::put('/updateHomeBanner','BumbleController@BumbleController');
Route::put('/updateHometextarea','BumbleHomeCardController@updateHometextarea');

// gallery
Route::get('/getgallerycontent','gallerycontroller@getgallerycontent');
Route::put('/updateGallery','gallerycontroller@updateGallery');
Route::put('/updateWeddingText','gallerycontroller@updateWeddingText');
Route::put('/updateOutdoorsText','gallerycontroller@updateOutdoorsText');
Route::put('/updateBabywashText','gallerycontroller@updateBabywashText');
Route::put('/updateAllText','gallerycontroller@updateAllText');


// services
Route::get('/getServicescontent','servicesController@getServicescontent');

Route::put('/updateServicestext','servicesController@updateServicestext');

Route::post('/storecareers','careersController@storecareers');
Route::get('/getcareers','careersController@getcareers');
//bookus
Route::post('/storebookus','bookusController@storebookus');
Route::get('/getbookus','bookusController@getbookus');
Route::post('/storehomebookus','bookusController@storehomebookus');
Route::get('/gethomebookus','bookusController@gethomebookus');
Route::get('getbookusById/{id}', 'bookusController@getbookusById');

//extra event
Route::get('/getextraevent','ExtraEventDetailsController@getextraevent');
Route::post('/storeextraevent','ExtraEventDetailsController@storeextraevent');







//User
Route::post('loginUser', 'UserController@loginUser');

Route::post('upload',[careersController::class,'index']);


Route::group(['middleware' => 'auth:sanctum'], function() {
    //User
    Route::apiResource('user','UserController');
    Route::apiResource('dispatch','DispatchController');

    Route::get('dispatchSwitch/{id}', 'DispatchController@dispatchSwitch');
    // Route::post('loginDispatch', 'DispatchController@loginDispatch');

    Route::get('adminDashboard', 'DashboardController@adminDashboard');

});
