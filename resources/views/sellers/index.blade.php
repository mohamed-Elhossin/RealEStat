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
                    <a href="{{ route('seller.create') }}" class="btn btn-primary my-3"> Add New <i
                            class="fa-solid fa-user-plus"></i> </a>
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
                                <th scope="col">Seller Name</th>
                                {{-- <th scope="col">Description</th> --}}
                                <th scope="col">Salary</th>
                                <th scope="col">Phone</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sellers as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->name }}</td>
                                    {{-- <td>{{ $item->description }}</td> --}}
                                    <td>{{ $item->salary }}  </td>
                                    <td>{{ $item->phone }}  </td>
                                    <td>
                                        <a href="{{ route('seller.edit', $item->id) }}"><i title="Edit"
                                                class="text-warning fa-solid fa-pen-to-square"></i></a>
                                    </td>
                                    <td>
                                        <a onclick="return confirm('Are You Sure')"
                                            href="{{ route('seller.destroy', $item->id) }}"><i title="Remove"
                                                class="text-danger fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            @endforeach


                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
