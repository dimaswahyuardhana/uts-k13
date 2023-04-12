@extends('layout.index')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Transaction</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item active">Transaction</li>
        </ol>
      </nav>
    </div>

    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Transaction Table</h5>

                <!-- Default Table -->
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">NO</th>
                      <th scope="col">NAMA PRODUK</th>
                      <th scope="col">QTY</th>
                      <th scope="col">TOTAL</th>
                      <th scope="col">TANGGAL</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $items)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $items->name_product }}</td>
                            <td>{{ $items->qty }}</td>
                            <td>{{ $items->total_price }}</td>
                            <td>{{ $items->created_at->format('d F y')}} , {{ $items->created_at->addHours(7)->format('H:i:s')  }}</td>
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
