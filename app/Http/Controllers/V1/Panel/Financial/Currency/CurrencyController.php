<?php

namespace App\Http\Controllers\V1\Panel\Financial\Currency;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Panel\Financial\Currency\CurrencyRequest;
use App\Models\Financial\Currency\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    //TODO کامنت های این کنترلر به این دلیل پاک نکردم تا کامنت های کنترلر های دیگهر رو از روی همین درست کنم 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->check_isAbleTo('currency-read');

        $currencies = Currency::latest()->paginate(10);

        return view('v1.panel.pages.financial.currency.currencies', compact('currencies'));
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
     * @param  \Illuminate\Http\CurrencyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurrencyRequest $request)
    {
        $this->check_isAbleTo('currency-create');

        Currency::create($request->all());

        $this->custom_alert('Data', 'Submited');
    
        return redirect()->route('currencies.index');
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
    public function update(CurrencyRequest $request, Currency $currency)
    {
        $this->check_isAbleTo('currency-update');

        $currency->update($request->all());
        
        $this->custom_alert("$currency->name", 'Updated');

        return redirect()->route('currencies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        $this->check_isAbleTo('currency-delete');

        $currency->delete();
        
        $this->custom_alert( "{$currency->name}", 'Deleted');

        return redirect()->back();
    }
}
