@extends('layout.index')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Cart</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Cart</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row row-cols-3">
                @foreach ($product as $item)
                    <form action="/cart/add/{{ $item->id_product }}" method="POST">
                        @csrf
                        <div class="card col" style="width: 18rem;">
                            <img src="{{ asset('storage/' . $item->image_product) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name_product }}</h5>
                                <p class="card-text">{{ $item->description_product }}</p>
                                <p class="card-text">Harga : Rp.{{ $item->price_product }},00</p>
                                <div class="form-group mb-3">
                                    <label for="">Qty</label>
                                    <input type="number" class="form-control" name="id_product" value={{ $item->id_product }} hidden>
                                    <input type="number" class="form-control" name="price_product" value={{ $item->price_product }} hidden>
                                    <input type="number" class="form-control" name="qty" min=1 value=1>
                                </div>
                                {{-- <a href="/cart/add/{{ $item->id_product }}">klik disini</a> --}}
                                <button class="btn btn-primary">Masukkan Cart</button>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>

                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">KERANJANG</h5>

                                <!-- Default Table -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">NAMA PRODUK</th>
                                            <th scope="col">QTY</th>
                                            <th scope="col">SUB TOTAL</th>
                                            <th scope="col">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $carts as $item )
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->name_product }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->total }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <!-- End Default Table Example -->
                            </div>
                        </div>

                    </div>
                </div>
        </section>
    </main>
@endsection
