<?php
/*
Plugin Name: Zip'm
Plugin URI: http://jshakespeare.com/zipm
Description: Outputs a link to ZIP and download all files attached to a post or page, like in GMail
Version: 0.1
Author: James Shakespeare
Author URI: http://jshakespeare.com
License: WTFPL
*/

//include("include/Zipm.class.php");

function zipm_init(){
    
    global $post;
    $zipm = new Zipm();
    
    
    
    
    $files_to_zip = array();
    $tmp_dir = "/tmp/";
    
    
}

function fetch_attachments($post_id){
    
    $attachments = $attachment_urls = array();
    
    //Get all child attachments
    $args = array(
        'post_parent' => $post_id,
        'post_type' => 'attachment'
    );
    
    $attachments = get_children($args);
    
    //Loop over them and just get out the URLs
    foreach($attachments as $attachment_id => $attachment){
        
        $attachment_urls[] = wp_get_attachment_link($attachment_id);
    }
    return $attachment_urls;
}

//add_shortcode('zipm', 'zipm_init');

?>