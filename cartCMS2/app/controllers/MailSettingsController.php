<?php

class MailSettingsController extends \BaseController {



	/**
	 * Show the form for editing the specified resource.
	 * GET /mailsettings/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
		$mail_settings = MailSettings::find(1);

		return View::make('mail_settings.config_settings')->with('settings', $mail_settings);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /mailsettings/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$input = Input::all();
		$settings = MailSettings::find(1);
		$settings->last_update_by = Auth::user()->id;
		$settings->update($input);

		return Redirect::route('mail.config');
	}

	public function defaultValues()
	{
		$default['driver'] = 'smtp';
		$default['host'] = 'smtp.mandrillapp.com';
		$default['port'] = 587;
		$default['address'] = 'address@your-site.com';
		$default['name'] = 'Site Name';
		$default['encryption'] = 'tls';
		$default['username'] = 'username';
		$default['password'] = '*******';
		$default['sendmail'] = '/usr/sbin/sendmail -bs';
		$default['pretend'] = 'false';
		$default['last_update_by'] = 1;

		$settings = MailSettings::find(1);

		$settings->update($default);

		return Redirect::route('mail.config'); 
	}



}