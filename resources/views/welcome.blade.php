<x-guest-layout>
<div class="py-12">
    <div class="bg-gray-800 overflow-hidden relative lg:flex lg:items-center rounded-lg">
        <div class="w-full py-12 px-4 sm:px-6 lg:py-16 lg:px-8 z-20">
            <h1 class="text-gray-100 text-left font-semibold text-2xl">Mother Nature</h1>
            <p class="text-md mt-4 text-gray-400">
                The state of Utah in the united states is home to lots of beautiful National parks, Bryce national canion park ranks as three of the most magnificient &amp; awe inspiring.
            </p>
            <div class="lg:mt-0 lg:flex-shrink-0">
                <div class="mt-6 inline-flex rounded-md shadow">
                    <a href="/articles" class="py-2 px-4  bg-green-500 hover:bg-green-700 focus:ring-green-500 focus:ring-offset-green-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                        Show me
                    </a>
                </div>
            </div>
        </div>
        <div class="flex items-center gap-6 p-6 lg:p-12 mb-6">
            <img src="{{asset('images/moutain.jpg')}}" class="rounded-lg w-1/2" alt="Mountain"/>
            <div>
                <img src="{{asset('images/sandmoutain.jpg')}}" class="rounded-lg mb-8" alt="Sand Moutain"/>
                <img src="{{asset('images/boat.jpg') }}" class="rounded-lg" alt="Boat in the water"/>
            </div>
        </div>
    </div>
    <section class="bg-gray-800 text-gray-600 body-font mt-20 py-12 rounded-lg px-5">
        <h1 class="text-5xl text-center text-gray-300 font-bold underline mt-4">Latest Articles</h1>
        <div class="max-w-6xl px-5 py-24 mx-auto">
                <div class="flex lg:flex-nowrap flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 gap-1">
                    @foreach($articles as $article)
                        <div class="p-3 md:w-1/3 sm:mb-0 mb-6 rounded-lg">
                            <div class="rounded-lg h-64 overflow-hidden">
                                <img alt="content" class="object-cover object-center h-full w-full" src="/storage/images/{{$article->image}}">
                            </div>
                            <h2 class="text-xl font-semibold title-font text-gray-200 mt-5">{{$article->title}}</h2>
                            <x-markdown class="text-base leading-relaxed mt-2 text-gray-300">{{ Str::limit($article->content, 200) }}</x-markdown>
                            <a class="text-indigo-500 inline-flex items-center mt-3" href="/articles/{{$article->slug}}">Learn More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    @endforeach
             </div>
         </div>
    </section>
</div>


</x-guest-layout>
