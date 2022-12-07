<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Fluent;
use RealRashid\SweetAlert\Facades\Alert;
use Stevebauman\Location\Facades\Location;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function upload($image)
    {
        $time = Carbon::now();
        $file_path = "/upload/images/{$time->year}/{$time->month}/{$time->day}/";
        $file_name = $image->getClientOriginalName();
        $file_name = $time->timestamp . '_' . $file_name;
        $image->move( public_path($file_path) , $file_name );
        $photo = $file_path . $file_name;
        return $photo;
    }

    /** 
     * Return pretty and customise alert for each request
     */
    public function custom_alert($data, $message)
    {
        if (isset( $data )) {
            
            Alert::success('Success', "$data $message Successfully");
        } else {
            
            Alert::error('Error', 'Something Went Wrong');
        }
    }

    public function location($user, $title) 
    {
        $ip = request()->ip();
        $location = Location::get('198.244.144.183');
        
        $user->locations()->create(
            array_merge((array) $location, [
                'title' => $title
            ])
        );
    }

    public function check_isAbleTo($ability)
    {
        if(auth()->user()->isAbleTo($ability)) {
            return true;
        } 
        return abort(403, 'Forbidden.');;
    }
}
