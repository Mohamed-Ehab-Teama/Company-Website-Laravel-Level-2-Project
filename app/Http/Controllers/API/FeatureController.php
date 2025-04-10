<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreFeatureRequest;
use App\Http\Resources\FeatureResource;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = Feature::latest()->paginate(6);
        if (count($features) > 0) {
            //
            if ($features->total() > $features->perPage()) {
                $data = [
                    'records' => FeatureResource::collection($features),
                    'pagination_links' => [
                        'current_page' => $features->currentPage(),
                        'per_page' => $features->perPage(),
                        'total' => $features->total(),
                        'links' => [
                            'first' => $features->url(1),
                            'last' => $features->url($features->lastPage()),
                        ],
                    ],
                ];

            } 
            else {
                $data = FeatureResource::collection($features);
            }

            return ApiResponse::sendResponse(200, 'Features Retrieved Successfully', $data);
        } 
        else {
            return ApiResponse::sendResponse(200, 'No Features Found', []);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeatureRequest $request)
    {
        $data = $request->validated();
        $feature = Feature::create($data);
        if($feature)
        {
            return ApiResponse::sendResponse(201, "Feature Created Successfully", []);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $feature = Feature::find($id);
        if( $feature )
        {
            return ApiResponse::sendResponse(200, "Feature Retrieved Successfully", new FeatureResource($feature));
        }
        return ApiResponse::sendResponse(404, "Feature Not Found", []);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreFeatureRequest $request, string $id)
    {
        $feature = Feature::findOrFail($id);
        $data = $request->validated();

        $updateFeature = $feature->update($data);
        if ($updateFeature)
        {
            return ApiResponse::sendResponse(201, "Feature Updated Successfully", new FeatureResource($feature));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $feature = Feature::findOrFail($id);
        $deleteFeature = $feature->delete();

        if($deleteFeature)
        {
            return ApiResponse::sendResponse(200, 'Feature Deleted Successfully', []);
        }
    }
}
