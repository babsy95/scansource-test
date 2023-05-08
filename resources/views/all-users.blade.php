<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                 
                <!-- <div class="text-right pb-12">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Launch demo modal
                </button>
                </div> -->

                <div class="row pb-12">
                    <div class="col-md-6"> 
                        <h2 class="font-bold"> ALL USERS </h2>
                    </div>
                    
                    <div class="col-md-6 text-right justify-end"> 
                    @if($isAdminOrManager)
                        <a class="btn btn-primary" href="{{ route('createUsers')}}"> Create New users</a>
                    @endif
                    </div>
                    
                    <hr class="mt-4">
                </div>

                           

                 <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>phone</th>
                        <th>Assigned Role</th>
                        @if($isAdminOrManager)
                            <th>Actions</th>
                        @endif
                        </tr>
                    </thead>
                    <tbody>
                        @if(! empty($users)) 
                            @foreach ($users as $user) 
                                <tr>
                                <td> {{ ucfirst($user->name) }} </td>
                                <td>{{ $user->email}}</td>
                                <td>{{ $user->phone}}</td>
                                <td> {{ $user->roles ?? "-"}} </td>
                                @if($isAdminOrManager)
                                <td> 
                                    <div class="flex">
                                        <a style="font-size: 10px" class="btn btn-success" href="{{ route('edit-user', $user->id)}}"> 
                                            <i class="fa fa-pencil"> </i>
                                        </a>
                                        <form action="{{ route('update-delete', $user->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button style="font-size: 10px" type="submit" class="btn btn-danger ml-3"> 
                                                <i class="fa fa-trash ml-0 text-danger"> </i>
                                            </button>
                                        </form>
                                    </div>
                                    
                                </td>
                                @endif
                                </tr>
                            @endforeach
                        @endif
                        
                        
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


