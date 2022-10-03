<?php

namespace App\Http\Controllers\V1\Panel\Financial\Exchange;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Panel\Financial\Currency\CurrencyRequest;
use App\Http\Requests\V1\Panel\Financial\Exchange\ExchangeRequest;
use App\Models\Financial\Currency\Currency;
use App\Models\Financial\Exchange\Exchange;
use RealRashid\SweetAlert\Facades\Alert;

class ExchangeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->check_isAbleTo('exchange-read');

        $currencies = Currency::all();

        $exchanges = Exchange::with('currency')->latest()->paginate(10);

        return view('v1.panel.pages.financial.exchange.exchanges', compact('exchanges', 'currencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ExchangeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExchangeRequest $request)
    {
        $this->check_isAbleTo('exchange-create');

        if( $this->check_exists($request) ) {
            Alert::error('Error', "Data already existed.");
        } else {
            Exchange::create(array_merge($request->all() , [
                'currency_id' => $request->currency_id,
            ]));
            $this->custom_alert("Your Request", 'Created');
        }

        return redirect()->route('exchanges.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ExchangeRequest  $request
     * @param  \Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function update(ExchangeRequest $request, Exchange $exchange)
    {
        $this->check_isAbleTo('exchange-update');
            
        if($this->check_exists($request) && $exchange->price == $request->price ) {
            Alert::error('Error', "$exchange->name could not be updated");
        } else {
                $exchange->update(array_merge($request->all() , [
                    'currency_id' => $request->currency_id,
                ]));
            
            $this->custom_alert("$exchange->name", 'Updated');
        }

        return redirect()->route('exchanges.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exchange $exchange)
    {
        $exchange->delete();
        
        $this->custom_alert('Your request', 'Deleted');

        return redirect()->back();
    }

    /**
     * check whether the exchange exists or not.
     *
     * @param  \Illuminate\Http\ExchangeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function check_exists($request)
    {
        $exchange = Exchange::where([
            'name' =>  $request->name,
            'currency_id' => $request->currency_id   
        ])->exists();

        return $exchange;
    }
}
