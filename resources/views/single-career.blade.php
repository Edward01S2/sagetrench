@extends('layouts.app')

@section('content')
  <section id="hero">
    <div class="" style="background: center / cover url('{{ $options_page->acf_options['career_image']['url'] }}')">
      <div class="container mx-auto flex justify-center items-center px-8">
        <h2 class="text-4xl leading-tight text-center lg:text-5xl font-medium py-16 md:py-24 lg:py-28 xl:py-32">{!! App::title() !!}</h2>
      </div>
    </div>
  </section>

  <div class="container mx-auto pt-8 px-8 lg:py-16 lg:flex">
    <div class="lg:w-3/5 lg:pr-12">
      <h3 class="text-2xl font-medium text-s-yellow pb-2">{!! App::title() !!}</h3>
      <div class="flex items-center pb-6 lg:pb-4">
        <svg class="w-4 h-4 text-s-yellow fill-current" xmlns="http://www.w3.org/2000/svg" height="4" width="4" viewBox="0 0 20 20"><path d="M10 20S3 10.87 3 7a7 7 0 1 1 14 0c0 3.87-7 13-7 13zm0-11a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
        <p class="pl-2">{!! $location !!}</p>
      </div>
      <div class="career-content">
        @while(have_posts()) @php the_post() @endphp
          @php the_content() @endphp
        @endwhile
      </div>
    </div>
    <div class="py-8 md:max-w-xl md:mx-auto lg:w-2/5 lg:py-0">
      @php
        $form = $options_page->acf_options['career_form'];
        gravity_form_enqueue_scripts($form['id'], true);
        gravity_form($form['id'], false, false, false, '', true, 1);
      @endphp
    </div>
 
  </div>
@endsection
