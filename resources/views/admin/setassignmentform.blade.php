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

                <h1 class="text-center">Assign Assignment for {{ $student->name }}</h1>
<form id="setassignmentform" class="max-w-sm mx-auto" method="POST" enctype="multipart/form-data">    
    @csrf    
    
    {{-- <div class="mb-5">
        <label for="student_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Student ID</label>
        <input type="text" name="student_id" value="{{$student->id}}" id="student_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Student ID" required />
      </div> --}}

    <div class="mb-5">
        <label for="assignment_details" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Write Assignment Details: </label>
        <textarea name="assignment_details"  id="assignment_details" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write Assignment Details Here..."></textarea>
    </div>

    <div class="mb-5">
        <label for="section" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Assignment Deadline</label>
        <input type="date" name="assignment_deadline" id="section" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Deadline" required />
      </div>

      <div class="mb-5">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload file</label>
        <input name="assignment_file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
    </div>

    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

</form>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        $('#setassignmentform').submit(function(e){
            e.preventDefault()
            const formData = new FormData(this)
            $.ajax({
                type:'POST',
                url:'{route('admin.storesetassignmentform',$student->id)}',
                data:formData,
                dataType:'json',
                success: function(response) {
                    console.log(response.message)
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }

            })
        })

    </script>   
</x-app-layout>
