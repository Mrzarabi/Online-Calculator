<?php

namespace App\Http\Controllers\V1\Panel\Place\Country;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Panel\Place\Country\CountryRequest;
use App\Models\Place\Country\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->check_isAbleTo('country-read');

        $countries = Country::latest()->paginate(9);

        return view('v1.panel.pages.place.country.countries', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CountryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        $this->check_isAbleTo('country-create');

        Country::create($request->all());

        $this->custom_alert('The Country', 'Created');
     
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CountryRequest  $request
     * @param  \Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, Country $country)
    {
        $this->check_isAbleTo('country-update');

        $country->update($request->all());

        $this->custom_alert('The Country', 'Updated');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $this->check_isAbleTo('country-delete');

        $country->delete();

        $this->custom_alert('The Country', 'Deleted');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Country  $country
     * @return \Illuminate\Http\Response
     */
    public function make_active(Country $country)
    {
        $this->check_isAbleTo('country-update');

        $country->update([
            'is_active' => $country->is_active == false ? true : false
        ]);
           
        $this->custom_alert('The Country', 'Updated');

        return redirect()->back();
    }
}
