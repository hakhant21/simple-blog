<x-app-layout>
<x-slot name="header">
      <div class="flex justify-between">
           <h2 class="font-semibold text-xl text-gray-300 leading-tight">
              {{ __('All Articles') }}
           </h2>
           <x-link href="{{route('articles.index')}}">{{__('Go back')}}</x-link>
        </div>
</x-slot>
<div class="py-12 px-4 sm:px-6 lg:px-8">
    <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="w-full max-w-6xl mx-auto bg-white bg-cover mt-8 rounded-lg">
                <img src="/storage/images/{{$article->image}}" alt="{{$article->title}} image" class="object-cover w-full h-full rounded-lg overflow-hidden">
            </div>
            <div class="bg-gray-100 w-full p-8 md:p-24 text-xl md:text-2xl text-gray-800 leading-normal">
                <h1 class="font-bold text-5xl text-center underline mb-6 text-gray-700 leading-normal">{{$article->title}}</h1>
                <x-markdown>
                    {{ $article->content }}
                </x-markdown>
            </div>
    </div>
</div>
</x-app-layout>
