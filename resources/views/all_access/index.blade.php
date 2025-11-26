@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Tiket All Access</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="0ets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Tiket All Access</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row size-column">
            <div class="col-12">
                <div class="card o-hidden small-widget">
                    <div class="card-body total-upcoming"><span class="f-light f-w-500 f-14">Total Tiket All Access</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">0</h2><span class="f-12 f-w-400">(Tiket)</span>
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
                            <button class="btn btn-primary" id="generate">
                                Generate Tiket
                            </button>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="tableKamar" class="table table-bordered table-striped table-hover"
                                    style="width:100%">
                                    <thead class="text-center">
                                        <tr>
                                            <th style="width: 15px;">No</th>
                                            <th>Tiket</th>
                                            <th>Kode Tiket</th>
                                            <th style="width: 150px;">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach ($tiket as $d)
                                            <tr>
                                                <td class="text-center">{{ $i++ }}</td>

                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('storage/all_access/' . $d->gambar_tiket) }}"
                                                            alt="gambar parade" class="preview-img" width="80px"
                                                            style="cursor:pointer;">
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{$d->kode_tiket}}
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button data-id="{{ $d->id }}" class="btn btn-danger btn-sm download">Download</button>
                                                </td>
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center gap-2">
                                                        <button data-id="{{ $d->id }}"
                                                            class="btn btn-danger btn-sm hapus">Hapus</button>
                                                        <button data-id="{{ $d->id }}"
                                                            class="btn btn-info btn-sm detail">Detail</button>
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

    <div id="imgPreviewModal"
        style="display: none; position: fixed; z-index: 99999; inset: 0; background: rgba(0,0,0,0.7); justify-content: center; align-items: center; display: none;">
        <img id="previewImage" src="" style="max-width: 90%; max-height: 90%; border-radius: 12px;">
    </div>

    {{-- <div class="modal fade" id="modalTambahKamar" tabindex="-1">
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
    </div> --}}

    <div class="modal fade" id="modalEditKamar" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Detail Penggunaan Tiket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('own_script')
    <script>
        window.templatePath = "{{ asset('own_assets/images/template.jpg') }}";
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.download', function () {
                let id = $(this).data('id');
                window.location.href = "/all-access/download/" + id;
            });

            $('#tableKamar').DataTable({
                responsive: true,
                autoWidth: false
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

            $(document).on('click', '.detail', function() {

                let id = $(this).data('id');

                $.ajax({
                    url: "/all-access/detail",
                    type: "GET",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id
                    },

                    success: function(res) {

                        if (!res.status || res.data.length === 0) {
                            Swal.fire("Error", "Data tidak ditemukan", "error");
                            return;
                        }

                        let data = res.data;

                        // Format tanggal Indonesia
                        function formatTanggalIndo(dateStr) {
                            if (!dateStr) return "-";
                            let d = new Date(dateStr);
                            const bulan = [
                                "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                                "Juli", "Agustus", "September", "Oktober", "November",
                                "Desember"
                            ];
                            return `${d.getDate()} ${bulan[d.getMonth()]} ${d.getFullYear()}`;
                        }

                        // Build table HTML
                        let rows = "";
                        data.forEach((item, index) => {
                            rows += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.kode_tiket}</td>
                        <td>${item.nama}</td>
                        <td>${item.kontak}</td>
                        <td>${item.designer?.nama ?? '-'}</td>
                        <td>${item.designer?.parade?.nama ?? '-'}</td>
                        <td>${item.designer?.parade?.vanue ?? '-'}</td>
                        <td>${ formatTanggalIndo(item.designer?.parade?.tanggal) }</td>
                        <td>
                            ${(item.designer?.parade?.jam_mulai ?? '').substring(0,5)} -
                            ${(item.designer?.parade?.jam_selesai ?? '').substring(0,5)}
                        </td>
                    </tr>
                `;
                        });

                        let table = `
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Kode Tiket</th>
                                <th>Nama</th>
                                <th>Kontak</th>
                                <th>Designer</th>
                                <th>Parade</th>
                                <th>Venue</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${rows}
                        </tbody>
                    </table>
                </div>
            `;

                        $("#modalEditKamar .modal-body").html(table);
                        $("#modalEditKamar").modal("show");
                    },

                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: xhr.responseJSON?.message ?? "Terjadi kesalahan"
                        });
                    }
                });
            });

        });
    </script>

    <script>
        async function generateAndUploadTicket(type, templatePath) {
            return new Promise(async (resolve) => {

                // 1. generate kode
                let prefix = 'AA';
                let kode = prefix + "-" + Date.now() + "-" + Math.random().toString(36).substr(2, 4)
                    .toUpperCase();

                // 2. Generate QRCode (elemen sementara)
                let tempQR = document.createElement("div");
                new QRCode(tempQR, {
                    text: "https://delipark-runwayrave-2025.com/designer/ticket-verification?kode=" +
                        kode,
                    width: 450,
                    height: 450
                });
                await new Promise(r => setTimeout(r, 300));

                let qrEl = tempQR.querySelector("img") || tempQR.querySelector("canvas");
                let qrImgSrc = (qrEl.tagName.toLowerCase() === "img") ? qrEl.src : qrEl.toDataURL(
                    "image/png");

                // 3. Load template
                let template = new Image();
                template.src = templatePath;

                template.onload = function() {

                    let canvas = document.getElementById("ticketCanvas");
                    let ctx = canvas.getContext("2d");

                    // sesuaikan ukuran canvas dengan template
                    canvas.width = template.width;
                    canvas.height = template.height;

                    ctx.clearRect(0, 0, canvas.width, canvas.height);

                    // gambar template
                    ctx.drawImage(template, 0, 0);

                    // 4. gambar QR
                    let qrImg = new Image();
                    qrImg.src = qrImgSrc;

                    qrImg.onload = async function() {
                        let qrX = 390; // center
                        let qrY = 1450;
                        let qrSize = 300;

                        ctx.drawImage(qrImg, qrX, qrY, qrSize, qrSize);

                        let venue = "Delipark";

                        ctx.fillStyle = "#FFFFFF";
                        ctx.font = "35px Arial";
                        ctx.fillText("" + venue, 65, 1320);
                        ctx.fillText("" + kode, 625, 1320);

                        // 7. hasilkan base64
                        let base64 = canvas.toDataURL("image/jpeg", 0.95);

                        // 8. Kirim ke server via AJAX
                        $.ajax({
                            url: "/designer/generate-ticket",
                            method: "POST",
                            data: {
                                designer: 0,
                                kode: kode,
                                tipe: 'aa',
                                gambar: base64,
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(res) {
                                resolve(true);
                            },
                            error: function() {
                                alert("Gagal upload tiket " + kode);
                                resolve(false);
                            }
                        });

                    };
                };
            });
        }


        $("#generate").click(async function() {
            $("#generate").prop("disabled", true).text("Processing...");
            $('body').css({
                'cursor': 'auto',
                'pointer-events': 'auto'
            });

            let templatePath = window.templatePath;

            for (let i = 0; i < 1; i++) await generateAndUploadTicket("aa", templatePath);

            $("#generate").prop("disabled", false).text("Generate");
            alert("Seluruh tiket berhasil digenerate!");

            // setTimeout(function() {
            //     location.reload();
            // }, 1000)
        });
    </script>

    <canvas id="ticketCanvas" style="display:none;"></canvas>

    <script>
        $(document).on('click', '.preview-img', function() {
            $('#previewImage').attr('src', $(this).attr('src'));
            $('#imgPreviewModal')
                .css('display', 'flex')
                .hide()
                .fadeIn(200);
        });
        $('#imgPreviewModal').on('click', function() {
            $(this).fadeOut(200);
        });
    </script>
@endsection
