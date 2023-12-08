<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List All Sellers
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" col-md-7 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    <a href="{{ route('profit.create') }}" class="btn btn-secondary my-3">
                        Calculating the commission <i class="fa-solid fa-calculator"></i> </a>
                    @if (Session::has('done'))
                        <div class="col-md-6 alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('done') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Unit Cost </th>
                                <th scope="col">Net Profit</th>
                                <th scope="col">Date</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Profits as $item)
                                <tr>
                                    <th> {{ $loop->iteration }} </th>
                                    <th> {{ $item->cost }} </th>
                                    <th> {{ $item->netprofit }} </th>
                                    <th> {{ $item->created_at }} </th>
                                    <th>
                                        <a class="btn btn-primary" href="{{route("profit.show", $item->id)}}">Show Details  <i class="fa-solid fa-eye"></i> </a>
                                    </th>
                                </tr>
                            @endforeach


                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
