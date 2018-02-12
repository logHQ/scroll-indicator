<?php
/**
 * Plugin Name: Scroll Indicator
 * Plugin URI: https://login.plus/
 * Description: Scroll Indicator shows a progress bar which syncs with page scroll.
 * Version: 1
 * Author: LogHQ
 * Author URI: https://login.plus/
 * License: GPL2
 */

// Grab the ReduxCore framework
require_once (dirname(__FILE__) . '/options/framework.php');

// plugin settings
require_once (dirname(__FILE__) . '/scrollindicator-config.php');


# load front-end assets
add_action( 'wp_enqueue_scripts', 'scrollindicator_enqueued_assets' );
function scrollindicator_enqueued_assets() {
	# don't load js and css on homepage unless this is set to display there
	$options = get_option( 'scrollindicator_settings' );
	$types = is_array($options['progress-display']) ? $options['progress-display'] : array();
	$load_scripts = true;
	if(is_front_page() && !in_array('home', $types)) {
		$load_scripts = false;
	}
	if($load_scripts) {
		wp_enqueue_script( 'scrollindicator-js', plugin_dir_url( __FILE__ ) . 'js/scrollindicator.js', array( 'jquery' ), false, true );
		wp_enqueue_style( 'scrollindicator-css', plugin_dir_url( __FILE__ ) . 'css/scrollindicator.css', false, false, 'all');
	}
}

# wrap content in div with php variables in data attributes
add_filter( 'the_content', 'scrollindicator_wrap_content', 10, 2 ); 
function scrollindicator_wrap_content( $content ) { 
	global $post;
	$options = get_option( 'scrollindicator_settings' );
	$placement = $options['progress-placement'];
	$placement_offset = empty($options['progress-offset']) ? 0 : $options['progress-offset'];
	$placement_touch = $options['progress-placement-touch'];
	$placement_offset_touch = empty($options['progress-offset-touch']) ? 0 : $options['progress-offset-touch'];
	$width = $options['progress-thickness'];
	$fgopacity = $options['progress-foreground-opacity'];
	$mutedopacity = $options['progress-muted-opacity'];
	$mute = isset($options['progress-fixed-opacity']) ? $options['progress-fixed-opacity'] : '';
	$transparent = isset($options['progress-transparent-background']) ? $options['progress-transparent-background'] : '';
	$touch = isset($options['progress-touch']) ? $options['progress-touch'] : '';
	$comments = get_comment_count($post->ID) > 0 ? $options['progress-comments'] : 0;
	$comments_bg = $options['progress-comments-background'];
	$fg = $options['progress-foreground'];
	$bg = $options['progress-background'];
	$fg_muted = $options['progress-muted-foreground'];
	$types_builtin = is_array($options['progress-display']) ? $options['progress-display'] : array();
	$types_cpts = array();
	if(isset($options['progress-cpts'])) {
		if(is_array($options['progress-cpts'])) $types_cpts = $options['progress-cpts'];
	}
	$types = array_merge($types_builtin, $types_cpts);
	if ( !empty($types) && is_singular($types)) {
		$content = '<div id="scrollindicator-content" 
	    	data-bg="' . $bg . '" 
	    	data-fg="' . $fg . '" 
	    	data-width="' . $width . '" 
	    	data-mute="' . $mute . '" 
	    	data-fgopacity="' . $fgopacity . '" 
	    	data-mutedopacity="' . $mutedopacity . '" 
	    	data-placement="' . $placement . '" 
	    	data-placement-offset="' . $placement_offset . '" 
	    	data-placement-touch="' . $placement_touch . '" 
		    data-placement-offset-touch="' . $placement_offset_touch . '" 
	    	data-transparent="' . $transparent . '" 
	    	data-touch="' . $touch . '" 
	    	data-comments="' . $comments . '" 
	    	data-commentsbg="' . $comments_bg . '" 
	    	data-location="page" 
	    	data-mutedfg="' . $fg_muted . '" 
	    	>' . $content . '</div>';
	}
	return $content;
}

# display on the home page 
add_action( 'wp_footer', 'scrollindicator_wrap_home', 10, 2 ); 
function scrollindicator_wrap_home() {
	global $post;
	$options = get_option( 'scrollindicator_settings' );
	$placement = $options['progress-placement'];
	$placement_offset = empty($options['progress-offset']) ? 0 : $options['progress-offset'];
	$placement_touch = $options['progress-placement-touch'];
	$placement_offset_touch = empty($options['progress-offset-touch']) ? 0 : $options['progress-offset-touch'];
	$width = $options['progress-thickness'];
	$fgopacity = $options['progress-foreground-opacity'];
	$mutedopacity = $options['progress-muted-opacity'];
	$mute = isset($options['progress-fixed-opacity']) ? $options['progress-fixed-opacity'] : '';
	$transparent = isset($options['progress-transparent-background']) ? $options['progress-transparent-background'] : '';
	$touch = isset($options['progress-touch']) ? $options['progress-touch'] : '';
	$comments = get_comment_count($post->ID) > 0 ? $options['progress-comments'] : 0;
	$comments_bg = $options['progress-comments-background'];
	$fg = $options['progress-foreground'];
	$bg = $options['progress-background'];
	$fg_muted = $options['progress-muted-foreground'];
	$types_home = false;
	if(isset($options['progress-display'])) {
		if(in_array('home', $options['progress-display'])) {
			$types_home = true;
		}
	}

	# only do this if the home page is not showing a static page
	# because this would fall under the "page" post type instead
	if(is_front_page() && is_home() && $types_home) {
		echo '<div id="scrollindicator-content" 
		    	data-bg="' . $bg . '" 
		    	data-fg="' . $fg . '" 
		    	data-width="' . $width . '" 
		    	data-mute="' . $mute . '" 
		    	data-fgopacity="' . $fgopacity . '" 
		    	data-mutedopacity="' . $mutedopacity . '" 
		    	data-placement="' . $placement . '" 
		    	data-placement-offset="' . $placement_offset . '" 
		    	data-placement-touch="' . $placement_touch . '" 
		    	data-placement-offset-touch="' . $placement_offset_touch . '" 
		    	data-transparent="' . $transparent . '" 
		    	data-touch="' . $touch . '" 
		    	data-comments="' . $comments . '" 
		    	data-commentsbg="' . $comments_bg . '" 
		    	data-location="home" 
		    	data-mutedfg="' . $fg_muted . '" 
		    	></div>';
	}
}

# wrap comments in div so we can get ahold of a total comment section height
# one of these two actions will usually run, but never at the same time
add_action( 'comment_form_after', 'scrollindicator_wrap_comments' );
add_action( 'comment_form_closed', 'scrollindicator_wrap_comments' );
function scrollindicator_wrap_comments() {
	global $post;
	if(get_comment_count($post->ID) > 0) echo '<div id="scrollindicator-comments-end"></div>';
}
# if the theme doesn't use either of those actions, try another one
if(!has_action( 'scrollindicator_wrap_comments' )) add_action( 'wp_footer', 'scrollindicator_wrap_comments_footer' );
function scrollindicator_wrap_comments_footer() {
	global $post;
	# don't add this on homepage unless this is set to display there
	$options = get_option( 'scrollindicator_settings' );
	$types_home = false;
	if(isset($options['progress-display'])) {
		if(in_array('home', $options['progress-display'])) {
			$types_home = true;
		}
	}
	$show_div = true;
	if(is_front_page() && !$types_home) {
		$show_div = false;
	}
	if(get_comment_count($post->ID) > 0 && $show_div) echo '<div id="scrollindicator-comments-end" class="at-footer"></div>';
}

# time commitment placement
add_action('loop_start','scrollindicator_conditional_title');
function scrollindicator_conditional_title($query){
    
	global $wp_query;
	if($query === $wp_query) {
		add_filter( 'the_title', 'scrollindicator_filter_title', 10, 2);
	} else {
		remove_filter( 'the_title', 'scrollindicator_filter_title', 10, 2);
	}
    
}
function scrollindicator_filter_title( $title, $post_id ) {
    
	$options = get_option( 'scrollindicator_settings' );
	$types_builtin = is_array($options['time-display']) ? $options['time-display'] : array();
	$types_cpts = array();
    
	if(isset($options['time-cpts'])) {
		if(is_array($options['time-cpts'])) $types_cpts = $options['time-cpts'];
	}
    
	$types = array_merge($types_builtin, $types_cpts);
	$placement = $options['time-placement'];
    
    global $post;
    // die(" post id " . $post->ID );
    if(
        ( ($post->ID) && ($post->ID == $post_id)) && 
        in_the_loop() && 
        ( is_singular($types) && !empty($types) ) 
    ) {
        
        if($placement=='before-title') {
            $title = scrollindicator_time_commitment() . $title;
        }elseif($placement=='after-title') {
            $title = $title . scrollindicator_time_commitment();
        }
    	
        
    }
    
    return $title;
}
add_filter( 'the_content', 'scrollindicator_filter_content', 10, 2);
function scrollindicator_filter_content( $content ) {
	$options = get_option( 'scrollindicator_settings' );
	$types_builtin = is_array($options['time-display']) ? $options['time-display'] : array();
	$types_cpts = array();
	if(isset($options['time-cpts'])) {
		if(is_array($options['time-cpts'])) $types_cpts = $options['time-cpts'];
	}
	$types = array_merge($types_builtin, $types_cpts);
	$placement = $options['time-placement'];
	if((is_singular($types) && !empty($types))) {
	    if($placement=='before-content') {
	    	$content = scrollindicator_time_commitment() . $content;
	    }
	}
    return $content;
}

function scrollindicator_time_commitment() {
	$out = '';
	global $post;
	$word_count = str_word_count(strip_tags(get_post_field( 'post_content', $post->ID )));
	$time_length = round($word_count / 200);
	// minimum read time is 1 minute
	if($time_length == 0) $time_length = 1; 
	$options = get_option( 'scrollindicator_settings' );
	$time_format = empty($options['time-format']) ? '# min read' : $options['time-format'];
    $time_label = str_replace('#', '<span class="scrollindicator-time-number">' . $time_length . '</span>', $time_format);
    $time_typography = $options['time-typography'];
    $placement = $options['time-placement'];
    $cssblock = isset($options['time-block-level']) ? $options['time-block-level'] : '';
    $cssblock = $cssblock ? ' block' : '';
	$out .= '<span class="scrollindicator-time-wrap' . $cssblock . ' ' . $placement . '">' . $time_label . '</span>';
	return $out;
}

# add the custom css to the head
add_action('wp_head','scrollindicator_custom_css');
function scrollindicator_custom_css() {
	$options = get_option( 'scrollindicator_settings' );
	$css = $options['time-css'];
	if(!empty($css)) echo '<style type="text/css">' . $css . '</style>';
}

# create the time commitment shortcode
add_shortcode( 'scrollindicator-time', 'scrollindicator_time_commitment' );

?>