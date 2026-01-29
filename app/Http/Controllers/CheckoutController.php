<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function checkout(){
        return view('checkout');
    }

    public function processCheckout(Request $request)
    {
        // Log untuk debugging
        Log::info('=== CHECKOUT PROCESS STARTED ===');
        Log::info('Request data:', $request->all());
        Log::info('Request method:', $request->method());
        Log::info('Content-Type:', $request->header('Content-Type'));

        try {
            // Validasi - items sekarang string karena pakai FormData
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email',
                'telp' => 'required|string|min:10',
                'alamat' => 'required|string',
                'kota' => 'required|string|max:100',
                'kodepos' => 'required|string|size:5',
                'items' => 'required|string',  // ← UBAH: sekarang string (JSON encoded)
                'total' => 'required|numeric|min:0',
            ]);

            Log::info('Validation passed');

            // Decode items dari JSON string
            $items = json_decode($validated['items'], true);
            
            if (!$items || !is_array($items) || count($items) === 0) {
                Log::error('Items decode failed or empty');
                return response()->json([
                    'success' => false,
                    'message' => 'Data items tidak valid'
                ], 422);
            }

            Log::info('Items decoded successfully:', $items);

            // Mulai transaction
            DB::beginTransaction();

            // Insert pesanan - PENTING: id_user bukan user_id
            $idPesanan = DB::table('pesanan')->insertGetId([
                'id_user' => Auth::id() ?? null,  // 🔥 FIXED: id_user bukan user_id
                'tanggal' => now(),
                'total_harga' => $validated['total'],
                'status' => 'pending',
                'nama_penerima' => $validated['nama'],
                'email_penerima' => $validated['email'],
                'telp_penerima' => $validated['telp'],
                'alamat_pengiriman' => $validated['alamat'],
                'kota' => $validated['kota'],
                'kode_pos' => $validated['kodepos'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Log::info('Order created', ['order_id' => $idPesanan]);

            // Insert detail pesanan dari items
            foreach ($items as $item) {
                DB::table('detail_pesanan')->insert([
                    'id_pesanan' => $idPesanan,
                    'id_produk'  => $item['id'] ?? null,
                    'jumlah'     => $item['qty'] ?? 1,
                    'subtotal'   => ($item['price'] ?? 0) * ($item['qty'] ?? 1),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            Log::info('Order details inserted');

            // Commit transaction
            DB::commit();

            Log::info('Transaction committed successfully');

            return response()->json([
                'success' => true,
                'message' => 'Pesanan berhasil diproses',
                'order_id' => $idPesanan
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            Log::error('Validation failed:', $e->errors());
            
            return response()->json([
                'success' => false,
                'message' => 'Data tidak valid',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Checkout error:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memproses pembayaran: ' . $e->getMessage()
            ], 500);
        }
    }
}