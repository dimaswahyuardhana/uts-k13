@extends('layout.index')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Cart</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/cart') }}">Category</a></li>
                    <li class="breadcrumb-item active">Edit Data Keranjang</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-9">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">EDIT DATA CATEGORY</h5>

                            <!-- General Form Elements -->
                            <form action="/cart/{{ $cart->id_cart }}" method="POST">
                                @method("PUT")
                                @csrf
                                <div class="row mb-3">
                                    <label for="qty" class="col-sm-2 col-form-label">Kuantitas</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control @error('qty') is-invalid @enderror"
                                            id="qty" name="qty" value="{{ $category->qty }}">
                                        @error('qty')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">TAMBAH</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
