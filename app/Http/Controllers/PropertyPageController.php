<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Repositories\PropertyRepository;

class PropertyPageController extends Controller
{
    protected $propertyRepository;

    public function __construct(PropertyRepository $propertyRepository)
    {
        $this->propertyRepository = $propertyRepository;
    }

    public function index()
    {
        return Inertia::render('Properties/Index');
    }

    public function create()
    {
        return Inertia::render('Properties/Create');
    }

    public function show($id)
    {
        $property = $this->propertyRepository->getById($id);

        return Inertia::render('Properties/Show', [
            'property' => $property,
        ]);
    }
}
