<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;

class TransactionController extends Controller
{
    // Menampilkan halaman transaksi
    public function index()
    {
        $products = Product::all();
        $transactions = Transaction::latest()->get();

        return view('transactions.index', compact('products', 'transactions'));
    }

    // Menyimpan transaksi
    public function store(Request $request)
    {
        // Cari produk berdasarkan nama
        $product = Product::where('nama_barang', $request->nama_barang)->first();

        // Validasi stok
        if ($request->jumlah > $product->stok) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi!');
        }

        // Hitung total
        $total = $product->harga * $request->jumlah;

        // Simpan transaksi
        Transaction::create([
            'nama_barang' => $product->nama_barang,
            'harga'       => $product->harga,
            'jumlah'      => $request->jumlah,
            'total'       => $total,
            'tanggal'     => now()->toDateString(),
        ]);

        // Kurangi stok
        $product->stok -= $request->jumlah;
        $product->save();

        return redirect()->route('transactions.index')
            ->with('success', 'Transaksi berhasil disimpan');
    }
}