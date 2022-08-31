<html>

<head>
    <title>Document</title>
    <style>

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
        .item3 {
            width: 10%;
            float: left;
            margin-left: -35px;
        }
        .item4 {
            width: 75%;
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
        <h3>PEMERINTAH KOTA MATARAM</h3>
    </div>
    <div class="grid" style="width: 69%">
        <div class="item1" style="width: 120px">
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
            <ul style="list-style-type: none; width:120px">
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
        <div style="text-align: left; margin-top: 90px; margin-left: 50px">
            <h3>K W I T A N S I</h3>
        </div>
        <div class="grid">
            <div class="item1">
                <ul style="list-style-type: none">
                    <li>Telah terima dari</li>
                    <li>Banyaknya Uang</li>
                    <li>Untuk Pembayaran</li>
                </ul>
            </div>
            <div class="item3">
                <ul style="list-style-type: none" >
                    <li>:</li>
                    <li>:</li>
                    <li>:</li>
                </ul>
            </div>
            <div style="float: left" class="item4">
                <ul style="list-style-type: none"  >
                    <li>Kepala Dinas Komunikasi dan Informatika Kota Mataram</li>
                    <li>{{ Ucfirst($terbilang) }} rupiah</li>
                    <li>&nbsp; <p style="margin-top: -13px">
                            {{ $uraian_pembayaran }}
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <br />


    <table width="100%" style="margin-top: 80px">
        <tr height=" 100px">
            <td>
                <h2><i>Terbilang Rp.{{ number_format($uang,0,".") }} </i>
                    <div class="garis_horizontal"></div>
                </h2>
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

            <td width="280px">
                <center>Lunas Di Bayar : <br>
                    Bendahara Pengeluaran</center>
            </td>

            <td><center >Mataram,........................................... <br>
                Yang Menerima Uang</center></td>

        </tr>
    </table>
    <table width="100%">
        <tr>
            <td><br></td>
        </tr>
    </table>
    <br>
<br>
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