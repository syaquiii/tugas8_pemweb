@extends('layouts.app')

@section('content')
    <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-gray-800 border-b border-gray-700">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-100">Daftar Buku</h2>
                <a href="{{ route('books.create') }}"
                    class="px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-800 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition">
                    Tambah Buku
                </a>
            </div>

            @if($books->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead class="bg-gray-700">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Judul
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Penulis</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Tahun
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                    Penerbit</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-800 divide-y divide-gray-700">
                            @foreach($books as $book)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-100">{{ $book->title }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-300">{{ $book->author }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-300">{{ $book->year }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-300">{{ $book->publisher ?: '-' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('books.show', $book->id) }}"
                                                class="text-blue-400 hover:text-blue-300">
                                                Detail
                                            </a>
                                            <a href="{{ route('books.edit', $book->id) }}"
                                                class="text-indigo-400 hover:text-indigo-300">
                                                Edit
                                            </a>
                                            <form method="POST" action="{{ route('books.destroy', $book->id) }}"
                                                class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-400 hover:text-red-300"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $books->links() }}
                </div>
            @else
                <div class="bg-gray-700 rounded-md p-4">
                    <p class="text-gray-300">Belum ada buku yang ditambahkan.</p>
                </div>
            @endif
        </div>
    </div>
@endsection