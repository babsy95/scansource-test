<x-app-layout>
   
    {{--
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('HOME..') }}
        </h2>
    </x-slot> --}}
   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <h6> Hello {{ ucfirst(Auth::user()->name) }} -You're logged in!  </h6>
                  <h6 class="mt-4"> See all the users here</h6>
                    <a style="margin-top:20px;" class="btn btn-primary" href="{{ route('list-users')}}"> ALL USERS</a>
                 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
