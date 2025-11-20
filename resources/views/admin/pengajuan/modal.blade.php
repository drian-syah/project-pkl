<!-- Modal-->
<div class="modal fade" id="exampleModalDitolak{{ $item->sekolah_id }}" tabindex="-1" role="dialog" aria-labelledby="ditolakModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="ditolakModallLabel {{ $item->sekolah_id }}">{{ $modal}} Ditolak? </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
          </button>
        </div>
 
        <div class="modal-body text-left">
        <div class="row">
            <div class="col-6">No Surat</div>
            <div class="col-6">: {{ $item->no_surat }}</div>
        </div>

        <div class="row">
            <div class="col-6">Tanggal Surat</div>
            <div class="col-6">: {{ $item->tgl_surat }}</div>
        </div>

        <div class="row">
            <div class="col-6">Asal Sekolah</div>
            <div class="col-6">: {{ $item->sekolah->nama }}</div>
        </div>
        <div class="row">
          <div class="col-6">Periode Mulai</div>
          <div class="col-6">: {{ $item->periode_mulai }}</div>
        </div>

        <div class="row">
          <div class="col-6">Periode Selesai</div>
          <div class="col-6">: {{ $item->periode_selesai }}</div>
        </div>

        <div class="row">
          <div class="col-6">File Pengajuan</div>
          <div class="col-6">: 
            @if ($item->file_surat_path)
                <a href="{{ asset('storage/' . $item->file_surat_path) }}" target="_blank">
                   <i class="fas fa-file-pdf"></i> Lihat File
                </a>
            @else
                <span class="text-muted">Tidak ada file</span>
            @endif 
          </div>
      </div>

      <div class="row">
          <div class="col-6">Jumlah Siswa</div>
          <div class="col-6">: {{ $item->jumlah_siswa }}</div>
      </div>
      </div>
  
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
            <i class="fas fa-times"></i> Tutup
          </button>
          <form action="{{ route('adminPengajuanDitolak', $item->sekolah_id) }}" method="post">
            @csrf
          <button type="submit" class="btn btn-danger btn-sm">
            <i class="fas fa-check"></i>
          </button>
        </form>
        </div>
      </div>
    </div>
  </div>

<!-- Modal Diterima-->
<div class="modal fade" id="exampleModalDiterima{{ $item->sekolah_id }}" tabindex="-1" role="dialog" aria-labelledby="diterimaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title" id="diterimaModallLabel {{ $item->sekolah_id }}">{{ $modal}} Disetujui? </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
          </button>
        </div>
 
        <div class="modal-body text-left">
          <div class="row">
            <div class="col-6">No Surat</div>
            <div class="col-6">: {{ $item->no_surat }}</div>
        </div>

        <div class="row">
            <div class="col-6">Tanggal Surat</div>
            <div class="col-6">: {{ $item->tgl_surat }}</div>
        </div>

        <div class="row">
            <div class="col-6">Asal Sekolah</div>
            <div class="col-6">: {{ $item->sekolah->nama }}</div>
        </div>
        <div class="row">
          <div class="col-6">Periode Mulai</div>
          <div class="col-6">: {{ $item->periode_mulai }}</div>
        </div>

        <div class="row">
          <div class="col-6">Periode Selesai</div>
          <div class="col-6">: {{ $item->periode_selesai }}</div>
        </div>

        <div class="row">
          <div class="col-6">File Pengajuan</div>
          <div class="col-6">: 
            @if ($item->file_surat_path)
                <a href="{{ asset('storage/' . $item->file_surat_path) }}" target="_blank">
                   <i class="fas fa-file-pdf"></i> Lihat File
                </a>
            @else
                <span class="text-muted">Tidak ada file</span>
            @endif 
          </div>
      </div>

      <div class="row">
          <div class="col-6">Jumlah Siswa</div>
          <div class="col-6">: {{ $item->jumlah_siswa }}</div>
      </div>
        </div>
  
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
            <i class="fas fa-times"></i> Tutup
          </button>
          <form action="{{ route('adminPengajuanDisetujui', $item->sekolah_id) }}" method="post">
            @csrf
          <button type="submit" class="btn btn-success btn-sm">
            <i class="fas fa-check"></i> 
          </button>
        </form>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal Info-->
<div class="modal fade" id="exampleModalInfo{{ $item->sekolah_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalInfoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="exampleModalInfoLabel{{ $item->sekolah_id }}">Info {{ $modal}} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>

      <div class="modal-body text-left">
          <div class="row">
              <div class="col-6">No Surat</div>
              <div class="col-6">: {{ $item->no_surat }}</div>
          </div>

          <div class="row">
              <div class="col-6">Tanggal Surat</div>
              <div class="col-6">: {{ $item->tgl_surat }}</div>
          </div>

          <div class="row">
              <div class="col-6">Asal Sekolah</div>
              <div class="col-6">: {{ $item->sekolah->nama }}</div>
          </div>

          <div class="row">
              <div class="col-6">NPSN</div>
              <div class="col-6">: {{ $item->sekolah->npsn }}</div>
          </div>

          <div class="row">
              <div class="col-6">Alamat</div>
              <div class="col-6">: {{ $item->sekolah->alamat }}</div>
          </div>

          <div class="row">
              <div class="col-6">Kontak</div>
              <div class="col-6">: {{ $item->sekolah->kontak }}</div>
          </div>

          <div class="row">
              <div class="col-6">Periode Mulai</div>
              <div class="col-6">: {{ $item->periode_mulai }}</div>
            </div>

          <div class="row">
              <div class="col-6">Periode Selesai</div>
              <div class="col-6">: {{ $item->periode_selesai }}</div>
          </div>

          <div class="row">
            <div class="col-6">File Pengajuan</div>
            <div class="col-6">: 
              @if ($item->file_surat_path)
                  <a href="{{ asset('storage/' . $item->file_surat_path) }}" target="_blank">
                     <i class="fas fa-file-pdf"></i> Lihat File
                  </a>
              @else
                  <span class="text-muted">Tidak ada file</span>
              @endif 
            </div>
        </div>

          <div class="row">
              <div class="col-6">Jumlah Siswa</div>
              <div class="col-6">: {{ $item->jumlah_siswa }}</div>
          </div>
          
          <div class="row">
              <div class="col-6">Status</div>
              <div class="col-6">:
              @if ($item->status == 'draft')
                <span class="badge bg-secondary text-white">Draft</span>
              @elseif ($item->status == 'diproses')
                <span class="badge bg-success text-white">Sedang Diproses</span>
              @elseif ($item->status == 'diterima')
                <span class="badge bg-success text-white">Diterima</span>
              @elseif ($item->status == 'ditolak')
                <span class="badge bg-danger text-white">Ditolak</span>
              @endif
              </div>
          </div>
          <div class="row">
            <div class="col-6">Dibuat Oleh</div>
            <div class="col-6">: {{ $item->createdBy->nama }}</div>
          </div>

          <div class="row">
            <div class="col-6">Dibuat Pada</div>
            <div class="col-6">: {{ $item->created_at }}</div>
          </div>

          @if ($item->updated_id)
            <div class="row">
                <div class="col-6">Diperbarui Oleh</div>
                <div class="col-6">: {{ $item->updatedBy->nama }}</div>
            </div>
            @endif

            @if ($item->updated_at)
            <div class="row">
              <div class="col-6">Diperbarui Pada</div>
              <div class="col-6">: {{ $item->updated_at }}
              </div>
            </div>
            @endif
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          <i class="fas fa-times"></i> Tutup
        </button>
      </div>
    </div>
  </div>
</div>


{{-- Modal Dibatalkan --}}
<!-- Modal-->
<div class="modal fade" id="exampleModal{{ $item->sekolah_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel {{ $item->sekolah_id }}">Batalkan {{ $modal }} ? </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>

      <div class="modal-body text-left">
        <div class="row">
          <div class="col-6">No Surat</div>
          <div class="col-6">: {{ $item->no_surat }}</div>
      </div>

      <div class="row">
          <div class="col-6">Tanggal Surat</div>
          <div class="col-6">: {{ $item->tgl_surat }}</div>
      </div>

      <div class="row">
          <div class="col-6">Asal Sekolah</div>
          <div class="col-6">: {{ $item->sekolah->nama }}</div>
      </div>
      <div class="row">
        <div class="col-6">Periode Mulai</div>
        <div class="col-6">: {{ $item->periode_mulai }}</div>
      </div>

      <div class="row">
        <div class="col-6">Periode Selesai</div>
        <div class="col-6">: {{ $item->periode_selesai }}</div>
      </div>

      <div class="row">
        <div class="col-6">File Pengajuan</div>
        <div class="col-6">:  @if ($item->file_surat_path)
          <a href="{{ asset('storage/' . $item->file_surat_path) }}" target="_blank">
             <i class="fas fa-file-pdf"></i> Lihat File
          </a>
      @else
          <span class="text-muted">Tidak ada file</span>
      @endif</div>
    </div>

    <div class="row">
        <div class="col-6">Jumlah Siswa</div>
        <div class="col-6">: {{ $item->jumlah_siswa }}</div>
    </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          <i class="fas fa-times"></i> Tutup
        </button>
        <form action="{{ route('adminPengajuanDestroy', $item->sekolah_id) }}" method="post">
          @csrf
          @method('delete')
        <button type="submit" class="btn btn-danger btn-sm">
          <i class="fas fa-trash"></i> Hapus
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
 