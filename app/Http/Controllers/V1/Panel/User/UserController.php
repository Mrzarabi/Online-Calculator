<?php

namespace App\Http\Controllers\V1\Panel\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Panel\Search\SearchRequest;
use App\Http\Requests\V1\Panel\User\ProfileRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->check_isAbleTo('user-read');

        $users = User::whereNotIn('email', ['helper@gmail.com', 'owner@gmail.com'])
            ->latest()
            ->paginate(9);
       
        return view('v1.panel.pages.user.user.users', compact('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->check_isAbleTo('user-delete');

        if($user->email == "owner@gmail.com" || $user->email == "helper@gmail.com" ) {
            $this->custom_alert(null, 'Cannot Deleted');
        } else {
            $user = $user->delete();
            $this->custom_alert('User', 'Deleted');
        }
        
        return redirect()->route('users.index');
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \User  $user
     * @return \Illuminate\Http\Response
     */
    public function show_profile()
    {
        $this->check_isAbleTo('profile-read');

        $user = User::where('id', auth()->user()->id)->firstOrFail();
    
        return view('v1.panel.pages.user.user.profile', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \User  $user
     * @return \Illuminate\Http\Response
     */
    public function update_profile(ProfileRequest $request, User $user)
    {
        $this->check_isAbleTo('profile-update');
                
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

        return redirect()->route('settings');
    }

    /**
     * Display a listing of the resource which the admin search them.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(SearchRequest $request)
    {
        $this->check_isAbleTo('user-search');

        if($request->has('search')) {
            $users = User::whereNotIn('email', ['helper@gmail.com', 'owner@gmail.com'])
                        ->search($request->get('search'))->latest()->paginate(9);
        } else {
            $users = User::whereNotIn('email', ['helper@gmail.com', 'owner@gmail.com'])
                        ->latest()
                        ->paginate(9);
        }

        return view('v1.panel.pages.user.user.users', compact('users'));
    }
}
