<?php

namespace App\Http\Controllers;

use App\Interfaces\RoomsRepositoryInterface;
use App\Classes\ApiResponseClass;
use App\Http\Resources\RoomsResource;
use App\Http\Resources\RoomsResourceCollection;

class RoomsApiController extends Controller
{

    private RoomsRepositoryInterface $roomsRepositoryInterface;

    public function __construct(RoomsRepositoryInterface $roomsRepositoryInterface)
    {
        $this->roomsRepositoryInterface = $roomsRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->roomsRepositoryInterface->index();

        return ApiResponseClass::sendResponse(RoomsResource::collection($data), '', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rooms = $this->roomsRepositoryInterface->getByPropertyId($id);

        return ApiResponseClass::sendResponse(new RoomsResourceCollection($rooms), '', 200);
    }
}
