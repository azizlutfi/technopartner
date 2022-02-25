<div class="modal fade" id="modalEditKategori" tabindex="-1" role="dialog" aria-labelledby="Kategori" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/kategori') }}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="row">
                <div class="col-md-12 form-group mb-3 d-flex justify-content-center"><h4>Edit Kategori</h4></div>
                <div class="col-md-12 form-group mb-3">
                    <input type="hidden" name="idmodal" id="idmodal" value="">
                    <label for="" class="col-form-label font-weight-bold">Jenis</label>
                    <select class="form-control" name="typemodal" id="typemodal" required>
                        <option value="in">Pemasukan</option>
                        <option value="out">Pengeluaran</option>
                    </select>
                    @error('type_modal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12 form-group mb-3">
                    <label for="" class="col-form-label font-weight-bold">Nama Kategori</label>
                    <input type="text" class="form-control" name="namemodal" id="namemodal" placeholder="Nama Kategori" required>
                    @error('name_modal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12 form-group mb-3">
                    <label for="" class="col-form-label font-weight-bold">Deskripsi</label>
                    <input type="text" class="form-control" name="descriptionmodal" id="descriptionmodal" placeholder="Deskripsi" required>
                    @error('description_modal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12 form-group mb-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary rounded-4 py-2 px-4">
                                {{ __('Save') }}
                        </button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>