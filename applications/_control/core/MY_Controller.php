<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

/* End of file MY_Controller.php */
/* Location: ./applications/_control/controllers/MY_Controller.php */