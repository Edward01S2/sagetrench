@extends('layouts.app')

@section('content')
  <section id="hero">
    <div class="" style="background: center / cover url('{!! App::featImage() !!}')">
      <div class="container mx-auto flex justify-center items-center px-8">
        <div class="py-16 md:py-24 lg:py-28 xl:py-32">
          <h2 class="text-4xl leading-tight lg:text-5xl font-medium mb-8">{!! $title !!}</h2>
          <div class="text-center">
            <a class="bg-s-stone text-white text-lg font-bold rounded-sm border shadow-md border-s-stone px-8 py-3 hover:bg-s-yellow hover:text-s-dark lg:text-xl xl:text-2xl" href="{!! $cta->link !!}">{!! $cta->title !!}</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="hero-boxes mt-6 md:-mt-7">
    <div class="container mx-auto">
      <div class="flex flex-col px-8 md:flex-row">
        @foreach($hero_boxes as $box)
          <div class="w-full my-2 bg-s-yellow md:w-1/4 md:mx-2 lg:mx-4">
            <p class="text-s-dark border border-s-dark font-bold text-center py-4 uppercase tracking-widest font-medium md:py-2 md:text-sm lg:text-lg">{!!$box->box!!}</p>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="container mx-auto pt-8 px-8 lg:py-16">
    <div class="page-content">
      <div class="flex flex-col pb-8 md:flex-row md:space-x-8 lg:space-x-12">
        <div class="md:w-1/2">
          <div class="lg:max-w-md lg:mx-auto">
            <img class="mb-4" src="{!! $content->image->url !!}" alt="">
            <div class="italic text-sm">{!! $content ->subtext !!}</div>
          </div>
        </div>
        <div class="content-markup md:w-1/2">
          {!! $content->content !!}
        </div>
      </div>
    </div>
  </div>

  <div class="bg-s-yellow">
    <div class="container mx-auto">
      <p class="py-12 px-8 lg:px-32 text-center text-xl md:text-lg lg:text-xl">{!! $pre_footer_text !!}</p>
    </div>
  </div>

@endsection
{{-- @dump($content) --}}
