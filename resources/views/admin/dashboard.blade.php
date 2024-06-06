    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="relative overflow-x-auto">

                            <div class="py-5 mb-5">
    <!-- Modal toggle -->
    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Create Student Profile
    </button>
    
    <!-- Main modal -->
    <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Create Student Profile
                    </h3>
                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                 
                    <form class="space-y-4" id="create_student_profile" class="max-w-sm mx-auto" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Email</label>
                            <select id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose a Email</option>
                            @foreach ($students as $student )
                            <option value="{{$student->email}}"> {{$student->email}}</option>
                            @endforeach
                            </select>
                            <div id="email-error" class="error-message text-red-700 text-xs"></div>
                        </div>
                    
                        <div class="mb-5">
                        <label for="student_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Student ID</label>
                        <input type="text" name="id_num" id="id_num" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Student ID"  />
                        </div>
                    
                        <div class="mb-5">
                            <label for="section" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Section</label>
                            <input type="text" name="section" id="section" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Section"  />
                        </div>
                    
                        <div class="mb-5">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload file</label>
                            <input name="photo" id="photo" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" type="file">
                        </div>
                    
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div> 
                            </div>

                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th >Student Name</th>
                                        <th>Student ID</th>
                                        <th>Section</th>
                                        <th>Student Photo</th>
                                        <th>Modify</th>
                                    </tr>
                                </thead>
                            <tbody id="student_info_table">
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script type="module">   
            $.ajax({
                url:'{!! route('admin.getstudentdata') !!}',
                type:'GET',
                dataType:'json',
                success: function (data) {
                
                var html = '';
                data.forEach(item => {
                    html += `<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td>${item.name}</td>
                                <td>${item.id_num}</td>
                                <td>${item.section}</td>
                                <td>
                                    <img src="{{asset('${item.photo}')}}" width="100px" height="100px" />
                                </td>
                                <td>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <form >
                                        <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>`;
                });
        
                $('#student_info_table').append(html);
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
        </script>


<script type="module">
    $(document).ready(function () {
        $('#create_student_profile').submit(function (e) {
            e.preventDefault();
            // Create a new FormData object
            const formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: '/admin/studentprofile',
                data: formData,
                dataType: 'json',
               
                processData: false,
                contentType: false,
                success: function (response) {
        
                    console.log(response.message);
            
                     $('[data-modal-hide="authentication-modal"]').click();

                     toastr.success('Student profile created successfully');
                     
            $.ajax({
                url:'{!! route('admin.getstudentdata') !!}',
                type:'GET',
                dataType:'json',
                success: function (data) {
                
                var html = '';
                data.forEach(item => {
                    html += `<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td>${item.name}</td>
                                <td>${item.id_num}</td>
                                <td>${item.section}</td>
                                <td>
                                    <img src="{{asset('${item.photo}')}}" width="100px" height="100px" />
                                </td>
                                <td>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <form >
                                        <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>`;
                });
        
                $('#student_info_table').append(html);
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });

                },
                error: function (xhr,status,error) {
                    // Handle errors
                    console.error(error);
                    if(xhr.responseJSON && xhr.responseJSON.error){
                        $('#email-error').text(xhr.responseJSON.error)
                    }
                    else if(xhr.responseJSON && xhr.responseJSON.errors){
                        $('.error-message').remove()
                        var errorShown = {}
                        $.each(xhr.responseJSON.errors,function(key,value){
                            if(!errorShown[key]){
                                $('#'+key).after('<div class="error-message text-red-700 text-xs">' + value[0] + '</div>');
                                errorShown[key] = true;
                            }
                        })
                    }
                }
            });
        });
    });            
</script>

@if (Session::has('message'))
     <script type="module">
        toastr.success("{{Session::get('message')}}")
     </script>

@endif

</x-app-layout>
