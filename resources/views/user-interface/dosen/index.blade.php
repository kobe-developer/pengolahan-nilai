@extends('user-interface.layouts.main')

@section('main-content')
  <div class="container-fluid">
    <!-- page heading-->
    <h3 class="mb-4 text-gray-800">Dosen</h3>
    <!-- DataTales Example -->
    <div class="card mb-4 shadow">
      <div class="card-header py-3 text-right">
        <a href="{{ route('dosen.create') }}" type="button" class="btn btn-primary">Tambah data</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table-bordered table-hover table-striped table" id="dataTable">
            <thead>
              <tr>
                <th class="align-middle">No</th>
                <th class="align-middle">Nip</th>
                <th class="align-middle">Nama</th>
                <th class="align-middle">JK</th>
                <th class="align-middle">Email</th>
                <th class="align-middle">Prodi</th>
                <th class="align-middle">Jurusan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $index => $item)
                <tr>
                  <td class="align-middle">{{ $index += 1 }}</td>
                  <td class="align-middle">
                    <a href="{{ route('dosen.edit', [$item->id]) }}">{{ $item->nip }}</a>
                  </td>
                  <td class="align-middle">{{ $item->nama }}</td>
                  <td class="align-middle">{{ $item->jenis_kelamin }}</td>
                  <td class="align-middle">{{ $item->email }}</td>
                  <td class="align-middle">{{ $item->prodi->fakultas }}</td>
                  <td class="align-middle">{{ $item->prodi->jurusan }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
