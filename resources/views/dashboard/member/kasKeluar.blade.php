@extends('dashboard.member.layout.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kas Keluar</h1>
  </div>
  @if (session()->has('success'))
    <div class="alert alert-success col-lg-6" role="alert">
      {{ session('success') }}
    </div>
  @endif
<a href="/dashboard/member/kas-keluar/create" class="btn btn-primary mb-3 mt-1">Tambah Kas Keluar</a>
<div class="col-lg-6">
<table class="table table-striped table-sm ">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Uang Keluar</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($kaskeluar as $uang)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $uang->uang_keluar }}</td>
        <td>
          <a href="/dashboard/member/kas-keluar/{{ $uang->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
          <form action="/dashboard/member/kas-keluar/{{ $uang->id }}" method="post" class="d-inline">
            @csrf
            @method('delete')
            <button class="badge bg-danger border-0" onclick="return confirm('Anda Yakin?')"><span data-feather="x-square"></span></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection