<?php

namespace App\Http\Controllers\V1\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\User\ProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()) {

            $user = User::where('id', auth()->user()->id)->firstOrFail();
            return view('v1.customer.pages.index', compact('user'));
        } else {

            abort(403, 'Forbidden');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProfileRequest  $request
     * @param  \User  $user
     * @return \Illuminate\Http\Response
     */
    public function update_profile(ProfileRequest $request, User $user)
    {
        DB::transaction(function () use($request, $user) {

            if($request->hasFile('avatar')) {
                $user->update( array_merge(
                    $request->all() ,[
                        'avatar' => $this->upload($request->file('avatar'))
                    ]
                ));
            } else {
                $user->update($request->all());
            }

            $this->custom_alert( 'Dear ' . $user->name. ' ' . $user->family, 'Your Profile Updated');
        });

        return redirect()->route('customer.index');
    }
}
