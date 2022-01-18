@extends('layouts.main')

{{-- @section('title')
    PC Builder
@endsection --}}

@section('content')

    @if (session()->has('status'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="container mt-3">
        <h1>PC Builder</h1>
    </div>

    <div class="container"> {{-- ms = kiri, me = kanan --}}
        <table class="table table-hover align-middle" style="color: white; width: 100%;">
            <thead>
                <tr>
                    <th>Part</th>
                    <th>Selection</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>
                        <a href="/rangkitpc/browse/cpu">CPU</a>
                    </th>
                    @if (session()->get('builder_cart.cpu') != "")
                    <td>IMAGE</td>
                    <td>{{ Session::get('builder_cart.cpu')->name }}</td>
                    <td>Rp. {{ number_format(Session::get('builder_cart.cpu')->price,0,",",".") }}</td>
                    <td>
                        {{-- <div class="cancel_ico">
                            <a style="cursor: pointer" class="cancel" href="/rangkitpc/remove/{{ Session::get('builder_cart.cpu')->type }}">
                                <img src="{{ URL::to('/assets/cancel.png') }}" width="25" height="25">
                                <img src="{{ URL::to('/assets/cancel_red.png') }}" width="25" height="25" class="img-top">
                            </a>
                        </div> --}}
                        <div class="container">
                            <form method="POST" action="/rangkitpc/remove/{{ Session::get('builder_cart.cpu')->type }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm fw-bolder" style="font-size: 10px">X</button>
                            </form>
                        </div>
                    </td>
                    @else
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @endif
                </tr>
                <tr>
                    <th>
                        <a href="/rangkitpc/browse/gpu">Graphic Card</a>
                    </th>
                    @if (session()->get('builder_cart.gpu') != "")
                    <td><img src="{{ URL::to('/assets/gpu.jpg') }}" width="100" height="45" class="d-inline-block align-text-top me-2"></td>
                    <td>{{ Session::get('builder_cart.gpu')->name }}</td>
                    <td>Rp. {{ number_format(Session::get('builder_cart.gpu')->price,0,",",".") }}</td>
                    <td>
                        {{-- <div class="cancel_ico">
                            <a style="cursor: pointer" class="cancel" href="/rangkitpc/remove/{{ Session::get('builder_cart.gpu')->type }}">
                                <img src="{{ URL::to('/assets/cancel.png') }}" width="25" height="25">
                                <img src="{{ URL::to('/assets/cancel_red.png') }}" width="25" height="25" class="img-top">
                            </a>
                        </div> --}}
                        <div class="container">
                            <form method="POST" action="/rangkitpc/remove/{{ Session::get('builder_cart.gpu')->type }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm fw-bolder" style="font-size: 10px">X</button>
                            </form>
                        </div>
                    </td>
                    @else
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @endif
                </tr>
                <tr>
                    <th>
                        <a href="/rangkitpc/browse/mb">Motherboard</a>
                    </th>
                    @if (session()->get('builder_cart.mb') != "")
                    <td><img src="{{ URL::to('/assets/gpu.jpg') }}" width="100" height="45" class="d-inline-block align-text-top me-2"></td>
                    <td>{{ Session::get('builder_cart.mb')->name }}</td>
                    <td>Rp. {{ number_format(Session::get('builder_cart.mb')->price,0,",",".") }}</td>
                    <td>
                        {{-- <div class="cancel_ico">
                            <a style="cursor: pointer" class="cancel" href="/rangkitpc/remove/{{ Session::get('builder_cart.mb')->type }}">
                                <img src="{{ URL::to('/assets/cancel.png') }}" width="25" height="25">
                                <img src="{{ URL::to('/assets/cancel_red.png') }}" width="25" height="25" class="img-top">
                            </a>
                        </div> --}}
                        <div class="container">
                            <form method="POST" action="/rangkitpc/remove/{{ Session::get('builder_cart.mb')->type }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm fw-bolder" style="font-size: 10px">X</button>
                            </form>
                        </div>
                    </td>
                    @else
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @endif
                </tr>
                <tr>
                    <th>
                        <a href="/rangkitpc/browse/ram">RAM/Memory</a>
                    </th>
                    @if (session()->get('builder_cart.ram') != "")
                    <td><img src="{{ URL::to('/assets/gpu.jpg') }}" width="100" height="45" class="d-inline-block align-text-top me-2"></td>
                    <td>{{ Session::get('builder_cart.ram')->name }}</td>
                    <td>Rp. {{ number_format(Session::get('builder_cart.ram')->price,0,",",".") }}</td>
                    <td>
                        {{-- <div class="cancel_ico">
                            <a style="cursor: pointer" class="cancel" href="/rangkitpc/remove/{{ Session::get('builder_cart.ram')->type }}">
                                <img src="{{ URL::to('/assets/cancel.png') }}" width="25" height="25">
                                <img src="{{ URL::to('/assets/cancel_red.png') }}" width="25" height="25" class="img-top">
                            </a>
                        </div> --}}
                        <div class="container">
                            <form method="POST" action="/rangkitpc/remove/{{ Session::get('builder_cart.ram')->type }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm fw-bolder" style="font-size: 10px">X</button>
                            </form>
                        </div>
                    </td>
                    @else
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @endif
                </tr>
                <tr>
                    <th>
                        <a href="/rangkitpc/browse/stor">Storage</a>
                    </th>
                    @if (session()->get('builder_cart.stor') != "")
                    <td>IMAGE</td>
                    <td>{{ Session::get('builder_cart.stor')->name }}</td>
                    <td>Rp. {{ number_format(Session::get('builder_cart.stor')->price,0,",",".") }}</td>
                    <td>
                        {{-- <div class="cancel_ico">
                            <a style="cursor: pointer" class="cancel" href="/rangkitpc/remove/{{ Session::get('builder_cart.stor')->type }}">
                                <img src="{{ URL::to('/assets/cancel.png') }}" width="25" height="25">
                                <img src="{{ URL::to('/assets/cancel_red.png') }}" width="25" height="25" class="img-top">
                            </a>
                        </div> --}}
                        <div class="container">
                            <form method="POST" action="/rangkitpc/remove/{{ Session::get('builder_cart.stor')->type }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm fw-bolder" style="font-size: 10px">X</button>
                            </form>
                        </div>
                    </td>
                    @else
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @endif
                </tr>
                <tr>
                    <th>
                        <a href="/rangkitpc/browse/psu">Power Supply</a>
                    </th>
                    @if (session()->get('builder_cart.psu') != "")
                    <td>IMAGE</td>
                    <td>{{ Session::get('builder_cart.psu')->name }}</td>
                    <td>Rp. {{ number_format(Session::get('builder_cart.psu')->price,0,",",".") }}</td>
                    <td>
                        {{-- <div class="cancel_ico">
                            <a style="cursor: pointer" class="cancel" href="/rangkitpc/remove/{{ Session::get('builder_cart.psu')->type }}">
                                <img src="{{ URL::to('/assets/cancel.png') }}" width="25" height="25">
                                <img src="{{ URL::to('/assets/cancel_red.png') }}" width="25" height="25" class="img-top">
                            </a>
                        </div> --}}
                        <div class="container">
                            <form method="POST" action="/rangkitpc/remove/{{ Session::get('builder_cart.psu')->type }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm fw-bolder" style="font-size: 10px">X</button>
                            </form>
                        </div>
                    </td>
                    @else
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @endif
                </tr>
                <tr>
                    <th>
                        <a href="/rangkitpc/browse/case">Case</a>
                    </th>
                    @if (session()->get('builder_cart.case') != "")
                    <td>IMAGE</td>
                    <td>{{ Session::get('builder_cart.case')->name }}</td>
                    <td>Rp. {{ number_format(Session::get('builder_cart.case')->price,0,",",".") }}</td>
                    <td>
                        {{-- <div class="cancel_ico">
                            <a style="cursor: pointer" class="cancel" href="/rangkitpc/remove/{{ Session::get('builder_cart.case')->type }}">
                                <img src="{{ URL::to('/assets/cancel.png') }}" width="25" height="25">
                                <img src="{{ URL::to('/assets/cancel_red.png') }}" width="25" height="25" class="img-top">
                            </a>
                        </div> --}}
                        <div class="container">
                            <form method="POST" action="/rangkitpc/remove/{{ Session::get('builder_cart.case')->type }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm fw-bolder" style="font-size: 10px">X</button>
                            </form>
                        </div>
                    </td>
                    @else
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @endif
                </tr>
                <tr>
                    <th>
                        <a href="/rangkitpc/browse/moni">Monitor</a>
                    </th>
                    @if (session()->get('builder_cart.moni') != "")
                    <td>IMAGE</td>
                    <td>{{ Session::get('builder_cart.moni')->name }}</td>
                    <td>Rp. {{ number_format(Session::get('builder_cart.moni')->price,0,",",".") }}</td>
                    <td>
                        {{-- <div class="cancel_ico">
                            <a style="cursor: pointer" class="cancel" href="/rangkitpc/remove/{{ Session::get('builder_cart.moni')->type }}">
                                <img src="{{ URL::to('/assets/cancel.png') }}" width="25" height="25">
                                <img src="{{ URL::to('/assets/cancel_red.png') }}" width="25" height="25" class="img-top">
                            </a>
                        </div> --}}
                        <div class="container">
                            <form method="POST" action="/rangkitpc/remove/{{ Session::get('builder_cart.moni')->type }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm fw-bolder" style="font-size: 10px">X</button>
                            </form>
                        </div>
                    </td>
                    @else
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @endif
                </tr>
                <tr>
                    <th>
                        <a href="/rangkitpc/browse/kb">Keyboard</a>
                    </th>
                    @if (session()->get('builder_cart.kb') != "")
                    <td>IMAGE</td>
                    <td>{{ Session::get('builder_cart.kb')->name }}</td>
                    <td>Rp. {{ number_format(Session::get('builder_cart.kb')->price,0,",",".") }}</td>
                    <td>
                        {{-- <div class="cancel_ico">
                            <a style="cursor: pointer" class="cancel" href="/rangkitpc/remove/{{ Session::get('builder_cart.kb')->type }}">
                                <img src="{{ URL::to('/assets/cancel.png') }}" width="25" height="25">
                                <img src="{{ URL::to('/assets/cancel_red.png') }}" width="25" height="25" class="img-top">
                            </a>
                        </div> --}}
                        <div class="container">
                            <form method="POST" action="/rangkitpc/remove/{{ Session::get('builder_cart.kb')->type }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm fw-bolder" style="font-size: 10px">X</button>
                            </form>
                        </div>
                    </td>
                    @else
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @endif
                </tr>
                <tr>
                    <th>
                        <a href="/rangkitpc/browse/mos">Mouse</a>
                    </th>
                    @if (session()->get('builder_cart.mos') != "")
                    <td>IMAGE</td>
                    <td>{{ Session::get('builder_cart.mos')->name }}</td>
                    <td>Rp. {{ number_format(Session::get('builder_cart.mos')->price,0,",",".") }}</td>
                    <td>
                        {{-- <div class="cancel_ico">
                            <a style="cursor: pointer" class="cancel" href="/rangkitpc/remove/{{ Session::get('builder_cart.mos')->type }}">
                                <img src="{{ URL::to('/assets/cancel.png') }}" width="25" height="25">
                                <img src="{{ URL::to('/assets/cancel_red.png') }}" width="25" height="25" class="img-top">
                            </a>
                        </div> --}}
                        <div class="container">
                            <form method="POST" action="/rangkitpc/remove/{{ Session::get('builder_cart.mos')->type }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm fw-bolder" style="font-size: 10px">X</button>
                            </form>
                        </div>
                    </td>
                    @else
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @endif
                </tr>
            </tbody>
            <tfoot>
                @if (session()->get('builder_cart.total') != 0)
                <tr>
                    <td></td>
                    <td></td>
                    <th style="text-align: right">TOTAL</th>
                    <td>Rp. {{ number_format(Session::get('builder_cart.total'),0,",",".") }}</td>
                    <td></td>
                </tr>
                @else
                @endif
            </tfoot>
        </table>
        @if (session()->get('builder_cart.total') != 0)
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="/rangkitpc/checkout" class="btn btn-success btn-lg me-md-2" role="button">Checkout</a>
            {{-- <a href="/rangkitpc/checkout" class="btn btn-outline-light me-md-2" role="button">Checkout</a> --}}
        </div>
        @endif
    </div>

@endsection
