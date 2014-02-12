<?php

class MY_Controller extends CI_Controller {

  function __construct() {

    parent::__construct();

    $this->load->helper('general_helper');

    /* ===== SESSION VERIF. ===== */
    if( ! session_verif() ) {

      redirect( 'login' );

    }

  }

}