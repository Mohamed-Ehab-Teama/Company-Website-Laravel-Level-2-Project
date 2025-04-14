<?php

namespace App\Http\Controllers\API;

use App\Models\Member;
use Spatie\FlareClient\Api;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MemberResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreMemberRequest;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::get();
        if (count($members) > 0) {
            return ApiResponse::sendResponse(200, "Memebrs Retrieved Successfully", MemberResource::collection($members));
        }
        return ApiResponse::sendResponse(200, "No Memebrs Found", []);
    }


    public function store(StoreMemberRequest $request)
    {
        $data = $request->validated();

        // Get Image
        $image = $request->image;
        // Change Image Name
        $newImageName = time() . '-' . $image->getClientOriginalName();
        // Move the image to my project
        $image->storeAs('members', $newImageName, 'public');
        // Add the new Image
        $data['image'] = $newImageName;

        $createMember = Member::create($data);

        if ($createMember) {
            return ApiResponse::sendResponse(201, "Member Created Successfully", []);
        }
    }


    public function show(string $id)
    {
        $member = Member::findOrFail($id);
        if ($member) {
            return ApiResponse::sendResponse(200, "Memebr Retrieved Successfully", new MemberResource($member));
        }
        return ApiResponse::sendResponse(404, "Memebr Not Found", []);
    }


    public function update(StoreMemberRequest $request, string $id)
    {
        $data = $request->validated();
        $member = Member::findOrFail($id);

        if ($request->hasFile('image')) 
        {
            // Delete the image from my project
            Storage::delete("public/members/$member->image");
            // 1- Get Image
            $image = $request->image;
            // 2- Change image name
            $newImageName = time() . '-' . $image->getClientOriginalName();
            // 3- Move image to my project
            $image->storeAs('members', $newImageName, 'public');
            // 4- save new name to database record
            $data['image'] = $newImageName;
        }

        $updateMember = $member->update($data);
        if ($updateMember) 
        {
            return ApiResponse::sendResponse(201, "Memebr Updated Successfully", []);
        }
        return ApiResponse::sendResponse(201, "Memebr Not Found", []);
    }


    public function destroy(string $id)
    {
        $member = Member::findOrFail($id);
        $deleteMember = $member->delete();

        if($deleteMember)
        {
            return ApiResponse::sendResponse(200, "Memebr deleted Successfully", []);
        }
    }
}
