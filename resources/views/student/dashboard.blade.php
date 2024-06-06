<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" >
                    <div>
                        <div class="flex  justify-around" id="student_info_div">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="module">

        $.ajax({
            url:'{!! route('student.getstudentinfo') !!}',
            type:"GET",
            dataType:'json',
            success: function(data){
              var  html =`<div>
                                <h1><span class="font-bold py-4" id="student_name">Name: </span>${data.name}</h1>
                                <h2><span class="font-bold">Email: </span>${data.email}</h2>
                            </div>
                            <div>
                                <img src='{{asset('${data.photo}')}}' class="w-52 h-52 object-cover"/>
                                <div>
                                    <a href="#">Edit</a>
                                </div>
                            </div>`

                $('#student_info_div').append(html)
            },
            error:function(error){
                console.error(error.message)
            }
        })


    </script>

</x-app-layout>
