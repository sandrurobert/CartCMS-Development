@if (Auth::check())
		<div id="dashFooterHolder" class="row">
			<div id="dashFooterContainer" class="col-md-12">
				There are {{ Sessions::getOnlineUsersNr(); }} users online!

				(

					{{ Sessions::getOnlineOwnersNr(); }} - {{ Role::findByName('Owner')->name; }}s
					{{ Sessions::getOnlineAdminsNr(); }} - {{ Role::findByName('Admin')->name; }}s
					{{ Sessions::getOnlineWorkersNr(); }} - {{ Role::findByName('Worker')->name; }}s


				)
			</div>
		</div><!--dashFooterHolder-->
@endif