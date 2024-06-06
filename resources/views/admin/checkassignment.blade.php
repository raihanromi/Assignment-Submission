<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assignments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" id="student_assignment_div">
                   
                {{-- @foreach ($student_assignments as $student_assignment )
                <div class="flex justify-between items-center mb-10">
                    <div >
                        <div class="mb-5" >
                            <h1>Assignment Details:  {{$student_assignment->assignment_details}}</h1>
                            <h1>Assignment Deadline: {{$student_assignment->assignment_deadline}}</h1>
                            <h1>Assignment Submitted at: {{$student_assignment->updated_at}}</h1>
                        </div>
                        <div>
                            <form action="{{route('admin.student_assignment_download',$student_assignment->id)}}">
                                <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                                    <span>Check Assignment</span>
                                </button>
                            </form>
                        </div> 

                        <div>
                            <form action="">
                                <h1>Set Assignment Mark</h1>
                            </form>
                        </div> 
                    </div>
                    </div>
                @endforeach --}}

                </div>
            </div>
        </div>
    </div>

    <script type="module">
        
        var id = '@json($id)'
            id =JSON.parse(id)
            console.log(id)
        //TODO: get student assignment
        $.ajax({
            url:`/admin/checkstudentassignment/${id}`,
            type:'GET',
            dataType:'json',
            success: function (data) {
                console.log(data)      
               var  html = ""      
                data.forEach(item => {
                    html+= `
                    <div class="flex justify-between items-center mb-10">
                    <div >
                        <div class="mb-5" >
                            <h1>Assignment Details: ${item.assignment_details} </h1>
                            <h1>Assignment Deadline: ${item.assignment_deadline} </h1>
                            <h1>Assignment Submitted at: ${item.updated_at}</h1>
                        </div>
                       
                        <div>
                            <form action='/admin/assignmentdownload/${item.id}'>
                                <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                                    <span>Check Assignment</span>
                                </button>
                            </form>
                        </div> 
                    </div>
                    </div>
                    `
                });

                $('#student_assignment_div').append(html)
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
        })

    </script>

</x-app-layout>
