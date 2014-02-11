<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

/**
 * Builds the page using all template parts
 */
if ( ! function_exists('page_builder')) {

  function page_builder(
                          $title = '',
                          $header = '',
                          $content = '',
                          $footer = '',
                          $meta_descr = '',
                          $meta_key = ''
                        ) {

    $CI =& get_instance();

    $data['TITLE'] = $title;
    $data['HEADER'] = $CI->parser->parse( 'header', array( 'NAV' => $header ), true );
    $data['MAIN'] = $content;
    $data['TOP_FOOTER'] = $CI->parser->parse( 'footer', array( 'RECENT_POSTS' => $footer ), true );
    $data['meta_descr'] = $meta_descr;
    $data['meta_key'] = $meta_key;

    return $data;

  }

}