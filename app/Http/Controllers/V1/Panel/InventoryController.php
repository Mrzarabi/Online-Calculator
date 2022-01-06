<?php

namespace App\Http\Controllers\V1\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Inventory\InventoryRequest;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->isAbleTo('inventory-read')) {

            $inventory = Inventory::latest()->firstOrFail();
            return view('v1.panel.layouts.inventory.inventory', compact('inventory'));
        } else {

            abort(403, 'Forbidden.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InventoryRequest $request)
    {
        if(auth()->user()->isAbleTo('inventory-create')) {
            
            $inventory = Inventory::latest()->firstOrFail();
            
            if(! $inventory) {
                
                DB::transaction(function () use($request) {
                    Inventory::create($request->all());
                });
                $this->custom_alert('Data', 'submited');
            } else {
    
                DB::transaction(function () use($request, $inventory) {
                    $inventory->update($request->all());
                });
                $this->custom_alert('Inventory', 'Updated');
            }

            return redirect()->route('inventories.index');
        } else {

            abort(403, 'Forbidden.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
