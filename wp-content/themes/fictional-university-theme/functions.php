<?php 
    
    // enequeue scripts
    function enqueue_fictional_scripts(){
        wp_enqueue_script('university_script', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
        wp_enqueue_style('university_fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
        wp_enqueue_style('university_icons', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style('university_main_styles', get_theme_file_uri('/build/style-index.css'));
        wp_enqueue_style('university_extra_styles', get_theme_file_uri('/build/index.css'));
    }
    add_action('wp_enqueue_scripts', 'enqueue_fictional_scripts');

    // theme support
    function university_features(){
        add_theme_support('title-tag');
        register_nav_menu('headerMenuLocation', 'Header Menu Location');
    }
    add_action('after_setup_theme', 'university_features');

  
    function university_adjust_queries($query){
        if(!is_admin() AND is_post_type_archive('event') AND $query->is_main_query() ){
            $query->set('meta_key' , 'event_date');
            $query->set('orderby' , 'meta_value_num');
            $query->set('order' , 'ASC');
        }
        if(!is_admin() AND is_post_type_archive('program') AND $query->is_main_query() ){
            $query->set('orderby' , 'title');
            $query->set('order' , 'ASC');
            $query->set('posts_per_page' , -1);
        }
    }


    add_action('pre_get_posts', 'university_adjust_queries');


?>
