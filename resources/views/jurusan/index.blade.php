<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jurusan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6 text-gray-900">
                    <a href="{{ route('jurusan.create') }}">
                        <x-primary-button type='submit'>
                            Tambah
                        </x-primary-button>
                    </a>
                </div>

                <table class="table-fixed w-full border-collapse border border-gray-300 text-center align-center">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $p)
                            <tr>
                                <td class="border border-gray-300">{{ $loop->iteration }}</td>
                                <td class="border border-gray-300">{{ $p->name }}</td>
                                <td class="border border-gray-300 flex gap-2 justify-center">
                                    <form method="get" action="{{ route('jurusan.edit', $p->id) }}">
                                        <x-primary-button type='submit'>
                                            Edit
                                        </x-primary-button>
                                    </form>
                                    <form action="{{ route('jurusan.destroy', $p->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button type="submit" onclick="return confirm('Are you sure?')">
                                            Delete
                                        </x-danger-button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
