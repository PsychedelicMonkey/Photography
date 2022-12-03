<x-layout>
  <h1>Create Post</h1>

  <form action="/posts" method="post">
    @csrf

    <div>
      <label for="title">Title</label>
      <input type="text" name="title" id="title" value="{{ old('title') }}" />

      @error('title')
        <p>{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="body">Body</label>
      <textarea name="body" id="body" cols="30" rows="10">{{ old('body') }}</textarea>

      @error('body')
        <p>{{ $message }}</p>
      @enderror
    </div>

    <button type="submit">Submit</button>
  </form>
</x-layout>