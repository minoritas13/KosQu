@extends('layouts.admin-app')

@section('content')
    <div class="p-6">

        <h1 class="mb-6 text-3xl font-bold text-gray-100">Kelola Pembayaran</h1>

        <div class="p-4 bg-gray-800 border border-gray-700 shadow-lg rounded-xl">

            <table class="w-full text-gray-300 table-auto">
                <thead>
                    <tr class="text-gray-200 bg-gray-700">
                        <th class="p-3 text-left">Nama Penyewa</th>
                        <th class="p-3 text-left">No Kamar</th>
                        <th class="p-3 text-left">Total Bayar</th>
                        <th class="p-3 text-left">Tanggal</th>
                        <th class="p-3 text-center">Status</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pembayaran as $item)
                        <tr class="transition border-b border-gray-700 hover:bg-gray-700/40">

                            <td class="p-3">
                                {{ $item->booking->user->name ?? '-' }}
                            </td>

                            <td class="p-3">
                                {{ $item->booking->kamar->nomor_kamar ?? '-' }}
                            </td>

                            <td class="p-3">
                                Rp{{ number_format($item->jumlah_bayar) }}
                            </td>

                            <td class="p-3">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}
                            </td>

                            <td class="p-3 text-center">
                                @if ($item->status == 'selesai')
                                    <span class="px-3 py-1 text-sm text-white bg-green-700 rounded-full">
                                        Selesai
                                    </span>
                                @elseif ($item->status == 'batal')
                                    <span class="px-3 py-1 text-sm text-white bg-red-700 rounded-full">
                                        Dibatalkan
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-sm text-gray-900 bg-yellow-400 rounded-full">
                                        Menunggu
                                    </span>
                                @endif
                            </td>

                            <td class="flex justify-center gap-3 p-3">

                                @if ($item->status == 'pending')
                                    {{-- KONFIRMASI --}}
                                    <form action="{{ route('admin.pembayaran.konfirmasi', $item->id) }}" method="POST">
                                        @csrf
                                        <button class="px-3 py-1 text-purple-400 rounded-lg hover:text-purple-300">
                                            Konfirmasi
                                        </button>
                                    </form>

                                    {{-- BATALKAN --}}
                                    <form action="{{ route('admin.pembayaran.batal', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Batalkan pembayaran ini?')">
                                        @csrf
                                        <button class="px-3 py-1 text-red-500 hover:text-red-400">
                                            Batalkan
                                        </button>
                                    </form>
                                @else
                                    <p class="px-3 py-2 text-center text-gray-400 rounded-lg ">
                                        Diverifikasi
                                    </p>
                                @endif

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
@endsection
