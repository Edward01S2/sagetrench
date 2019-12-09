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

  <div class="container mx-auto product-container">
    <a id="shoring-systems"></a>
    <div class="px-4 lg:px-0">
      <h3 class="uppercase text-s-yellow text-center py-8 font-medium text-3xl md:px-4 lg:pt-16 lg:pb-12"><span>Shoring Systems</span></h3>
      <div class="flex flex-col md:flex-row md:flex-wrap">
        @foreach($shoring_loop as $shore)
          <a class="px-8 md:w-1/3 md:px-4 lg:w-1/4" href="{!! $shore['link'] !!}">
            <div class="mb-8 group">
              <img class="pb-4 group-hover:opacity-75" src="{!! $shore['image'] !!}" alt="">
              <p class="uppercase text-center font-medium tracking-wide group-hover:text-s-yellow">{!! $shore['name'] !!}</p>
            </div>
          </a>
        @endforeach
      </div>
    </div>

    <a id="trench-sheets"></a>
    <div class="px-4 lg:px-0">
      <h3 class="uppercase text-s-yellow text-center py-8 font-medium text-3xl md:px-4 lg:pt-16 lg:pb-12"><span>Trench Sheets</span></h3>
      <div class="flex flex-col md:flex-row md:flex-wrap">
        @foreach($trench_loop as $shore)
          <a class="px-8 md:w-1/3 md:px-4 lg:w-1/4" href="{!! $shore['link'] !!}">
            <div class="mb-8 group">
              <img class="pb-4 group-hover:opacity-75" src="{!! $shore['image'] !!}" alt="">
              <p class="uppercase text-center font-medium tracking-wide group-hover:text-s-yellow">{!! $shore['name'] !!}</p>
            </div>
          </a>
        @endforeach
      </div>
    </div>
 
  </div>

  <div class="bg-s-yellow">
    <div class="container mx-auto">
      <p class="py-12 px-8 lg:px-32 text-center text-xl md:text-lg lg:text-xl">{!! $options_page->acf_options['product_archive_footer'] !!}</p>
    </div>
  </div>
  {{-- @debug --}}
@endsection
