<?php

if(Session::has('notification')):
  $notification = Session::get('notification');
endif;

if(!empty($notification)):
  foreach($notification as $type => $message): ?>

  <!-- Flash Notification -->
  <div class="info {{$type}}Info">
    <h4 class="infoTitle">
      <img class="infoTitleImgLeft" src="{{asset('img/icons/info.png')}}" />
        {{ $message }}
    </h4>
  </div><!-- information box -->

  <?php
  endforeach;
endif;
?>