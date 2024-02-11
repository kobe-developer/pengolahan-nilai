@extends('user-interface.layouts.main')

@section('main-content')
  <div class="container-fluid">
    <!-- page heading-->
    <h3 class="mb-4 text-gray-800">Mata Kuliah</h3>
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
                <th class="align-middle">Nama MK</th>
                <th class="align-middle">SKS</th>
                <th class="align-middle">Semester</th>
                <th class="align-middle">Nip</th>
                <th class="align-middle">Dosen</th>
                <th class="align-middle">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $index => $item)
                <tr>
                  <td class="align-middle">{{ $index += 1 }}</td>
                  <td class="align-middle">{{ $item->nama_mk }}</td>
                  <td class="align-middle">{{ $item->sks }}</td>
                  <td class="align-middle">{{ $item->stmt }}</td>
                  <td class="align-middle">{{ $item->dosen->nip }}</td>
                  <td class="align-middle">{{ $item->dosen->nama }}</td>
                  <td class="align-middle">
                    <form action="{{ route('prodi.destroy', [$item->id]) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <a href="" class="btn btn-sm btn-primary">Edit</a>
                      <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
