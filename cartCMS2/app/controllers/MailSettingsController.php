<?php

class MailSettingsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /mailsettings
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /mailsettings/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /mailsettings
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /mailsettings/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

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

	/**
	 * Remove the specified resource from storage.
	 * DELETE /mailsettings/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}