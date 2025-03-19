<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::paginate(config('pagination.count'));
        return view('admin.members.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.members.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request)
    {
        $member = $request->validated();

        // 1- Get Image
        $image = $request->image;
        // 2- Change image name
        $newImageName = time() . '-' . $image->getClientOriginalName();
        // 3- Move image to my project
        $image->storeAs('members', $newImageName, 'public');
        // 4- save new name to database record
        $member['image'] = $newImageName;

        Member::create($member);
        return to_route('admin.members.index', get_defined_vars())->with('success', __('keywords.created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        return view('admin.members.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('admin.members.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            // 0- Delete The old Image
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

        $member->update($data);
        return to_route('admin.members.index', get_defined_vars())->with('success', __('keywords.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return to_route('admin.members.index', get_defined_vars())->with('success', __('keywords.deleted_successfully'));
    }
}
