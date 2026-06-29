<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Product;


class ProductControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $search = $request->search;

    $products = Product::when($search, function ($query) use ($search) {
        return $query->where('nama_barang', 'like', '%' . $search . '%');
    })->get();

    // Statistik
    $totalProduk = $products->count();
    $totalStok = $products->sum('stok');
    $totalNilaiStok = $products->sum(function ($item) {
        return $item->harga * $item->stok;
    });

    return view('products.index', compact(
        'products',
        'totalProduk',
        'totalStok',
        'totalNilaiStok'
    ));

}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //menyimpan data:
    $request->validate(
        [
            'nama_barang' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'required'
        ]
    );
    \App\Models\Product::create($request->all());
    return redirect()->route('products.index')->with('success','barang berhasil ditambahkan'
    );
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //update product :
        $request->validate(
        [
            'nama_barang' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'required'
        ]
        );
        //caru produk berdasarkan ID :
        $product = \App\Models\Product::findOrFail($id);
        //update:
        $product->update($request->all());
        return redirect()->route('products.index')->with('success','barang berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //hapus data berdasarkan id
        $product =\App\Models\Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success','barang berhasil dihapus');
    }

    //fungsi download pdf
    public function downloadPdf(){
        //ambl semua data tabel products
        $products = \App\Models\product::all();
        //muat halaman view khusus (html+css)dan gunakan products
        $pdf = Pdf::loadView('products.product_pdf', compact('products'));
        return $pdf->download('Laporan-Data-Produk-Garskincell.pdf');
    }
}
