@extends('layouts.app')

@section('content')
    <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-gray-800 border-b border-gray-700">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-100">Detail Buku</h2>
                <div class="flex space-x-2">
                    <a href="{{ route('books.edit', $book->id) }}"
                        class="px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-800 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition">
                        Edit
                    </a>
                    <form method="POST" action="{{ route('books.destroy', $book->id) }}" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-800 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>

            <div class="bg-gray-700 p-6 rounded-lg shadow-md">
                <dl>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 py-3 border-b border-gray-600">
                        <dt class="text-sm font-medium text-gray-400">Judul</dt>
                        <dd class="text-sm text-gray-100 md:col-span-2">{{ $book->title }}</dd>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 py-3 border-b border-gray-600">
                        <dt class="text-sm font-medium text-gray-400">Penulis</dt>
                        <dd class="text-sm text-gray-100 md:col-span-2">{{ $book->author }}</dd>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 py-3 border-b border-gray-600">
                        <dt class="text-sm font-medium text-gray-400">Tahun Terbit</dt>
                        <dd class="text-sm text-gray-100 md:col-span-2">{{ $book->year }}</dd>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 py-3 border-b border-gray-600">
                        <dt class="text-sm font-medium text-gray-400">Penerbit</dt>
                        <dd class="text-sm text-gray-100 md:col-span-2">{{ $book->publisher ?: '-' }}</dd>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 py-3">
                        <dt class="text-sm font-medium text-gray-400">Deskripsi</dt>
                        <dd class="text-sm text-gray-100 md:col-span-2">{{ $book->description ?: 'Tidak ada deskripsi.' }}
                        </dd>
                    </div>
                </dl>
            </div>

            <div class="mt-6">
                <a href="{{ route('books.index') }}" class="text-indigo-400 hover:text-indigo-300">
                    &larr; Kembali ke daftar buku
                </a>
            </div>
        </div>
    </div>
@endsection