@extends('layouts.admin-app')

@section('content')

<div class="max-w-7xl mx-auto py-8 px-4">

    {{-- CARD WRAPPER --}}
    <div class="bg-white shadow-lg rounded-xl overflow-hidden">

        {{-- HEADER --}}
        <div class="bg-blue-600 px-6 py-4">
            <h2 class="text-xl font-semibold text-white">Daftar Pembayaran Masuk</h2>
        </div>

        {{-- BODY --}}
        <div class="p-6">

            {{-- NOTIFIKASI --}}
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            {{-- TABLE WRAPPER --}}
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-200 text-sm">

                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 border">Tanggal</th>
                            <th class="px-4 py-3 border">Booking</th>
                            <th class="px-4 py-3 border">Jumlah</th>
                            <th class="px-4 py-3 border">Metode</th>
                            <th class="px-4 py-3 border">Status</th>
                            <th class="px-4 py-3 border">Bukti</th>
                            <th class="px-4 py-3 border">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($pembayaran as $data)
                        <tr class="hover:bg-gray-50">

                            {{-- Tanggal --}}
                            <td class="px-4 py-3 border">
                                {{ \Carbon\Carbon::parse($data->tggl_bayar)->format('d/m/Y H:i') }}
                            </td>

                            {{-- Booking Info --}}
                            <td class="px-4 py-3 border">
                                <p class="font-semibold">#{{ $data->booking_id }}</p>
                                <p class="text-gray-500 text-xs">
                                    {{ $data->booking->kamar->tipe_kamar ?? 'Kamar tidak ditemukan' }}
                                </p>
                            </td>

                            {{-- Jumlah --}}
                            <td class="px-4 py-3 border font-semibold text-green-700">
                                Rp {{ number_format($data->jumlah_bayar, 0, ',', '.') }}
                            </td>

                            {{-- Metode --}}
                            <td class="px-4 py-3 border capitalize">
                                {{ $data->metode_bayar }}
                            </td>

                            {{-- Status --}}
                            <td class="px-4 py-3 border">
                                @if($data->status == 'pending')
                                    <span class="px-2 py-1 text-xs font-medium bg-yellow-200 text-yellow-700 rounded">
                                        Pending
                                    </span>
                                @else
                                    <span class="px-2 py-1 text-xs font-medium bg-green-200 text-green-700 rounded">
                                        Selesai
                                    </span>
                                @endif
                            </td>

                            {{-- Bukti Bayar --}}
                            <td class="px-4 py-3 border">
                                @if($data->bukti_bayar)
                                    <a href="{{ Storage::url($data->bukti_bayar) }}" target="_blank">
                                        <img src="{{ Storage::url($data->bukti_bayar) }}"
                                             class="w-20 h-20 object-cover rounded border">
                                    </a>
                                @else
                                    <span class="text-gray-500 text-sm">Tidak ada</span>
                                @endif
                            </td>

                            {{-- Aksi --}}
                            <td class="px-4 py-3 border">

                                {{-- Jika masih pending --}}
                                @if($data->status == 'pending')
                                    <form action="{{ route('admin.pembayaran.konfirmasi', $data->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Konfirmasi pembayaran ini?')">

                                        @csrf
                                        @method('PUT')

                                        <button type="submit"
                                            class="w-full text-center px-3 py-2 bg-green-600 hover:bg-green-700 text-white text-sm rounded-lg">
                                            Konfirmasi ✓
                                        </button>

                                    </form>

                                {{-- Jika sudah selesai --}}
                                @else
                                    <button
                                        class="w-full px-3 py-2 bg-gray-300 text-gray-600 text-sm rounded-lg cursor-not-allowed">
                                        Diverifikasi
                                    </button>
                                @endif

                            </td>

                        </tr>
                        @empty

                        <tr>
                            <td colspan="7" class="text-center py-6 text-gray-500">
                                Belum ada pembayaran masuk.
                            </td>
                        </tr>

                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>

    </div>

</div>

@endsection
