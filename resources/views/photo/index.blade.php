<x-layout>
  <h1>Photos</h1>

  @if (count($photos) > 0)
    <div class="grid">
      @foreach ($photos as $photo)
        <a href="#" class="grid-item">
          <img src="/storage/{{ $photo->image }}" alt="{{ $photo->caption }}" />
        </a>
      @endforeach
    </div>
  @else
    <h3>No photos found</h3>
  @endif
</x-layout>