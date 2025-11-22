@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Designer</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="0ets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Designer</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row size-column">
            <div class="col-12">
                <div class="card o-hidden small-widget">
                    <div class="card-body total-upcoming"><span class="f-light f-w-500 f-14">Total Designer</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">{{ $data->count() }}</h2><span class="f-12 f-w-400">(Designer)</span>
                            </div>
                            <div class="product-sub bg-secondary-light">
                                <i class="fa fa-users text-white"></i>
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
                                            <th style="width: 15px;">No</th>
                                            <th>Nama Designer</th>
                                            <th>Parade</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th style="width: 150px;">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach ($data as $d)
                                            <tr>
                                                <td class="text-center">{{ $i++ }}</td>

                                                <td>{{ $d->nama }}</td>

                                                {{-- Kolom Parade --}}
                                                <td>
                                                    @if ($d->parade)
                                                        <div class="d-flex align-items-center">
                                                            {{-- Gambar parade --}}
                                                            <img src="{{ asset('storage/parade/' . $d->parade->gambar) }}"
                                                                alt="gambar parade"
                                                                style="width: 60px; height: 60px; object-fit: cover; border-radius: 6px; margin-right:10px;">

                                                            <div>
                                                                {{-- Nama parade --}}
                                                                <strong>{{ $d->parade->nama }}</strong>

                                                                <br>

                                                                {{-- Vanue --}}
                                                                <small class="text-muted">
                                                                    📍 {{ $d->parade->vanue }}
                                                                </small>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <span class="text-danger">Belum memilih parade</span>
                                                    @endif
                                                </td>

                                                {{-- Tanggal --}}
                                                <td class="text-center">
                                                    {{ \Carbon\Carbon::parse($d->parade->tanggal ?? null)->format('d M Y') }}
                                                </td>

                                                {{-- Waktu --}}
                                                <td class="text-center">
                                                    @if ($d->parade)
                                                        {{ \Carbon\Carbon::parse($d->parade->jam_mulai)->format('H:i') }}
                                                        -
                                                        {{ \Carbon\Carbon::parse($d->parade->jam_selesai)->format('H:i') }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>

                                                {{-- Aksi --}}
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center gap-2">
                                                        <button data-id="{{ $d->id }}" class="btn btn-warning btn-sm edit">Edit</button>
                                                        <button data-id="{{ $d->id }}" class="btn btn-danger btn-sm hapus">Hapus</button>
                                                        <a href="/designer/ticket?id={{$d->id}}" class="btn btn-info btn-sm tiket">Tiket</a>
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

    </div>

    <div class="modal fade" id="modalTambahKamar" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Designer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Nama Designer</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan nama Designer">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pilih Parade</label>
                        <select class="form-control" id="parade">
                            @foreach ($parade as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
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
                    <h5 class="modal-title">Edit Designer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <input type="hidden" id="edit_id">

                    <div class="mb-3">
                        <label class="form-label">Nama Designer</label>
                        <input type="text" class="form-control" id="edit_nama">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pilih Parade</label>
                        <select class="form-control" id="edit_parade">
                            @foreach ($parade as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
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

                let formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('nama', $('#nama').val());
                formData.append('parade_id', $('#parade').val());

                $.ajax({
                    url: "/designer/store",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message
                        });

                        $('#modalTambahKamar').modal('hide');
                        $('#nama').val("");
                        $('#parade').val("");

                        setTimeout(() => location.reload(), 800);
                    },

                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: xhr.responseJSON?.message ?? 'Terjadi kesalahan.'
                        });
                    }
                });

            });

            $(document).on('click', '.edit', function() {

                let id = $(this).data('id');

                $.ajax({
                    url: "/designer/edit",
                    type: "GET",
                    data: {
                        id
                    },

                    success: function(res) {

                        $('#edit_id').val(res.id);
                        $('#edit_nama').val(res.nama);
                        $('#edit_parade').val(res.parade_id);

                        $('#modalEditKamar').modal('show');
                    },

                    error: function() {
                        Swal.fire("Error", "Gagal mengambil data", "error");
                    }
                });

            });

            $('#update').on('click', function() {

                let formData = new FormData();

                formData.append('_token', "{{ csrf_token() }}");
                formData.append('id', $('#edit_id').val());
                formData.append('nama', $('#edit_nama').val());
                formData.append('parade_id', $('#edit_parade').val());

                $.ajax({
                    url: "/designer/update",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function(response) {

                        Swal.fire({
                            icon: "success",
                            title: "Berhasil",
                            text: response.message,
                            timer: 1500,
                            showConfirmButton: false
                        });

                        $('#modalEditKamar').modal('hide');

                        setTimeout(() => location.reload(), 1000);
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
                        text: "Data Designer tidak dapat dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal'
                    })
                    .then((result) => {

                        if (result.isConfirmed) {

                            $.ajax({
                                url: "/designer/delete",
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

        $('#edit_gambar').on('change', function() {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#preview_gambar').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@endsection
