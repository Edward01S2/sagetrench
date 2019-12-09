<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FrontPage extends Controller
{
  protected $acf = true;

  public function products() {
   return array_map(function($product) {
      return [
         'button' => $product['button_link'] ?? null,
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

}
