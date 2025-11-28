@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Daftar Pembayaran Masuk</div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Booking ID</th>
                    <th>Jumlah</th>
                    <th>Metode</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pembayaran as $data)
                <tr>
                    <td>{{ $data->tggl_bayar }}</td>
                    <td>{{ substr($data->booking_id, 0, 8) }}...</td>
                    <td>Rp {{ number_format($data->jumlah_bayar, 0, ',', '.') }}</td>
                    <td>{{ ucfirst($data->metode_bayar) }}</td>
                    <td>
                        @if($data->status == 'pending')
                            <span class="badge bg-warning">Pending</span>
                        @else
                            <span class="badge bg-success">Selesai</span>
                        @endif
                    </td>
                    <td>
                        @if($data->status == 'pending')
                            <form action="{{ route('admin.pembayaran.konfirmasi', $data->id) }}" method="POST" onsubmit="return confirm('Konfirmasi pembayaran ini?')">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success btn-sm">Konfirmasi ✅</button>
                            </form>
                        @else
                            <button class="btn btn-secondary btn-sm" disabled>Sudah Diverifikasi</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
