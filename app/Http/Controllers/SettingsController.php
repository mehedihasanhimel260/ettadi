<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $settings = Settings::first();
        return view('backend.admin.settings.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $settings = Settings::firstOrNew([]);
        $settings->website_title = $request->input('website_title');
        $settings->fb_link = $request->input('fb_link');
        $settings->yt_link = $request->input('yt_link');
        $settings->LinkedIn = $request->input('LinkedIn');

        if ($image = $request->file('logo')) {
            $destinationPath = 'inc/frontend/img/';
            // $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $productImage =$image->getClientOriginalName();
            $image->move($destinationPath, $productImage);

            // Delete old image if it exists
            if ($settings->image && file_exists(public_path($destinationPath . $settings->image))) {
                unlink(public_path($destinationPath . $settings->image));
            }

            $settings->image = $productImage;
        }

        $settings->save();

        return redirect()->route('settings.index')->with('message', 'Settings updated successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Settings $settings,)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
