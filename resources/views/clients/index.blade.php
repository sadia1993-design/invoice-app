<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Clients') }}
            </h2>
            <button type="button" class="bg-indigo-50 py-2 px-2 text-base hover:bg-gray-100 font-semibold" data-bs-toggle="modal" data-bs-target="#exampleModal" >Add Client</button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table class="border-b border-gray-200 shadow dataTable" >
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="border text-center py-2">Image</th>
                                <th class="border text-center py-2">Name</th>
                                <th class="border text-center py-2">Username</th>
                                <th class="border text-center py-2">Phone</th>
                                <th class="border text-center py-2">Country</th>
                                <th class="border text-center py-2">Status</th>
                                <th class="border text-center py-2">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($clientDatas as $client)
                            <tr>
                                <td class="text-center  w-28"><img src="{{$client->picture}}" class="rounded " style="border-radius: 50%" alt="Client"></td>
                                <td class="border  text-center w-28">{{$client->name}}</td>
                                <td class="border  text-center w-28">{{$client->username}}</td>
                                <td class="border  text-center w-28">{{$client->phone}}</td>
                                <td class="border text-center w-28">{{$client->country}}</td>
                                <td class="border text-center w-28">
                                     @if($client->status == 'active')
                                         <span class="badge bg-primary">Active</span>
                                    @else
                                         <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td class="border  text-center w-28">
                                    <a href="" class="py-2  px-2 bg-indigo-50 text-green-600" title="Edit"><i class="fas fa-edit"></i></a>
                                    <a href="" class="  py-2  px-2 bg-indigo-50 text-red-600" title="Delete"><i class="fas fa-trash"></i></a>

                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-floating mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="username" class="form-label">UserName</label>
                            <input type="text" class="form-control" id="username" required>
                        </div>
                        <div class=" form-floating mb-3">
                            <label for="exampleInputEmail1" class="form-label ">Email address</label>
                            <input type="email" class="form-control "  id="exampleInputEmail1" required>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="numer" class="form-control" id="phone" required>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control" id="country" required>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control form-control" id="formFileSm" type="file">
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-control" id="datalistOptions">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
