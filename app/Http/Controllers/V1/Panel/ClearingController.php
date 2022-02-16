<?php

namespace App\Http\Controllers\V1\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Clearing\ClearingRequest;
use App\Http\Requests\V1\Image\ImageRequest;
use App\Models\Calculator;
use App\Models\Clearing;
use App\Models\Element;
use App\Models\Form;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClearingController extends Controller
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
    public function create(Order $order)
    {
        if (auth()->user()->isAbleTo('clearing-create')) {
        
            $order->with(['clearing', 'form'])->firstOrFail();
            return view('v1.panel.layouts.clearing.clearing', compact('order'));
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
    public function store(ClearingRequest $request)
    {
        if (auth()->user()->isAbleTo('clearing-create')) {
            
            $clearing = auth()->user()->clearings()->create( $request->all() );
            return redirect()->route('image.create', ['clearing' => $clearing->id]);
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
    public function uploadImages(Request $request, Clearing $clearing)
    {
        if (auth()->user()->isAbleTo('image-create')) {

            DB::transaction(function () use($request, $clearing) {
                    if($request->hasFile('image')) {
                        $past_images = $clearing->images()->get();
                            foreach ($past_images as $image) {
                                $image->delete();
                            }
                        foreach ($request->file('image') as $image) {
                            $photo = $this->upload($image);
                            $clearing->images()->create(['image' => $photo]);
                        }

                        $this->custom_alert('Images', 'Images');
                    } else {

                        $this->custom_alert('Form', 'Submited');
                    }
                });
                return redirect()->route('orders.index');
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
    public function edit()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editUploadImages(Clearing $clearing)
    {
        if (auth()->user()->isAbleTo('image-read')) {
            
            return view('v1.panel.layouts.image.image', compact('clearing'));
        } else {

            abort(403, 'Forbidden.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClearingRequest $request, Clearing $clearing)
    {
        if (auth()->user()->isAbleTo('clearing-update')) {

            $clearing->update($request->all());
            return redirect()->route('image.create', ['clearing' => $clearing->id]);
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
    public function destroy($id)
    {
        //
    }
}
