<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
           <h2 class="font-semibold text-xl text-gray-300 leading-tight">
              {{ __('Create a new article') }}
           </h2>
           <x-link href="{{route('dashboard')}}">Go back</x-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="text-center">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    </div>
                    <x-form action="{{route('articles.store')}}" has-files>
                       <div>
                         <x-label for="title"/>
                         <x-input name="title" id="title" type='text' placeholder="Enter your title here" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-300 focus:outline-none focus:border-green-500 bg-gray-800" value="{{old('title')}}" />
                       </div>
                       <div>
                          <x-label for="content" />
                          <x-easy-mde class="w-full h-64 mt-2 px-3 py-2 text-gray-300 border rounded-lg focus:outline-none focus:border-green-500 bg-gray-800" rows="4" name="content" id="content" value="{{old('content')}}"/>
                       </div>
                       <div>
                          <x-label for="image" />
                          <x-input type="file" class="w-full mt-2 px-3 py-2 text-gray-300 border rounded-lg focus:outline-none focus:border-green-500 bg-gray-800" id="image" name="image" value="{{old('image')}}" />
                       </div>
                       <div class="mt-3">
                         <button class='inline-flex items-center px-4 py-2 bg-gray-100 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 active:bg-gray-400 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150' type="submit">
                            {{ __('Create') }}
                         </button>
                       </div>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
