@extends('dashboard.member.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Kas</h1>
    </div>
    <div class="col-lg-8">
        <form action="/dashboard/member/kas-keluar/{{ $kaskeluar->id }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="uang_keluar" class="form-label">Kas Masuk</label>
                <input type="text" name="uang_keluar" id="uang_keluar" class="form-control @error('uang_keluar') is-invalid @enderror" value="{{ old('uang_keluar', $kaskeluar->uang_keluar) }}" required autofocus>
                @error('uang_keluar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection