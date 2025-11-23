@extends('layouts.template')

@section('content')
    <input type="hidden" id="designer_id" value="{{ $data->id }}">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Tiket</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">
                                <svg class="stroke-icon">
                                    <use href="0ets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/designer">Tiket</a></li>
                        <li class="breadcrumb-item active">{{ $data->nama }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row size-column">
            <div class="col-12 col-lg-4">
                <div class="card o-hidden small-widget">
                    <div class="card-body total-upcoming"><span class="f-light f-w-500 f-14">Total Tiket</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">{{ $data->tiket->count() }}</h2><span
                                    class="f-12 f-w-400">(Tiket)</span>
                            </div>
                            <div class="product-sub bg-secondary-light">
                                <i class="fa fa-flag text-white"></i>
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

            <div class="col-12 col-lg-4">
                <div class="card o-hidden small-widget">
                    <div class="card-body total-upcoming"><span class="f-light f-w-500 f-14">Total Tiket VVIP</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">{{ $data->tiket->where('tipe_tiket', 'vvip')->count() }}</h2><span
                                    class="f-12 f-w-400">(Tiket VVIP)</span>
                            </div>
                            <div class="product-sub bg-secondary-light">
                                <i class="fa fa-flag text-white"></i>
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

            <div class="col-12 col-lg-4">
                <div class="card o-hidden small-widget">
                    <div class="card-body total-upcoming"><span class="f-light f-w-500 f-14">Total Tiket Reguler</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">{{ $data->tiket->where('tipe_tiket', 'reguler')->count() }}</h2><span
                                    class="f-12 f-w-400">(Tiket Reguler)</span>
                            </div>
                            <div class="product-sub bg-secondary-light">
                                <i class="fa fa-flag text-white"></i>
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
                            @if ($data->tiket->count() > 0)
                                <button class="btn btn-danger" style="margin-right: 5px" id="clear-tiket"
                                    data-id="{{ $data->id }}">
                                    Hapus Tiket
                                </button>
                                <button class="btn btn-info" style="margin-right: 5px" id="download-tiket"
                                    data-id="{{ $data->id }}">
                                    Download Tiket
                                </button>
                            @endif
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalGenerateTiket">
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
                                            <th>Nama Designer</th>
                                            <th>Tiket</th>
                                            <th>Tipe Tiket</th>
                                            <th>Kode Tiket</th>
                                            <th>Status Kehadiran</th>
                                            <th>Pemilik Tiket</th>
                                            <th style="width: 10%;">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach ($data->tiket as $d)
                                            <tr>
                                                <td class="text-center align-middle">{{ $i++ }}</td>
                                                <td class="align-middle">{{ $data->nama }}</td>
                                                <td class="align-middle text-center">
                                                    <img src="{{ asset('storage') . '/' . $d->gambar_tiket }}"
                                                        width="80px" class="preview-img" style="cursor:pointer;">
                                                </td>
                                                @if ($d->tipe_tiket == 'vvip')
                                                    <td class="align-middle text-center bg-dark text-white">VVIP</td>
                                                @else
                                                    <td class="align-middle text-center bg-info text-white">Reguler</td>
                                                @endif
                                                <td class="align-middle text-center">{{ $d->kode_tiket }}</td>
                                                <td class="align-middle text-center">
                                                    @if ($d->is_hadir)
                                                        <span class="badge text-bg-success">Hadir</span>
                                                    @else
                                                        <span class="badge text-bg-danger">Belum Hadir</span>
                                                    @endif
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{ $d->nama_pemilik }} <br>
                                                    <small>{{ $d->kontak_pemilik }}</small>
                                                </td>
                                                <td class="text-center align-middle">

                                                    <div class="d-flex justify-content-center gap-1">
                                                        <button class="btn btn-sm btn-danger hapus"
                                                            data-id="{{ $d->id }}">Hapus</button>
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

    <div class="modal fade" id="modalGenerateTiket" tabindex="-1" aria-labelledby="modalGenerateTiketLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="modalGenerateTiketLabel">Generate Tiket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form id="formGenerateTiket">

                        <div class="mb-3">
                            <label for="tiketVVIP" class="form-label">Jumlah Tiket VVIP</label>
                            <input type="number" min="0" class="form-control" id="tiketVVIP" name="tiket_vvip"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="tiketReguler" class="form-label">Jumlah Tiket Reguler</label>
                            <input type="number" min="0" class="form-control" id="tiketReguler"
                                name="tiket_reguler" required>
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSubmitGenerate">Generate</button>
                </div>

            </div>
        </div>
    </div>

    <div id="imgPreviewModal"
        style="
    display: none;
    position: fixed;
    z-index: 99999;
    inset: 0;
    background: rgba(0,0,0,0.7);
    justify-content: center;
    align-items: center;
    display: none;
">
        <img id="previewImage" src=""
            style="
        max-width: 90%;
        max-height: 90%;
        border-radius: 12px;
    ">
    </div>

    <input type="hidden" id="vanue" value="{{ $data->parade->vanue }}">
    <input type="hidden" id="date" value="{{ $data->parade->tanggal }}">
    <input type="hidden" id="jam_mulai" value="{{ $data->parade->jam_mulai }}">
    <input type="hidden" id="jam_selesai" value="{{ $data->parade->jam_selesai }}">
    <input type="hidden" id="nama" value="{{ $data->nama }}">
@endsection

@section('own_script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    <script>
        window.templatePath = "{{ asset('storage/parade') . '/' . $data->parade->gambar }}";
    </script>


    <script>
        let designerList = @json($data->parade->designer->pluck('nama'));
        console.log(designerList);
        async function generateAndUploadTicket(type, templatePath) {
            return new Promise(async (resolve) => {

                // 1. generate kode
                let prefix = type === 'vvip' ? 'V' : 'R';
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
                await new Promise(r => setTimeout(r, 300)); // tunggu QR muncul

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

                        // posisi QR sesuai kotak putih
                        let qrX = 390; // center
                        let qrY = 1450;
                        let qrSize = 300;

                        ctx.drawImage(qrImg, qrX, qrY, qrSize, qrSize);

                        // 5. ambil data tambahan
                        let namaDesigner = $("#nama").val();
                        let tanggal = $("#date").val();
                        let jamMulai = $("#jam_mulai").val().substring(0, 5);
                        let jamSelesai = $("#jam_selesai").val().substring(0, 5);
                        let venue = $("#vanue").val();

                        // === FORMAT TANGGAL ===
                        let dateObj = new Date(tanggal);
                        let bulan = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu",
                            "Sep", "Okt", "Nov", "Des"
                        ];
                        let formattedDate = dateObj.getDate() + " " + bulan[dateObj
                        .getMonth()] + " " + dateObj.getFullYear();

                        // === FORMAT JAM ===
                        let formattedTime = jamMulai + " - " + jamSelesai;

                        // 6. TULIS TEKS KE TEMPLATE
                        ctx.fillStyle = "#FFFFFF";
                        ctx.font = "35px Arial";

                        // NAME
                        let text = namaDesigner;
                        let textWidth = ctx.measureText(text).width;
                        let x = (canvas.width - textWidth) / 2;
                        ctx.fillText(text, x, 1220);

                        // VENUE
                        ctx.fillText("" + venue, 65, 1320);

                        // KODE
                        ctx.fillText("" + kode, 625, 1320);

                        // TANGGAL (BARIS 1)
                        ctx.fillText(formattedDate, 65, 1430);

                        // JAM (BARIS 2)
                        ctx.fillText(formattedTime, 65, 1485);

                        // TIPE
                        if(type == 'vvip'){
                            ctx.fillText("" + type.toUpperCase(), 928, 1430);
                        }else{
                            ctx.fillText("" + type.toUpperCase(), 835, 1430);
                        }

                        ctx.fillStyle = "#FFFFFF";
                        ctx.font = "bold 38px Arial";
                        let startY = 530;
                        let lineHeight = 50;

                        designerList.forEach((nama, index) => {
                            ctx.fillText("• " + nama, 520, startY + (index * lineHeight));
                        });

                        // 7. hasilkan base64
                        let base64 = canvas.toDataURL("image/jpeg", 0.95);

                        // 8. Kirim ke server via AJAX
                        $.ajax({
                            url: "/designer/generate-ticket",
                            method: "POST",
                            data: {
                                designer: $("#designer_id").val(),
                                kode: kode,
                                tipe: type,
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


        $("#btnSubmitGenerate").click(async function() {
            let vvip = parseInt($("#tiketVVIP").val());
            let reguler = parseInt($("#tiketReguler").val());

            $("#btnSubmitGenerate").prop("disabled", true).text("Processing...");
            $('body').css({
                'cursor': 'auto',
                'pointer-events': 'auto'
            });

            let templatePath = window.templatePath;

            for (let i = 0; i < vvip; i++) await generateAndUploadTicket("vvip", templatePath);
            for (let i = 0; i < reguler; i++) await generateAndUploadTicket("reguler", templatePath);

            $("#btnSubmitGenerate").prop("disabled", false).text("Generate");
            alert("Seluruh tiket berhasil digenerate!");

            setTimeout(function() {
                location.reload();
            }, 1000)
        });
    </script>

    <canvas id="ticketCanvas" style="display:none;"></canvas>

    <script>
        $(document).ready(function() {
            $('#tableKamar').DataTable({
                responsive: true,
                autoWidth: false
            });

            $(document).on('click', '.hapus', function() {

                let id = $(this).data('id');

                Swal.fire({
                        title: 'Yakin ingin menghapus?',
                        text: "Data Tiket tidak dapat dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal'
                    })
                    .then((result) => {

                        if (result.isConfirmed) {

                            $.ajax({
                                url: "/designer/generate-ticket/delete",
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

            $(document).on('click', '#clear-tiket', function() {

                let id = $(this).data('id');

                Swal.fire({
                        title: 'Yakin ingin menghapus?',
                        text: "Data Tiket tidak dapat dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal'
                    })
                    .then((result) => {

                        if (result.isConfirmed) {

                            $.ajax({
                                url: "/designer/generate-ticket/clear",
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

            $(document).on('click', '#download-tiket', function() {
                let designerId = $(this).data('id');
                let url = '/designer/generate-ticket/download/' + designerId;
                window.location.href = url;
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
