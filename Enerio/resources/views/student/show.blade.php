<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    

                    <h6>List of Students</h6>
                    <table class="border-separate border-spacing-5">
                        <thead>
                        <tr>
                            <th>ID No.</th>
                            <th>Full Name</th>
                            <th>Course and Year</th>
                            <th>Birth Date</th>
                            <th>Gender</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($studentinfo as $stuinfo)
                                <tr>
                                    <td>{{ $stuinfo->idNo }}</td>
                                    <td>{{ $stuinfo->firstName }} {{ $stuinfo->middleName }} {{ $stuinfo->lastName }}</td>
                                    <td>{{ $stuinfo->course }} {{ $stuinfo->year }}</td>
                                    <td>{{ date ("F j, Y", strtotime($stuinfo->birthdate)) }}</td>
                                    <td>{{ $stuinfo->gender }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('student')}}">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
