<x-layout>
  <h1>Create Photo</h1>

  <form action="/gallery" method="post" enctype="multipart/form-data">
    @csrf

    <div>
      <label for="image">Image</label>
      <input type="file" name="image" id="image" />

      @error('image')
        <p>{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="caption">Caption</label>
      <textarea name="caption" id="caption" cols="30" rows="10">{{ old('caption') }}</textarea>

      @error('caption')
        <p>{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="post">Post</label>
      <select name="post" id="post">
        <option>Select One</option>

        @foreach ($posts as $post)
          <option value="{{ $post->id }}">{{ $post->title }}</option>
        @endforeach
      </select>
    </div>

    <button type="submit">Submit</button>
  </form>
</x-layout>