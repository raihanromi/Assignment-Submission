<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Submit Assigment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
             
                    
<h1 class="text-center">Submit Assignment</h1>
<form  id="student_assignment_submit" class="max-w-sm mx-auto" method="POST" enctype="multipart/form-data">    
    @csrf  
    <div class="mb-5 hidden">
        <label for="assignment_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Assignment ID</label>
        <input type="text" name="assignment_id" value="{{$id}}" id="assignment_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Assignment ID" required />
    </div>
      
    <div>
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Upload assignment files</label>
        <input id="assignment_file" name="assignment_file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="multiple_files" type="file" multiple>
    </div>
    <button  type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>
                </div>
            </div>
        </div>
    </div>


    <script type="module">
        $(document).ready(function(){
            $('#student_assignment_submit').submit(function(){
                const formData  = new FormData(this)
                $.ajax({
                    type:"POST",
                    url:'{ !! route('student.submitassignment') !! }',
                    data: formData,
                    dataType:'json',
                    success: function(response) {
                    console.log(response.message);
                },
                error: function(xhr, status, error) {
                    // Handle errors if needed
                    console.error(xhr.responseText);
                }
                })
            })
        })
    </script>

</x-app-layout>
