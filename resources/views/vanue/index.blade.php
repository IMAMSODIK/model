@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Vanue</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="0ets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Vanue</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row size-column">
            <div class="col-12">
                <div class="card o-hidden small-widget">
                    <div class="card-body total-upcoming"><span class="f-light f-w-500 f-14">Total Vanue</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">{{ $data->count() }}</h2><span class="f-12 f-w-400">(Vanue)</span>
                            </div>
                            <div class="product-sub bg-secondary-light">
                                <i class="fa fa-building text-white"></i>
                            </div>
                        </div>
                        <ul class="bubbles">
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row size-column">

            <div class="row size-column">
                @if (!$designer)
                    <div class="col-12">
                        <div class="alert alert-warning text-center p-4">
                            <h4 class="mb-2">Data Designer Belum Lengkap</h4>
                            <p class="mb-3 text-dark">Silakan lengkapi data designer Anda terlebih dahulu sebelum membuat tiket.</p>

                            <a href="/dashboard" class="btn btn-dark">
                                Lengkapi Data Designer
                            </a>
                        </div>
                    </div>
                @else
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12 mb-3 d-flex justify-content-end">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahKamar">
                                    Tambah Data
                                </button>
                            </div>
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="tableKamar" class="table table-bordered table-striped table-hover"
                                        style="width:100%">
                                        <thead class="text-center">
                                            <tr>
                                                <th style="width: 60px;">No</th>
                                                <th>Vanue</th>
                                                <th style="width: 150px;">Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php $i = 1; @endphp
                                            @foreach ($data as $vanue)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $i++ }}</td>

                                                    <td class="align-middle text-center">{{ $vanue->nama }}</td>

                                                    <td class="text-center align-middle">

                                                        <div class="d-flex justify-content-center gap-1">
                                                            <button class="btn btn-sm btn-warning edit"
                                                                data-id="{{ $vanue->id }}">Edit</button>
                                                            <button class="btn btn-sm btn-danger hapus"
                                                                data-id="{{ $vanue->id }}">Hapus</button>
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
                @endif
            </div>

        </div>

    </div>

    <div class="modal fade" id="modalTambahKamar" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Vanue</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Vanue</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukin nama vanue">
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary" id="store">Simpan</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditKamar" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Vanue</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="edit_id">

                    <div class="mb-3">
                        <label class="form-label">Nama Vanue</label>
                        <input type="text" id="edit_nama" class="form-control" placeholder="Masukin nama vanue">
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary" id="update">Update</button>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('own_script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#tableKamar').DataTable({
                responsive: true,
                autoWidth: false
            });

            $('#store').on('click', function() {

                let nama = $('#nama').val();

                $.ajax({
                    url: "/vanue/store",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        nama: nama
                    },

                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message,
                        });

                        $('#modalTambahKamar').modal('hide');
                        $('#nama').val("");

                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    },

                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: xhr.responseJSON?.message ?? 'Terjadi kesalahan',
                        });
                    }
                });

            });

            $(document).on('click', '.edit', function() {
                let id = $(this).data('id');

                $.ajax({
                    url: "/vanue/edit",
                    data: {
                        id: id
                    },
                    type: "GET",
                    success: function(res) {

                        $('#edit_id').val(res.id);
                        $('#edit_nama').val(res.nama);

                        $('#modalEditKamar').modal('show');
                    },
                    error: function() {
                        Swal.fire("Error", "Gagal mengambil data", "error");
                    }
                });
            });

            $('#update').on('click', function() {

                let id = $('#edit_id').val();
                let nama = $('#edit_nama').val();

                $.ajax({
                    url: "/vanue/update",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        nama: nama,
                        id: id
                    },

                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message,
                            timer: 1500,
                            showConfirmButton: false
                        });

                        $('#modalEditKamar').modal('hide');
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    },

                    error: function(xhr) {
                        Swal.fire("Gagal", xhr.responseJSON?.message ?? "Terjadi kesalahan",
                            "error");
                    }

                });

            });

            $(document).on('click', '.hapus', function() {

                let id = $(this).data('id');

                Swal.fire({
                        title: 'Yakin ingin menghapus?',
                        text: "Data vanue tidak dapat dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal'
                    })
                    .then((result) => {

                        if (result.isConfirmed) {

                            $.ajax({
                                url: "/vanue/delete",
                                type: "POST",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    id: id
                                },

                                success: function(response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: response.message,
                                        timer: 1500,
                                        showConfirmButton: false
                                    });

                                    setTimeout(() => {
                                        location.reload();
                                    }, 1000);
                                },

                                error: function(xhr) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal',
                                        text: xhr.responseJSON?.message ??
                                            "Terjadi kesalahan"
                                    });
                                }
                            });

                        }

                    });

            });
        });
    </script>
@endsection
