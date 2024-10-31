<?php
/*
Plugin Name: Pink for October Ribbon
Plugin URI: http://indemnity83.com/projects/wordpress
Description: Show your support for <a href="http://pinkforoctober.org">pinkforoctober.org</a> with a linked ribbon in the top right corner of your blog
Author: Kyle Klaus
Version: 2.0.2
Author URI: http://www.indemnity83.com
License: GPL2
*/ 

/*  Copyright 2011  Kyle Klaus  (kklaus@indemnity83.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

new pfo_ribbon;

class pfo_ribbon {

	function __construct() {
		add_action( 'wp_print_styles' , array( &$this, 'enqueue_style' ) );
		add_action( 'wp_footer', array( &$this, 'enqueue_ribbon' ) );
	}
	
	function pfo_ribbon() { $this->__construct(); }

	function enqueue_ribbon() {
		$imgUrl = WP_PLUGIN_URL . '/pink-for-october-ribbon/ribbon.png';
		$imgLink = 'http://pinkforoctober.org';	#TODO: Make this a configurable option
		echo "<img src='$imgUrl' usemap='#p4o' id='p4o'><map name='p4o' id='p4o'><area shape='poly' coords='0,0,126,0,231,90,231,206' href='$imgLink'></map>";
	}
	
	function enqueue_style() {
		
		$styleUrl = WP_PLUGIN_URL . '/pink-for-october-ribbon/style.css';
        $styleFile = WP_PLUGIN_DIR . '/pink-for-october-ribbon/style.css';
        if ( file_exists($styleFile) ) {
            wp_register_style( 'p4o', $styleUrl );
            wp_enqueue_style( 'p4o' );
        }
	}
	
}
?>
