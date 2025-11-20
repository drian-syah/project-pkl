<!-- Modal Info-->
<div class="modal fade" id="exampleModalInfo{{ $item->jabatan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalInfoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="exampleModalInfoLabel{{ $item->sekolah_id }}">Info </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>

      <div class="modal-body text-left">
          <div class="row">
              <div class="col-6">Nama Jabatan</div>
              <div class="col-6">: {{ $item->nama_jabatan }}</div>
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
<div class="modal fade" id="exampleModalDelete{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalDeleteLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalDeleteLabel {{ $item->id }}">Batalkan ? </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>

      <div class="modal-body text-left">
        <div class="row">
          <div class="col-6">Nama Jabatan</div>
          <div class="col-6">: {{ $item->nama_jabatan }}</div>
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
        <form action="{{ route('jabatanDestroy', $item->id) }}" method="post">
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
 