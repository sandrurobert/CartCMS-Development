<?php

class SiteSettingsController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('role.owner');
	}


	/**
	 * Show the form for editing the specified resource.
	 * GET site/settings
	 *
	 * @param 
	 * @return Response
	 */
	public function edit()
	{
		$settings = SiteSettings::find(1);
		return View::make('site_settings.site_settings')->with('settings', $settings);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /sitesettings/
	 *
	 * @param
	 * @return Response
	 */
	public function update()
	{
		$input = Input::all();
		$settings = SiteSettings::find(1);
		$settings['title'] = $input['title'];
		$settings['keywords'] = $input['keywords'];
		$settings['description'] = $input['description'];
		$settings['updated_by'] = Auth::user()->id;

		$settings->update();

		$notification['green'] = INot::not('notifications.siteSettingsChange.success', ['name' => Auth::user()->first_name]);
		return Redirect::route('site.settings')->with('notification', $notification);
	}


}