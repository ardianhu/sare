@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">{{ __('Barang Ditemukan') }}</div>

                <div class="card-body">

                    @forelse($foundItems as $foundItem)
                    <div class="row mb-4">
                        <div class="col-4">
                            <img src="{{ asset('storage/' . $foundItem->photo) }}" class="img-fluid" alt="...">
                        </div>
                        <div class="col">
                            <h1>{{ $foundItem->name }}</h1>
                            <p>{{ $foundItem->description }}</p>
                            <p>ditemukan di: {{ $foundItem->location }}</p>
                            <p>ditemukan oleh: {{ $foundItem->user->name }}</p>
                            <p>Hubungi {{ $foundItem->user->phone }} untuk mengambil barang</p>
                        </div>
                    </div>
                    @empty
                    <div></div>
                    @endforelse

                </div>

            </div>
            <div class="card mb-4" id="barang_hilang">
                <div class="card-header">{{ __('Barang Hilang') }}</div>

                <div class="card-body">

                    @forelse($lostItems as $lostItem)
                    <div class="row mb-4">
                        <div class="col-4">
                            <img src="{{ asset('storage/' . $lostItem->photo) }}" class="img-fluid" alt="...">
                        </div>
                        <div class="col">
                            <h1>{{ $lostItem->name }}</h1>
                            <p>{{ $lostItem->description }}</p>
                            <p>hilang di: {{ $lostItem->location }}</p>
                            <p>Barang milik: {{ $lostItem->user->name }}</p>
                            <p>Bagi yang menemukan harap hubungi {{ $lostItem->user->phone }}</p>
                        </div>
                    </div>
                    @empty
                    <div></div>
                    @endforelse


                </div>
            </div>
            <div class="card mb-4" id="history_barang_ditemukan">
                <div class="card-header">{{ __('History Barang Ditemukan') }}</div>

                <div class="card-body">

                    @forelse($historyfoundItems as $foundItem)
                    <div class="row mb-4">
                        <div class="col-4">
                            <img src="{{ asset('storage/' . $foundItem->photo) }}" class="img-fluid" alt="...">
                        </div>
                        <div class="col">
                            <h1>{{ $foundItem->name }}</h1>
                            <p>{{ $foundItem->description }}</p>
                            <p>ditemukan di: {{ $foundItem->location }}</p>
                            <p>ditemukan oleh: {{ $foundItem->user->name }}</p>
                            <p>Hubungi {{ $foundItem->user->phone }} untuk mengambil barang</p>
                        </div>
                    </div>
                    @empty
                    <div></div>
                    @endforelse

                </div>

            </div>
            <div class="card mb-4" id="history_barang_hilang">
                <div class="card-header">{{ __('History Barang Hilang') }}</div>

                <div class="card-body">

                    @forelse($historylostItems as $lostItem)
                    <div class="row mb-4">
                        <div class="col-4">
                            <img src="{{ asset('storage/' . $lostItem->photo) }}" class="img-fluid" alt="...">
                        </div>
                        <div class="col">
                            <h1>{{ $lostItem->name }}</h1>
                            <p>{{ $lostItem->description }}</p>
                            <p>hilang di: {{ $lostItem->location }}</p>
                            <p>Barang milik: {{ $lostItem->user->name }}</p>
                            <p>Bagi yang menemukan harap hubungi {{ $lostItem->user->phone }}</p>
                        </div>
                    </div>
                    @empty
                    <div></div>
                    @endforelse


                </div>
            </div>

            <!-- <style>
                #floating {
                    bottom: 100px;
                    right: 100px;
                }

                /* .floating-button {
                    display: block;
                } */
            </style>
            <div class="position-fixed" id="floating">
                <ul>
                    <li>
                        <a class="floating-button btn btn-info position-fixed mb-2 t" href="#barang_hilang" role="button">Ke kehilangan barang</a>
                    </li>
                    <li>
                        <a class="floating-button btn btn-info position-fixed mb-2 t" href="#history_barang_ditemukan" role="button">Ke history penemuan</a>
                    </li>
                    <li>
                        <a class="floating-button btn btn-info position-fixed mb-2 t" href="#history_barang_hilang" role="button">Ke history kehilangan</a>
                    </li>
                </ul>
            </div> -->
        </div>
    </div>
</div>
<script>
    $('#coba').html('Hello World');
</script>
@endsection