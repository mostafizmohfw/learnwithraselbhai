<x-guest-layout>
    <div class="bg-gray mt-1 py-6">
        <div class="container">
            <h2 class="text-center font-bold text-2xl mb-6">{{$topic->name}}</h2>

            <div class="max-w-6xl mx-auto grid grid-cols-3 gap-5">
                @foreach($courses as $course)
                    @include('components.course-box')
                @endforeach
            </div>
            <div class="max-w-6xl mx-auto mt-4">
                {{ $courses->links() }}
            </div>
        </div>
    </div>
</x-guest-layout>
