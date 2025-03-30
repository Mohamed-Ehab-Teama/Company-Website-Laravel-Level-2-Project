<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiResponse;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\ServiceRequest;

class StoreServiceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ServiceRequest $request)
    {
        $data = $request->validated();
        $createService = Service::create($data);
        if ($createService)
        {
            return ApiResponse::sendResponse(201, " Service Created Successfully ", [] );
        }
    }
}
