@extends('user-interface.layouts.main')

@section('main-content')
  <div class="container-fluid">
    <!-- page heading-->
    <h3 class="mb-4 text-gray-800">Kelas</h3>
    <!-- DataTales Example -->
    <div class="card mb-4 shadow">
      <div class="card-header py-3 text-right">
        <a href="{{ route('kelas.create') }}" type="button" class="btn btn-primary">Tambah data</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table-bordered table-hover table-striped table" id="dataTable">
            <thead>
              <tr>
                <th class="align-middle" width="10%">No</th>
                <th class="align-middle">Nama Kelas</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($kelas as $index => $item)
                <tr>
                  <td class="align-middle">{{ $index += 1 }}</td>
                  <td class="align-middle">
                    <a href="{{ route('kelas.edit', [$item->id]) }}">{{ $item->name }}</a>
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
