<x-layout>
  <div class="container">  
    @if (count($posts) > 0)
      <div class="grid">
        <div class="grid-sizer"></div>
  
        @foreach ($posts as $post)
          <a href="/posts/{{ $post->id }}" class="grid-item">
            <img src="/storage/{{ $post->photos->first()->image }}" alt="{{ $post->photos->first()->caption }}" />

            <h3>{{ $post->title }}</h3>
          </a>
        @endforeach
      </div>
    @else
      <h3>No posts found</h3>
    @endif
  </div>
</x-layout>