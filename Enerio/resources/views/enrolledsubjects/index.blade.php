<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Enrolled Subjects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <a href="{{ route('add-subjects') }}">Add Subjects</a>

                <h6>Enrolled Subjects</h6>
                    <table class="border-separate border-spacing-5">
                        <thead>
                        <tr>
                            <th>Subject Code</th>
                            <th>Description</th>
                            <th>Units</th>
                            <th>Schedule</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($enrolledsubjects as $enrollsub)
                       <tr>
                        <td>{{$enrollsub->subjectCode}}</td>
                        <td>{{$enrollsub->description}}</td>
                        <td>{{$enrollsub->units }}</td>
                        <td>{{$enrollsub->schedule }}</td>
                        <td>
                            <a href= "{{route('enrolledsubjects-show', ['esNo' => $enrollsub->esNo]) }}" >View</a>
                        </form>
                        <td>
                       </tr>
                        @endforeach
                </tbody>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
