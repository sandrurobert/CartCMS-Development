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
 * Builds the template using all parts, the template directory and additional data
 * @return array with parsed data
 */
if ( ! function_exists('template_builder')) {

  function template_builder($directory, $parts, $data) {

    $CI =& get_instance();

    /* --- building HEAD --- */
    $head_data = array(
      'page_title' => $data['page_title']
    );
    $view['HEAD'] = $CI->parser->parse( $directory . '/' . $parts['head'], $head_data, true );

    /* --- building HEADER --- */
    $header_data = array(
      'page_title' => $data['page_title']
    );
    $header = $CI->parser->parse( $directory . '/' . $parts['header'], $header_data, true );

    /* --- building NAV --- */
    $nav_data = array(
      'NAV' => get_nav()
    );
    $nav = $CI->parser->parse( $directory . '/' . $parts['nav'], $nav_data, true );

    /* --- building MAIN --- */
    if( in_array('sidebar_left', $parts) && in_array('sidebar_right', $parts) ) {

      $sidebar_left = $CI->parser->parse( $directory . '/' . $parts['sidebar_left'], get_sidebar_left(), true );
      $sidebar_right = $CI->parser->parse( $directory . '/' . $parts['sidebar_right'], get_sidebar_right(), true );

      $sidebars = array(
        'sidebar_left'  => $sidebar_left,
        'sidebar_right' => $sidebar_right,
        'content' => $data['page_content']
      );

      $main = $CI->parser->parse( $directory . '/' . $parts['simple_page_sidebars'], $sidebars, true );

    } elseif( in_array('sidebar_left', $parts) && ! in_array('sidebar_right', $parts) ) {

      $sidebar_left = $CI->parser->parse( $directory . '/' . $parts['sidebar_left'], get_sidebar_left(), true );

      $sidebars = array(
        'sidebar_left'  => $sidebar_left,
        'sidebar_right' => '',
        'content' => $data['page_content']
      );

      $main = $CI->parser->parse( $directory . '/' . $parts['simple_page_sidebar_left'], $sidebars, true );

    } elseif( ! in_array('sidebar_left', $parts) && in_array('sidebar_right', $parts) ) {

      $sidebar_right = $CI->parser->parse( $directory . '/' . $parts['sidebar_right'], get_sidebar_right(), true );

      $sidebars = array(
        'sidebar_left'  => '',
        'sidebar_right' => $sidebar_right,
        'content' => $data['page_content']
      );

      $main = $CI->parser->parse( $directory . '/' . $parts['simple_page_sidebar_right'], $sidebars, true );

    } elseif( ! in_array('sidebar_left', $parts) && ! in_array('sidebar_right', $parts) ) {

      $main_data = array(
        'content' => $data['page_content']
      );

      $main = $CI->parser->parse( $directory . '/' . $parts['simple_page_full'], $main_data, true );

    }

    /* --- building FOOTER --- */
    $footer = $CI->parser->parse( $directory . '/' . $parts['footer'], get_footer(), true );

    /* --- building BODY --- */
    $body_data = array(
      'HEADER'    => $header,
      'NAV'       => $nav,
      'MAIN'      => $main,
      'FOOTER'    => $footer
    );

    $view['BODY'] = $CI->parser->parse( $directory . '/' . $parts['body'], $body_data, true );

    return $view;

  }

}

/**
 * Builds the main navigation
 * @return array of objects
 */
if ( ! function_exists('get_nav')) {

  function get_nav() {

    $CI =& get_instance();

    $nav = $CI->main_model->get_parents();

    foreach($nav as $menu) {

      $chs = $CI->main_model->get_children($menu->id_page);

      if ( ! empty( $chs ) ) {

        foreach ( $chs as $kid ) {

          $kid->s_page_link = site_url() . '/' . 'page' . '/' . $kid->link_title;
          $kid->s_title = $kid->title;

        }

        $menu->S_NAV = $chs;

      } else {

        $menu->S_NAV = array();

      }

      if ( $menu->module == 'homepage' ) {

        $menu->page_link = site_url();

      } elseif( $menu->page_type == 0 ) {

        $menu->page_link = '#';

      } else {

        $menu->page_link = site_url() . '/' . 'page' . '/' . $menu->link_title;

      }

    }

    return $nav;

  }

}

/**
 * Builds the footer
 * @return array of objects
 */
if ( ! function_exists('get_footer')) {

  function get_footer() {

    $footer['current_year'] = date('Y');

    return $footer;

  }

}

/**
 * Builds the right sidebar
 * @return array of objects
 */
if ( ! function_exists('get_sidebar_right')) {

  function get_sidebar_right() {

    $sidebar_right['info'] = 'Hello from sidebar right!';

    return $sidebar_right;

  }

}

/**
 * Builds the left sidebar
 * @return array of objects
 */
if ( ! function_exists('get_sidebar_left')) {

  function get_sidebar_left() {

    $sidebar_left['info'] = 'Hello from sidebar left!';

    return $sidebar_left;

  }

}

/**
 * Builds a page without sidebars
 * @return array
 */
if ( ! function_exists('page_no_sidebars')) {

  function page_no_sidebars() {

    $parts = array(
      'head'              => 'head',
      'header'            => 'header',
      'nav'               => 'nav',
      'body'              => 'body',
      'simple_page_full'  => 'simple_page_full',
      'footer'            => 'footer'
    );

    return $parts;

  }

}

/**
 * Builds a page with right sidebar
 * @return array
 */
if ( ! function_exists('page_right_sidebar')) {

  function page_right_sidebar() {

    $parts = array(
      'head'                       => 'head',
      'header'                     => 'header',
      'nav'                        => 'nav',
      'body'                       => 'body',
      'sidebar_right'              => 'sidebar_right',
      'simple_page_sidebar_right'  => 'simple_page_sidebar_right',
      'footer'                     => 'footer'
    );

    return $parts;

  }

}

/**
 * Builds a page with left sidebar
 * @return array
 */
if ( ! function_exists('page_left_sidebar')) {

  function page_left_sidebar() {

    $parts = array(
      'head'                       => 'head',
      'header'                     => 'header',
      'nav'                        => 'nav',
      'body'                       => 'body',
      'sidebar_left'               => 'sidebar_left',
      'simple_page_sidebar_left'   => 'simple_page_sidebar_left',
      'footer'                     => 'footer'
    );

    return $parts;

  }

}

/**
 * Builds a page with both sidebars
 * @return array
 */
if ( ! function_exists('page_sidebars')) {

  function page_sidebars() {

    $parts = array(
      'head'                       => 'head',
      'header'                     => 'header',
      'nav'                        => 'nav',
      'body'                       => 'body',
      'sidebar_left'               => 'sidebar_left',
      'sidebar_right'              => 'sidebar_right',
      'simple_page_sidebars'       => 'simple_page_sidebars',
      'footer'                     => 'footer'
    );

    return $parts;

  }

}