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

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @include("clients.create")

    <script>
        $(document).ready( function (){
            //load client lists
            fetchClient();

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
                        clearField();
                    },
                    error: function (errors){
                    }
                });
            })

            //reset data
            $(document).on('click', '.reset-modal', function (){
                clearField();
            })
        });

        function clearField()
        {
            $('#name').val('');
            $('#username').val('');
            $('#email').val('');
            $('#phone').val('');
            $('#country').val('');
            $('#picture').val('');
            $('#picture').val('');
            $(".modal").hide();
        }

        //fetch client
        function fetchClient()
        {
            $.ajax({
                url: "{{ route('lists') }}",
                type: 'get',
                dataType:'json',
                success: function (response) {
                    // console.log(response)
                    $('tbody').empty();
                    $.each(response.data, function (key, val) {
                        $('tbody').append(
                            '<tr>\
                                  <td class="text-center  w-28"><img src='+ val.picture +' class="rounded " style="border-radius: 50%" alt="Client"></td>\
                                  <td class="border  text-center w-28">'+val.name+'</td>\
                                  <td class="border  text-center w-28">'+val.username+'</td>\
                                  <td class="border  text-center w-28">'+val.phone+'</td>\
                                  <td class="border text-center w-28">'+val.country+'</td>\
                                  <td class="border text-center w-28">'+val.status_text+'</td>\
                                  <td class="border  text-center w-28">\
                                      <a href='+val.id+' class="py-2  px-2 bg-indigo-50 text-green-600" title="Edit"><i class="fas fa-edit"></i></a>\
                                      <a href='+val.id+' class="  py-2  px-2 bg-indigo-50 text-red-600" title="Delete"><i class="fas fa-trash"></i></a>\
                                  </td>\
                             </tr>'
                        );
                    });
                    initDatatable();
                },
                error: function(error) {
                },
            });
        }

        function initDatatable()
        {
            $('.dataTable').DataTable({
                pageLength: 5,
                lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
                responsive: true,
            });
        }
    </script>

</x-app-layout>
