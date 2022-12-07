<?php

namespace App\Http\Controllers\V1\Panel\Financial\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Panel\Financial\Inventory\InventoryRequest;
use App\Models\Financial\Inventory\Inventory;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->check_isAbleTo('inventory-read');

        $inventory = Inventory::latest()->first();
        
        return view('v1.panel.pages.financial.inventory.inventory', compact('inventory'));
    }

    /**
     * Store or Update a newly created resource in storage.
     *
     * @param  \Illuminate\Http\InventoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InventoryRequest $request)
    {
        $this->check_isAbleTo('inventory-create');

        $inventory = Inventory::latest()->first();
        
        if(! $inventory) {
            Inventory::create($request->all());
            $this->custom_alert('Data', 'Submited');
        } else {
            $inventory->update($request->all());
            $this->custom_alert('Inventory', 'Updated');
        }

        return redirect()->route('inventories.index');
    }
}
