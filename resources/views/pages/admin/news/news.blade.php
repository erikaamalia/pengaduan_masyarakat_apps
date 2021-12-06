@extends('layouts.admin')

@section('title')
News
@endsection


@section('content')
<main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Data Berita
    </h2>
    <div class="my-4 mb-6">
      <a href="{{ route('news.create') }}"
        class="px-5 py-3  font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        Tambah Berita
      </a>
    </div>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }} </li>
            @endforeach
          </ul>
        </div>
        @endif
        <table class="w-full whitespace-pre-line">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">No</th>
              <th class="px-4 py-3">Judul</th>
              <th class="px-4 py-3">Dekripsi</th>
              <th class="px-4 py-3">Foto</th>
              <th class="px-4 py-3">Tanggal</th>
              <th class="px-4 py-3">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach ($news as $no => $item)
            <tr class="text-gray-700 dark:text-gray-400 ">
                <td class="px-4 py-3">
                  {{ $no + $news->firstItem()}}
                </td>

                <td class="px-4 py-3 text-sm">
                  {{ $item->judul}}
                </td>

                <td class="px-4 py-3 text-sm">
                  {{ $item->deskripsi }}
                </td>

                <td class="px-4 py-3 text-sm">
                    <div class="flex items-center text-sm">
                      <!-- Avatar with inset shadow -->
                      <div class="relative hidden mr-3  md:block">
                        <img src="{{ Storage::url($item->image) }}"/>
                      </div>
                    </div>
                </td>

                  <td class="px-4 py-3 text-sm">
                  {{ $item->created_at }}
                </td>

                <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">
                      <a href="{{ route('news.edit', $item->id) }}"
                        class="flex items-center justify-between  text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                        aria-label="Detail">

                        <svg class="w-5 h-5" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M 19.171875 2 C 18.448125 2 17.724375 2.275625 17.171875 2.828125 L 16 4 L 20 8 L 21.171875 6.828125 C 22.275875 5.724125 22.275875 3.933125 21.171875 2.828125 C 20.619375 2.275625 19.895625 2 19.171875 2 z M 14.5 5.5 L 3 17 L 3 21 L 7 21 L 18.5 9.5 L 14.5 5.5 z"/>
                        </svg>
                      </a>

                      <form action="{{ route('news.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus data?')">
                        @csrf
                        @method('delete')
                        <button type="submit"
                          class="flex items-center justify-between  text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                          aria-label="Delete">
                          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                              d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                              clip-rule="evenodd"></path>
                          </svg>
                        </button>
                      </form>
                    </div>
                  </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $news->links() }}
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
