<?php

namespace Modules\Inventory\Http\Controllers;
use App\Http\Controllers\Controller;

class InventoryToReturnController extends Controller
{

    public function index()
    {
        return view('inventory::to-return.index');
    }

}
