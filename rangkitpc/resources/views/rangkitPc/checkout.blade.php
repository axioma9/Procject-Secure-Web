@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                @foreach (session()->get('builder_cart') as $type => $value)
                @if ($value != "" && $type != "total")
                <div class="card mb-3 text-white shadow-sm bg-dark rounded-3" style="max-width: 600px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ URL::to('/assets/gpu.jpg') }}" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $value->name }}</h5>
                                <p class="card-text">Rp. {{ number_format($value->price,0,",",".") }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <div class="col-md-6">
                <div class="p-5 mb-4 text-white shadow-sm bg-dark rounded-3">
                    <div class="container-fluid">
                        {{-- <form action="/rangkitpc/checkout" method="post"> --}}
                        <form action="{{ route('checkout') }}" method="post">
                            @csrf
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="inputAddress" class="form-label">Address</label>
                                    <input type="text" class="form-control " id="address" name="address" placeholder="Main St">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="inputCity" class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" name="city">
                                  </div>
                                  <div class="col-md-3">
                                    <label for="inputZip" class="form-label">Zip</label>
                                    <input type="text" class="form-control" id="zip" name="zip">
                                  </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="courier" class="col-form-label">Pick your courier:</label>
                                </div>
                                <div class="col-sm-7">
                                    <select class="form-select col-sm-10" id="courier" name="courier" aria-label="Default select example">
                                        <option selected value="ngaco">Sicepat Ngaco</option>
                                        <option value="tuku">Tuku</option>
                                        <option value="pendex">Pendex</option>
                                        <option value="enj">ENJ</option>
                                        <option value="jdant">JdanT</option>
                                        <option value="anterdong">AnterDong</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <h3 class="fs-4 text-start">All Item Price: </h3>
                                </div>
                                <div class="col-sm-6">
                                    <h3 class="fs-4 text-end">Rp. {{ number_format(Session::get('builder_cart.total'),0,",",".") }}</h3>
                                </div>
                            </div>
                            <div class="row text-muted">
                                <div class="col-sm-6">
                                    <h3 class="fs-4 text-start">Shipping: </h3>
                                </div>
                                <div class="col-sm-6">
                                    <h3 class="fs-4 text-end">Rp. 150.000</h3>
                                </div>
                            </div>
                            <div class="row text-muted">
                                <div class="col">
                                    <h3 class="fs-4 text-start">Insurance: </h3>
                                </div>
                                <div class="col">
                                    <h3 class="fs-4 text-end">Rp. 6.000</h3>
                                </div>
                            </div>
                            <div class="border-bottom my-2"></div>
                            <div class="row">
                                <div class="col">
                                    <h3 class="fs-4 text-start">Total Price: </h3>
                                </div>
                                <div class="col">
                                    <h3 class="fs-4 text-end">Rp. {{ number_format(Session::get('builder_cart.total'),0,",",".") }}</h3>
                                </div>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto mt-3">
                                <button class="btn btn-success btn-lg" type="submit">Purchase</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        $(".dropdown-menu li").click(function(){

            $(".btn:first-child").html($(this).text());

        });
    </script> --}}


@endsection
