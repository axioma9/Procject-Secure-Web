@extends('layouts.main')

@section('content')

    @isset ($type)
    <div class="container mt-3">
        <h1>Choose a {{ $type }}</h1>
        <div class="border-bottom"></div>
    </div>
    @else
    <div class="container mt-3">
        <h1>Browse All Parts</h1>
    </div>
    {{-- <section class="py-2 text-center container"> --}}
    <section class="py-2 container">
        <div class="border-bottom">
            {{-- <button class="btn btn-default filter-button text-white" data-filter="all">All</button>
            <button class="btn btn-default filter-button text-white" data-filter="gpu">Graphic Card</button>
            <button class="btn btn-default filter-button text-white" data-filter="cpu">CPU</button>
            <button class="btn btn-default filter-button text-white" data-filter="mb">Motherboard</button>
            <button class="btn btn-default filter-button text-white" data-filter="ram">RAM/Memory</button>
            <button class="btn btn-default filter-button text-white" data-filter="stor">Storage</button>
            <button class="btn btn-default filter-button text-white" data-filter="psu">Power Supply</button>
            <button class="btn btn-default filter-button text-white" data-filter="case">Case</button>
            <button class="btn btn-default filter-button text-white" data-filter="moni">Monitor</button>
            <button class="btn btn-default filter-button text-white" data-filter="kb">Keyboard</button>
            <button class="btn btn-default filter-button text-white" data-filter="mos">Mouse</button> --}}

            <div class="form-check form-check-inline">
                <input class="form-check-input filter-checkbox" type="checkbox" id="gpuCheckbox" data-filter="gpu">
                <label class="form-check-label" for="gpuCheckbox">Graphic Card</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input filter-checkbox" type="checkbox" id="cpuCheckbox" data-filter="cpu">
                <label class="form-check-label" for="cpuCheckbox">CPU</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input filter-checkbox" type="checkbox" id="mbCheckbox" data-filter="mb">
                <label class="form-check-label" for="mbCheckbox">Motherboard</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input filter-checkbox" type="checkbox" id="ramCheckbox" data-filter="ram">
                <label class="form-check-label" for="ramCheckbox">RAM/Memory</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input filter-checkbox" type="checkbox" id="storCheckbox" data-filter="stor">
                <label class="form-check-label" for="storCheckbox">Storage</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input filter-checkbox" type="checkbox" id="psuCheckbox" data-filter="psu">
                <label class="form-check-label" for="psuCheckbox">Power Supply</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input filter-checkbox" type="checkbox" id="caseCheckbox" data-filter="case">
                <label class="form-check-label" for="caseCheckbox">Case</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input filter-checkbox" type="checkbox" id="moniCheckbox" data-filter="moni">
                <label class="form-check-label" for="moniCheckbox">Monitor</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input filter-checkbox" type="checkbox" id="kbCheckbox" data-filter="kb">
                <label class="form-check-label" for="kbCheckbox">Keyboard</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input filter-checkbox" type="checkbox" id="mosCheckbox" data-filter="mos">
                <label class="form-check-label" for="mosCheckbox">Mouse</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input filter-checkbox-all" type="checkbox" id="allCheckbox" data-filter="all" checked>
                <label class="form-check-label" for="allCheckbox">All</label>
            </div>
        </div>
    </section>
    @endisset

    @if (session()->has('status'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="album pb-5 pt-3">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                {{-- card mulai dari sini --}}
                @foreach ($all as $row)
                <div class="col filter {{ $row->type }}">
                    <div class="card shadow-sm bg-dark">
                        <img src="{{ URL::to('/assets/gpu.jpg') }}" class="img-fluid">
                        <div class="card-body">
                            {{-- <h5 class="card-title">NVIDIA GTX 4000</h5> --}}
                            <h5 class="card-title">{{ $row->name }}</h5>
                            {{-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> --}}
                            <p class="card-text">{{ $row->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <form method="get" action="/rangkitpc/add">
                                    <div class="btn-group">
                                        <a href="/rangkitpc/product/{{ $row->name }}" class="btn btn-sm btn-outline-secondary" role="button">View</a>
                                        @auth
                                        @csrf
                                        <input type="hidden" id="id" name="id" value="{{ $row->id }}">
                                        <input type="submit" formmethod="post" class="btn btn-sm btn-outline-secondary" role="button" value="Add">
                                        @endauth
                                        {{-- @if () --}}
                                        {{-- <a href="" class="btn btn-sm btn-outline-secondary" role="button">Edit</a> --}}
                                        {{-- <a href="" class="btn btn-sm btn-outline-secondary" role="button">Delete</a> --}}
                                        {{-- @endif --}}
                                    </div>
                                </form>
                                <small class="text-muted">{{ $row->stock }} in stock</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container pagination justify-content-center">
        {{ $all->links() }}
    </div>

    <script>
        // script untuk search
        $(document).ready(function(){
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".col").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            // script untuk filter button
            $(".filter-button").click(function(){
                var value = $(this).attr('data-filter');

                if(value == "all") {
                    $('.filter').show('1000');
                } else {
                    $(".filter").not('.'+value).hide('1000');
                    $('.filter').filter('.'+value).show('1000');
                }
            });

            // script untuk filter checkbox
            $(".filter-checkbox-all").click(function(){
                $('.filter-checkbox').each(function() {
                    var value = $(this).attr('data-filter');
                    this.checked = false;
                });
                $('.filter').show('1000');
            });
            $(".filter-checkbox").click(function() {
                $('.filter-checkbox-all').prop('checked', false);
                $(".filter").hide('1000');
                $(":checkbox:checked").each(function() {
                    var value = $(this).attr('data-filter');
                    // console.log(value);
                    // $(".filter").not('.'+value).hide('1000');
                    $('.filter').filter('.'+value).show('1000');
                });
            });

        });
    </script>
@endsection
