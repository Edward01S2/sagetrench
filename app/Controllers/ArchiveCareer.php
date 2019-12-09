<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class ArchiveCareer extends Controller
{

  public function careerLoop() {
    $careers = get_posts([
        'post_type' => 'career',
        'posts_per_page'=>'-1',
        'order' => 'ASC',
        // 'meta_query' => array(
        //   array(
        //     'key' => 'featured',
        //     'value' => 'featured',
        //   )
        // )
    ]);

    return array_map(function ($post) {
      return [
        'name' => get_the_title($post->ID),
        'location' => get_field("location", $post->ID),
        'content'=>get_field("excerpt", $post->ID),
        'link' => get_permalink($post->ID),
      ];
    }, $careers);
  }
}
