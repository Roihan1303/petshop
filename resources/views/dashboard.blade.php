@extends('master')

@section('content')
    <main class="py-3 bg-light">
        <div class="container">
            <h1>Dashboard</h1>
            <hr>
            @if (auth()->user()->isAdmin == 1)
                <div class="row">
                    <a href="{{ route('hewan.index') }}" class="col-12 col-md-6 col-lg-4 mb-3">
                        <div class="card text-primary border-primary">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col border-end">
                                        <h3>List Hewan</h3>
                                        <p class="text-secondary">{{ $dataHewan->count() }}</p>
                                    </div>
                                    <div class="col-4 text-center">
                                        <h1 class="bi bi-box2"></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('order.list') }}" class="col-12 col-md-6 col-lg-4 mb-3">
                        <div class="card text-primary border-primary">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col border-end">
                                        <h3>Orders</h3>
                                        <p class="text-secondary">{{ $order->count() }}</p>
                                    </div>
                                    <div class="col-4 text-center">
                                        <h1 class="bi bi-box2"></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            <section>
                <div class="container">
                    <div class="row">
                        @foreach ($dataHewan as $hewan)
                            <div class="col-6 col-md-4 col-lg-3 mb-3">
                                <div class="card text-center">
                                    <img src="{{ asset('storage/images/' . $hewan->gambar) }}" class="card-img-top"
                                        alt="Gambar Hewan" style="height: 200px; object-fit: contain;">
                                    <!-- Add 'height' and 'object-fit' here -->
                                    <div class="card-body">
                                        <h5 class="card-title m-0">{{ $hewan->jenis_hewan }}</h5>
                                        <h6 class="card-title m-0">{{ $hewan->jenis_kelamin }}</h6>
                                        <p class="card-text">
                                            Rp. {{ $hewan->harga }}
                                        </p>
                                        @if ($hewan->status == 'Avaliable')
                                            @if (auth()->user()->isAdmin == 1)
                                                <button type="button" class="btn btn-primary">Available</button>
                                            @else
                                                <a href="{{ route('order.index', ['hewan' => $hewan->id]) }}"
                                                    class="btn btn-primary">Order</a>
                                            @endif
                                        @else
                                            <button type="button" class="btn btn-danger">Sold</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
