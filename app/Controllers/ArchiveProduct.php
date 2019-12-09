<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class ArchiveProduct extends Controller
{

  public function shoringLoop() {
    $shores = get_posts([
        'post_type' => 'product',
        'posts_per_page'=>'-1',
        'category_name' => 'shoring',
        'order' => 'ASC',
    ]);

    return array_map(function ($post) {
      return [
        'name' => get_the_title($post->ID),
        'image' => get_the_post_thumbnail_url($post->ID),
        'link' => get_permalink($post->ID),
      ];
    }, $shores);
  }

  public function trenchLoop() {
    $trenches = get_posts([
        'post_type' => 'product',
        'posts_per_page'=>'-1',
        'category_name' => 'trench',
        'order' => 'ASC',
    ]);

    return array_map(function ($post) {
      return [
        'name' => get_the_title($post->ID),
        'image' => get_the_post_thumbnail_url($post->ID),
        'link' => get_permalink($post->ID),
      ];
    }, $trenches);
  }
}
