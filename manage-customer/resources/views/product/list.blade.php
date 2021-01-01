@extends('home')
@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>

            <li class="nav-item">
                <a class="nav-link disabled" href="{{ route('cart.showCart') }}" tabindex="-1" aria-disabled="true">
                    Cart<span class="badge badge-pill badge-danger"> {{ Session::has('cart') ? Session::get('cart')->totalQty : ''}}
                     </span></a>
            </li>
        </ul>
    </div>
</nav>

    <div class="containe mt-5">
        <div class="row">
            <div class="col-md-3">
                @foreach($products as $product)
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <img src="{{ $product['image'] }}" alt="" width="250px" height="350px">
                        <h5 class="card-title">{{ $product['name'] }}</h5>
                        <p class="card-text">{{ $product['price'] }}</p>
                        <button class="btn btn-danger"><a href="{{ route('cart.addToCart',$product->id) }}"
                                                          class="card-link">add to cart</a></button>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
