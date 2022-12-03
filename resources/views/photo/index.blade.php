<x-layout>
  <div class="container">
    @if (count($photos) > 0)
      <div class="grid">
        <div class="grid-sizer"></div>
  
        @foreach ($photos as $photo)
          <a href="#" class="grid-item">
            <img src="/storage/{{ $photo->image }}" alt="{{ $photo->caption }}" />
          </a>
        @endforeach
      </div>
    @else
      <h3>No photos found</h3>
    @endif
  </div>
</x-layout>