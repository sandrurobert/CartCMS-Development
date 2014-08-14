<?php

class TaskTypeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /tasktype
	 *
	 * @return Response
	 */
	public function index()
	{
		$types = TaskType::all();

		return View::make('task_type.index')->with('types', $types);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /tasktype/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('task_type.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /tasktype
	 *
	 * @return Response
	 */
	public function store()
	{
		$task_type['name'] = Input::get('name');
		$task_type['added_by_id'] = Auth::user()->id;

		if(empty($task_type['name'])){
			$notification['green'] = INot::not('notifications.taskType.create.fail', ['name' => Auth::user()->first_name]);
			return Redirect::route('task_type.create')->with('notification', $notification);
		}

		$type = new TaskType;
		$type->create($task_type);

		$notification['green'] = INot::not('notifications.taskType.create', ['name' => Auth::user()->first_name]);
		return Redirect::route('task_type.create')->with('notification', $notification);

	}

	/**
	 * Display the specified resource.
	 * GET /tasktype/{id}
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
	 * GET /tasktype/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$type = TaskType::find($id);

		return View::make('task_type.edit')->with('type', $type);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /tasktype/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$type = TaskType::find($id);
		if(Input::get('name') != ''){
			$type->name = Input::get('name');
			$type->update();

			$notification['green'] = INot::not('notifications.taskType.update', ['name' => Auth::user()->first_name]);
		} else {
			$notification['red'] = INot::not('notifications.taskType.update.fail', ['name' => Auth::user()->first_name]);
		}

		return Redirect::route('task_type.edit', $id)->with('notification', $notification);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /tasktype/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$type = TaskType::find($id);
		$type->delete();

		$notification['green'] = INot::not('notifications.taskType.delete', ['name' => Auth::user()->first_name]);
		return Redirect::route('task_type.index')->with('notification', $notification);
	}

}