@extends('user-interface.layouts.main')

@section('main-content')
  <div class="container-fluid">
    <!-- page heading-->
    <h3 class="mb-4 text-gray-800">Nilai Mahasiswa | Tambah data</h3>
    <!-- DataTales Example -->
    <div class="card mb-4 shadow">
      <div class="card-body">

        @session('message')
          <div class="alert alert-warning">{{ session('message') }}</div>
        @endsession

        <form action="{{ route('nilai.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="" class="form-label">Mahasiswa</label>
            <select name="mhs_nim" id="mhs_nim" class="form-control form-select">
              <option value="">Select an option</option>
              @foreach ($mahasiswa as $item)
                <option value="{{ $item->nim }}">{{ $item->nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="" class="form-label">Mata Kuliah</label>
            <select name="id_mk" id="id_mk" class="form-control form-select">
              <option value="">Select an option</option>
              @foreach ($mata_kuliah as $item)
                <option value="{{ $item->id }}">{{ $item->nama_mk }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <div class="form-label">Nilai Uts</div>
            <input type="number" class="form-control" name="nilai_uts" required min="0" max="100">
          </div>
          <div class="form-group">
            <div class="form-label">Nilai Uas</div>
            <input type="number" class="form-control" name="nilai_uas" required min="0" max="100">
          </div>
          <div class="form-group">
            <div class="form-label">Nilai tugas</div>
            <input type="number" class="form-control" name="nilai_tugas" min="0" max="100" required>
          </div>
          <div class="form-group">
            <div class="form-label">Presensi (%)</div>
            <input type="number" class="form-control" min="0" max="100" name="presensi" required>
          </div>

          <button class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
@endsection
