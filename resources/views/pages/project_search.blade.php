<x-layout>
    <div class="my-20">

        @if ($results->isNotEmpty())
            <p class="text-[30px] font-bold mb-5 text-primary-100">Pencarian Ditemukan</p>
        @else
            <p class="text-[30px] font-bold mb-5 text-primary-100">Pencarian Tidak Ditemukan</p>
        @endif

        <div class="grid grid-cols-4 gap-2 mb-10">
            @foreach ( $results as $result )
                <div class="relative bg-primary-100 w-full h-full rounded-[8px] p-5 text-primary-900 aspect-[111/100]">
                    <div class="relative flex justify-center aspect-[16/9]">
                            <div class="w-[80px] h-[34px] absolute -top-5 -right-5 bg-primary-900 text-primary-100 text-[10px] px-3 py-1 rounded-full shadow-xl/10 flex items-center justify-center">
                                {{ $result->xpKategori->nama_kategori }}
                            </div>
                        <a href="/project/{{ $result->id }}">
                            <img class=" w-full h-full rounded-[4px] bg-primary-600" src="{{ asset($result->thumbnail) }}" alt="proyek-1">
                        </a>
                    </div>
                    <div class="mt-3">
                        <a href="/project/{{ $result->id }}" class="truncate text-[15px] font-semibold hover:underline">{{ $result->nama_karya }}</a>
                    </div>
                    <p class="truncate text-[10px] mt-1">{{ $result->deskripsi }}</p>
                    <div class="flex justify-end">
                        <img class="absolute bottom-4 right-4 w-[20px] h-[20px]" src="{{ asset('img/asset/ic_likes.svg') }}" alt="proyek-1">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>