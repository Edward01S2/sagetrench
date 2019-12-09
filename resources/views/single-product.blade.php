@extends('layouts.app')

@section('content')
  <section id="hero">
    <div class="" style="background: center / cover url('{{ $options_page->acf_options['product_image']['url'] }}')">
      <div class="container mx-auto flex justify-center items-center px-8 md:justify-start">
        <h2 class="text-4xl leading-tight text-center lg:text-5xl font-medium py-16 md:w-1/2 md:py-12 md:text-left lg:w-3/5 lg:py-22 xl:py-24 xl:pr-16">{!! App::title() !!}</h2>
      </div>
    </div>
  </section>

  <div class="container mx-auto pt-8 px-8 lg:py-16 lg:flex">
    <div class="">
      <div class="md:w-1/2 md:pl-8 md:float-right md:-mt-52 lg:w-2/5 lg:pl-8 lg:-mt-64 xl:pl-12">
        <img class="pb-8" src="{!! App::featImage() !!}" alt="">
      </div>
      <div class="product-content pb-8 md:order-1">
        @while(have_posts()) @php the_post() @endphp
          @php the_content() @endphp
        @endwhile
      </div>
    </div>
 
  </div>

  <div class="bg-s-yellow">
    <div class="container mx-auto">
      <p class="py-12 px-8 lg:px-32 text-center text-xl md:text-lg lg:text-xl">{!! $options_page->acf_options['product_footer_content'] !!}</p>
    </div>
  </div>
@endsection
