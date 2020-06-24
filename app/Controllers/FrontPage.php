<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FrontPage extends Controller
{
  protected $acf = true;

  public function products() {
   return array_map(function($product) {
      return [
         'cat' => $product['category'] ?? null,
         'image' => $product['image'] ?? null,
      ];
   }, get_field('product') ?? []);
  }

  public function services() {
    return array_map(function($service) {
       return [
          'title' => $service['title'] ?? null,
          'text' => $service['text'] ?? null,
          'image' => $service['image'] ?? null,
       ];
    }, get_field('service') ?? []);
   }

   public function categories() {
      return get_categories();
   }

   // public function categories() {
   //    $cats = get_terms('category');
    
   //    $data = [];
   //    foreach($cats as $cat) {
   //      $args = [
   //        'category_name' => $cat->slug,
   //        'post_status' => 'publish',
   //        'posts_per_page' => -1,
   //        'post_type' => 'product',
   //      ];
  
   //      $query = new \WP_Query($args);
   //      $posts = $query->posts;
   //      $data[$cat->name]['name'] = $cat->name; 
   //      foreach($posts as $post) {
   //        setup_postdata($post);
   //          $data[$cat->name]['posts'][] = [
   //            'name' => get_the_title($post->ID),
   //            'link' => get_the_permalink($post->ID),
   //            'image' => get_the_post_thumbnail_url($post->ID),
   //          ];
  
  
   //        wp_reset_postdata();
   //      }
  
  
   //    }
  
   //    return $data;
   // }

}
