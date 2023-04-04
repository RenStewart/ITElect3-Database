<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Balance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h6>Student Balance</h6><br />
                    <table class="border-separate border-spacing-5">
                        <thead>
                            <tr>
                                <th>Student No.</th>
                                <th>Amount Due</th>
                                <th>Total Balance</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($balances as $bal)
                            <tr>
                                <td>{{ $bal->sno }}</td>
                                <td>{{ number_format($bal->amountDue,2) }}</td>
                                <td>{{ number_format($bal->totalBalance,2) }}</td>
                                <td>{{ $bal->notes }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <a href="{{route('balances')}}"> Back </a>
                    <br /><br /><br />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
