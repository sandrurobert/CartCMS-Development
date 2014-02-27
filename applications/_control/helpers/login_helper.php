<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Gets login module filenames
 */
if ( ! function_exists('get_filenames')) {

  function get_filenames( $folder_name, $suffix ) {

    //top nav filename
    $filename[ 'top_nav' ] = $folder_name . 'top_nav' . $suffix;

    //body header filename
    $filename[ 'body_header' ] = $folder_name . 'body_header' . $suffix;

    //content filename
    $filename[ 'content' ] = $folder_name . 'content' . $suffix;

    return $filename;

  }

}

/**
 * Gets login module filenames
 */
if ( ! function_exists('create_session')) {

  function create_session( $user ) {

    $CI =& get_instance();

    $session_data = array(

                'id_user' => $user->id_user,
                'username' => $user->user,
                'inside' => true,

              );

    $CI->session->set_userdata( $session_data );

    return true;

  }

}

/* End of file login_helper.php */
/* Location: ./applications/_control/helpers/login_helper.php */