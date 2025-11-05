<!-- Modal-->
<div class="modal fade" id="exampleModalDitolak{{ $item->sekolah_id }}" tabindex="-1" role="dialog" aria-labelledby="ditolakModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="ditolakModallLabel {{ $item->sekolah_id }}">{{ $title}} Ditolak? </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
          </button>
        </div>
 
        <div class="modal-body text-left">
            <div class="row">
                <div class="col-6">Nama</div>
                <div class="col-6">: {{ $item->sekolah->nama }}</div>
            </div>
            
            <div class="row">
                <div class="col-6">Email</div>
                <div class="col-6">
                    : 
                    <span class="badge badge-primary">{{ $item->email }}</span>
                </div>
            </div>
            
            <div class="row">
                <div class="col-6">Jabatan</div>
                <div class="col-6">
                    :
                    @if ($item->jabatan == 'Admin')
                    <span class="badge badge-dark">{{ $item->jabatan }}</span>
                    @else
                    <span class="badge badge-info">{{ $item->jabatan }}</span>
                    @endif
                </div>
            </div>
            
            <div class="row">
                <div class="col-6">Status</div>
                <div class="col-6">: {{ $item->is_tugas }}</div>
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
          <h5 class="modal-title" id="diterimaModallLabel {{ $item->sekolah_id }}">{{ $title}} Disetujui? </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
          </button>
        </div>
 
        <div class="modal-body text-left">
            <div class="row">
                <div class="col-6">Nama</div>
                <div class="col-6">: {{ $item->sekolah->nama }}</div>
            </div>
            
            <div class="row">
                <div class="col-6">Email</div>
                <div class="col-6">
                    : 
                    <span class="badge badge-primary">{{ $item->email }}</span>
                </div>
            </div>
            
            <div class="row">
                <div class="col-6">Jabatan</div>
                <div class="col-6">
                    :
                    @if ($item->jabatan == 'Admin')
                    <span class="badge badge-dark">{{ $item->jabatan }}</span>
                    @else
                    <span class="badge badge-info">{{ $item->jabatan }}</span>
                    @endif
                </div>
            </div>
            
            <div class="row">
                <div class="col-6">Status</div>
                <div class="col-6">: {{ $item->is_tugas }}</div>
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
        <h5 class="modal-title" id="exampleModalInfoLabel{{ $item->sekolah_id }}">Info {{ $title}} </h5>
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
              <div class="col-6">Jumlah Siswa</div>
              <div class="col-6">: {{ $item->jumlah_siswa }}</div>
          </div>
          
          <div class="row">
              <div class="col-6">Status</div>
              <div class="col-6">: {{ $item->status }}</div>
          </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          <i class="fas fa-times"></i> Tutup
        </button>
      </div>
    </div>
  </div>
</div>



 