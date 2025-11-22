<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Monitor Tiket</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f2f5; padding: 20px; }
        .card-container { display: flex; flex-wrap: wrap; gap: 15px; }
        .card {
            width: 220px;
            padding: 15px;
            border-radius: 10px;
            background-color: #f8d7da; /* default merah muda = belum hadir */
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: background-color 0.3s;
        }
        .card.hadir { background-color: #d4edda; } /* hijau = hadir */
        .card h3 { margin: 0 0 10px; font-size: 18px; }
        .card p { margin: 4px 0; font-size: 14px; }
    </style>
</head>
<body>

<h2>Monitor Tiket</h2>
<input type="hidden" id="id" value="{{$designer->id}}">
<div class="card-container" id="tiketContainer">
    <!-- Card tiket akan muncul di sini -->
</div>

<script>
function loadTiket() {
    $.getJSON(`/api/monitor-tiket?id=${$("#id").val()}`, function(data) {
        let container = $('#tiketContainer');
        container.empty();

        data.forEach(function(tiket) {
            let hadirClass = tiket.is_hadir ? 'hadir' : '';
            let nama = tiket.is_hadir ? tiket.nama_pemilik : '-';
            let kontak = tiket.is_hadir ? tiket.kontak_pemilik : '-';
            let status = tiket.is_hadir ? 'Hadir' : 'Belum Hadir';

            let card = `
                <div class="card ${hadirClass}">
                    <h3>${tiket.kode_tiket}</h3>
                    <p><strong>Designer:</strong> ${tiket.designer.nama}</p>
                    <p><strong>Tipe:</strong> ${tiket.tipe_tiket}</p>
                    <p><strong>Status:</strong> ${status}</p>
                    <p><strong>Nama Pemilik:</strong> ${nama}</p>
                    <p><strong>Kontak Pemilik:</strong> ${kontak}</p>
                </div>
            `;

            container.append(card);
        });
    });
}

// Load pertama kali
loadTiket();

// Refresh tiap 5 detik
setInterval(loadTiket, 5000);
</script>

</body>
</html>
