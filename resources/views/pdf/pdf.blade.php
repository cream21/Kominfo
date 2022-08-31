<html>

<head>
    <title>Document</title>
    <style>
        body {
            width: 148mm;
            height: 210mm;
            margin-top: -4mm;
            margin-left: 10mm;
            margin-right: 10mm;
            margin-bottom: 3mm;

        }

        textarea {
            border-bottom: none;
            border-left: none;
            border-right: none;
            border-top: none;
        }


        .garis_horizontal {
            border-top: 5px black solid;
            height: 0px;
            width: 300px;
        }

        .flex-container {
            display: flex;
        }

        .flex-container>div {
            background-color: #f1f1f1;
            margin: 10px;
            padding: 20px;
        }

        td {
            font-size: 70%;
        }

        strong {
            font-size: 80%;
        }

        .grid {
            box-sizing: border-box;
            font-size: 70%;
            text-align: left;
        }

        .item1 {
            width: 25%;
            float: left;
            margin-left: -35px;
        }

        .item2 {
            width: 50%;
            float: left;
        }
    </style>

</head>

<body>
    <div style="text-align: center">
        <h4>PEMERINTAH KOTA MATARAM</h4>
    </div>
    <div class="grid" style="width: 85%">
        <div class="item1">
            <ul style="list-style-type: none">
                <li>No. BKU</li>
                <li>Tanggal</li>
                <li>Kode Rekening</li>
                <li>Uraian Kode Rek.</li>
            </ul>
        </div>
        <div class="item2">
            <ul style="list-style-type: none">
                <li>:</li>
                <li>:</li>
                <li>:&nbsp;{{ $kode_rekening }}</li>
                <li>:&nbsp;{{ $uraian_belanja }}</li>
            </ul>
        </div>
        <div class="item1">
            <ul style="list-style-type: none" width="100px">
                <li>Tahun Anggaran</li>
                <li>PA/PPTK</li>
                <li>Program</li>
                <li>Kegiatan</li>
                <li>Sub Kegiatan</li>
            </ul>
        </div>
        <div class="item2">
            <ul style="list-style-type: none; width: 100%; ">
                <li>:</li>
                <li>:&nbsp;{{ $pa_pptk['nama_lengkap'] }}</li>
                <li>:&nbsp;{{ $program['nama_program'] }}</li>
                <li>:&nbsp;{{ $kegiatan['nama_kegiatan'] }}</li>
                <li>:&nbsp;{{ $subkegiatan['nama_sub_kegiatan'] }}</li>
            </ul>
        </div>
    </div>
    <div>
        <div style="text-align: left; margin-top: 80px">
            <h3>K W I T A N S I</h3>
        </div>
        <div class="grid">
            <div class="item1">
                <ul style="list-style-type: none">
                    <li>Telah terima dari</li>
                    <li>Banyaknya Uang</li>
                    <li style="text-align: justify">Untuk Pembayaran</li>
                </ul>
            </div>
            <div style="float: left; width: 100%;">
                <ul style="list-style-type: none">
                    <li>:&nbsp; Kepala Dinas Komunikasi dan Informatika Kota Mataram</li>
                    <li>:&nbsp; {{ Ucfirst($terbilang) }} rupiah</li>
                    <li>:&nbsp; <p style="margin-top: -13px">
                            {{ $uraian_pembayaran }}
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <br />


    <table width="100%" style="margin-top: 40px">
        <tr height=" 100px">
            <td>
                <h2><i>Terbilang Rp.{{ number_format($uang,2,",",".") }} </i>
                    <div class="garis_horizontal"></div>
                </h2>
            </td>
            <td>
                <center style="margin-top: 50px">Mataram,........................................... <br>
                    Yang Menerima Uang</center>
            </td>

        </tr>
    </table>
    <table width="100%">
        <tr>
            <td width="200px">
                <center>Mengetahui/Setuju Dibayar: <br>
                    Kepala Dinas Komunikasi dan Informatika <br>
                    Kota Mataram</center>
            </td>

            <td width="140px">
                <center>Lunas Di Bayar : <br>
                    Bendahara Pengeluaran</center>
            </td>

            <td></td>

        </tr>
    </table>
    <table width="100%">
        <tr>
            <td><br></td>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <td width="205px">
                <Center><u><strong>{{ $kadis['nama_lengkap'] }}</strong> </u> <br>
                    NIP. {{ $kadis['nip'] }}</Center>
            </td>
            <td>
                <Center><u><strong> {{ $bendahara['nama_lengkap'] }}</strong></u> <br>
                    NIP. {{ $bendahara['nip'] }}</Center>
            </td>
            <td />
            <td width="200px" style="margin-left: 100px">
        </tr>
    </table>
    <div style="float: right; font-size: 70%; margin-right: 1px; margin-top: -25px">
        Nama : {{ $pa_pptk['nama_lengkap'] }}<br>
        Alamat : <br>
        Jabatan : </td>
    </div>
</body>

</html>