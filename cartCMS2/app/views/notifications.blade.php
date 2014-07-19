<?php

if(Session::has('notification')):
  $notification = Session::get('notification');
endif;

if(!empty($notification)):
  foreach($notification as $type => $message): ?>

  <!-- Flash Notification -->
    <div class="row">
      <div class="col-md-12">
          
          <div class="alert alert-dismissable alert-{{$type}}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{$type}}!</strong> {{ $message }}
          </div>
          
      </div>
    </div>
  
  <?php 
  endforeach; 
endif; 
?>