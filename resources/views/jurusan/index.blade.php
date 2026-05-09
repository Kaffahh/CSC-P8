<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Jurusan') }}
                </h2>
            </div>
            <a href="{{ route('jurusan.create') }}"
                class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Tambah Jurusan
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
            @if (session('error'))
                <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700 shadow-sm">
                    {{ session('error') }}
                </div>
            @endif

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-base font-semibold uppercase tracking-wider text-gray-500">No.</th>
                                <th class="px-6 py-3 text-center text-base font-semibold uppercase tracking-wider text-gray-500">Nama</th>
                                <th class="px-6 py-3 text-center text-base font-semibold uppercase tracking-wider text-gray-500">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @forelse ($datas as $p)
                                <tr class="hover:bg-gray-50">
                                    <td class="whitespace-nowrap px-6 py-4 text-base text-gray-900">{{ $loop->iteration }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-base text-center font-medium text-gray-900">{{ $p->name }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-base text-center">
                                        <div class="flex flex-wrap items-center justify-center gap-3">
                                            <a href="{{ route('jurusan.edit', $p->id) }}"
                                                class="inline-flex items-center rounded-md border border-gray-300 bg-white px-3 py-2 text-xs font-semibold uppercase tracking-widest text-gray-700 shadow-base transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                                Edit
                                            </a>

                                            <form action="{{ route('jurusan.destroy', $p->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus jurusan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button>
                                                    Hapus
                                                </x-danger-button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-12 text-center text-base text-gray-500">
                                        Belum ada data jurusan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
