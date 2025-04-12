<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::findOrFail(1);
        if ($setting)
        {
            return ApiResponse::sendResponse(200, "Settings Retrieved Successfully", new SettingResource($setting));
        }
        return ApiResponse::sendResponse(404, "Something Went Wrong", []);
    }

    public function update(StoreSettingRequest $request)
    {
        $setting = Setting::findOrFail(1);
        $data = $request->validated();

        $updateSetting = $setting->update($data);

        if ($updateSetting)
        {
            return ApiResponse::sendResponse(201, "Settings Updated Successfully", new SettingResource($setting));
        }
    }
}
