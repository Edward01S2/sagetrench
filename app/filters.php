<?php

namespace App;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-Location/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment', 'embed'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    collect(['get_header', 'wp_head'])->each(function ($tag) {
        ob_start();
        do_action($tag);
        $output = ob_get_clean();
        remove_all_actions($tag);
        add_action($tag, function () use ($output) {
            echo $output;
        });
    });
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Render comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );

    $data = collect(get_body_class())->reduce(function ($data, $class) use ($comments_template) {
        return apply_filters("sage/template/{$class}/data", $data, $comments_template);
    }, []);

    $theme_template = locate_template(["Location/{$comments_template}", $comments_template]);

    if ($theme_template) {
        echo template($theme_template, $data);
        return get_stylesheet_directory().'/index.php';
    }

    return $comments_template;
}, 100);

//Populate Position Field on Form
add_filter( 'gform_pre_render_2', __NAMESPACE__ . '\\populate_posts' );
add_filter( 'gform_pre_validation_2', __NAMESPACE__ . '\\populate_posts' );
add_filter( 'gform_pre_submission_filter_2', __NAMESPACE__ . '\\populate_posts' );
add_filter( 'gform_admin_pre_render_2', __NAMESPACE__ . '\\populate_posts' );
function populate_posts( $form ) {

    foreach ( $form['fields'] as &$field ) {

        // if ( $field->type != 'select' && strpos( $field->cssClass, 'pop-position' ) === false) {
        //     continue;
        // }

        if(!($field['id'] == 4)) {
            continue;
        }

        // you can add additional parameters here to alter the posts that are retrieved
        // more info: http://codex.wordpress.org/Template_Tags/get_posts
        $posts = get_posts( 'numberposts=-1&post_type=career&orderby=title&order=ASC' );

        $choices = array();

        foreach ( $posts as $post ) {
            $location = get_field( "location", $post->ID );
            $choice = $post->post_title . ', ' . $location;
            $choices[] = array( 
                'text' => $choice, 
                'value' => $choice );
        }

        // update 'Select a Post' to whatever you'd like the instructive option to be
        $field->placeholder = "Position I'm Interested In";
        $field->choices = $choices;

    }

    return $form;
}

//Populate Position Field on Job Form
add_filter( 'gform_field_value_job_position', function () {
    $current_post = get_queried_object();
    return $current_post->post_title;
});

add_filter( 'gform_field_value_job_location', function () {
    $current_post = get_queried_object();
    $location = get_field( "location", $current_post->ID );
    return $location;
});

// Add the custom columns to the career post type:

add_filter('manage_career_posts_columns', function ($columns) {
    $columns = array(
        'cb'    => '&lt;input type="checkbox" />',
        'title'     => 'Title',
        'location'  => 'Location',
        'date'        =>    'Date',
    );
    return $columns;
});

add_action('manage_posts_custom_column', function($column) {
    global $post;
    switch ($column) {
        case 'location':
            echo get_field( "location", $post->ID );
            break;
        default:
            break;
    }
}, 10, 2);

add_filter( 'manage_edit-career_sortable_columns', function ( $columns ) {
  $columns['location'] = 'location';
  return $columns;
});

add_action( 'pre_get_posts', function ( $query ) {
  if( ! is_admin() || ! $query->is_main_query() ) {
    return;
  }

  if ( 'location' === $query->get( 'orderby') ) {
    $query->set( 'orderby', 'meta_value' );
    $query->set( 'meta_key', 'location' );
  }
});

add_filter('get_search_form', function () {
    return \App\template( 'partials.search-form-header' );
});

function my_theme_doctors_menu_filter( $items, $menu, $args ) {
    $child_items = array(); // here, we will add all items for the single posts
    $menu_order = count($items); // this is required, to make sure it doesn't push out other menu items
    $parent_item_id = 0; // we will use this variable to identify the parent menu item
    $rand_id = 999923;
  
    //First, we loop through all menu items to find the one we want to be the parent of the sub-menu with all the posts.
    foreach ( $items as $item ) {
      if ( in_array('parent-products', $item->classes) ){
          $parent_item_id = $item->ID;
      }
    }

    $cats = get_terms('category');
  
    if($parent_item_id > 0){
  
        foreach ( $cats as $cat ) {
            $post = new \stdClass();
            $post->menu_item_parent = $parent_item_id;
            $post->post_type = 'nav_menu_item';
            $post->object = 'custom';
            $post->type = 'custom';
            $post->menu_order = ++$menu_order;
            $post->title = $cat->name;
            $post->url = '/products/#' . $cat->slug;
            $post->ID = 0;
            $post->db_id = 0;
            $post->object_id = 0;
            $post->classes = array();
            $post->xfn = '';
            $post->target = '';
            $post->attr_title = '';
            $post->description = '';

            if($cat->name === 'Rental Pump') {
                $post->url = 'https://www.sagepump.com/';
                $post->target = "_blank";
            }

            array_push($child_items, $post);

        }
  
    }
  
    return array_merge( $items, $child_items );
  }

  add_filter( 'wp_get_nav_menu_items', __NAMESPACE__ . '\\my_theme_doctors_menu_filter', 10, 3 );