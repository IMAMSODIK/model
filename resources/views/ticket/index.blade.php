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
    </style>
</head>

<body>

    <div class="row">
        <section class="section">
            <header>
                <h4 style="text-align: center; margin-bottom: 20px">{{ $ticket->kode_tiket }}</h4>
                <h3>Parade {{ $ticket->designer->parade->nama }}</h3>
                <h4>Silahkan lengkapi data kamu</h4>
            </header>
            <main>
                <form>
                    <input type="hidden" id="id" value="{{ $ticket->id }}">
                    <div class="form-item box-item">
                        <input type="text" name="name" value="{{ $ticket->designer->nama }}" data-required
                            readonly>
                    </div>
                    <div class="form-item box-item">
                        <input type="text" name="name" value="{{ $ticket->designer->nama }}" data-required
                            readonly>
                    </div>
                    <div class="form-item box-item">
                        <input type="text" name="venue" value="{{ $ticket->designer->parade->vanue }}"
                            data-required readonly>
                    </div>
                    <div class="form-item box-item">
                        <input type="text" name="tanggal"
                            value="{{ \Carbon\Carbon::parse($ticket->designer->parade->tanggal)->translatedFormat('d F Y') }}"
                            data-required readonly>
                    </div>
                    <div class="form-item-double box-item">
                        <div class="form-item">
                            <input type="text" name="jam_mulai"
                                value="{{ \Carbon\Carbon::parse($ticket->designer->parade->jam_mulai)->format('H:i') }}"
                                placeholder="Jam Mulai" data-required data-number readonly>
                        </div>
                        <div class="form-item">
                            <input type="text" name="jam_selesai"
                                value="{{ \Carbon\Carbon::parse($ticket->designer->parade->jam_selesai)->format('H:i') }}"
                                placeholder="Jam Selesai" data-required data-number readonly>
                        </div>
                    </div>
                    <div class="form-item box-item">
                        <input type="text" name="nama_user" id="nama" required placeholder="Masukin nama kamu">
                    </div>
                    <div class="form-item box-item">
                        <input type="text" name="kontak_user" id="kontak" required
                            placeholder="Masukin Nomor Telfon kamu">
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
        $(document).ready(function() {

            var Validation = (function() {
                var emailReg =
                    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                var digitReg = /^\d+$/;

                var isEmail = function(email) {
                    return emailReg.test(email);
                };
                var isNumber = function(value) {
                    return digitReg.test(value);
                };
                var isRequire = function(value) {
                    return value == "";
                };
                var countChars = function(value, count) {
                    return value.length == count;
                };
                var isChecked = function(el) {
                    var hasCheck = false;
                    el.each(function() {
                        if ($(this).prop('checked')) {
                            hasCheck = true;
                        }
                    });
                    return hasCheck;
                };
                return {
                    isEmail: isEmail,
                    isNumber: isNumber,
                    isRequire: isRequire,
                    countChars: countChars,
                    isChecked: isChecked
                };
            })();

            var required = $('form').find('[data-required]');
            var numbers = $('form').find('[data-number]');
            var emails = $('form').find('[data-email]');
            var once = $('form').find('[data-once]');
            var radios = $('.form-item-triple');
            var groups = [];
            radios.each(function() {
                groups.push($(this).find('[data-once]'));
            });
            var counts = $('form').find('[data-count]');

            $('#submit').on('click', function() {
                required.each(function() {
                    if (Validation.isRequire($(this).val())) {
                        $(this).siblings('small.errorReq').show();
                    }
                });
                emails.each(function() {
                    if (!Validation.isEmail($(this).val())) {
                        $(this).siblings('small.errorEmail').show();
                    }
                });
                $.each(groups, function() {
                    if (!Validation.isChecked($(this))) {
                        $(this).parents('.form-item').find('small.errorOnce').show();
                    }
                });
                numbers.each(function() {
                    if (!Validation.isNumber($(this).val())) {
                        $(this).siblings('small.errorNum').show();
                    }
                });
                counts.each(function() {
                    if (!Validation.countChars($(this).val(), $(this).data('count'))) {
                        $(this).siblings('small.errorChar').show();
                    }
                });
            });

            required.on('keyup blur', function() {
                if (!Validation.isRequire($(this).val())) {
                    $(this).siblings('small.errorReq').hide();
                }
            });
            emails.on('keyup blur', function() {
                if (Validation.isEmail($(this).val())) {
                    $(this).siblings('small.errorEmail').hide();
                }
            });
            once.on('change', function() {
                $.each(groups, function(i) {
                    if (Validation.isChecked(groups[i])) {
                        groups[i].parents('.form-item').find('small.errorOnce').hide();
                    }
                });
            });
            numbers.on('keyup blur', function() {
                if (Validation.isNumber($(this).val())) {
                    $(this).siblings('small.errorNum').hide();
                }
            });
            counts.on('keyup blur', function() {
                if (Validation.countChars($(this).val(), $(this).data('count'))) {
                    $(this).siblings('small.errorChar').hide();
                }
            });

        });
    </script>

    <script>
        $(document).on('click', '#submit', function() {
            let id = $('#id').val();
            let nama = $('#nama').val();
            let kontak = $('#kontak').val();

            if (!nama || !kontak) {
                alert('Nama dan kontak harus diisi!');
                return;
            }

            $.ajax({
                url: '/designer/ticket-verification',
                type: 'POST',
                data: {
                    id: id,
                    nama: nama,
                    kontak: kontak,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    alert('Data berhasil dikirim!');
                    setTimeout(() => {
                        location.reload()
                    }, 1000);
                },
                error: function(err) {
                    console.error(err);
                    alert('Terjadi kesalahan saat mengirim data.');
                }
            });
        });
    </script>

</body>

</html>
