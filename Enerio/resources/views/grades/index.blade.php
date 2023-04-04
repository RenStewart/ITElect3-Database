<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Grades Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                <a href="{{ route('add-grades')}}">Add Grades</a>
                    <h6>List of Grades</h6>
                    <table class="border-separate border-spacing-5">
                      <tr>
                        <th>Enrolled Subjects Number</th>
                        <th>Student Number</th>
                        <th>Prelim</th>
                        <th>Midterm</th>
                        <th>Final</th>
                        <th>Remarks</th>
                    </tr>
                    <tbody>
                        @foreach($grades as $g)
                       <tr>
                        <td>{{$g->esNo }}</td>
                        <td>{{$g->lastName }}, {{$g->firstName}} {{$g->middleName}} {{$g->suffix}} </td>
                        <td>{{$g->prelim }}</td>
                        <td>{{$g->midterm }}</td>
                        <td>{{$g->finals }}</td>
                        <td>{{$g->remarks}}</td>
                        <td>
                            <a  href= "{{route('grades-show', ['Grade' => $g->gNo]) }}" >View</a> 
                        </form>
                        <td>
                       </tr>
                        @endforeach
                </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>