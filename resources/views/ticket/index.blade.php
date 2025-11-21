@extends('layouts.template')

@section('own_style')
    <style>
        .ticket-box img {
            border-radius: 6px;
        }
    </style>
@endsection 

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Tiket</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="0ets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Tiket</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row size-column">
            <div class="col-12">
                <div class="card o-hidden small-widget">
                    <div class="card-body total-upcoming"><span class="f-light f-w-500 f-14">Total Tiket</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">0</h2><span class="f-12 f-w-400">(Tiket)</span>
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

            @if (!$designer)
                <div class="col-12">
                    <div class="alert alert-warning text-center p-4">
                        <h4 class="mb-2">Data Designer Belum Lengkap</h4>
                        <p class="mb-3 text-dark">Silakan lengkapi data designer Anda terlebih dahulu sebelum membuat tiket.
                        </p>

                        <a href="/dashboard" class="btn btn-dark">
                            Lengkapi Data Designer
                        </a>
                    </div>
                </div>
            @else
                <div class="col-12">

                    <div class="card shadow-lg p-4">
                        <h4 class="mb-3">Generate Ticket</h4>

                        <form id="ticketForm">
                            @csrf

                            <div class="mb-3">
                                <label>Nama Designer</label>
                                <input type="text" class="form-control" value="{{ $designer->nama }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label>Tanggal Event</label>
                                <input type="text" class="form-control" value="{{ $designer->tanggal }}" readonly>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label>Jumlah Tiket VVIP</label>
                                        <input type="number" name="vvip" class="form-control" placeholder="jumlah VVIP">
                                        <small class="text-danger error_vvip"></small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label>Jumlah Tiket Reguler</label>
                                        <input type="number" name="reguler" class="form-control"
                                            placeholder="jumlah reguler">
                                        <small class="text-danger error_reguler"></small>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Pilih Vanue</label>
                                <select name="vanue_id" class="form-control">
                                    <option value="">-- Pilih --</option>

                                    @foreach ($vanue as $v)
                                        <option value="{{ $v->id }}">{{ $v->nama }}</option>
                                    @endforeach
                                </select>
                                <small class="text-danger error_vanue_id"></small>
                            </div>

                            <button class="btn btn-primary w-100 mt-3">Generate Tiket</button>

                        </form>
                    </div>

                    <div class="card shadow-lg p-4">
                        <div id="ticketPreview" class="mt-4" style="display:none">

                            <!-- Tabs -->
                            <ul class="nav nav-tabs" id="ticketTabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-type="vvip" href="#">VVIP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-type="reguler" href="#">Reguler</a>
                                </li>
                            </ul>

                            <!-- Ticket images -->
                            <!-- Ticket images -->
                            <div class="ticket-content mt-3">
                                <div id="vvipTicketWrap" class="row g-2"></div>
                                <div id="regulerTicketWrap" class="row g-2" style="display:none;"></div>
                            </div>


                        </div>


                    </div>

                </div>
            @endif
        </div>


    </div>
@endsection

@section('own_script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on("submit", "#ticketForm", function(e) {
            e.preventDefault();

            let jumlahVVIP = $("input[name='vvip']").val();
            let jumlahReguler = $("input[name='reguler']").val();
            let vanue = $("select[name='vanue_id'] option:selected").val();

            if (!jumlahVVIP || !jumlahReguler || !vanue) {
                Swal.fire("Oops", "Semua field wajib diisi sebelum generate!", "warning");
                return;
            }

            // gambar template dari designer->flayer
            let template = `{{ asset('storage/' . $designer->flayer) }}`;

            // kosongkan tempat sebelumnya
            $("#vvipTicketWrap").empty();
            $("#regulerTicketWrap").empty();

            // --- GENERATE TIKET ---
            function generateImageElement() {
                return `
        <div class="col-3">
            <div class="ticket-box border rounded overflow-hidden">
                <img src="${template}" class="img-fluid">
            </div>
        </div>`;
            }

            // VVIP
            for (let i = 0; i < jumlahVVIP; i++) {
                $("#vvipTicketWrap").append(generateImageElement());
            }

            // REGULER
            for (let i = 0; i < jumlahReguler; i++) {
                $("#regulerTicketWrap").append(generateImageElement());
            }

            // tampilkan preview
            $("#ticketPreview").slideDown();

            Swal.fire({
                title: "Berhasil!",
                text: "Tiket berhasil digenerate. Lihat di bawah!",
                icon: "success",
                timer: 1800
            });
        });


        // --- TAB SWITCHING ---
        $(document).on("click", "#ticketTabs .nav-link", function(e) {
            e.preventDefault();

            $("#ticketTabs .nav-link").removeClass("active");
            $(this).addClass("active");

            let type = $(this).data("type");

            if (type === "vvip") {
                $("#vvipTicketWrap").show();
                $("#regulerTicketWrap").hide();
            } else {
                $("#vvipTicketWrap").hide();
                $("#regulerTicketWrap").show();
            }
        });
    </script>
@endsection
