<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class ArchiveProducts extends Controller
{

  public function products() {
    $cats = get_terms('category');
    
    $data = [];
    foreach($cats as $cat) {
      $args = [
        'category_name' => $cat->slug,
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'post_type' => 'products',
      ];

      $query = new \WP_Query($args);
      $posts = $query->posts;
      $data[$cat->name]['name'] = $cat->name;
      $data[$cat->name]['slug'] = $cat->slug; 
      foreach($posts as $post) {
        setup_postdata($post);
          $data[$cat->name]['posts'][] = [
            'name' => get_the_title($post->ID),
            'link' => get_the_permalink($post->ID),
            'image' => get_the_post_thumbnail_url($post->ID),
            'external' => get_field('external_url', $post->ID),
          ];


        wp_reset_postdata();
      }


    }

    return $data;

  }

}
