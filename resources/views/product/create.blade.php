@extends('layout.index')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Product</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item active">Product</li>
        </ol>
      </nav>
    </div>

    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Product Table</h5>
                <a href="{{ url('/product/add') }}">
                    <button type="button" class="btn btn-primary">+ TAMBAH DATA</button>
                </a>
                <br>

                <!-- Default Table -->
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">NO</th>
                      <th scope="col">NAMA PRODUK</th>
                      <th scope="col">KATEGORI</th>
                      <th scope="col">DESKRIPSI</th>
                      <th scope="col">HARGA</th>
                      <th scope="col">FOTO</th>
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
