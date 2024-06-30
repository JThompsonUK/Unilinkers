<?php

namespace App\Interfaces;

interface RoomsRepositoryInterface
{
    public function index();
    public function getById($id);
    public function getByPropertyId($id);
}
