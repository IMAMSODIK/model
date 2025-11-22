@extends('layouts.template')

@section('own_style')
    <style>
        .mobile-card {
            background: #fff;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            border: none;
        }

        .mobile-title {
            font-weight: 600;
            font-size: 1.3rem;
            text-align: center;
            margin-bottom: 20px;
            color: #222;
        }

        .mobile-input {
            border-radius: 12px;
            padding: 14px;
            border: 1px solid #ddd;
            font-size: 15px;
            transition: 0.2s;
        }

        .mobile-input:focus {
            border-color: #b8873b;
            box-shadow: 0 0 0 3px rgba(184, 135, 59, 0.2);
        }

        .mobile-label {
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 6px;
        }

        .mobile-btn {
            border-radius: 12px;
            padding: 14px;
            font-size: 16px;
            font-weight: 600;
            background: #b8873b;
            border: none;
            width: 100%;
            color: white;
            transition: 0.2s;
        }

        .mobile-btn:hover {
            background: #926c30;
        }

        /* Display section */
        .designer-display-card {
            border-radius: 20px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .designer-header {
            background: #000;
            color: #b8873b;
            padding: 25px;
            text-align: center;
        }

        .designer-content {
            padding: 25px;
            text-align: center;
        }

        .designer-img {
            width: 100%;
            height: auto;
            object-fit: contain;
            border-radius: 16px;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Dashboard</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="0ets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        {{-- @if (auth()->user()->role == 'owner')
            <div class="row size-column">
                <div class="col-xl-4 col-sm-6">
                    <div class="card o-hidden small-widget">
                        <div class="card-body total-upcoming"><span class="f-light f-w-500 f-14">Total Tiket</span>
                            <div class="project-details">
                                <div class="project-counter">
                                    <h2 class="f-w-600">0</h2><span class="f-12 f-w-400">(Tiket)</span>
                                </div>
                                <div class="product-sub bg-secondary-light">
                                    <i class="fa fa-user-check text-white"></i>
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
                <div class="col-xl-4 col-sm-6">
                    <div class="card o-hidden small-widget">
                        <div class="card-body total-upcoming"><span class="f-light f-w-500 f-14">Tiket VVIP</span>
                            <div class="project-details">
                                <div class="project-counter">
                                    <h2 class="f-w-600">0</h2><span class="f-12 f-w-400">(Tiket)</span>
                                </div>
                                <div class="product-sub bg-secondary-light">
                                    <i class="fa fa-user-check text-white"></i>
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
                <div class="col-xl-4 col-sm-6">
                    <div class="card o-hidden small-widget">
                        <div class="card-body total-upcoming"><span class="f-light f-w-500 f-14">Tiket Reguler</span>
                            <div class="project-details">
                                <div class="project-counter">
                                    <h2 class="f-w-600">0</h2><span class="f-12 f-w-400">(Tiket)</span>
                                </div>
                                <div class="product-sub bg-secondary-light">
                                    <i class="fa fa-user-check text-white"></i>
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
                    <div class="container py-3">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6">

                                <div class="mobile-card">
                                    <h4 class="mobile-title">Lengkapi Data Kamu</h4>

                                    <form id="designerForm" enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <div class="mb-3">
                                            <label class="mobile-label">Nama Brand</label>
                                            <input type="text" name="nama" class="form-control mobile-input"
                                                placeholder="Contoh: Golden Fashion">
                                            <small class="text-danger error_nama"></small>
                                        </div>

                                        <div class="mb-3">
                                            <label class="mobile-label">Tanggal Event</label>
                                            <input type="date" name="tanggal" class="form-control mobile-input">
                                            <small class="text-danger error_tanggal"></small>
                                        </div>

                                        <div class="mb-3">
                                            <label class="mobile-label">Upload Flayer</label>
                                            <input type="file" name="flayer" class="form-control mobile-input">
                                            <small class="text-danger error_flayer"></small>
                                        </div>

                                        <button class="mobile-btn btn-submit">Simpan</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif

                @if ($designer)
                    <div class="container py-3">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6">

                                <div class="designer-display-card">

                                    <div class="designer-header">
                                        <h2 class="m-0" style="color: #b8873b">Designer Information</h2>
                                    </div>

                                    <div class="designer-content">

                                        <img src="{{ asset('storage/' . $designer->flayer) }}" class="designer-img mb-3">

                                        <h4 class="mb-1">{{ $designer->nama }}</h4>
                                        <p class="text-muted">Tanggal: {{ $designer->tanggal }}</p>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                @endif

            </div>
        @else
            Dashboard
        @endif --}}
    </div>
@endsection

@section('own_script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on("submit", "#designerForm", function(e) {
            e.preventDefault();

            let form = this;
            let formData = new FormData(form);

            $(".btn-submit").prop("disabled", true).text("Saving...");
            $(".text-danger").text("");

            Swal.fire({
                title: "Processing...",
                text: "Please wait while we save your data.",
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: "/designer-store",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {

                    $(".btn-submit").prop("disabled", false).text("Submit");

                    if (res.status) {
                        Swal.fire({
                            icon: "success",
                            title: "Berhasil!",
                            text: res.message,
                            confirmButtonColor: "#3085d6"
                        }).then(() => {
                            location.reload();
                        });
                    }
                },
                error: function(xhr) {
                    $(".btn-submit").prop("disabled", false).text("Submit");

                    Swal.close();

                    if (xhr.status === 422) {
                        let err = xhr.responseJSON.errors;

                        Swal.fire({
                            icon: "warning",
                            title: "Validasi Gagal",
                            text: "Periksa kembali data Anda.",
                            confirmButtonColor: "#d33"
                        });

                        $.each(err, function(key, val) {
                            $(".error_" + key).text(val[0]);
                        });

                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Server Error",
                            text: xhr.responseJSON?.message || "Terjadi kesalahan di server.",
                            confirmButtonColor: "#d33"
                        });
                    }
                }
            });
        });
    </script>
@endsection
