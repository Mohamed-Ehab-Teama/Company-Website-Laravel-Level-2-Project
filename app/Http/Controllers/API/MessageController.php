<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::all();
        if ( count($messages) > 0 )
        {
            return ApiResponse::sendResponse(200, 'Messages Retrieved Successfully', MessageResource::collection($messages));
        }
        return ApiResponse::sendResponse(200, 'No Messages Found', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRequest $request)
    {
        $data = $request->validated();
        $createMessage = Message::create($data);
        if($createMessage)
        {
            return ApiResponse::sendResponse(201, "Created Successfully", []);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $message = Message::findOrFail($id);
        if ($message)
        {
            return ApiResponse::sendResponse(200, "Message retrieved Successfully", new MessageResource($message));
        }
        return ApiResponse::sendResponse(404, "Message Not Existed", []);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = Message::findOrFail($id);

        $deleteMessage = $message->delete();

        if ($deleteMessage)
        {
            return ApiResponse::sendResponse(200, "Deleted Successfully", []);
        }

    }
}
