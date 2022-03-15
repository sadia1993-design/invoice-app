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
                                    <a href="{{ route('clients.edit', $client->id) }}" class="py-2  px-2 bg-indigo-50 text-green-600" title="Edit"><i class="fas fa-edit"></i></a>
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
                    <div class="alert alert-success d-none d-flex align-items-center" id="success-show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <p class="text-green-600" id="success"></p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <form  method="post" id="clientAdd" enctype="multipart/form-data">
                        @csrf
                        <div class=" mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name"  id="name" >
                            <span id="name"></span>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">UserName</label>
                            <input type="text" class="form-control"     name="username" id="username" >
                        </div>
                        <div class="  mb-3">
                            <label for="exampleInputEmail1" class="form-label ">Email address</label>
                            <input type="email" class="form-control "    name="email" id="email" >
                        </div>
                        <div class=" mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="number" class="form-control"   name="phone" id="phone" >
                        </div>
                        <div class=" mb-3">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control"  name="country" id="country" >
                        </div>
                        <div class=" mb-3">
                            <input class="form-control form-control" name="picture" id="picture" type="file">
                        </div>
                        <div class="mb-3">
                            <select class="form-control" name="status" id="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" style="color: #1a202c"  class="btn btn-primary hover:text-white-800" >Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" style="color: #1a202c"  class="btn btn-secondary close-add-modal" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script>
       $(document).ready( function (){
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $('#clientAdd').on('submit', function (e){
               e.preventDefault();

               let formData = new FormData( $('#clientAdd')[0]);

               $.ajax({
                 url: "{{ route('clients.store') }}" ,
                 type : 'post',
                 data : formData,
                 contentType:false,
                 processData:false,
                 success: function (response){



                     $('#success').html(response.message)
                     $('#success-show').show();
                     $('#success-show').removeClass('d-none');
                     $('tbody').empty();
                     fetchClient();
                     clearField();


                 },
                 error: function (errors){

                 }
               });

           })


          function clearField(){

              $('#name').val('');
              $('#username').val('');
              $('#email').val('');
              $('#phone').val('');
              $('#country').val('');
              $('#picture').val('');
              $('#picture').val('');
          }




           //fetch client
           function  fetchClient(){
              $.ajax({
                 url: "{{ route('clientFetch') }}",
                 type: 'get',
                  dataType:'json',
                  success: function (response){
                      // console.log(response.clients)
                      $.each(response.clients, function (key, val) {
                          $('tbody').append
                          (

                            '<tr>\
                                  <td class="text-center  w-28"><img src='+ val.picture +' class="rounded " style="border-radius: 50%" alt="Client"></td>\
                                  <td class="border  text-center w-28">'+val.name+'</td>\
                                  <td class="border  text-center w-28">'+val.username+'</td>\
                                  <td class="border  text-center w-28">'+val.phone+'</td>\
                                  <td class="border text-center w-28">'+val.country+'</td>\
                                  <td class="border text-center w-28"></td>\
                                  <td class="border  text-center w-28">\
                                      <a href="" class="py-2  px-2 bg-indigo-50 text-green-600" title="Edit"><i class="fas fa-edit"></i></a>\
                                      <a href="" class="  py-2  px-2 bg-indigo-50 text-red-600" title="Delete"><i class="fas fa-trash"></i></a>\
                                  </td>\
                             </tr>'

                          );
                      });
                  },
              });
           }

       })
    </script>

</x-app-layout>
