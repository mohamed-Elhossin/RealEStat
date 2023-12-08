<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List All Sellers
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" col-md-7 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900" id="divToPrint">
                    <a href="{{ route('profit.index') }}" class="btn btn-secondary my-3">
                        Back <i class="fa-solid fa-calculator"></i> </a>
                    @if (Session::has('done'))
                        <div class="col-md-6 alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('done') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <h6> Unit Cost : {{ $profit->cost }} </h6>
                    <hr>
                    <h6> Developer Rate: {{ $profit->DeveloperRate }}% </h6>
                    <hr>
                    <h6 class="text-center text-primary">Your Commission {{ $profit->commission }} $ </h6>
                    <hr>
                    <h6>Tax percent : {{ $profit->tax }} %</h6>
                    <hr>
                    <h6>Tax Cost : {{ $profit->taxCost }} $ </h6>
                    <hr>
                    <h6 class="text-center text-primary">Net Profit {{ $profit->netprofit }} % </h6>
                    <hr>
                    <h6> Seller Name : {{ $profit->SellerName }} </h6>
                    <hr>
                    <h6> Developers Name : {{ $profit->developersName }} </h6>
                    <hr>

                    <h6> created_at : {{ $profit->created_at }} </h6>
                    <hr>


                </div>
                <div class="d-grid">
                    <button onclick="printDiv('divToPrint')" class="btn btn-success">Print this Page</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
