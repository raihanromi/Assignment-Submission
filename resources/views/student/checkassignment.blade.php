<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assignments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" id="assignment_div">
                </div>
            </div>
        </div>
    </div>


    <script type="module">    
            $.ajax({
            type:"GET",
            url:'{!! route('student.getassignments') !!}',
            dataType:'json',
            success: function(data) {
                   
                    var html=''
                    if (data.length>0){
                        data.forEach(item =>{
                        html+=` <div class="flex justify-between items-center mb-10">
                    <div >
                        <div class="mb-5" >
                            <h1>Assignment Details: ${item.assignment_details}</h1>
                            <h1>Assignment Deadline : ${item.assignment_deadline}</h1> 
                        </div>
                        <div>
                            <form action="/download/${item.id}">
                                <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                                    <span>Download Assignment Question</span>
                                </button>
                            </form>
                        </div> 
                    </div>
                    <div>
                        <a href="submitassignmentform/${item.id}"
                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                            > Submit Assignment</a>
                    </div>
                    </div>`
                    })

                    }else{
                        html ='<h1>No Assignment Assigned...</h1>'
                    }
                   
                    $('#assignment_div').append(html)
                },
                error: function(error) {
                    console.error(error);
                }
        })
    
    </script>

</x-app-layout>
