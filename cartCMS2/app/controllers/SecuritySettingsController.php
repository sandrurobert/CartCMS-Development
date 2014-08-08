<?php

class SecuritySettingsController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('role.owner');
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

		$lang_resource = Lang::get('notifications.generalSecuritySettingsChange.success', array('name' => Auth::user()->first_name) );
		$notification['green'] = $lang_resource;
		return Redirect::route('security.general')->with('notification', $notification);
	}


}