@extends('layouts.main')

@section('content')
    <div class="container mt-3">
        {{-- <h1>NVIDIA GTX 4000</h1> --}}
        <h1>{{ $product->name }}</h1>
    </div>

    <div class="container py-4">
        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    {{-- <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div> --}}
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ URL::to('/assets/gpu.jpg') }}" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ URL::to('/assets/gpu.jpg') }}" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ URL::to('/assets/gpu.jpg') }}" class="d-block w-100">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-5 text-white bg-dark rounded-3">
                    {{-- <h2 class="border-bottom">Rp. 6.000.000</h2> --}}
                    <h2 class="border-bottom">Rp. {{ $price }}</h2>
                    {{-- <h2 class="border-bottom">Rp. {{ $product->price }}</h2> --}}
                    <div class="row align-items-md-stretch">
                        <div class="col-md-6">
                            <h5>Specification</h5>
                        </div>
                        <div class="col-md-6">
                            <h6 style="float:right">{{ $product->type }}</h6>
                        </div>
                    </div>
                    {{-- <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both column's content for equal-height.</p> --}}
                    <p>{{ $product->description }}</p>
                    @auth
                    <form method="post" action="/rangkitpc/add">
                        @csrf
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <input type="hidden" id="id" name="id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-outline-light">Add</button>
                            {{-- <a class="btn btn-outline-light disabled" role="button" aria-disabled="true">Add</a> --}}
                        </div>
                    </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>



@endsection
