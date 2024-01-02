@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div>Informasi Akun</div>
                            <div class="row">
                                <div class="col-4">Nama</div>
                                <div class="col">: {{ Auth::user()->name }}</div>
                            </div>
                            <div class="row">
                                <div class="col-4">Email</div>
                                <div class="col">: {{ Auth::user()->email }}</div>
                            </div>
                            <div class="row">
                                <div class="col-4">Alamat</div>
                                <div class="col">: {{ Auth::user()->address }}</div>
                            </div>
                            <div class="row">
                                <div class="col-4">Nomor Telpon</div>
                                <div class="col">: {{ Auth::user()->phone }}</div>
                            </div>
                            <div class="row">
                                <div class="col-4">Fakultas</div>
                                <div class="col">: {{ Auth::user()->faculty }}</div>
                            </div>
                            <div class="row">
                                <div class="col-4">Jurusan</div>
                                <div class="col">: {{ Auth::user()->major }}</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <a class="btn btn-primary" href="{{ route('ilost') }}" role="button">Kehilangan Barang</a>
                            <a class="btn btn-warning" href="{{ route('ifound') }}" role="button">Menemukan Barang</a>
                        </div>
                    </div>
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="coba">p</div> -->

                    <!-- {{ __('You are logged in!') }} -->
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Postingan Anda') }}</div>

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

                            <form action="{{ route('items.markFoundAsClaimed', ['id' => $foundItem->id]) }}" method="POST">
                                @csrf
                                @method('POST')

                                <button type="submit" class="btn btn-success">Tandai selesai</button>
                            </form>

                        </div>
                    </div>
                    @empty
                    <div></div>
                    @endforelse
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

                            <form action="{{ route('items.markLostAsClaimed', ['id' => $lostItem->id]) }}" method="POST">
                                @csrf
                                @method('POST')

                                <button type="submit" class="btn btn-success">Tandai selesai</button>
                            </form>

                        </div>
                    </div>
                    @empty
                    <div></div>
                    @endforelse


                </div>
            </div>
        </div>
    </div>
</div>
@endsection