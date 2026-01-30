<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }

    public function processCheckout(Request $request)
    {
        // Log untuk debugging
        Log::info('=== CHECKOUT PROCESS STARTED ===');
        Log::info('Request data:', ['data' => $request->all()]);
        Log::info('Request method:', ['method' => $request->method()]);
        Log::info('Content-Type:', ['content_type' => $request->header('Content-Type')]);

        try {
            // Validasi - items dikirim sebagai array dari form JavaScript
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email',
                'telp' => 'required|string|min:10',
                'alamat' => 'required|string',
                'kota' => 'required|string|max:100',
                'kodepos' => 'required|string|size:5',
                'items' => 'required|array|min:1',  // ← PERBAIKAN: Accept array
                'items.*.id' => 'required|integer',
                'items.*.name' => 'required|string',
                'items.*.price' => 'required|numeric|min:0',
                'items.*.qty' => 'required|integer|min:1',
                'total' => 'required|numeric|min:0',
            ]);

            Log::info('Validation passed');

            // Items sudah array, langsung pakai
            $items = $validated['items'];

            Log::info('Items validated successfully:', ['items_count' => count($items)]);

            // Mulai transaction
            DB::beginTransaction();

            // Generate order number
            $userId = Auth::id() ?? 'GUEST';
            $orderNumber = 'ORD-' . date('YmdHis') . '-' . $userId;

            // Insert order menggunakan model
            $order = Order::create([
                'user_id' => Auth::id() ?? null,
                'order_number' => $orderNumber,
                'total_harga' => $validated['total'],
                'status' => 'pending',
                'catatan' => 'Pengiriman ke: ' . $validated['alamat'] . ', ' . $validated['kota'],
            ]);

            $idPesanan = $order->id;

            Log::info('Order created', ['order_id' => $idPesanan, 'user_id' => Auth::id(), 'order_number' => $orderNumber]);

            // Insert order details dari items
            foreach ($items as $item) {
                $hargaSatuan = $item['price'] ?? 0;
                $jumlah = $item['qty'] ?? 1;
                $subtotal = $hargaSatuan * $jumlah;

                DB::table('order_details')->insert([
                    'order_id' => $idPesanan,
                    'product_id' => $item['id'] ?? null,
                    'quantity' => $jumlah,
                    'harga_satuan' => $hargaSatuan,
                    'subtotal' => $subtotal,
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