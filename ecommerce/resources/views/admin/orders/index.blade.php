@extends('admin.layout')

@section('title', 'Admin - Daftar Order')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Daftar Order</h1>
    </div>

    <div class="table-card">
        <div class="table-responsive">
            <table class="table align-middle mb-0 table-fixed">
                <thead>
                    <tr>
                        <th style="width: 160px">No. Order</th>
                        <th style="width: 180px">Pelanggan</th>
                        <th style="width: 140px">Telepon</th>
                        <th style="width: 90px">Item</th>
                        <th style="width: 140px">Total</th>
                        <th style="width: 120px">Pembayaran</th>
                        <th style="width: 110px">Status</th>
                        <th style="width: 120px" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td>{{ $order->order_number }}</td>
                            <td title="{{ $order->customer_name }}">{{ $order->customer_name }}</td>
                            <td>{{ $order->customer_phone }}</td>
                            <td>{{ $order->order_items_count }}</td>
                            <td>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                            <td>{{ ucfirst($order->payment_method) }}</td>
                            <td>
                                <span class="badge text-bg-{{ match ($order->status) {
                                    'completed' => 'success',
                                    'processing' => 'info',
                                    'cancelled' => 'danger',
                                    default => 'secondary',
                                } }}">{{ ucfirst($order->status) }}</span>
                            </td>
                            <td class="action-cell">
                                <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus order ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Belum ada order.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{ $orders->links('pagination::bootstrap-5') }}
@endsection
