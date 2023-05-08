<x-app-layout>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="row pb-1">
                <div class="col-md-6"> 
                    <h3 class="font-bold"> EDIT USER </h3>
                </div>
                <div class="col-md-6 text-right"> 
                    <a class="btn btn-success" href="{{ route('list-users')}}"> Back</a>
                </div>
                <hr class="mt-4">
            </div>

       
            <!-- <div class="col-md-4"> -->
            <form method="post" action="{{ route('update-user') }}">
            @csrf   
            <x-text-input id="name" class="block mt-1 w-full" type="hidden" name="user_id" value="{{ $user->id}}"  />
            <div class="row mt-4">
            <div class="col-md-3">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name}}" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="col-md-3">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email}}" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="col-md-3">
                <x-input-label for="phone" :value="__('phone')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" value="{{ $user->phone}}" required />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>


            <div class="mt-4 mb-3">            
                <label><strong>Assign User Role :</strong></label><br>
                @if (! empty($groups))
                    @foreach($groups as $group) 
                    <label>
                        <input type="checkbox" name="groups[]" value="{{ $group->id }}" {{ in_array($group->id, $assignedGroups) ? 'checked' : ''}} > 
                        {{ $group->name }}
                    </label>
                    @endforeach
                @endif                         
            </div>

                <div class="flex  mt-4">              
                    <x-primary-button >
                        {{ __('Submit') }}
                    </x-primary-button>
                </div>
                </div>
            </form>
        

        
        </div>
        </div>
    </div>
</div>
</x-app-layout>
