<?php

class SecuritySettingsController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('owner');
	}


	/**
	 * Show the form for editing the specified resource.
	 * GET security/general
	 *
	 * @param
	 * @return Response
	 */
	public function generalEdit()
	{
		$settings = SecuritySettings::find(1);
		return View::make('security_settings.general')->with('settings', $settings);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /securitysettings/
	 *
	 * @param
	 * @return Response
	 */
	public function generalUpdate()
	{
		$input = Input::all();
		$settings = SecuritySettings::find(1);
		$settings['min_pw_lenght'] = $input['min_pw_lenght'];
		$settings['updated_by'] = Auth::user()->id;

		$settings->update();

		$notification['green'] = INot::not('notifications.generalSecuritySettingsChange.success', ['name' => Auth::user()->first_name]);
		return Redirect::route('security.general')->with('notification', $notification);
	}


}