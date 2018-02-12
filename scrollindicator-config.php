<?php

if ( ! class_exists( 'Redux' ) ) {
    return;
}

// This is your option name where all the Redux data is stored.
$opt_name = "scrollindicator_settings";

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => __( 'Scroll Indicator', 'scrollindicator' ),
    // Name that appears at the top of your panel
    'display_version'      => '1',
    // Version that appears at the top of your panel
    'menu_type'            => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => __( 'Scroll Indicator', 'scrollindicator' ),
    'page_title'           => __( 'Scroll Indicator', 'scrollindicator' ),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => false,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => 'dashicons-text',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'scrollindicator_options',
    // Page slug used to denote the panel
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    //'compiler'             => true,

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'light',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'fade',
                'duration' => '200',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'fade',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    )
);

// ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
/*
$args['admin_bar_links'][] = array(
    'id'    => 'redux-docs',
    'href'  => 'http://docs.reduxframework.com/',
    'title' => __( 'Documentation', 'scrollindicator' ),
);

$args['admin_bar_links'][] = array(
    //'id'    => 'redux-support',
    'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
    'title' => __( 'Support', 'scrollindicator' ),
);

$args['admin_bar_links'][] = array(
    'id'    => 'redux-extensions',
    'href'  => 'reduxframework.com/extensions',
    'title' => __( 'Extensions', 'scrollindicator' ),
);
*/

// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
/*
$args['share_icons'][] = array(
    'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
    'title' => 'Visit us on GitHub',
    'icon'  => 'el el-github'
    //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
);
*/

// Panel Intro text -> before the form
/*
if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
    if ( ! empty( $args['global_variable'] ) ) {
        $v = $args['global_variable'];
    } else {
        $v = str_replace( '-', '_', $args['opt_name'] );
    }
    $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'scrollindicator' ), $v );
} else {
    $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'scrollindicator' );
}

// Add content after the form.
$args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'scrollindicator' );
*/

Redux::setArgs( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START HELP TABS
 */

/*
$tabs = array(
    array(
        'id'      => 'redux-help-tab-1',
        'title'   => __( 'Theme Information 1', 'scrollindicator' ),
        'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'scrollindicator' )
    ),
    array(
        'id'      => 'redux-help-tab-2',
        'title'   => __( 'Theme Information 2', 'scrollindicator' ),
        'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'scrollindicator' )
    )
);
Redux::setHelpTab( $opt_name, $tabs );

// Set the help sidebar
$content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'scrollindicator' );
Redux::setHelpSidebar( $opt_name, $content );
*/

/*
 * <--- END HELP TABS
 */


/*
 *
 * ---> START SECTIONS
 *
 */

/*

    As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


 */

// -> START Reading Progress
Redux::setSection( $opt_name, array(
    'title' => __( 'Reading Progress', 'scrollindicator' ),
    'id'    => 'progress',
    'desc'  => __( 'Displays a reading progress bar indicator showing the user how far scrolled through the current post they are.', 'scrollindicator' ),
    'icon'  => 'el el-bookmark-empty'
) );

Redux::setSection( $opt_name, array(
    'title'      => __( 'Functionality', 'scrollindicator' ),
    'id'         => 'progress-functionality',
    'subsection' => true,
    'desc'		 => __( 'How the progress bar works.', 'scrollindicator' ),
    'fields'     => array(
    	array(
            'id'       => 'progress-display',
            'type'     => 'button_set',
            'title'    => __( 'Display On', 'scrollindicator' ),
            'multi'    => true,
            'options'  => array(
                'post' => 'Posts',
                'page' => 'Pages',
                'home' => 'Home Page'
            ),
            'default'  => array('posts')
        ),
        array(
            'id'       => 'progress-cpts',
            'type'     => 'button_set',
            'multi'    => true,
            'title'    => __( 'Custom Post Types', 'scrollindicator' ),
            'subtitle' => __( 'You can show the progress bar on custom post types, too', 'scrollindicator' ),
            'desc' => __( 'These are added by your theme and/or plugins', 'scrollindicator' ),
            'data'     => 'post_types',
            'args' 	   => array(
            				'public' => true, 
            				'_builtin' => false
            			),
        ),
        array(
            'id'       => 'progress-comments',
            'type'     => 'switch',
            'title'    => __( 'Include Comments', 'scrollindicator' ),
            'subtitle' => __( 'The post comments should be included in the progress bar length', 'scrollindicator' ),
            'default'  => false,
        ),
        array(
            'id'       => 'progress-placement',
            'type'     => 'image_select',
            'title'    => __( 'Placement', 'scrollindicator' ),
            //Must provide key => value(array:title|img) pairs for radio options
            'options'  => array(
                'top' => array(
                    'alt' => 'Top',
                    'img' => ReduxFramework::$_url . 'assets/img/top.png'
                ),
                'bottom' => array(
                    'alt' => 'Bottom',
                    'img' => ReduxFramework::$_url . 'assets/img/bottom.png'
                ),
                'left' => array(
                    'alt' => 'Left',
                    'img' => ReduxFramework::$_url . 'assets/img/left.png'
                ),
                'right' => array(
                    'alt' => 'Right',
                    'img' => ReduxFramework::$_url . 'assets/img/right.png'
                )
            ),
            'default'  => 'top'
        ),
        array(
            'id'            => 'progress-offset',
            'type'          => 'slider',
            'title'          => __( 'Offset', 'scrollindicator' ),
            'subtitle'       => __( 'The progress bar can be offset from the Placement edge specified above', 'scrollindicator' ),
            'desc'           => __( 'This is handy for fixed headers and menus that you don\'t want covered up', 'scrollindicator' ),
            'default'       => 0,
            'min'           => 0,
            'step'          => 1,
            'max'           => 500,
            'display_value' => 'text'
        ),
        array(
            'id'       => 'progress-fixed-opacity',
            'type'     => 'switch',
            'title'    => __( 'Fixed Opacity', 'scrollindicator' ),
            'subtitle' => __( 'Always use the Muted Opacity - opacity will not change on scroll', 'scrollindicator' ),
            'default'  => false,
        ),
        array(
            'id'       => 'progress-touch',
            'type'     => 'switch',
            'title'    => __( 'Touch Devices', 'scrollindicator' ),
            'subtitle' => __( 'Display on touch screen devices like phones and tablets', 'scrollindicator' ),
            'default'  => false,
        ),
        array(
            'id'       => 'progress-placement-touch',
            'type'     => 'image_select',
            'title'    => __( 'Touch Placement', 'scrollindicator' ),
            'subtitle'       => __( 'You can have different placement for touch devices.', 'scrollindicator' ),
            //Must provide key => value(array:title|img) pairs for radio options
            'options'  => array(
                'top' => array(
                    'alt' => 'Top',
                    'img' => ReduxFramework::$_url . 'assets/img/top.png'
                ),
                'bottom' => array(
                    'alt' => 'Bottom',
                    'img' => ReduxFramework::$_url . 'assets/img/bottom.png'
                ),
                'left' => array(
                    'alt' => 'Left',
                    'img' => ReduxFramework::$_url . 'assets/img/left.png'
                ),
                'right' => array(
                    'alt' => 'Right',
                    'img' => ReduxFramework::$_url . 'assets/img/right.png'
                )
            ),
            'default'  => 'top',
            'required' => array('progress-touch', 'equals', '1' )
        ),
        array(
            'id'            => 'progress-offset-touch',
            'type'          => 'slider',
            'title'          => __( 'Touch Offset', 'scrollindicator' ),
            'subtitle'       => __( 'You can have a different offset for touch devices.', 'scrollindicator' ),
            'default'       => 0,
            'min'           => 0,
            'step'          => 1,
            'max'           => 500,
            'display_value' => 'text',
            'required' => array('progress-touch', 'equals', '1' )
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'      => __( 'Style', 'scrollindicator' ),
    'id'         => 'progress-style',
    'subsection' => true,
    'desc'		 => __( 'How the progress bar looks.', 'scrollindicator' ),
    'fields'     => array(
        array(
            'id'            => 'progress-thickness',
            'type'          => 'slider',
            'title'          => __( 'Thickness', 'scrollindicator' ),
            'default'       => 5,
            'min'           => 1,
            'step'          => 1,
            'max'           => 500,
            'display_value' => 'text'
        ),
        array(
            'id'       => 'progress-foreground',
            'type'     => 'color',
            //'output'   => array( '.site-title' ),
            'title'    => __( 'Foreground', 'scrollindicator' ),
            'subtitle' => __( 'The part that moves on scroll', 'scrollindicator' ),
            'default'  => '#f44813',
        ),
        array(
            'id'            => 'progress-foreground-opacity',
            'type'          => 'slider',
            'title'          => __( 'Foreground Opacity', 'scrollindicator' ),
            'default'       => 0.5,
            'min'           => 0,
            'step'          => 0.01,
            'max'           => 1,
            'resolution'    => 0.01,
            'display_value' => 'label'
        ),
        array(
            'id'       => 'progress-background',
            'type'     => 'color',
            //'output'   => array( '.site-title' ),
            'title'    => __( 'Background', 'scrollindicator' ),
            'subtitle' => __( 'Stationary. Does not apply when Transparent Background is on', 'scrollindicator' ),
            'default'  => '#FFFFFF',
        ),
        array(
            'id'       => 'progress-comments-background',
            'type'     => 'color',
            //'output'   => array( '.site-title' ),
            'title'    => __( 'Comments Background', 'scrollindicator' ),
            'subtitle' => __( 'Only applies if Include Comments is on.', 'scrollindicator' ),
            'default'  => '#ffcece',
        ),
        array(
            'id'       => 'progress-transparent-background',
            'type'     => 'switch',
            'title'    => __( 'Transparent Background', 'scrollindicator' ),
            'subtitle' => __( 'Only the foreground (scrolling bar) will appear', 'scrollindicator' ),
            'default'  => false,
        ),
        array(
            'id'            => 'progress-muted-opacity',
            'type'          => 'slider',
            'title'         => __( 'Muted Opacity', 'scrollindicator' ),
            'subtitle'		=> __( 'Bar opacity while idle (not scrolling)', 'scrollindicator' ),
            'hint'     		=> array(
                    			'title'   => 'Tip',
                    			'content' => '.50 seems to work pretty well here'
                    		),
            'default'       => 0.5,
            'min'           => 0,
            'step'          => 0.01,
            'max'           => 1,
            'resolution'    => 0.01,
            'display_value' => 'label'
        ),
        array(
            'id'       => 'progress-muted-foreground',
            'type'     => 'color',
            'title'    => __( 'Muted Foreground', 'scrollindicator' ),
            'subtitle' => __( "Foreground color whilte idle (not scrolling)", 'scrollindicator' ),
            'default'  => '#f44813',
        ),
    )
) );


// -> START Time Commitment
Redux::setSection( $opt_name, array(
    'title' => __( 'Time Commitment', 'scrollindicator' ),
    'id'    => 'time',
    'desc'  => __( 'A text label at the beginning of the post/page informing the user how long it will take them to read it, assuming a 200wpm pace.', 'scrollindicator' ),
    'icon'  => 'el el-time'
) );

Redux::setSection( $opt_name, array(
    'title'      => __( 'Functionality', 'scrollindicator' ),
    'id'         => 'time-functionality',
    'subsection' => true,
    'desc'		 => __( 'How the time commitment label works.', 'scrollindicator' ),
    'fields'     => array(
        array(
            'id'       => 'time-display',
            'type'     => 'button_set',
            'title'    => __( 'Display On', 'scrollindicator' ),
            'multi'    => true,
            'options'  => array(
                'post' => 'Posts',
                'page' => 'Pages'
            ),
            'default'  => array('post')
        ),
        array(
            'id'       => 'time-cpts',
            'type'     => 'button_set',
            'multi'    => true,
            'title'    => __( 'Custom Post Types', 'scrollindicator' ),
            'subtitle' => __( 'You can show the time commitment label on custom post types, too', 'scrollindicator' ),
            'desc' => __( 'These are added by your theme and/or plugins', 'scrollindicator' ),
            'data'     => 'post_types',
            'args'     => array(
                            'public' => true, 
                            '_builtin' => false
                        ),
        ),
        array(
            'id'       => 'time-placement',
            'type'     => 'radio',
            'title'    => __( 'Placement', 'scrollindicator' ),
            'subtitle' => __( 'Only used where specified to display via the options above. If there is nothing selected for Display On or Custom Post Types, the only way to display the time commitment label is by using the shortcode.', 'scrollindicator' ),
            'desc' => __( 'Or you can use this shortcode: <b style="color:#05c134;">[scrollindicator-time]</b>', 'scrollindicator'),
            'options'  => array(
                'before-title' => 'Before Title',
                'after-title' => 'After Title',
                'before-content' => 'Before Content'
            ),
            'default'  => 'after-title'
        ),
        array(
            'id'       => 'time-format',
            'type'     => 'text',
            'title'    => __( 'Format', 'scrollindicator' ),
            'subtitle' => __( 'Use # as a placeholder for the number', 'scrollindicator' ),
            'desc'     => __( 'Example: "# min read" becomes "12 min read"', 'scrollindicator' ),
            'default'  => '# min read',
        ),
        array(
            'id'       => 'time-block-level',
            'type'     => 'switch',
            'title'    => __( 'Block-Level', 'scrollindicator' ),
            'subtitle' => __( 'Do not float the label next to anything (make it its own line)', 'scrollindicator' ),
            'default'  => false,
        )
    )
) );

Redux::setSection( $opt_name, array(
    'title'      => __( 'Style', 'scrollindicator' ),
    'id'         => 'time-style',
    'subsection' => true,
    'desc'		 => __( 'How the time commitment label looks.', 'scrollindicator' ),
    'fields'     => array(
        array(
            'id'       => 'time-typography',
            'type'     => 'typography',
            'title'    => __( 'Font', 'scrollindicator' ),
            'subtitle' => __( 'Leave unselected to use theme defaults', 'scrollindicator' ),
            'google'   => true,
            'output'   => array('.scrollindicator-time-wrap'),
            'default'  => array(
                'color'       => '#CCCCCC',
                'font-size'   => '16px',
            ),
        ),
        array(
            'id'       => 'time-css',
            'type'     => 'ace_editor',
            'title'    => __( 'Custom CSS', 'scrollindicator' ),
            'mode'     => 'css',
            'theme'    => 'monokai',
            'default'  => "
.scrollindicator-time-wrap{ 
	/* wraps the entire label */
	margin: 0 10px;

}
.scrollindicator-time-number{ 
	/* applies only to the number */
	
}"
        ),
    )
) );

/*
 * <--- END SECTIONS
 */


?>