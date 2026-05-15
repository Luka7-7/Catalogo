@props([
    'title' => null,
    'image' => null,
    'subtitle' => null
])

<div class="card">

  @if($image)
    <div class="card-image">
      <figure class="image is-4by3">
        <img src="{{ $image }}" alt="{{ $title }}" style="object-fit: cover;">
      </figure>
    </div>
  @endif

  <div class="card-content">

    <div class="media">

      <div class="media-content">

        <p class="title is-4">
          {{ $title }}
        </p>

        @if($subtitle)
          <p class="subtitle is-6">
            {{ $subtitle }}
          </p>
        @endif

      </div>

    </div>

    <div class="content">
      {{ $slot }}
    </div>

  </div>

</div>