<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreServiceRequest;
use App\Http\Requests\API\UpdateServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->paginate(4);
        if( count($services) > 0 )
        {
            if( $services->total() > $services->perPage() )
            {
                $data = [
                    'records' => ServiceResource::collection($services),
                    'pagination_links' => [
                        'current_page' => $services->currentPage(),
                        'per_page' => $services->perPage(),
                        'total' => $services->total(),
                        'links' => [
                            'first' => $services->url(1),
                            'last' => $services->url($services->lastPage()),
                        ],
                    ],
                ];
            }
            else{
                $data = ServiceResource::collection($services);
            }

            return ApiResponse::sendResponse(200, 'Services Retrieved Successfully', $data);
        }

        return ApiResponse::sendResponse(200, 'No Services Avaliable', []);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        $data = $request->validated();
        $service = Service::create($data);
        if ($service)
        {
            return ApiResponse::sendResponse(201, "Record Created Successfully", []);
        }
    }


    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Service::find($id);
        if ($service)
        {
            return ApiResponse::sendResponse(200, " Service Retrieved Successfully ", new ServiceResource($service));
        }
        return ApiResponse::sendResponse(200, "No Service Found", []);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, string $id)
    {
        $service = Service::findOrFail($id);
        $data = $request->validated();

        $updating = $service->update($data);

        if ($updating)
        {
            return ApiResponse::sendResponse(201, "Updated Successfully", new ServiceResource($service));
        }
        
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);

        $deleting = $service->delete();

        if( $deleting )
        {
            return ApiResponse::sendResponse(200, "Deleted Successfully", []);
        }

        return ApiResponse::sendResponse(404, "Service Not Found", []);
    }
}
