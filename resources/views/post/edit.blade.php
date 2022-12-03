<x-layout>
  <h1>Edit Post</h1>

  <form action="/posts/{{ $post->id }}" method="post">
    @csrf
    @method('PUT')

    <div>
      <label for="title">Title</label>
      <input type="text" name="title" id="title" value="{{ $post->title }}" />
    
      @error('title')
        <p>{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="body">Body</label>
      <textarea name="body" id="body" cols="30" rows="10">{{ $post->body }}</textarea>

      @error('body')
        <p>{{ $message }}</p>
      @enderror
    </div>

    <button type="submit">Submit</button>
  </form>

  <form action="/posts/{{ $post->id }}" method="post">
    @csrf
    @method('DELETE')

    <button type="submit">Delete</button>
  </form>
</x-layout>