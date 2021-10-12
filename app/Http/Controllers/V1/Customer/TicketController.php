<?php

namespace App\Http\Controllers\V1\Customer;

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
        $tickets = Ticket::where('user_id', auth()->user()->id)->latest()->paginate(9); 
        return view('v1.customer.layouts.ticket.tickets', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Starter $starter)
    {
        return view('v1.customer.layouts.ticket.ticket', compact('starter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request, Starter $starter)
    {
        DB::transaction(function () use($request, $starter) {
            if($request->hasFile('image')) {

                $photo = $this->upload($request->file('image'));
                $ticket = $starter->tickets()->create( 
                    array_merge($request->all(), [
                        'image' => $photo
                    ])
                );
            } else {

                $ticket = $starter->tickets()->create($request->all());
            }

            $this->location(auth()->user(), 'User sended a ticket');
            $this->custom_alert('Ticket ' . $ticket->title, 'submited');
        });


        return redirect()->back();
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
