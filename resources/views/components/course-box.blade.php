<div class="bg-white drop-shadow-xl rounded-md">
    <img class="rounded-tl rounded-tr" src="{{ asset('assets/images/courses/') }}/{{ $course->image }}.png" alt="{{ $course->name }}"/>
    <div class="py-3 px-5 rounded-bl rounded-br">
      <a class="hover:underline text-xl" href="{{ route('course.show', $course->slug) }}">{{ $course->name }}</a>
      <div class="flex relative pt-4">
        @foreach ( $course->authors as $author )
        <img class="rounded-full absolute left-0 w-6" src="{{ asset('assets/images/authors/') }}/{{ $author->image }}.png" alt="{{ $author->name }}">
        @endforeach
    </div>
      <p class="pl-9 text-base font-medium">{{ $course->submitedBy->name }}</p>
      {{-- @foreach ( $course->authors as $author )
      <p class="pl-9 text-base font-medium">{{ $author->name }}</p>
        @endforeach --}}
      <div class="flex py-6 space-x-5">
        <div class="w-1/2 flex bg-green-100 rounded py-1 px-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 pr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg> {{$course->convertDuration($course->duration)}}
        </div>
        <div class="w-1/2 flex bg-blue-100 rounded py-1 px-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 pr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
          </svg>
          {{$course->convertDifficultyLevel($course->difficulty_level)}}
        </div>
      </div>
    </div>
  </div>
