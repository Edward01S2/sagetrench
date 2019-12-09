@extends('layouts.app')

@section('content')
  <div class="bg-s-sand">
    <section id="hero">
      <div class="" style="background: center / cover url('{!! $options_page->acf_options['career_archive_image']['url'] !!}')">
        <div class="container mx-auto flex justify-center items-center px-8">
          <h2 class="text-4xl text-center leading-tight lg:text-5xl font-medium py-16 md:py-24 lg:py-28 xl:py-32">{!! $options_page->acf_options['career_title'] !!}</h2>
        </div>
      </div>
    </section>

    <section id="career-boxes">
      <div class="bg-white">
        <div class="container mx-auto">
          <div class="career-arc-content">
            {!! $options_page->acf_options['content'] !!}
          </div>
          <div class="px-4">
            <h3 class="pb-6 text-center">{!! $options_page->acf_options['career_position'] !!}</h3>
            <div class="pb-6 md:flex md:flex-wrap">
                @foreach($career_loop as $career)
                <a class="group md:w-1/3 md:p-4 lg:w-1/4" href="{!! $career['link'] !!}">
                  <div class="career-box group-hover:bg-s-yellow">
                    <div class="border border-gray-200 shadow shadow-md shadow-lg p-4 mb-4 flex justify-between items-center md:flex-col md:items-start xl:p-8">
                      <div class="flex flex-col">
                        <h4 class="text-s-yellow text-lg font-medium tracking-wide md:leading-tight pb-1 group-hover:text-s-dark xl:text-xl">{!! $career['name'] !!}</h4>
                        <div class="flex items-center md:pb-2">
                          <svg class="w-4 h-4 text-s-yellow fill-current group-hover:text-s-dark" height="4" width="4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 20S3 10.87 3 7a7 7 0 1 1 14 0c0 3.87-7 13-7 13zm0-11a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                          <p class="pl-2 md:text-sm xl:text-base">{!! $career['location'] !!}</p>
                        </div>
                      </div>
                      <p class="hidden md:block md:text-sm md:pb-4 xl:text-base">{!! $career['content'] !!}</p>
                      <svg class="h-6 w-6 fill-current text-s-stone md:hidden" height="4" width="4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 0a10 10 0 1 1 0 20 10 10 0 0 1 0-20zM2 10a8 8 0 1 0 16 0 8 8 0 0 0-16 0zm10.54.7L9 14.25l-1.41-1.41L10.4 10 7.6 7.17 9 5.76 13.24 10l-.7.7z"/></svg>
                      <button class="hidden w-full bg-s-yellow text-s-dark group-hover:bg-s-dark group-hover:text-white py-2 md:block">Apply Now</button>
                    </div>
                  </div>
                </a>
              @endforeach
            </div>
          </div>
        </div>
      </div> 
    </section>

    <section id="contact">
      <div class="container mx-auto">
        <div class="">
          <div class="flex flex-col mx-auto items-center py-16 lg:py-16 md:w-3/4 lg:w-3/5 xl:w-1/2">
            <div class="contact-content">
              {!! $options_page->acf_options['career_form_content'] !!}
            </div>
            
            @php
              gravity_form_enqueue_scripts($options_page->acf_options['career_archive_form']['id'], true);
              gravity_form($options_page->acf_options['career_archive_form']['id'], false, false, false, '', true, 1);
            @endphp
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="bg-white">
    <div class="container mx-auto">
      <p class="py-12 px-8 lg:px-32 text-center text-lg lg:text-xl">{!! $options_page->acf_options['disclosure'] !!}</p>
      <div class="pb-8 md:flex">
        @foreach($options_page->acf_options['boxes'] as $box)
          <div class="flex flex-col items-center text-center px-8 pb-12 md:w-1/3 lg:py-12">
            <img src="{!! $box['icon']['url'] !!}" alt="">
            <h4 class="uppercase text-s-yellow text-xl font-medium tracking-wider py-4">{!! $box['title']!!}</h4>
            <p class="leading-normal xl:px-4">{!! $box['content'] !!}</p>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  {{-- @debug --}}
@endsection
