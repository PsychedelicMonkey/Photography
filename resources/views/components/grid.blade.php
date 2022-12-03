@props(['items', 'type'])

@if (count($items) > 0)
  <div class="grid">
    <div class="grid-sizer"></div>

    @if ($type === 'photo')
      @foreach ($items as $item)
        <a href="/storage/{{ $item->image }}" class="grid-item">
          <img src="/storage/{{ $item->image }}" alt="{{ $item->caption }}" />
        </a>
      @endforeach
    @endif

    @if ($type === 'post')
      @foreach ($items as $item)
        <a href="/posts/{{ $item->id }}" class="grid-item">
          <img src="/storage/{{ $item->photos->first()->image }}" alt="{{ $item->photos->first()->caption }}" />

          <h3>{{ $item->title }}</h3>
        </a>
      @endforeach
    @endif
  </div>
@else
  <h3>No {{ $type }}s found</h3>
@endif