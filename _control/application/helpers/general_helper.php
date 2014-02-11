<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Builds the page using all template parts
 */
if ( ! function_exists('page_builder')) {

  function page_builder(
                          $header = 'header',
                          $title = 'no_title',
                          $body = 'body',
                          $body_header = 'body_header',
                          $top_nav = 'top_nav',
                          $body_content = 'body_content',
                          $content = 'no_content',
                          $body_footer = 'body_footer'
                        ) {

    $CI =& get_instance();

    /* ------- generate header ------- */
    $main_data[ 'HEADER' ] = $CI->parser->parse( $header, array( 'page_title' => $title ), true );

    /* ------- generate content ------- */
    if( $top_nav != strip_tags( $top_nav ) ) {

      $body_header_parsed = $CI->parser->parse( $body_header, array( 'TOP_NAV' => $top_nav ), true );

    } else {

      $top_nav_parsed = $CI->load->view( $top_nav, '', true );
      $body_header_parsed = $CI->parser->parse( $body_header, array( 'TOP_NAV' => $top_nav_parsed ), true );

    }

    $body_content_parsed = $CI->parser->parse( $body_content, array( 'CONTENT' => $content ), true );
    $body_footer_parsed = $CI->load->view( $body_footer, '', true );

    $main_data[ 'BODY' ] = $CI->parser->parse( $body, array(
                                'BODY_HEADER' => $body_header_parsed,
                                'BODY_CONTENT' => $body_content_parsed,
                                'BODY_FOOTER' => $body_footer_parsed
                              ), true );

    return $main_data;

  }

}

/**
 * Verifies if user is logged
 */
if ( ! function_exists('session_verif')) {

  function session_verif () {

    $CI =& get_instance();

    if ( $CI->session->userdata( 'inside' ) == true ) {

      return true;

    } else {

      return false;

    }

  }

}

/**
 * Gets logged user by id
 */
if ( ! function_exists('get_logged_user_by_id')) {

  function get_logged_user_by_id( $id_user ) {

    $CI =& get_instance();

    $CI->load->model('general_admin_model');

    return $CI->general_admin_model->logged_user( $id_user );

  }

}

/**
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if (!function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable
        ob_start();
        var_dump($var);
        $output = ob_get_clean();

        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';

        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}


if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }
}