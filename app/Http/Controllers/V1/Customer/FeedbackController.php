<?php

namespace App\Http\Controllers\V1\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Feedback\FeedbackRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeedbackRequest $request)
    {
        if(auth()->user()) {
            Feedback::create($request->all());
            $this->custom_alert('Your Feedback', 'Submited');
            return Redirect()->back();
        } else {
            return abort(403, 'Forbidden');
        }
    }
}
