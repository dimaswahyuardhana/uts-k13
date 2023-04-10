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
        <form action="">
        <div class="row">
                @foreach ($product as $item)
                <div class="col">
                    <div class="card col" style="width: 18rem;">
                        <img src="{{ $item->image_product }}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">{{ $item->name_product }}</h5>
                        <p class="card-text">{{ $item->description_product }}</p>
                        <p class="card-text">Harga : Rp.{{ $item->price_product }},00</p>
                        <div class="form-group mb-3">
                            <label for="">Qty</label>
                            <input type="number" class="form-control" name="qty">
                        </div>
                        <button type="button" class="btn btn-primary">Masukkan Cart</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </form>

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
                      <tr>

                      </tr>
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
