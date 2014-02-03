<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/

$hook['post_controller'][] = array(
                                'class'    => 'Main_hook',
                                'function' => 'fix_base_url',
                                'filename' => 'main_hook.php',
                                'filepath' => 'hooks'
                                );
								
$hook['post_controller'][] = array(
                                'class'    => 'Main_hook',
                                'function' => 'cleaning',
                                'filename' => 'main_hook.php',
                                'filepath' => 'hooks'
                                );
								
$hook['post_controller'][] = array(
                                'class'    => 'Main_hook',
                                'function' => 'user_info',
                                'filename' => 'main_hook.php',
                                'filepath' => 'hooks'
                                );

/* End of file hooks.php */
/* Location: ./application/config/hooks.php */