<html>
<head>
    <title>Transaksi Penjualan</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body class="p-5">

@include('navbar')

<h2 class="text-2xl font-bold mb-5">
    Simulasi Transaksi Penjualan
</h2>

<div class="bg-white shadow rounded p-5 mb-5">

<form action="{{ route('transactions.store') }}" method="POST">

    @csrf

    <label class="block mb-2">
        Pilih Produk
    </label>

    <select name="nama_barang"
            class="border rounded w-full p-2 mb-4">

        @foreach($products as $product)

            <option value="{{ $product->nama_barang }}">
                {{ $product->nama_barang }}
            </option>

        @endforeach

    </select>

    <label class="block mb-2">
        Jumlah
    </label>

    <input
        type="number"
        name="jumlah"
        class="border rounded w-full p-2 mb-4"
        required>

    <button
        class="bg-blue-500 text-white px-5 py-2 rounded">

        Simpan Transaksi

    </button>

</form>

</div>

<table class="table-auto w-full">

<thead>

<tr class="bg-gray-300">

<th class="border p-2">No</th>
<th class="border p-2">Produk</th>
<th class="border p-2">Harga</th>
<th class="border p-2">Jumlah</th>
<th class="border p-2">Total</th>
<th class="border p-2">Tanggal</th>

</tr>

</thead>

<tbody>

@foreach($transactions as $key=>$t)

<tr>

<td class="border p-2">{{ $key+1 }}</td>

<td class="border p-2">{{ $t->nama_barang }}</td>

<td class="border p-2">
Rp {{ number_format($t->harga,0,',','.') }}
</td>

<td class="border p-2">{{ $t->jumlah }}</td>

<td class="border p-2">
Rp {{ number_format($t->total,0,',','.') }}
</td>

<td class="border p-2">{{ $t->tanggal }}</td>

</tr>

@endforeach

</tbody>

</table>

</body>
</html>