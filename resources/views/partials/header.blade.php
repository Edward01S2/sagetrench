<header class="banner bg-white shadow lg:fixed lg:w-full lg:z-30">
  <div class="container mx-auto">
    <nav class="flex items-center justify-between flex-wrap py-2 md:py-4 lg:flex-no-wrap xl:px-0">
      <div id="nav-brand" class="flex items-center flex-shrink-0 pl-8 md:pl-4 xl:pl-0">
        <a class="brand hover:opacity-50" href="{{ home_url('/') }}">
          <img class="h-10 md:h-12" src="{{ $options_page->acf_options['logo']['url'] }}" alt="">  
        </a>
      </div>
      <div class="block pr-4 md:hidden">
        <button id="nav-toggle" class="flex items-center px-3 py-2 focus:outline-none">
          <svg id="menu-btn" class="fill-current h-8 w-8" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </button>
      </div>
      <div id="main-nav" class="w-full hidden md:flex md:items-center md:w-auto md:pr-4">
        <div class="text-sm relative w-full md:w-auto">
          <div class="absolute w-full text-center mt-2 md:static md:w-auto md:mt-0">
            <div class="h-full w-full absolute bg-white z-10 shadow md:static md:bg-none md:w-auto"></div>
              <div class="z-10 relative flex flex-col md:flex-row">
              @if (has_nav_menu('primary_navigation'))
                {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav-primary']) !!}
              @endif
              <button class="hidden search-button outline-none focus:outline-none md:block">
                <svg class="h-4 w-4 fill-current text-s-stone ml-2 hover:text-s-yellow outline-none active:outline-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/></svg>
              </button>
                <?php get_search_form(); ?>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>

</header>

