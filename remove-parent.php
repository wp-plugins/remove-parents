<?php
/*
Plugin Name: Remove Parents
Plugin URI: http://wordpress.org/#
Description: Remove parent directories & "category" from permalinks.
Author: Alekc
Version: 1.0
Author URI: http://blog.alekc.org
*/
/*  Copyright 2007  Alexander Chernov  (email : alekcander@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
function kill_parent_cats($namedcatpath) {
	$result = $namedcatpath;
	$bloghome = get_bloginfo( 'home' );
	
	//removing "category" & parent cats
	//domain/category/parent_category/subcat
	if (preg_match('%' . $bloghome . '/category/.*/(.*?)$%i', $namedcatpath))
		$result =  preg_replace('%' . $bloghome . '/category/.*/(.*?)$%i', $bloghome . '/$1', $namedcatpath);
	//remove "category" in domain/category/parent_dir.
	else if (preg_match('%' . $bloghome . '/category/(.*?)$%i', $namedcatpath))
		$result = preg_replace('%' . $bloghome . '/category/(.*?)$%i', $bloghome . '/$1', $namedcatpath);
	return $result;	
}
function kill_parent_postlink($link) {
	$result = $link;
	//domain/parent_cat/sub_cat/post_name
	$bloghome = get_bloginfo( 'home' );
	if (preg_match('%' . $bloghome . '/.*?/(.*?)/(.*?)$%i', $link))
		$result = preg_replace('%' . $bloghome . '/.*?/(.*?)/(.*?)$%i', $bloghome . '/$1/$2', $link);
		
	return $result;
}
add_filter('category_link', 'kill_parent_cats');
add_filter('post_link','kill_parent_postlink');
?>