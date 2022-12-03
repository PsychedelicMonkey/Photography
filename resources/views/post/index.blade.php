<x-layout>
  <h1>Posts</h1>

  @if (count($posts) > 0)
    <div class="grid">
      @foreach ($posts as $post)
        <a href="/posts/{{ $post->id }}" class="grid-item">
          <h3>{{ $post->title }}</h3>
        </a>
      @endforeach
    </div>
  @else
    <h3>No posts found</h3>
  @endif
</x-layout>