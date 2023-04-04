<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student Balance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <a href="{{ route('add-balances') }}">Add Student Balances</a>

                <h6>List of Students</h6>
                    <table class="border-separate border-spacing-5">
                        <thead>
                        <tr>
                        <th>ID No.</th>
                        <th>Student Name</th>
                        <th>Amount Due</th>
                        <th>Total Balance</th>
                        <th>Notes</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($balances as $bal)
                                <tr>
                                    <td>{{$bal->idNo}}</td>
                                    <td>{{$bal->lastName}}, {{$bal->firstName}} {{$bal->middleName}} {{$bal->suffix}}</td>
                                    <td>{{number_format($bal->amountDue,2)}}</td>
                                    <td>{{number_format($bal->totalBalance,2)}}</td>
                                    <td>{{$bal->notes}}</td>
                                    <td>
                                        <a href="{{route('balances-show', ['bNo' => $bal->bNo] )}}">View</a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
