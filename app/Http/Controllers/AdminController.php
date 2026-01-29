<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderStatusChanged;
use App\Services\WhatsAppService;

class AdminController extends Controller
{
    // Dashboard
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_products' => Product::count(),
            'total_orders' => Order::count(),
            'total_revenue' => Order::sum('total_harga') ?? 0,
        ];

        $recent_orders = Order::with('user')
            ->latest()
            ->take(5)
            ->get();

        $recent_users = User::latest()
            ->take(5)
            ->get();

        return view('admin.admin', compact('stats', 'recent_orders', 'recent_users'));
    }

    // Produk
    public function produk()
    {
        $products = Product::paginate(15);
        return view('admin.admin_produk', compact('products'));
    }

    // Pesanan
    public function pesanan()
    {
        $orders = Order::with('user', 'details')
            ->latest()
            ->paginate(15);
        return view('admin.admin_pesanan', compact('orders'));
    }

    // Detail Pesanan
    public function detailPesanan($id)
    {
        Log::info('=== LOADING DETAIL PESANAN ===', ['requested_id' => $id]);

        $order = Order::with('user', 'details.product')->findOrFail($id);

        Log::info('=== DETAIL PESANAN LOADED ===', [
            'order_id' => $order->id,
            'order_number' => $order->order_number,
            'user_id' => $order->user_id,
            'total_harga' => $order->total_harga,
            'details_count' => count($order->details),
            'details_ids' => $order->details->pluck('id')->toArray(),
            'first_detail' => $order->details->first() ? $order->details->first()->toArray() : null
        ]);

        return view('admin.admin_detail_pesanan', compact('order'));
    }

    // Users
    public function users()
    {
        $users = User::withCount('orders')
            ->paginate(15);
        return view('admin.admin_user', compact('users'));
    }

    // Get single user
    public function getUser($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    // Update user
    public function updateUser(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $id,
                'role' => 'required|in:user,admin',
            ]);

            // Update password jika diisi
            if ($request->filled('password')) {
                $validated['password'] = bcrypt($request->password);
            }

            $user->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'User berhasil diupdate'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    // Store user
    public function storeUser(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6',
                'role' => 'required|in:user,admin',
            ]);

            $validated['password'] = bcrypt($validated['password']);
            $validated['email_verified_at'] = now();

            $user = User::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'User berhasil ditambahkan',
                'user' => $user
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    // Delete user
    public function deleteUser($id)
    {
        try {
            $user = User::findOrFail($id);

            // Cek apakah user yang akan dihapus adalah diri sendiri
            if ($user->id === auth()->id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Anda tidak dapat menghapus akun Anda sendiri'
                ], 403);
            }

            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'User berhasil dihapus'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    // Store product
    public function storeProduct(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'harga' => 'required|numeric|min:0',
                'stok' => 'required|integer|min:0',
                'deskripsi' => 'nullable|string',
                'label' => 'nullable|string|max:50',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('products', 'public');
                $validated['image'] = $imagePath;
            }

            Product::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Produk berhasil ditambahkan'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    // Get single product
    public function getProduct($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    // Update product
    public function updateProduct(Request $request, $id)
    {
        try {
            $product = Product::findOrFail($id);

            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'harga' => 'required|numeric|min:0',
                'stok' => 'required|integer|min:0',
                'deskripsi' => 'nullable|string',
                'label' => 'nullable|string|max:50',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($product->image && file_exists(storage_path('app/public/' . $product->image))) {
                    unlink(storage_path('app/public/' . $product->image));
                }

                $imagePath = $request->file('image')->store('products', 'public');
                $validated['image'] = $imagePath;
            }

            $product->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Produk berhasil diupdate'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal: ' . json_encode($e->errors())
            ], 422);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    // Delete product
    public function deleteProduct($id)
    {
        try {
            $product = Product::findOrFail($id);

            // Delete image file if exists
            if ($product->image && file_exists(storage_path('app/public/' . $product->image))) {
                unlink(storage_path('app/public/' . $product->image));
            }

            $product->delete();

            return response()->json([
                'success' => true,
                'message' => 'Produk berhasil dihapus'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    // Update order status
    public function updateOrderStatus(Request $request, $id)
    {
        try {
            $order = Order::findOrFail($id);

            $validated = $request->validate([
                'status' => 'required|in:pending,processing,shipped,delivered,cancelled',
                'notify_via' => 'nullable|array', // ['email','whatsapp']
                'phone' => 'nullable|string',
                'email' => 'nullable|email',
            ]);

            $oldStatus = $order->status;

            // Optionally update contact info if provided
            if (!empty($validated['email'])) {
                if ($order->user) {
                    $order->user->email = $validated['email'];
                    $order->user->save();
                }
            }
            if (!empty($validated['phone'])) {
                if ($order->user) {
                    try {
                        if (\Illuminate\Support\Facades\Schema::hasColumn('users', 'phone')) {
                            $order->user->phone = $validated['phone'];
                            $order->user->save();
                        }
                    } catch (\Exception $e) {
                        Log::warning('Could not save phone on user', ['error' => $e->getMessage()]);
                    }
                }
            }

            $order->status = $validated['status'];
            $order->save();

            // Notifications
            $notifyMethods = $validated['notify_via'] ?? [];

            // Send email if requested and user has email
            if (in_array('email', $notifyMethods) && $order->user && $order->user->email) {
                try {
                    Mail::to($order->user->email)->send(new OrderStatusChanged($order, $oldStatus, $order->status));
                } catch (\Exception $e) {
                    Log::error('Failed to send order status email', ['error' => $e->getMessage()]);
                }
            }

            // Prepare WhatsApp link and optionally send via Cloud API
            $waLink = null;
            $waSent = false;
            $waResponse = null;

            if (in_array('whatsapp', $notifyMethods)) {
                $phone = $validated['phone'] ?? ($order->user->phone ?? null);
                if ($phone) {
                    // Normalize phone digits
                    $digits = preg_replace('/[^0-9]+/', '', $phone);
                    if (strlen($digits) > 0 && $digits[0] == '0') {
                        $digits = '62' . substr($digits, 1);
                    }

                    $textMsg = "Status pesanan {$order->order_number} telah diubah menjadi: " . ucfirst($order->status);

                    // wa.me link (fallback)
                    $waLink = "https://wa.me/{$digits}?text=" . rawurlencode($textMsg);

                    // Try sending via WhatsApp Cloud API if credentials present
                    try {
                        $waService = new WhatsAppService();
                        if ($waService->available()) {
                            $waResponse = $waService->sendText($digits, $textMsg);
                            $waSent = ($waResponse['status'] >= 200 && $waResponse['status'] < 300);
                        }
                    } catch (\Exception $e) {
                        Log::warning('WhatsApp send error', ['message' => $e->getMessage()]);
                        $waResponse = ['error' => $e->getMessage()];
                    }
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Status pesanan berhasil diupdate',
                'wa_link' => $waLink,
                'wa_sent' => $waSent,
                'wa_response' => $waResponse
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    // Delete order detail
    public function deleteOrderDetail($id)
    {
        try {
            Log::info('=== DELETE ORDER DETAIL STARTED ===');
            Log::info('Detail ID:', ['detail_id' => $id]);

            $detail = OrderDetail::findOrFail($id);
            Log::info('Detail found:', ['detail' => $detail->toArray()]);

            // Store order ID untuk update total harga
            $orderId = $detail->order_id;
            $oldTotal = $detail->subtotal;
            Log::info('Order ID:', ['order_id' => $orderId, 'subtotal_to_delete' => $oldTotal]);

            // Hapus detail pesanan
            $deleted = $detail->delete();
            Log::info('Detail deleted:', ['deleted' => $deleted]);

            // Update total harga order
            $order = Order::findOrFail($orderId);
            Log::info('Order before update:', ['order_id' => $order->id, 'current_total' => $order->total_harga]);

            // Calculate new total from remaining items
            $newTotal = OrderDetail::where('order_id', $orderId)->sum('subtotal');
            Log::info('New total calculated:', ['new_total' => $newTotal]);

            // Update order
            $order->total_harga = $newTotal;
            $order->save();
            Log::info('Order total updated:', ['order_id' => $order->id, 'new_total' => $order->total_harga]);

            Log::info('=== DELETE ORDER DETAIL SUCCESS ===');

            return response()->json([
                'success' => true,
                'message' => 'Item pesanan berhasil dihapus',
                'new_total' => $newTotal
            ]);

        } catch (\Exception $e) {
            Log::error('=== DELETE ORDER DETAIL ERROR ===');
            Log::error('Exception:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    // Delete Order (beserta semua detail-nya)
    public function deleteOrder($id)
    {
        try {
            Log::info('=== DELETE ORDER STARTED ===', ['order_id' => $id]);

            $order = Order::findOrFail($id);
            Log::info('Order found:', ['order_number' => $order->order_number]);

            // Hapus semua order details dulu
            $deletedDetails = OrderDetail::where('order_id', $id)->delete();
            Log::info('Order details deleted:', ['count' => $deletedDetails]);

            // Hapus order
            $order->delete();
            Log::info('Order deleted successfully');

            return response()->json([
                'success' => true,
                'message' => 'Pesanan berhasil dihapus'
            ]);

        } catch (\Exception $e) {
            Log::error('=== DELETE ORDER ERROR ===', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}