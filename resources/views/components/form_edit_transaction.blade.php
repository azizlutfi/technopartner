<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @elseif (session('errors'))
            <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif

            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{ url('/transaksi') }}" method="post">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-md-12 form-group mb-3 d-flex justify-content-center"><h4>Edit Transaksi</h4></div>
                            <div class="col-md-4 form-group mb-3">
                                <input type="hidden" name="id" id="id" value="{{ $transaction->id }}">
                                <label for="" class="col-form-label font-weight-bold">Tipe Transaksi</label>
                                <select class="form-control" name="transaction_type" id="transaction_type" value="{{ $transaction->transaction_type }}" required>
                                    <option>--Pilih Tipe Transaksi--</option>
                                    <option value="in" {{ $transaction->transaction_type === "in" ? "selected" : "" }}>Pemasukan</option>
                                    <option value="out" {{ $transaction->transaction_type === "out" ? "selected" : "" }}>Pengeluaran</option>
                                </select>
                                @error('transaction_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="" class="col-form-label font-weight-bold">Kategori</label>
                                <select class="form-control" name="category" id="category" required>
                                        @foreach($cat as $c)
                                            <option value="{{ $c->id }}" {{ $transaction->category === $c->id ? "selected" : "" }}>{{ $c->name }}</option>
                                        @endforeach
                                </select>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="" class="col-form-label font-weight-bold">Nominal</label>
                                <input type="number" class="form-control" name="nominal" id="nominal" value="{{ $transaction->nominal }}" required>
                                @error('nominal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <label for="" class="col-form-label font-weight-bold">Deskripsi</label>
                                <input type="text" class="form-control" name="description" id="description" placeholder="Deskripsi" value="{{ $transaction->description }}" required>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2 form-group mb-3 d-flex align-items-end">
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
</div>
<script>
    $('#transaction_type').on('change', function() {
        var tipe = $(this).val();
        var url = APP_URL + "/ajax_category_option";
        $.ajax({
            url: url,
            method: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                tipe: tipe,
            },
            success: function (response) {
                if (response.success) {
                    $('#category').empty();
                    $.each(response.data,function(key, value)
                    {
                        $("#category").append('<option value=' + value.id + '>' + value.name + '</option>');
                    });
                } else {
                }
            },
            error: function (error) {
                console.log(error);
            },
        });
    });

</script>