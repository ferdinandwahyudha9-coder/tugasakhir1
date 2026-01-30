<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProdukController extends Controller
{
    public function produk()
    {
        Log::info('=== PRODUK PAGE ACCESSED ===', [
            'ip' => request()->ip(),
            'timestamp' => now()
        ]);
        return view('produk');
    }
    // Ganti method detailproduk() menjadi detail_produk()
    public function detail_produk(Request $request)
    {
        $id = $request->query('id');

        // Dummy data produk (nanti bisa diganti dengan database)
        $produkList = [
            1 => [
                'id' => 1,
                'nama' => 'MP x LC TRUE BLOOD',
                'harga' => 180000,
                'hargaStr' => 'Rp 180.000',
                'image' => '/images/tb1.jpeg',
                'deskripsi' => 'Kolaborasi eksklusif antara MP dan Lads Club',
                'stok' => 10
            ],
            2 => [
                'id' => 2,
                'nama' => 'Lads Club Moscow',
                'harga' => 260000,
                'hargaStr' => 'Rp 260.000',
                'image' => '/images/lc1.jpeg',
                'deskripsi' => 'Jersey casual football culture',
                'stok' => 5
            ],
            3 => [
                'id' => 3,
                'nama' => 'FNF x PH',
                'harga' => 330000,
                'hargaStr' => 'Rp 330.000',
                'image' => '/images/bh1.jpeg',
                'deskripsi' => 'Kolaborasi premium FNF x PH',
                'stok' => 8
            ],
            4 => [
                'id' => 4,
                'nama' => 'James Boogie',
                'harga' => 450000,
                'hargaStr' => 'Rp 450.000',
                'image' => '/images/jb1.jpeg',
                'deskripsi' => 'Limited edition James Boogie collection',
                'stok' => 3
            ]
        ];

        // Ambil produk berdasarkan ID
        $produk = $produkList[$id] ?? null;

        if (!$produk) {
            abort(404, 'Produk tidak ditemukan');
        }

        return view('detail_produk', compact('produk'));
    }
}
