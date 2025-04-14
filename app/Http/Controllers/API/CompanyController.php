<?php

namespace App\Http\Controllers\API;

use App\Models\Company;
use Spatie\FlareClient\Api;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comapnies = Company::get();
        if (count($comapnies) > 0) {
            return ApiResponse::sendResponse(200, 'Companies Retrieved Successfully', CompanyResource::collection($comapnies));
        }
        return ApiResponse::sendResponse(200, 'No Companies Found', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        $data = $request->validated();


        // 1- Get Image
        $image = $request->image;
        // 2- Change image name
        $newImageName = time() . '-' . $image->getClientOriginalName();
        // 3- Move image to my project
        $image->storeAs('companies', $newImageName, 'public');
        // 4- save new name to database record
        $data['image'] = $newImageName;

        $createCompany = Company::create($data);

        if ($createCompany) {
            return ApiResponse::sendResponse(201, 'Company Created Successfully', []);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comapny = Company::findOrFail($id);
        if ($comapny) {
            return ApiResponse::sendResponse(200, "Company Retrieved Successfully", new CompanyResource($comapny));
        }
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCompanyRequest $request, string $id)
    {
        $data = $request->validated();

        $company = Company::find($id);

        // Delete the image from my project
        Storage::delete("public/companies/$company->image");
        // 1- Get Image
        $image = $request->image;
        // 2- Change image name
        $newImageName = time() . '-' . $image->getClientOriginalName();
        // 3- Move image to my project
        $image->storeAs('companies', $newImageName, 'public');
        // 4- save new name to database record
        $data['image'] = $newImageName;

        $createCompany = $company->update($data);

        if ($createCompany) {
            return ApiResponse::sendResponse(201, 'Company Updated Successfully', []);
        }
        return ApiResponse::sendResponse(201, 'No Company Found', []);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::find($id);
        
        $deleteCompany = $company->delete();

        if ($deleteCompany) {
            return ApiResponse::sendResponse(200, 'Company Deleted Successfully', []);
        }
        return ApiResponse::sendResponse(200, 'No Company Found', []);
    }
}
