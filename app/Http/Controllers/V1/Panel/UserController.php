<?php

namespace App\Http\Controllers\V1\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Search\SearchRequest;
use App\Http\Requests\V1\User\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->isAbleTo('user-read')) {

            $users = User::whereNotIn('email', ['helper@gmail.com', 'owner@gmail.com'])
                ->latest()
                ->paginate(9);
            return view('v1.panel.layouts.user.users', compact('users'));
        } else {

            abort(403, 'Forbidden.');
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
    public function destroy(User $user)
    {
        if( auth()->user()->isAbleTo('user-delete')) {

            DB::transaction(function () use($user) {
                $user = $user->delete();
            });
            
            $this->custom_alert($user->name . ' ' . $user->family, 'deleted');
            return redirect()->route('users.index');
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
    public function show_profile()
    {
        if(auth()->user()->isAbleTo('user-read')) {

            $user = User::where('id', auth()->user()->id)->first();
            return view('v1.panel.layouts.user.profile', compact('user'));
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
    public function update_profile(ProfileRequest $request, User $user)
    {
        if(auth()->user()->isAbleTo('user-read')) {

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

                $this->custom_alert( 'Dear ' . $user->name. ' ' . $user->family, 'Your profile updated');
            });

            return redirect()->route('settings');
        } elseif (auth()->user()) {
            
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

                $this->custom_alert( 'Dear ' . $user->name. ' ' . $user->family, 'Your profile updated');
            });

            return redirect()->route('customer.index');
        } else {

            abort(403, 'Forbidden.');
        }
    }

    public function search(SearchRequest $request)
    {
        if(auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399')) {

            if($request->has('search')) {

                $users = User::whereNotIn('email', ['helper@gmail.com', 'owner@gmail.com'])
                            ->search($request->get('search'))->latest()->paginate(9);
            } else {

                $users = User::whereNotIn('email', ['helper@gmail.com', 'owner@gmail.com'])
                            ->latest()
                            ->paginate(9);
            }

            return view('v1.panel.layouts.user.users', compact('users'));
        } else {

            abort(403, 'Forbidden.');
        }
    }
}
