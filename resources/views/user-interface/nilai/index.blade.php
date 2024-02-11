@extends('user-interface.layouts.main')

@section('main-content')
  <div class="container-fluid">
    <!-- page heading-->
    <h3 class="mb-4 text-gray-800">Nilai Mahasiswa</h3>
    <!-- DataTales Example -->
    <div class="card mb-4 shadow">
      <div class="card-header py-3 text-right">
        <a href="{{ route('nilai.create') }}" type="button" class="btn btn-primary">
          Tambah data
        </a>
      </div>
      <div class="card-body">
        @session('message')
          <div class="alert alert-success">{{ session('message') }}</div>
        @endsession
        <div class="table-responsive">
          <table class="table-bordered table-hover table-striped table" id="dataTable">
            <thead>
              <tr>
                <th class="align-middle">No</th>
                <th class="align-middle">Nim</th>
                <th class="align-middle">Nama</th>
                <th class="align-middle">Mata Kuliah</th>
                <th class="align-middle">Tugas</th>
                <th class="align-middle">UTS</th>
                <th class="align-middle">UAS</th>
                <th class="align-middle">Presensi</th>
                <th class="align-middle">Akumulasi</th>
                <th class="align-middle">Grade</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $index => $item)
                <tr>
                  <td>{{ $index += 1 }}</td>
                  <td>{{ $item->mahasiswa->nim }}</td>
                  <td>{{ $item->mahasiswa->nama }}</td>
                  <td>{{ $item->mata_kuliah->nama_mk }}</td>
                  <td>{{ $item->nilai_tugas }}</td>
                  <td>{{ $item->nilai_uts }}</td>
                  <td>{{ $item->nilai_uas }}</td>
                  <td>{{ $item->presensi }}</td>
                  <td>{{ $item->average }}</td>
                  <td>{{ $item->grade }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
