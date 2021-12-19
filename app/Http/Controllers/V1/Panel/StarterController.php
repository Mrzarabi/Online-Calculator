<?php

namespace App\Http\Controllers\V1\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Search\SearchRequest;
use App\Models\Starter;
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
        if(auth()->user()->isAbleto('starter-read')) {

            $starts = Starter::with('user')->latest()->paginate(9);
            return view('v1.panel.layouts.start.starts', compact('starts'));
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
    public function store(Request $request)
    {
        //
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function close(Starter $starter)
    {
        if(auth()->user()->isAbleto('starter-close')) {

            DB::transaction(function () use($starter) {
                $starter->update([
                    'closed' => true
                ]);
            });
            return redirect()->back();
        } else {

            abort(403, 'Forbidden.');
        }
    }

    public function search(SearchRequest $request)
    {
        // Search only active users
        if(auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399')) {
            
            if ($request->has('search')) {
     
                $starts = Starter::search($request->get('search'))->with('user')->latest()->paginate(9);
            } else {
                
                $starts = Starter::with('user')->latest()->paginate(9);
            }

            return view('v1.panel.layouts.start.starts', compact('starts'));
        } else {

            abort(403, 'Forbidden.');
        }
    }
}
