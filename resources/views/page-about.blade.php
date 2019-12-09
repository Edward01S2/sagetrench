@extends('layouts.app')

@section('content')
  <section id="hero">
    <div class="" style="background: center / cover url('{!! App::featImage() !!}')">
      <div class="container mx-auto flex justify-center items-center px-8">
        <h2 class="text-4xl leading-tight lg:text-5xl font-medium py-16 md:py-24 lg:py-28 xl:py-32">{!! $title !!}</h2>
      </div>
    </div>
  </section>

  <div class="hero-boxes mt-6 md:-mt-7">
    <div class="container mx-auto">
      <div class="flex flex-col px-8 md:flex-row">
        @foreach($hero_boxes as $box)
          <div class="w-full my-2 bg-s-stone md:w-1/4 md:mx-2 lg:mx-4">
            <p class="text-white text-center py-4 uppercase tracking-widest font-medium md:py-2 md:text-sm lg:text-lg">{!!$box->box!!}</p>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="container mx-auto pt-8 px-8 lg:py-16">
    <div class="page-content">
      @while(have_posts()) @php the_post() @endphp
        @include('partials.content-page')
      @endwhile
    </div>
  </div>

  <div class="bg-s-yellow">
    <div class="container mx-auto">
      <p class="py-12 px-8 lg:px-32 text-center text-xl md:text-lg lg:text-xl">{!! $pre_footer_text !!}</p>
    </div>
  </div>

@endsection
