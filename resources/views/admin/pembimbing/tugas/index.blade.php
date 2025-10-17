@include('component.app')

@section('content')
<div class="container">
    <h4 class="mb-3">Daftar Tugas Pembimbing</h4>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambahTugas">
        <i class="fas fa-plus"></i> Tambah Tugas
    </button>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <strong>Daftar Tugas</strong>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tenggat</th>
                        <th>Status</th>
                        <th>Progress Submit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Laporan Harian Minggu 1</td>
                        <td>2025-10-20</td>
                        <td><span class="badge bg-success">Aktif</span></td>
                        <td>5/8 Siswa</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Laporan Akhir</td>
                        <td>2025-11-01</td>
                        <td><span class="badge bg-secondary">Selesai</span></td>
                        <td>8/8 Siswa</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

 
    <div class="modal fade" id="modalTambahTugas" tabindex="-1" aria-labelledby="modalTambahTugasLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('tugas') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahTugasLabel">Tambah Tugas Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Tugas</label>
                            <input type="text" name="judul" id="judul" class="form-control" required placeholder="Masukkan judul tugas">
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Tugas</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required placeholder="Tuliskan deskripsi tugas"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="target_siswa" class="form-label">Target Siswa</label>
                            <select name="target_siswa[]" id="target_siswa" class="form-select" multiple required>
                                <option value="1">Ahmad Dhonan</option>
                                <option value="2">Teguh Adriansyah</option>
                                <option value="3">Rizky Saputra</option>
                            </select>
                            <small class="text-muted">Tekan CTRL atau CMD untuk memilih lebih dari satu siswa.</small>
                        </div>

                        <div class="mb-3">
                            <label for="tenggat" class="form-label">Tenggat Waktu</label>
                            <input type="date" name="tenggat" id="tenggat" class="form-control" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Tugas</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
