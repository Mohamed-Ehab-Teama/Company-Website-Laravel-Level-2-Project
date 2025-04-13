<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscriberRequest;
use App\Http\Resources\SubscriberResource;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::latest()->get();
        if (count($subscribers) > 0 )
        {
            return ApiResponse::sendResponse(200, "Subscribers Retrieved Successfully", SubscriberResource::collection($subscribers));
        }
        return ApiResponse::sendResponse(200, "No Subscribers Found", []);

    }



    public function store(StoreSubscriberRequest $request)
    {
        $data = $request->validated();

        $addSubscriber = Subscriber::create($data);

        if($addSubscriber)
        {
            return ApiResponse::sendResponse(201, "Subscribed Successfully", []);
        }
    }
}
