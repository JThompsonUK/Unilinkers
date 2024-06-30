<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyStoreRequest;
use App\Http\Requests\PropertyUpdateRequest;
use App\Interfaces\PropertyRepositoryInterface;
use App\Classes\ApiResponseClass;
use App\Http\Resources\PropertyResource;
use Illuminate\Support\Facades\DB;

class PropertyApiController extends Controller
{

    private $propertyRepositoryInterface;

    public function __construct(PropertyRepositoryInterface $propertyRepositoryInterface)
    {
        $this->propertyRepositoryInterface = $propertyRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->propertyRepositoryInterface->index();

        return ApiResponseClass::sendResponse(PropertyResource::collection($data), '', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyStoreRequest $request)
    {
        $details = [
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'no_of_rooms' => $request->no_of_rooms,
        ];
        DB::beginTransaction();
        try {
            $property = $this->propertyRepositoryInterface->store($details);
            DB::commit();
            return ApiResponseClass::sendResponse(new PropertyResource($property), 'Property Create Successful', 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $property = $this->propertyRepositoryInterface->getById($id);

        return ApiResponseClass::sendResponse(new PropertyResource($property), '', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyUpdateRequest $request, $id)
    {
        $updateDetails = [
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'no_of_rooms' => $request->no_of_rooms,
        ];
        DB::beginTransaction();
        try {
            $property = $this->propertyRepositoryInterface->update($updateDetails, $id);
            DB::commit();
            return ApiResponseClass::sendResponse('Property Update Successful', '', 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->propertyRepositoryInterface->delete($id);

        return ApiResponseClass::sendResponse('Property Delete Successful', '', 204);
    }
}
