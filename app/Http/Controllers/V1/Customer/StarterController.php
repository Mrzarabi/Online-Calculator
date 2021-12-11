<?php

namespace App\Http\Controllers\V1\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Starter\StarterRequest;
use App\Models\Starter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StarterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $starts = Starter::where('user_id', auth()->user()->id)->latest()->paginate(8); 
        return view('v1.customer.layouts.start.starts', compact('starts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('v1.customer.layouts.start.start');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StarterRequest $request)
    {
        DB::transaction(function () use($request) {

            $day = Carbon::now()->day;
            $second = carbon::now()->second;

            $starter = auth()->user()->starters()->create(
                array_merge( $request->all(), [
                    'start_no' => rand(0, 9999) . $day. $second,
                ])
            );
            $this->location(auth()->user(), "User started session {$starter->start_no}.");
            $this->custom_alert('Session ' . $starter->title, 'created');
        });
        
        return redirect()->route('customer.starters.index');
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
