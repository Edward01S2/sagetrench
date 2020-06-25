@extends('layouts.app')

@section('content')
  <section id="hero">
      <div class="" style="background: center / cover url('{{ $options_page->acf_options['product_archive_image']['url'] }}')">
        <div class="container mx-auto flex flex-col justify-center items-center px-8 py-16 lg:py-20 xl:py-24">
          <h2 class="text-4xl leading-tight text-center lg:text-5xl font-medium">{!! $options_page->acf_options['product_title'] !!}</h2>
          <p class="text-xl text-center font-medium md:text-2xl lg:text-3xl">{!! $options_page->acf_options['product_subtitle'] !!}</p>
        </div>
      </div>
    </section>

  <div class="container mx-auto px-8 pb-12 sm:px-6 md:pb-16 lg:pb-20 lg:px-8 product-container">

    @foreach($products as $post)
    <div id="{!! $post['slug'] !!}" class="invisible block relative pt-12 -mt-12"></div>
    <div class="lg:px-0">
      <h3 class="uppercase text-s-yellow text-center py-8 font-medium text-3xl lg:pt-16 lg:pb-12"><span>{!! $post['name'] !!}</span></h3>
      <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        {{-- @dump($post['posts']) --}}
        @foreach($post['posts'] as $shore)
          @if($shore['external'])
            <a class="" target="_blank" href="{!! $shore['external'] !!}">
          @else
            <a class="" href="{!! $shore['link'] !!}">
          @endif
            <div class="group">
              <img class="pb-4 object-cover h-72 object-center w-full group-hover:opacity-75" src="{!! $shore['image'] !!}" alt="">
              <p class="uppercase text-center font-medium tracking-wide group-hover:text-s-yellow">{!! $shore['name'] !!}</p>
            </div>
          </a>
        @endforeach
      </div>
    </div>
    @endforeach

  </div>

  <div class="bg-s-yellow">
    <div class="container mx-auto">
      <p class="py-12 px-8 lg:px-32 text-center text-xl md:text-lg lg:text-xl">{!! $options_page->acf_options['product_archive_footer'] !!}</p>
    </div>
  </div>
  {{-- @debug --}}
  {{-- @dump($products) --}}
@endsection
