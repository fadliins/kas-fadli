@extends('dashboard.admin.layout.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $user[0]->name }}</h1>
  </div>
  <div class="col-lg-8">
    <div class="row">
        <h3>Status : {{ $laporan[0]->status }}</h3>
        <h5>Total Kas : {{ $laporan[0]->total_kas }}</h5>
    </div>
    <div class="row">
        <table class="table table-striped table-sm ">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Uang Masuk</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($kasMasuk as $uang)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $uang->uang_masuk }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    <div class="row">
        <table class="table table-striped table-sm ">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Uang Keluar</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($kasKeluar as $uang)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $uang->uang_keluar }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
  </div>
@endsection