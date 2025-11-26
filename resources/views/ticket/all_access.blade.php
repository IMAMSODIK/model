<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Tiket</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        @import url('https://fonts.googleapis.com/css?family=PT+Sans:400,700');

        html {
            font-size: 10px;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            box-sizing: border-box;
        }

        *,
        *:before,
        *:after {
            margin: 0;
            padding: 0;
            box-sizing: inherit;
        }

        body {
            font-family: 'PT Sans', sans-serif;
            font-size: 16px;
            line-height: 1.428571429;
            font-weight: 400;
            color: #fff;
        }

        .row {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .section {
            background-color: #3D4067;
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        header,
        main,
        footer {
            display: block;
            position: relative;
            z-index: 1;
        }

        header {
            padding: 48px;

            @media (max-width: 440px) {
                padding: 48px 24px;
            }

            >h3 {
                font-size: 30px;
                font-weight: 700;
                margin-bottom: 8px;
            }

            >h4 {
                font-size: 15px;
                font-weight: 400;
                letter-spacing: 1px;
            }
        }

        main {
            flex: 1;
            padding: 0 48px;

            @media (max-width: 440px) {
                padding: 0 24px;
            }
        }

        footer {
            width: 100%;
            background-color: #524F81;
            padding: 16px;
            align-self: center;
            text-align: center;
            margin-top: 32px;

            a {
                color: #fff;
                font-weight: 700;
                text-decoration: none;

                &:hover {
                    text-decoration: underline;
                }
            }
        }

        form {
            height: 100%;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        .label {
            color: rgba(226, 227, 232, .75);
            font-size: 16px;
        }

        small {
            display: none;

            &.errorOnce {
                margin-top: 2px;
            }
        }

        .form-item {

            input[type="text"],
            input[type="number"],
            input[type="email"] {
                display: block;
                color: #E2E3E8;
                font-size: 20px;
                width: 100%;
                background-color: transparent;
                border: none;
                border-bottom: 1px solid #75759E;
                padding: 8px 0;
                appearance: none;
                outline: none;
            }

            small {
                /*letter-spacing: 1px;*/
            }

            i {
                font-size: 12px;
                color: red;
            }
        }

        .box-item {
            height: 60px;
        }

        .form-item-double {
            display: flex;

            .form-item {
                flex: 1 1 auto;
            }

            .form-item:nth-child(1) {
                padding-right: 16px;
            }

            .form-item:nth-child(2) {
                padding-left: 16px;
            }
        }

        .form-item-triple {
            display: flex;
            align-items: center;
            padding-top: 6px;

            .radio-label {
                flex: 1 1 auto;
                text-align: left;

                label {
                    display: inline-block;
                    vertical-align: middle;
                }
            }

            .form-item {
                flex: 3 1 auto;
                text-align: center;
                margin: 0;

                label,input[type="radio"] {
                    display: inline-block;
                    vertical-align: middle;
                    margin: 0 4px;
                }
            }
        }

        ::-webkit-input-placeholder {
            /* WebKit, Blink, Edge */
            color: rgba(226, 227, 232, .75);
            font-size: 16px;
        }

        :-moz-placeholder {
            /* Mozilla Firefox 4 to 18 */
            color: rgba(226, 227, 232, .75);
            font-size: 16px;
            opacity: 1;
        }

        ::-moz-placeholder {
            /* Mozilla Firefox 19+ */
            color: rgba(226, 227, 232, .75);
            font-size: 16px;
            opacity: 1;
        }

        :-ms-input-placeholder {
            /* Internet Explorer 10-11 */
            color: rgba(226, 227, 232, .75);
            font-size: 16px;
        }

        ::-ms-input-placeholder {
            /* Microsoft Edge */
            color: rgba(226, 227, 232, .75);
            font-size: 16px;
        }

        .submit {
            display: inline-block;
            font-size: 18px;
            font-weight: 700;
            letter-spacing: 1px;
            padding: 8px 48px;
            margin-top: 32px;
            border: 2px solid #75759E;
            border-radius: 20px;
            cursor: pointer;
            transition: all ease .2s;

            &:hover {
                background-color: #EDA261;
                border: 2px solid #EDA261;
            }
        }

        .wave {
            position: absolute;
            top: 0;
            left: 50%;
            width: 800px;
            height: 800px;
            margin-top: -600px;
            margin-left: -400px;
            background: #252E45;
            border-radius: 40%;
            animation: shift 20s infinite linear;
            z-index: 0;
        }

        @keyframes shift {
            from {
                transform: rotate(360deg);
            }
        }

        /* ==== CUSTOM SELECT STYLING ==== */
        select {
            width: 100%;
            background-color: transparent;
            border: none;
            border-bottom: 1px solid #75759E;
            padding: 8px 0;
            font-size: 20px;
            color: #7d7d7d;
            appearance: none;
            outline: none;
            cursor: pointer;
        }

        /* Panah custom */
        select {
            background-image: url("data:image/svg+xml;utf8,<svg fill='white' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/></svg>");
            background-repeat: no-repeat;
            background-position: right 4px center;
            background-size: 20px;
        }

        /* Saat focus */
        select:focus {
            border-bottom: 1px solid #EDA261;
        }

        /* Wrapper supaya rapi */
        .select-wrapper {
            position: relative;
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="row">
        <section class="section">
            <header>
                <h4 style="text-align: center; margin-bottom: 20px">{{ $ticket->kode_tiket }}</h4>
                <h3>Tiket All Access</h3>
                <h4>Silahkan lengkapi data kamu</h4>
            </header>
            <main>
                <form>
                    <input type="hidden" id="id" value="{{ $ticket->id }}">
                    <div class="form-item box-item select-wrapper">
                        <select name="name" id="select_parade">
                            <option value="">:: Pilih Parade ::</option>
                            @foreach ($parade as $d)
                                <option value="{{ $d->id }}">{{ $d->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-item box-item">
                        <input type="text" name="venue" id="vanue" data-required readonly>
                    </div>
                    <div class="form-item box-item">
                        <input type="text" name="tanggal" id="tanggal" data-required readonly>
                    </div>
                    <div class="form-item-double box-item">
                        <div class="form-item">
                            <input type="text" name="jam_mulai" id="jam_mulai" placeholder="Jam Mulai" readonly>
                        </div>
                        <div class="form-item">
                            <input type="text" name="jam_selesai" id="jam_selesai" placeholder="Jam Selesai" readonly>
                        </div>
                    </div>

                    <div class="form-item box-item select-wrapper mt-3">
                        <select id="select_designer">
                            <option value="">-- Pilih Parade dulu --</option>
                        </select>
                    </div>

                    <div class="form-item box-item">
                        <input type="text" name="nama_user" id="nama" required placeholder="Nama">
                    </div>
                    <div class="form-item box-item">
                        <input type="text" name="kontak_user" id="kontak" required placeholder="Nomor Telfon">
                    </div>
                    <div class="form-item box-item">
                        <input type="text" name="token" id="token" required placeholder="Token">
                    </div>
                    <div class="form-item">
                        <span id="submit" class="submit">Submit</span>
                    </div>
                </form>

            </main>
            <i class="wave"></i>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <script>
        function formatDate(dateStr) {
            let d = new Date(dateStr);
            let year = d.getFullYear();
            let month = String(d.getMonth() + 1).padStart(2, "0");
            let day = String(d.getDate()).padStart(2, "0");
            return `${year}-${month}-${day}`;
        }

        function formatTime(timeStr) {
            return timeStr.slice(0, 5); 
        }

        $("#select_parade").on("change", function() {

            let parade_id = $(this).val();

            $.ajax({
                url: "{{ route('get.designers') }}",
                type: "GET",
                data: {
                    parade_id: parade_id
                },
                success: function(res) {
                    $("#vanue").val(res.vanue)
                    $("#tanggal").val(formatDate(res.tanggal))
                    $("#jam_mulai").val(formatTime(res.jam_mulai))
                    $("#jam_selesai").val(formatTime(res.jam_selesai))

                    let html = "";

                    if (res.length === 0) {
                        html = `<option value="">Tidak ada designer</option>`;
                    } else {
                        res.designer.forEach(d => {
                            html += `<option value="${d.id}">${d.nama}</option>`;
                        });
                    }

                    $("#select_designer").html(html);
                },
                error: function() {
                    alert("Gagal mengambil data designer.");
                }
            });
        });


        $(document).on('click', '#submit', function() {
            let id = $('#id').val();
            let nama = $('#nama').val();
            let kontak = $('#kontak').val();
            let token = $('#token').val();

            if (!nama || !kontak || !token) {
                alert('Nama, Kontak dan Token harus diisi!');
                return;
            }

            $.ajax({
                url: '/designer/ticket-verification',
                type: 'POST',
                data: {
                    id: id,
                    nama: nama,
                    kontak: kontak,
                    token: token,
                    designer: $("#select_designer").val(),
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    if (res.status === false) {
                        alert(res.message || 'Tiket sudah digunakan');
                    } else {
                        alert('Data berhasil dikirim!');
                        setTimeout(() => {
                            location.href = "/";
                        }, 1000);
                    }
                },
                error: function(err) {
                    console.error(err);

                    // Cek apakah server mengirim JSON dengan message
                    let msg = 'Terjadi kesalahan saat mengirim data.';
                    if (err.responseJSON && err.responseJSON.message) {
                        msg = err.responseJSON.message;
                    }

                    alert(msg);
                }
            });
        });
    </script>

</body>

</html>
