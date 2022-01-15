<?php

namespace App\Http\Controllers\V1\Panel;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //todo
        if(auth()->user()->isAbleTo('feedback-read')) {

            $feedbacks = Feedback::latest()->paginate(10);
            return view('v1.panel.layouts.feedback.feedbacks', compact('feedbacks'));
        } else {

            return abort(403, 'Forbidden');
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
    public function destroy(Feedback $feedback)
    {
        if(auth()->user()->isAbleTo('feedback-delete')) {

            DB::transaction(function() use($feedback) {

                $feedback->delete();
            });
            
            $this->custom_alert('Feedback ', 'Deleted');
            return redirect()->route('feedbacks.index');
        } else {

            abort(403, 'Forbidden');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function watch(Feedback $feedback)
    {
        if(auth()->user()->isAbleTo('feedback-accept')) {

            DB::transaction(function () use($feedback) {
                if($feedback->show == true) {

                    $feedback->update([
                        'show' => false
                    ]);
                    
                } else {
                    $feedback->update([
                        'show' => true
                    ]);
                    
                }
            });
            
            $this->custom_alert('Feedback ', 'Updated');
            return redirect()->route('feedbacks.index');
        } else {

            abort(403, 'Forbidden.');
        }
    }
}
