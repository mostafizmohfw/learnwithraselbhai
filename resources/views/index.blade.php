<x-guest-layout>
    <!-- ******* Search area start ******** -->
    <div class="w-full mt-20">
        <div class="w-2/3 mx-auto text-center py-10 relative">
          <h1 class="text-6xl font-bold text-gray-700 mb-8">The best Courses and Books on the <span class="text-red-400">Laravel</span> ecosystem </h1>
          <p class="text-xl my-4 mb-10 font-medium text-gray-700">Find the right books and courses on the Laravel framework and related topics to suite your level of expertise. Know how good a course is through your peers review and share your own too. </p>
          <div class="space-x-4 mb-10">
            <form action="">
              <input class="h-12 w-1/2 py-2 pl-3 outline-none border border-red-500 rounded-lg focus:border-blue-400 focus:border-2" type="text" name="search" id="search" placeholder="Enter Keywords to Search Courses">
              <button class="ml-2 h-12 bg-gray-700 hover:bg-gray-500 py-2 px-6 rounded-lg border text-gray-200 text-xl" type="button">Search</button>
            </form>
          </div>
          <img class="absolute top-5 -right-12" src="./assets/images/right-angle.png" alt="right top"/>
          <img class="absolute top-40 -right-36" src="./assets/images/right-center-angle.png" alt="right center"/>
          <img class="absolute top-32 -left-24" src="./assets/images/left-top-angle.png" alt="right center"/>
          <img class="absolute bottom-20 left-0" src="./assets/images/left-bottom-angle.png" alt="right center"/>
          <img class="absolute bottom-24 right-0" src="./assets/images/right-bottom-angle.png" alt="right center"/>
        </div>
      </div>
      <!-- ******* Search area END ******** -->

      <!-- ******* Series area start ******** -->
      <div class="flex max-w-6xl mx-auto items-center justify-between space-x-8 py-8">
        @foreach ($series as $item)
        <div class="w-1/6 border border-red-300 rounded-md py-3 px-4 bg-white hover:bg-orange-50">
            <img class="w-full h-10 object-contain" src="{{ $item->image }}" alt="{{ $item->name }}"/>
          </div>
        @endforeach
      </div>
      <!-- ******* Series area END ******** -->
      <!-- ******* Course Items start ******** -->
      <div class="">
        <h1 class="text-4xl text-center text-gray-700 font-bold leading-9 py-8">Featured Courses</h1>
        <!-- ::::::::::::card:::::::::::: -->
        <div class="max-w-6xl mx-auto grid grid-cols-3 gap-5 ">
            @foreach ($courses as $course)
            @include('components.course-box', ['course' => $course])
            @endforeach
        </div>
        <div class="flex justify-center mt-12 mb-12">
            <a href="{{ route('courses') }}">
                <button class="bg-gray-700 text-white text-center py-5 px-10 rounded-md hover:bg-gray-500 text-lg">Browse All</button>
              </a>
        </div>
    </div>
      <!-- ******* Course Items END ******** -->

      <!-- ******* Newsletter Start ******** -->
      <div class="w-full bg-orange-50 py-10">
        <div class="flex max-w-6xl mx-auto">
          <div class="w-1/2">
            <h2 class="text-red-400 text-3xl font-bold pt-16">Don’t miss any updates</h2>
            <p class="text-base py-4 font-normal ">We will be covering course reviews, comparison between the best courses, and will be sharing exclusive discounts with you on a monthly basis.
            </p>
            <div class="space-x-4 mb-10">
              <form action="">
                <input class="h-12 w-1/2 py-2 pl-3 outline-none border border-red-500 rounded-lg focus:border-blue-400 focus:border-2" type="text" name="search" id="search" placeholder="Enter Your Email">
                <button class="ml-2 h-12 bg-white text-orange-600 border-red-500 hover:bg-orange-600 hover:text-white py-2 px-6 rounded-lg border text-xl" type="button">Subscribe</button>
                <div class="flex mt-4">
                  <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd"></path>
                    </svg>
                  </div>
                  <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">Please enter a valid email address.</h3>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="w-1/2">
            <img class="float-right" src="./assets/images/newslatter.png" alt="News Letter"/>
          </div>
          </div>
        </div>
      </div>
      <!-- ******* Newsletter End ******** -->

</x-guest-layout>
