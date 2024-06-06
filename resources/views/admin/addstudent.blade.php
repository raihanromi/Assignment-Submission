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


                    <h1 class="text-center ">Add new student</h1>
            <form id="add_student_form" class="max-w-sm mx-auto">
            @csrf
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Name" required />
            </div>

            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Email"  required/>
            </div>
            
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Password" required />
            </div>
            <div class="mb-5">
                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Confirm password"  required />
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Student</button>
        </form>
                    </div>
                </div>
            </div>
        </div>


    <script  type="module">

    $(document).ready(function() {
        $('#add_student_form').submit(function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: '/admin/student',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(response) {
                    // Handle success response if needed    
                    console.log(response);

                    $('#add_student_form')[0].reset();
                },
                error: function(xhr, status, error) {
                    console.log(error);
                    // Handle error response and display error messages
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        // Clear existing error messages
                        $('.error-message').remove();
                        // Object to keep track of which error messages have been shown
                        var errorShown = {};
                        // Display error messages for each field
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            // Check if the error message has been shown for this field
                            if (!errorShown[key]) {
                                $('#' + key).after('<div class="error-message text-red-700 text-xs">' + value[0] + '</div>');
                                // Set the flag to indicate that the error message has been shown for this field
                                errorShown[key] = true;
                            }
                        });
                    }
                }
            });
        });
    });


    </script>
        
    </x-app-layout>
