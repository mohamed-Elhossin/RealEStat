<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Developer
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" col-md-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('developer.index') }}" class="btn btn-primary my-3"> Back <i
                            class="fa-solid fa-hand-point-left"></i> </a>
                    @if ($errors->any())
                        <div class="p-2 alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    @if (Session::has('done'))
                        <div class="col-md-6 alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('done') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('developer.update', $developer->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" value="{{$developer->name}}" name="name" placeholder="Developer Name"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" value="{{$developer->description}}" name="description" placeholder="Developer Description "
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" value="{{$developer->rate}}" name="rate" placeholder="Commission percentage"
                                        class="form-control">
                                </div>
                                <div class="my-3 d-grid col-md-3 mx-auto">
                                    <button class=" btn btn-primary"> Create <i class="fa-solid fa-square-plus"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
