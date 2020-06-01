@extends('layouts.app')

@section('content')

  <section id="hero">
    <div class="bg-s-yellow flex justify-center">
      <div class="px-8 text-s-dark md:px-0 md:pl-4 md:w-1/2 lg:pl-8">
        <div class="flex flex-col text-center items-center py-20 md:text-left md:items-start md:ml-auto md:w-384 lg:w-512 lg:py-32 xl:w-640 xl:py-40">
          <p class="text-2xl font-bold leading-tight lg:text-4xl xl:text-5xl">{!! $line_1 !!}</p>
          <h1 class="text-4xl mb-6 font-bold uppercase leading-none md:text-5xl lg:mb-12 lg:text-6xl xl:text-8xl">{!! $line_2 !!}</h1>
          <a href="{!! $hero_button->url !!}" class="bg-s-dark text-white px-8 py-3 uppercase text-sm font-bold tracking-widest hover:bg-s-stone">{!! $hero_button->title !!}</a>
        </div>
      </div>
      <div class="md:w-1/2" style="background-image: url('{!! $hero_image->url !!}'); background-size: cover; background-repeat: no-repeat;">
      </div>
    </div>
  </section>

  <section id="about">
    <div class="container mx-auto">
      <div class="flex flex-col items-center py-16 md:py-32">
        <h2 class="text-3xl md:text-5xl uppercase font-bold tracking-wider leading-none">{!! $about_title !!}</h2>
        <div class="text-center px-8 pb-4 md:px-32 about-content md:pb-12">
          {!! $about_content !!}
        </div>
        <a href="{!! $about_button->url !!}" class="bg-s-dark text-white px-8 py-3 uppercase text-sm font-bold tracking-widest hover:bg-s-stone">{!! $about_button->title !!}</a>
      </div>
    </div>
  </section>

  <section id="products">
    <div class="" style="background-image: -webkit-linear-gradient(165deg, #f8c12c 27%, #f7eee2 27%);">
      <div class="container mx-auto">
        <div class="flex flex-col items-center py-16 pb-12 md:py-20 md:pb-16 lg:py-24 lg:pb-20">
          <h2 class="text-3xl md:text-5xl uppercase font-bold tracking-wider leading-none mb-8">{!! $product_title !!}</h2>
            <div class="grid grid-cols-1 gap-8 px-8 md:grid-cols-2 xl:grid-cols-3 xl:px-0">
              @foreach($products as $product)
                @include('partials.product-item', $product)
              @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="services">
    <div class="container mx-auto">
        <div class="flex flex-col items-center py-16 pb-12 md:py-20 md:pb-16 lg:py-24 lg:pb-20">
          <h2 class="text-3xl md:text-5xl uppercase font-bold tracking-wider leading-none">{!! $service_title !!}</h2>
            <div class="service flex flex-col w-full justify-center pt-12 md:pt-4">
              @foreach($services as $service)
                @include('partials.service-item', $service)
              @endforeach
          </div>
        </div>
    </div>
  </section>

  <section id="contact" style="background-image: -webkit-linear-gradient(270deg, #fff 50%, #655d50 50%);">
    <div class="container mx-auto">
      <div class="bg-s-yellow">
        <div class="flex flex-col mx-auto items-center py-16 lg:py-24 md:w-3/4 lg:w-3/5 xl:w-1/2">
          <h2 class="text-3xl md:text-5xl uppercase font-bold tracking-wider leading-none pb-4">{!! $contact_title !!}</h2>
          <p class="text-base px-8 text-center pb-8 md:text-xl lg:text-2xl">{!! $contact_content !!}</p>
          @php
            gravity_form($form->id, false, false, false, '', true, 1);
          @endphp
        </div>
      </div>
    </div>
  </section>


  {{-- @debug --}}
@endsection

