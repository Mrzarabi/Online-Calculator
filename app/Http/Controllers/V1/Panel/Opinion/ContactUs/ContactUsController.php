<?php

namespace App\Http\Controllers\V1\Panel\Opinion\ContactUs;

use App\Http\Controllers\Controller;
use App\Models\Opinion\ContactUs\ContactUs;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->check_isAbleTo('contactUs-read');

        $contactUses = ContactUs::latest()->paginate(10);

        return view('v1.panel.pages.opinion.contactUs.contactUs', compact('contactUses'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $contactUs)
    {
        $this->check_isAbleTo('contactUs-delete');

        $contactUs->delete();

        $this->custom_alert('The Message', 'Deleted');
        
        return redirect()->back();
    }
}
