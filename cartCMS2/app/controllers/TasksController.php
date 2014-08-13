<?php

class TasksController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /tasks
	 *
	 * @return Response
	 */
	public function index()
	{
		$tasks = Task::paginate(3);
		return View::make('tasks.index')->with('tasks', $tasks);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /tasks/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$users = User::all();
		$users = $users->lists('email', 'id');

		$type = TaskType::all();
		$type = $type->lists('name', 'id');

		return View::make('tasks.create')->with('users', $users)->with('type', $type);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /tasks
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::All();
		if(empty($input['title']) || empty($input['content']) ){
			$notification['red'] = INot::not('notifications.sentTask.empty', ['name' => Auth::user()->first_name]);
			return Redirect::route('task.create')->with('notification', $notification);
		} 
		$input['sent_by_id'] = Auth::user()->id;
		$input['status'] = 'New';

		$task = new Task;

		$task->create($input);

		$notification['green'] = INot::not('notifications.sentTask.success', ['name' => Auth::user()->first_name]);
		return Redirect::route('task.create')->with('notification', $notification);
		
	}

	/**
	 * Display the specified resource.
	 * GET /tasks/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$task = Task::find($id);

		return View::make('tasks.show')->with('task', $task);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /tasks/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$users = User::all();
		$users = $users->lists('email', 'id');

		$type = TaskType::all();
		$type = $type->lists('name', 'id');

		$task = Task::find($id);

		return View::make('tasks.edit')->with('users', $users)->with('type', $type)->with('task', $task);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /tasks/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::All();
		if(empty($input['title']) || empty($input['content']) ){
			$notification['red'] = INot::not('notifications.sentTask.empty', ['name' => Auth::user()->first_name]);
			return Redirect::route('task.update', $id)->with('notification', $notification);
		} 
		$input['sent_by_id'] = Auth::user()->id;
		$input['status'] = 'Updated';

		$task = Task::find($id);

		$task->update($input);

		$notification['green'] = INot::not('notifications.sentTask.update', ['name' => Auth::user()->first_name]);
		return Redirect::route('task.update', $id)->with('notification', $notification);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /tasks/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		$task = Task::find($id);
		$task->delete();

		$notification['green'] = INot::not('notifications.task.delete', ['name' => Auth::user()->first_name]);
		return Redirect::route('task.index')->with('notification', $notification); 

	}

	public function countTasksForUser()
	{
		$user_id = Auth::user()->id;
		$tasks = Task::where('sent_to_id', '=', $user_id)->where('status', '=', 'new')->count();

		return Response::json(array($tasks));
	}

}