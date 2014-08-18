<?php

class IconController extends \BaseController {


	/**
	 * Change Auth::user Icon to the default 
	 *
	 * @param  
	 * @return Response
	 */
	public function defaultIcon() {

		$user = User::find(Auth::user()->id);
		$icon = Input::file('icon');
		$icon_id = $user->icon->id;

		$avatar = Icon::find($icon_id);
		$avatar->icon_url = 'avt/default.jpg';
		$avatar->update();

		$notification['green'] = INot::not('notifications.changeIcon.default', ['name' => Auth::user()->first_name]);
		return Redirect::route('user.settings', Auth::user()->id)->with('notification', $notification);

	}

	/**
	 * Change Auth::user Icon to choosen Icon
	 *
	 * @param  
	 * @return Response
	 */
	public function changeIcon() {

		$user = User::find(Auth::user()->id);
		$icon = Input::file('icon');
		$icon_id = $user->icon->id;

		if(empty($icon)){
			$notification['red'] = INot::not('notifications.changeIcon.danger', ['name' => Auth::user()->first_name]);
			return Redirect::route('user.settings', Auth::user()->id)->with('notification', $notification);
		}

		if($user->isImage($icon)){
			$path = $user->uploadIcon($icon);

			$avatar = Icon::find($icon_id);
			$old_avatar = $avatar;
			$avatar->icon_url = $path;
			$avatar->update();

			$notification['green'] = INot::not('notifications.changeIcon.success', ['name' => Auth::user()->first_name]);
			return Redirect::route('user.settings', Auth::user()->id)->with('notification', $notification);
		}

	}

	/**
	 * Change Auth::user Icon to choosen Icon, action done by Owner or Admin
	 *
	 * @param  
	 * @return Response
	 */
	public function userUpdateHisIcon($id) {

		$user = User::find($id);
		$icon = Input::file('icon');

		$icon_id = $user->icon->id;

		if(empty($icon)){
		    $notification['red'] = INot::not('notifications.changeIcon.danger', ['name' => $user->first_name]);
			return Redirect::route('edit.user', $id)->with('notification', $notification);
		}

		if($user->isImage($icon)){
			$path = $user->uploadHisIcon($icon, $id);

			$avatar = Icon::find($icon_id);
			$old_avatar = $avatar;
			$avatar->user_id = $id;
			$avatar->icon_url = $path;
			$avatar->update();

			$notification['green'] = INot::not('notifications.changeHisIcon.success', ['name' => $user->first_name]);
			return Redirect::route('edit.user', $id)->with('notification', $notification);
		}

	}

}