<?php

namespace App\Http\Controllers\V1\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Element\ElementRequest;
use App\Http\Requests\V1\Search\SearchRequest;
use App\Models\Calculator;
use App\Models\Element;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ElementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->isAbleto('element-create')) {
            
            $calculators = Calculator::all();
            $elements = Element::with('calculator')->latest()->paginate(10);
            return view('v1.panel.layouts.element.elements', compact('elements', 'calculators'));
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
    public function store(ElementRequest $request)
    {
        if(auth()->user()->isAbleTo('element-create')) {

            if( Element::where([
                'name' =>  $request->name,
                'calculator_id' => $request->calculator_id   
                ])->exists() ) {
            
                Alert::error('Error', "Data already existed.");
            } else {

                DB::transaction(function () use ($request) {
                    $element =  Element::create(array_merge($request->all() , [
                        'calculator_id' => $request->calculator_id,
                    ]));
                    $this->custom_alert("your request", 'created');
                });
            }

            return redirect()->route('elements.create');
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
    public function update(ElementRequest $request, Element $element)
    {
        if(auth()->user()->isAbleTo('element-update')) {
            
            if(Element::where([
                    'name' =>  $request->name,
                    'calculator_id' => $request->calculator_id   
                    ])->exists() && $element->price == $request->price ) {
                Alert::error('Error', "$element->name could not be updated");
            } else {

                DB::transaction(function () use ($request, $element) {
                    $element->update(array_merge($request->all() , [
                        'calculator_id' => $request->calculator_id,
                    ]));
                });
                
                $this->custom_alert("$element->name", 'updated');
            }

            return redirect()->route('elements.create');
        } else {

            abort(403, 'Forbidden.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Element $element)
    {
        if(auth()->user()->isAbleTo('calculator-delete')) {

            DB::transaction(function () use($element) {
                $element->delete();
            });
            
            $this->custom_alert('your request', 'deleted');
            return redirect()->back();
        } else {

            abort(403, 'Forbidden.');
        }
    }

    public function search(SearchRequest $request)
    {
        if(auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399')) {

            if($request->has('search')) {

                $elements = Element::search($request->get('search'))->latest()->paginate(9);
            } else {

                $elements = Element::latest()->paginate(9);
            }
            $calculators = Calculator::all();

            return view('v1.panel.layouts.element.elements', compact('elements', 'calculators'));
        } else {

            abort(403, 'Forbidden.');
        }
    }
}
