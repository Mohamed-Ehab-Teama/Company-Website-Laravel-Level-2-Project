<?php

namespace App\Http\Controllers\API;

use App\Models\Testimonial;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\TestimonialResource;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use Spatie\FlareClient\Api;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        if (count($testimonials) > 0) {
            return ApiResponse::sendResponse(200, "Testimonials Retrieved Successfully", TestimonialResource::collection($testimonials));
        }
        return ApiResponse::sendResponse(200, "No Testimonials Found", []);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestimonialRequest $request)
    {
        $data = $request->validated();

        // Get Image
        $image = $request->image;
        // 2- Change image name
        $newImageName = time() . '-' . $image->getClientOriginalName();
        // 3- Move image to my project
        $image->storeAs('testimonials', $newImageName, 'public');
        // 4- save new name to database record
        $data['image'] = $newImageName;

        $createTestimonials = Testimonial::create($data);
        if ($createTestimonials) {
            return ApiResponse::sendResponse(201, "Created Successfully", $data);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $testimonial = Testimonial::find($id);
        if ($testimonial) {
            return ApiResponse::sendResponse(200, "Testimonial Retrieved Successfully", new TestimonialResource($testimonial));
        }
        return ApiResponse::sendResponse(200, "No Testimonials Found", []);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestimonialRequest $request, string $id)
    {
        $data = $request->validated();

        $testimonial = Testimonial::findOrFail($id);

        if( $request->hasFile('image') )
        {
            // 0- Delete The old Image
            Storage::delete("public/testimonials/$testimonial->image");
            // 1- Get Image
            $image = $request->image;
            // 2- Change image name
            $newImageName = time() . '-' . $image->getClientOriginalName();
            // 3- Move image to my project
            $image->storeAs('testimonials', $newImageName, 'public');
            // 4- save new name to database record
            $data['image'] = $newImageName;
        }

        $updateTestimonial = $testimonial->update($data);

        if($updateTestimonial){
            return ApiResponse::sendResponse(201, "Updated Successfully", $testimonial);
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $del = $testimonial->delete();
        if ( $del )
        {
            return ApiResponse::sendResponse(200, "Deleted Successfully", []);
        }
    }
}
