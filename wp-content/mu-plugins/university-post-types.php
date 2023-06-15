<?php


function university_post_types()
{
  // event post type
    register_post_type('event', array(
        'supports' => array('title', 'editor', 'excerpt', 'custom-fields'), // Enable support for title, editor, and excerpt
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'events'), // Set the URL slug for the post type to 'events'
        'public' => true, // Allow the post type to be publicly accessible
        'has_archive' => true, // Enable the post type archive page
        'labels' => array(
          'name' => 'Events', // Plural label for the post type
          'add_new_item' => 'Add New Event', // Label for adding a new event
          'edit_item' => 'Edit Event', // Label for editing an event
          'all_items' => 'All Events', // Label for displaying all events
          'singular_name' => 'Event' // Singular label for the post type
        ),
        'menu_icon' => 'dashicons-calendar' // Dashicon to use as the menu icon for the post type
    ));


    // program post type
    register_post_type('program', array(
      'supports' => array('title', 'editor', 'custom-fields'), // Enable support for title, editor, and excerpt
      'show_in_rest' => true,
      'rewrite' => array('slug' => 'programs'), // Set the URL slug for the post type to 'events'
      'public' => true, // Allow the post type to be publicly accessible
      'has_archive' => true, // Enable the post type archive page
      'labels' => array(
        'name' => 'Programs', // Plural label for the post type
        'add_new_item' => 'Add New Program', // Label for adding a new event
        'edit_item' => 'Edit Program', // Label for editing an event
        'all_items' => 'All Programs', // Label for displaying all events
        'singular_name' => 'Program' // Singular label for the post type
      ),
      'menu_icon' => 'dashicons-awards' // Dashicon to use as the menu icon for the post type
  ));
}

add_action('init', 'university_post_types');
