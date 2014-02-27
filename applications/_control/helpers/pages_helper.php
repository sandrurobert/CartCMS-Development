<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Gets pages module filenames
 */
if ( ! function_exists('get_filenames')) {

  function get_filenames( $folder_name, $suffix ) {

    //no-content filename
    $filename[ 'no-content' ] = $folder_name . 'no-content' . $suffix;

    //list content filename
    $filename[ 'list' ] = $folder_name . 'list' . $suffix;

    //add page filename
    $filename[ 'add_page' ] = $folder_name . 'add' . $suffix;

    //edit page filename
    $filename[ 'edit_page' ] = $folder_name . 'edit' . $suffix;

    return $filename;

  }

}

/* End of file pages_helper.php */
/* Location: ./applications/_control/helpers/pages_helper.php */