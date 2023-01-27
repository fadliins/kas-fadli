@extends('dashboard.admin.layout.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Laporan Kas</h1>
  </div>
  <div class="col-lg-8">
    <table class="table table-striped table-sm ">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Member</th>
            <th scope="col">Total Kas</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($laporan as $lapor)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $lapor->user_name }}</td>
            <td>{{ $lapor->total_kas }}</td>
            <td>{{ $lapor->status }}</td>
            <td><a href="/dashboard/admin/laporan/{{ $lapor->user_id }}?user_id={{ $lapor->user_id }}" class="badge bg-success"><span data-feather="arrow-right-circle"></span></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
@endsection

