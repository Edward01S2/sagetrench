<div class="">
  @if($url)
    <a class="" target="_blank" href="{!! $url !!}">
  @else
    <a class="" href="/products/#{!! $cat->slug !!}">
  @endif
    <div class="group">
      <img class="z-0 relative group-hover:opacity-75 object-cover object-center h-48 w-full lg:h-64" src="{!! $image["url"] !!}" alt=""/>
        <div class="block px-8 lg:px-12">
          <div class="text-center bg-s-dark text-white uppercase px-4 py-2 tracking-widest font-medium -mt-4 z-10 relative group-hover:bg-s-stone group-hover:text-s-yellow">
            {!! $cat->name !!}
          </div>
        </div>
    </div>
  </a>
</div>

{{-- @dump($url) --}}

{{-- @dump($cat) --}}