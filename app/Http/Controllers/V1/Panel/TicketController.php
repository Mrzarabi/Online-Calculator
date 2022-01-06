<?php

namespace App\Http\Controllers\V1\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Ticket\TicketRequest;
use App\Models\Starter;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Starter $starter)
    {
        if(auth()->user()->isAbleTo('ticket-answer')) {

            $tickets = Ticket::with('user')->where('starter_id', $starter->id)->get();
            return view('v1.panel.layouts.ticket.ticket', compact('starter', 'tickets'));
        } else {

            abort(403, 'Forbidden.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request, Starter $starter)
    {
        if(auth()->user()->isAbleTo('ticket-answer') && $starter->closed == false) {

            DB::transaction(function () use($request, $starter) {
                if($request->hasFile('image')) {

                    $photo = $this->upload($request->file('image'));
                    auth()->user()->tickets()->create( 
                        array_merge($request->all(), [
                            'image' => $photo,
                            'starter_id' => $starter->id
                        ])
                    );
                } else {

                    auth()->user()->tickets()->create(
                        array_merge($request->all(), [
                            'starter_id' => $starter->id
                        ])
                    );
                }

                $this->custom_alert('Ticket ', 'Answerd');
            });
            return redirect()->back();
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
    public function edit(Ticket $ticket)
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
    public function update(TicketRequest $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
