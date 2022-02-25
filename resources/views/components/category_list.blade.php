<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center py-auto">Kategori</h1>

    <!-- Content -->
    <div class="row">
        <div class="col-lg-12">
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
                    <form action="{{ url('/kategori') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 form-group mb-3 d-flex justify-content-center"><h4>Tambah Kategori baru</h4></div>
                            <div class="col-md-2 form-group mb-3">
                                <label for="" class="col-form-label font-weight-bold">Jenis</label>
                                <select class="form-control" name="type" id="type" required>
                                    <option value="in">Pemasukan</option>
                                    <option value="out">Pengeluaran</option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2 form-group mb-3">
                                <label for="" class="col-form-label font-weight-bold">Nama Kategori</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nama Kategori" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="" class="col-form-label font-weight-bold">Deskripsi</label>
                                <input type="text" class="form-control" name="description" id="description" placeholder="Deskripsi" required>
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
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive mb-3">
                        <center><h5 class="m-0 font-weight-bold text-success mb-3">Kategori Pemasukan</h5></center>
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($in as $i)
                                <tr>
                                    <td>{{ $i->name }}</td>
                                    <td>{{ $i->description }}</td>
                                    <td width="20%">
                                        <div class="row d-flex justify-content-around">
                                            <div class="col-4">
                                                <button class="btn btn-warning btn-kategori" data-toggle="modal" data-target="#modalEditKategori" data-id="{{$i->id}}"><i class="fas fa-edit"></i></button>
                                            </div>
                                            <div class="col-4">
                                                <form method="post" action="{{ url('/kategori/'.$i->id) }}"> 
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" onclick="return confirm('Are you sure to delete {{ $i->name }}?')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
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

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive mb-3">
                        <center><h5 class="m-0 font-weight-bold text-danger mb-3">Kategori Pengeluaran</h5></center>
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($out as $o)
                                <tr>
                                    <td>{{ $o->name }}</td>
                                    <td>{{ $o->description }}</td>
                                    <td>
                                        <div class="row d-flex justify-content-around">
                                            <div class="col-4">
                                                <button class="btn btn-warning btn-kategori" data-toggle="modal" data-target="#modalEditKategori" data-id="{{$o->id}}"><i class="fas fa-edit"></i></button>
                                            </div>
                                            <div class="col-4">
                                                <form method="post" action="{{ url('/kategori/'.$o->id) }}"> 
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" onclick="return confirm('Are you sure to delete {{ $o->name }}?')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
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
    $(".btn-kategori").click(function () {
        var id = $(this).attr("data-id");
        var url = APP_URL + "/ajax_get_kategori";
        $.ajax({
            url: url,
            method: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                id: id,
            },
            success: function (response) {
                if (response.success) {
                    $("#idmodal").val(response.data.id);
                    $("#typemodal").val(response.data.type);
                    $("#namemodal").val(response.data.name);
                    $("#descriptionmodal").val(response.data.description);
                } else {
                }
            },
            error: function (error) {
                console.log(error);
            },
        });
    });

    $("#modalEditKategori").on("hidden.bs.modal", function () {
        $("#idmodal").val("");
        $("#typemodal").val("in");
        $("#namemodal").val("");
        $("#descriptionmodal").val("");
    });
</script>