<?php

class MY_Controller extends CI_Controller {

  function __construct() {

    parent::__construct();

    /* ===== SESSION VERIF. ===== */
    if( ! $this->login_admin_model->sessionVerif() ) {

      redirect( 'login' );

    }

  }

}