@extends('layout.index')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>
    <h2>OUR TEAM</h2>
    <div class="row row-cols-3">
        <div class="card col" style="width: 18rem;">
            <img src="{{ asset('template/assets/img/rizaldi.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">RIZALDI PERMANA</h5>
                <span class="card-text">MENTOR</span>
                <p class="card-text">GITS.ID</p>
            </div>
        </div>
        <div class="card col" style="width: 18rem;">
            <img src="{{ asset('template/assets/img/dimas.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">DIMAS WAHYU ARDHANA</h5>
                <span class="card-text">LEADER</span>
                <p class="card-text">UNIVERSITAS DIAN NUSWANTORO</p>
            </div>
        </div>
        <div class="card col" style="width: 18rem;">
            <img src="{{ asset('template/assets/img/airell.jpeg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">AIRELL ARISTO SUBAGIA</h5>
                <span class="card-text">MEMBER</span>
                <p class="card-text">UNIVERSITAS KRISTEN DUTA WACANA</p>
            </div>
        </div>
        <div class="card col" style="width: 18rem;">
            <img src="{{ asset('template/assets/img/faniel.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">FANIEL SIANIPAR</h5>
                <span class="card-text">MEMBER</span>
                <p class="card-text">UNIVERSITAS LAMPUNG</p>
            </div>
        </div>
        <div class="card col" style="width: 18rem;">
            <img src="{{ asset('template/assets/img/aini.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">NUR 'AINI AZIZAH</h5>
                <span class="card-text">MEMBER</span>
                <p class="card-text">UNIVERSITAS MUHAMMADIYAH KUDUS</p>
            </div>
        </div>
        <div class="card col" style="width: 18rem;">
            <img src="{{ asset('template/assets/img/nina.JPEG') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">NINA HIDAYAH</h5>
                <span class="card-text">MEMBER</span>
                <p class="card-text">UNIVERSITAS PGRI RONGGOLAWE</p>
            </div>
        </div>
    </div>
</main>
@endsection
