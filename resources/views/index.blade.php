@extends('layouts.app')

@section('content')
    <div class="container">
            <h1 class="text-center">
                GIC Shopping
                <img  width="100px" height="100px" src="{{ asset('dist/img/cart.png') }}">
            </h1>
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($data as $item)
                        <div class="col mt-5">
                            <div class="card" style="width:15rem">
                                <div class="d-flex justify-content-center align-items-center">
                                <img width="100%" height="200px" src="{{ asset('storage/gallery/' . $item->image) }}" alt="Example Photo">
                                </div>
                                <div class="d-flex justify-content-between">
                                <h5 class="card-title mt-3"><b>{{ $item->name }}</b></h5>
                                <h6 class="card-title mt-4"><b>{{ $item->price }}Ks</b></h6>
                                    <a href="#" class="btn btn-outline-success me-1 mt-2 mb-1">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{--  Calculate --}}
            <div class="col-4">
                <div class="p-5 border mt-4">

                    <div class="row mt-5">
                        <div class="col">item 1</div>
                        <div class="col">Price</div>
                    </div>
                    <div class="row mt-5">
                        <div class="col">item 2</div>
                        <div class="col">Price</div>
                    </div>
                    <hr>
                    <div class="row mt-5">
                        <div class="col">total</div>
                        <div class="col">Price</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
