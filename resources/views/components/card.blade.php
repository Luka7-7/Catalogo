@props([
    'title' => null,
    'image' => null,
    'subtitle' => null
])

<div class="flex h-full flex-col overflow-hidden rounded-lg border border-gray-800 bg-gray-900 shadow-lg">

  @if($image)
    <div class="aspect-[4/3] w-full overflow-hidden bg-gray-800">
      <img src="{{ $image }}" alt="{{ $title }}" class="h-full w-full object-cover">
    </div>
  @endif

  <div class="flex flex-1 flex-col p-6">

    <div class="mb-4">
      @if($title)
        <p class="text-xl font-semibold leading-tight text-white">
          {{ $title }}
        </p>
      @endif

      @if($subtitle)
        <p class="mt-1 text-sm text-gray-400">
          {{ $subtitle }}
        </p>
      @endif
    </div>

    <div class="flex-1 text-base leading-relaxed text-gray-300">
      {{ $slot }}
    </div>

  </div>

</div>