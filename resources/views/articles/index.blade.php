<x-app-layout>
<x-slot name="header">
      <div class="flex justify-between">
           <h2 class="font-semibold text-xl text-gray-300 leading-tight">
              {{ __('All Articles') }}
           </h2>
           <x-link href="{{route('dashboard')}}">{{__('Go back')}}</x-link>
        </div>
</x-slot>
<div class="py-12 px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
     </div>
    <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-6">
    <section class="bg-gray-800 text-gray-300 body-font">
        <h1 class="text-5xl text-center text-gray-600 font-bold underline mt-4">Latest Articles</h1>
        <div class="max-w-6xl px-5 py-24 mx-auto">
            <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
                    @foreach($articles as $article)
                        <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
                            <div class="rounded-lg h-64 overflow-hidden">
                                <img alt="content" class="object-cover object-center h-full w-full" src="/storage/images/{{$article->image}}">
                            </div>
                            <h2 class="text-xl font-medium title-font text-gray-900 mt-5">{{$article->title}}</h2>
                            <x-markdown class="text-base leading-relaxed mt-2">{{Str::limit($article->content, 200)}}</x-markdown>
                            <a class="text-indigo-500 inline-flex items-center mt-3" href="/articles/{{$article->slug}}">Learn More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    @endforeach
             </div>
        </section>
    </div>
</div>
</div>
</x-app-layout>
