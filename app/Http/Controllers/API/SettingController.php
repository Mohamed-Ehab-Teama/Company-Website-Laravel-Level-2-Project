<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        // dd("We are in Setting Controller API");

        // $settings = Setting::findOrFail(1);
        // return new SettingResource($settings);
        
        // $settings = Setting::get();
        // return SettingResource::collection($settings);

        // return $settings;

        $settings = Setting::find(1);
        if($settings)
        {
            return ApiResponse::sendResponse(200, "Settings Data Retrieved Successfully", new SettingResource($settings) );
        }
        return ApiResponse::sendResponse(200, "No Data Found", [] );

    }
}
