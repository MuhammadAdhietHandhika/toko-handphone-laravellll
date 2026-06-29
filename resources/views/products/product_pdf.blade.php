<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Produk Garskin Cell</title>
    <style>

        body{
            font-family: DejaVu Sans, sans-serif;
            font-size:12px;
            color:#000;
        }

        .header{
            text-align:center;
            border-bottom:3px solid #000;
            padding-bottom:10px;
            margin-bottom:20px;
        }

        .title{
            font-size:18px;
            font-weight:bold;
        }

        .sub-title{
            font-size:12px;
            margin-top:5px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th{
            border:1px solid #000;
            background:#d9d9d9;
            padding:8px;
            text-align:center;
        }

        td{
            border:1px solid #000;
            padding:8px;
        }

        .text-center{
            text-align:center;
        }

    </style>

</head>
<body>
<div class="header">
    <div class="title">
        LAPORAN DATA PRODUK GARSKIN CELL
    </div>
    
    <div class="sub-title">
        Dicetak otomatis oleh sistem
    </div>
</div>

<table>

    <thead>

        <tr>
            <th width="8%">No</th>
            <th>Nama Produk</th>
            <th width="22%">Harga</th>
            <th width="12%">Stok</th>
            <th>Deskripsi</th>
        </tr>

    </thead>

    <tbody>

    @foreach($products as $key => $p)

        <tr>

            <td class="text-center">
                {{ $key + 1 }}
            </td>

            <td>
                {{ $p->nama_barang }}
            </td>

            <td>
                Rp {{ number_format($p->harga,0,',','.') }}
            </td>

            <td class="text-center">
                {{ $p->stok }}
            </td>

            <td>
                {{ $p->deskripsi }}
            </td>

        </tr>

    @endforeach

    </tbody>
</table>
</body>
</html>