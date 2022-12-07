<?php

namespace App\Http\Controllers\V1\Panel\User;

use App\Http\Controllers\Controller;
use App\Models\location;
use App\Models\User;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $this->check_isAbleTo('location-read');
    
        $locations = location::where('user_id', $user->id)->paginate(50);
    
        return view('v1.panel.pages.user.location.locations', compact('locations', 'user'));
    }
}
