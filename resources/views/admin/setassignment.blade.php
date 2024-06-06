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
                    <h1 class="text-center ">Set Assignment: </h1>

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th >Student Name</th>
                                    <th>Student ID</th>
                                    <th>Section</th>
                                    <th>Assignment</th>
                                </tr>
                            </thead>
                           <tbody id="setassignmenttable">

                           </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        
        $.ajax({
                url:'{!! route('admin.getstudentassignmentdata')!!}',
                type:'GET',
                dataType:'json',
                success: function (data) {
                var html = '';

                data.forEach(item => {
                    html+=` <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 py-50 h-16">
                             <td>${item.name}</td>
                             <td>${item.id_num}</td>
                             <td>${item.section}</td>
                             <td >
                                <a href='/admin/setassignmentform/${item.user_id}' class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Assign</a>
                                <a href='/admin/checkassignment/${item.user_id}' class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Check Assignments</a>

                                </td>
                           </tr>`
            });
            $('#setassignmenttable').append(html);
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
        })

    </script>
</x-app-layout>
