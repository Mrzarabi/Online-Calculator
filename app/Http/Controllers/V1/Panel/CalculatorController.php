<?php

namespace App\Http\Controllers\V1\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Calculator\CalculatorRequest;
use App\Http\Requests\V1\Calculator\CustomerCalculatorRequest;
use App\Models\Calculator;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalculatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->isAbleTo('calculator-read')) {

            $calculators = Calculator::latest()->paginate(7);
            return view('v1.panel.layouts.calculator.calculator', compact('calculators'));
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CalculatorRequest $request)
    {
        if(auth()->user()->isAbleTo('calculator-create')) {

    
            DB::transaction(function () use($request) {
                Calculator::create($request->all());
            });
            $this->custom_alert('Data', 'submited');
    
            return redirect()->route('calculators.index');
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
    public function destroy(Calculator $calculator)
    {
        if(auth()->user()->isAbleTo('calculator-delete')) {

            DB::transaction(function () use($calculator) {
                $calculator->delete();
            });
            
            $this->custom_alert('name', 'deleted');
            return redirect()->back();
        } else {

            abort(403, 'Forbidden.');
        }
    }
}
