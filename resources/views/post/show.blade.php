<x-layout>
  <h1>{{ $post->title }}</h1>
  <h3>{{ $post->created_at }}</h3>

  <div>{{ $post->body }}</div>
</x-layout>