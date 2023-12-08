<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Calculating the commission Profits
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" col-md-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('profit.index') }}" class="btn btn-primary my-3"> Back <i
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
                        <div id="costValues" class="card-body">
                            <form action="{{ route('profit.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Choose the developer to have his percentage calculated : </label>
                                    <select name="developer_id" id="costSelect" class="form-control" id="">
                                        <option selected disabled>Developers </option>
                                        @foreach ($developer as $item)
                                            <option value="[{{ $item->id }} , {{ $item->rate }} ]">Name :
                                                {{ $item->name }} | commission
                                                : {{ $item->rate }}%</option>
                                        @endforeach

                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <input type="text" id="costinput" name="cost" placeholder="Unit Cost $"
                                        class="form-control">
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label> Your Gross profit from the commission : </label>
                                    <input type="number" id="costinput" readonly name="commission"
                                        placeholder="commission" class="form-control">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label> Choose the seller responsible for the deal : </label>
                                    <select name="seller_id" id="costSelect" class="form-control" id="">
                                        <option selected disabled>Sallers</option>
                                        @foreach ($seller as $item)
                                            <option value="{{ $item->id }}">Saller : {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label > Enter the Tax % :  </label>
                                    <div class="form-group">
                                        <input type="number" id="costinput" name="tax" placeholder="Tax percent %"
                                            class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label > Your Tax Cost % :  </label>
                                    <div class="form-group">
                                        <input type="number" readonly id="taxinputCost" name="taxCost" placeholder="Your Tax Cost "
                                            class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Your Net Profit : </label>
                                    <div class="form-group">
                                        <input type="number" id="costinput" readonly name="netprofit"
                                            placeholder="Net Profit" class="form-control">
                                    </div>
                                </div>
                                <div class="my-3 d-grid col-md-3 mx-auto">
                                    <button class=" btn btn-primary"> Save all transactions <i class="fa-solid fa-square-plus"></i>
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
