<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center py-auto">Transaksi</h1>

    <!-- Content -->
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
                        <div class="row">
                            <div class="col-md-12 form-group mb-3 d-flex justify-content-center"><h4>Tambah Transaksi baru</h4></div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="" class="col-form-label font-weight-bold">Tipe Transaksi</label>
                                <select class="form-control" name="transaction_type" id="transaction_type" required>
                                    <option>--Pilih Tipe Transaksi--</option>
                                    <option value="in">Pemasukan</option>
                                    <option value="out">Pengeluaran</option>
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
                                </select>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label for="" class="col-form-label font-weight-bold">Nominal</label>
                                <input type="number" class="form-control" name="nominal" id="nominal" required>
                                @error('nominal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <label for="" class="col-form-label font-weight-bold">Deskripsi</label>
                                <input type="text" class="form-control" name="description" id="description" placeholder="Deskripsi" required>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group mb-3 d-flex align-items-center justify-content-center">
                                    <button type="submit" class="btn btn-primary rounded-4 py-2 px-4">
                                            {{ __('Save') }}
                                    </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{ url('/transaksi') }}" method="get">
                        <div class="row">
                            <div class="col-md-12 form-group mb-3 d-flex justify-content-center"><h4>Filter Transaksi</h4></div>
                            <div class="col-md-5 form-group mb-3">
                                <label for="" class="col-form-label font-weight-bold">Tanggal Start</label>
                                <input type="text" class="form-control datetimepicker" name="from" id="from" required>
                                @error('from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-5 form-group mb-3">
                                <label for="" class="col-form-label font-weight-bold">Tanggal Akhir</label>
                                <input type="text" class="form-control datetimepicker" name="to" id="to" required>
                                @error('to')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2 form-group mb-3 d-flex align-items-end justify-content-center">
                                    <button type="submit" class="btn btn-primary rounded-4 py-2 px-4">
                                            {{ __('Filter') }}
                                    </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive mb-3">
                        <center><h5 class="m-0 font-weight-bold text-success mb-3">Transaksi</h5></center>
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Nominal</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksi as $trans)
                                <tr>
                                    <td>{{ $trans->categories->name }}</td>
                                    <td class="text-white {{ $trans->categories->type === "in" ? "bg-success" : "bg-danger" }}">{{ $trans->categories->type === "in" ? "+".$trans->nominal : "-".$trans->nominal }}</td>
                                    <td>{{ $trans->description }}</td>
                                    <td width="20%">
                                        <div class="row d-flex justify-content-around">
                                            <div class="col-4">
                                                <a href="{{url('/transaksi/'.$trans->id)}}"><button class="btn btn-warning btn-transaksi"><i class="fas fa-edit"></i></button></a>
                                            </div>
                                            <div class="col-4">
                                                <form method="post" action="{{ url('/transaksi/'.$trans->id) }}"> 
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" onclick="return confirm('Are you sure to delete transaction?')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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