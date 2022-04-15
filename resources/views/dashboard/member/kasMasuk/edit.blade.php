@extends('dashboard.member.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Kas</h1>
    </div>
    <div class="col-lg-8">
        <form action="/dashboard/member/kas-masuk/{{ $kasmasuk->id }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="uang_masuk" class="form-label">Kas Masuk</label>
                <input type="text" name="uang_masuk" id="uang_masuk" class="form-control @error('uang_masuk') is-invalid @enderror" value="{{ old('uang_masuk', $kasmasuk->uang_masuk) }}" required autofocus>
                @error('uang_masuk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection