<x-app-layout>
<x-slot name="header">
      <div class="flex justify-between">
           <h2 class="font-semibold text-xl text-gray-300 leading-tight">
              {{ __('Dashboard') }}
           </h2>
           <x-link href="{{route('articles.create')}}">{{__('Add article')}}</x-link>
        </div>
</x-slot>
<div class="py-12">
    <div class="text-center">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
    </div>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="bg-gray-800 rounded-lg shadow-lg py-6">
                <div class="block overflow-x-auto mx-6">
                    <table class="w-full text-left rounded-lg">
                        <thead>
                            <tr class="text-gray-200 bg-gray-800 border-b">
                                <th class="px-4 py-3">#</th>
                                <th class="px-4 py-3 uppercase text-lg">Title</th>
                                <th class="px-4 py-3 uppercase text-lg">Slug</th>
                                <th class="px-4 py-3 uppercase text-lg">Image</th>
                                <th class="px-4 py-3 uppercase text-lg">Date</th>
                                <th class="px-4 py-3 uppercase text-lg">Edit</th>
                                <th class="px-4 py-3 uppercase text-lg">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($articles as $article)
                                    <tr class="w-full font-light text-left text-gray-100 bg-gray-800 whitespace-no-wrap">
                                        <td class="px-4 py-4">{{$article->id}}</td>
                                        <td class="px-4 py-4"><a href="{{route('articles.show', $article)}}" class="cursor-pointer underline hover:text-indigo-200 transition delay-100">{{$article->title}}</a></td>
                                        <td class="px-4 py-4">{{$article->slug}}</td>
                                        <td class="px-4 py-4">
                                            <img class="h-10 w-10 rounded-full"
                                            src="storage/images/{{ $article->image }}">
                                        </td>
                                        <td class="px-4 py-4">
                                           {{ $article->created_at->diffForHumans()}}
                                        </td>
                                        <td class="px-4 py-4">
                                            <a href="{{route('articles.edit', $article)}}" class="py-1 px-1 text-yellow-500 text-sm hover:text-yellow-600">Edit</a>
                                        </td>
                                        <td class="px-4 py-4">
                                           <form action="{{route('articles.destroy', $article)}}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                               <button class="py-1 px-1 text-red-500 text-sm hover:text-red-600">Delete</button>
                                           </form>
                                        </td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
