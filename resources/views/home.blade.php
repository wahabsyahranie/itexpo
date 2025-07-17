<x-layout>

    {{-- Banner Utama --}}
    <div id="gambarutama" class="mb-15 pt-15 px-10 w-screen -mx-[calc((100vw-100%)/2)]">
        <div class="w-full h-[500px] bg-gradient-to-l from-primary-300 from-10% to-primary-200 to-90% rounded-3xl">
            <img class="w-full h-[500px] object-cover rounded-3xl" src="{{ @asset('img/asset/expo0.jpg') }}" alt="gambar-utama">
        </div>
    </div>
    
    {{-- Tentang EXPO --}}
    <div id="aboutus" class="mb-15 pt-5">
        <p class="text-center mb-5 text-[50px] font-bold">Apa itu IT EXPO?</p>
        <div class="grid grid-cols-3 gap-4">
            <div class="font-normal h-[186px] place-content-center col-span-2 bg-gradient-to-r from-primary-200 from-10% to-primary-300 to-90% py-5 px-10 rounded-3xl text-white">
                <p class="text-[14px] text-base/8">IT EXPO adalah program kerja dari jurusan Teknologi Informasi Politeknik Negeri Samarinda, yang dijalankan oleh HIMA TI. Program ini sebagai momen untuk mahasiswa TI menunjukkan karya-karya terbaik mereka mulai dari Website, IoT, Film, dan masih banyak lagi. <br>
                Masih penasaran sama IT EXPO? cuss kita explore lebih jauh!</p>
            </div>
            <div class="bg-amber-500 rounded-3xl">
                <img class="w-full h-[186px] rounded-3xl object-cover" src="{{ @asset('img/asset/expo1.jpg') }}" alt="gambar-expo">
            </div>
            <div class="bg-amber-500 rounded-3xl">
                <img class="w-full h-[186px] rounded-3xl object-cover" src="{{ @asset('img/asset/expo2.jpg') }}" alt="gambar-tujuan">
            </div>
            <div class="h-[186px] place-content-center font-normal col-span-2 bg-gradient-to-l from-primary-200 from-10% to-primary-300 to-90% py-5 px-10 rounded-3xl text-white">
                <p class="text-[25px] mb-3">Tujuan</p>
                <p class="text-[14px] text-base/6">Yo Halloo... kenapa sih perlu ada IT EXPO? baik dari pihak Jurusan maupun kami selaku organisasi, kami ingin mahasiswa jurusan TI tidak lagi minder dengan kemampuan mereka, dengan adanya Expo ini kami ingin para mahasiswa dapat dengan berani menunjukkan karya-karya mereka dan memunculkan persaingan antar mahasiswa untuk saling meningkatkan kemampuan mereka.</p>
            </div>
            <div class="h-[186px] place-content-center font-normal col-span-2 bg-gradient-to-r from-primary-300 from-10% to-primary-200 to-90% py-5 px-10 rounded-3xl text-white">
                <p class="text-[14px] text-base/8 italic">Ada sepatah kata dari UI/UX Designer kami loh...<br>
                    “Kreativitas adalah awal dari inovasi. <br>
                    Lihat bagaimana mahasiswa TI mengubah ide menjadi karya nyata.”</p>
            </div>
            <div class="bg-amber-500 rounded-3xl">
                <img class="w-full h-[186px] rounded-3xl object-cover" src="{{ @asset('img/asset/expo3.jpg') }}" alt="gambar-tujuan">
            </div>
        </div>
    </div>

    {{-- Categories --}}
    <div id="categories" class="mb-15 pt-5 w-full max-w-screen-sm mx-auto">
        <p class="text-center mb-10 text-[20px] font-medium">Categories</p>
        <div class="grid grid-flow-col grid-cols justify-items-center text-[15px] font-medium">
            @foreach ($categories as $category )
                <div class="w-[128] h-[128] flex flex-col justify-center items-center aspect-[1/1]">
                    <img class="mb-4" src="{{ @asset($category->gambar_kategori) }}" alt="content 1">
                    <p class="text-center">{{ $category->nama_kategori }}</p>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Recent Projects --}}
    <div id="recentprojects" class="mx-auto justify-items-center mb-15 pt-10">
        <p class="text-center mb-10 text-[20px] font-medium">Recent Projects</p>
        <div class="grid grid-flow-row grid-cols-4 gap-x-15 gap-y-20">
            @foreach ($recentCreations as $creation )
                <div class="relative aspect-[16/9]">
                    {{-- BADGE --}}
                    <div class="w-[80px] h-[34px] absolute -top-5 -right-3 bg-primary-900 text-primary-100 text-[10px] px-3 py-1 rounded-full shadow-xl/30 flex items-center justify-center">
                        {{ $creation->xpKategori->nama_kategori }}
                    </div>

                    {{-- THUMBNAIL --}}
                    <img class="w-full h-full rounded-md object-fill mb-3" src="{{ @asset($creation->thumbnail) }}" alt="content 1">
                    <p class="truncate text-[15px] font-semibold">{{ $creation->nama_karya }}</p>
                    <p class="truncate mt-1 text-[10px]">{{ $creation->deskripsi }}</p>
                </div>
            @endforeach
        </div>
        <div class="mt-10">
            <a href="/project-all" class="underline text-[15px] hover:text-primary-200 transition-all duration-300">Lihat Selengkapnya</a>
        </div>
    </div>
     
    {{-- Berita Terbaru--}}
    <div id="news" class="pt-10 mb-30">
        <p class="text-center mb-10 text-[40px] font-bold">News</p>
        <div class="grid grid-flow-rows grid-cols-5 gap-4">
            @foreach ($news_structured as $news )
                <div class="col-span-2">
                    <div class="grid grid-cols-3 gap-2">
                        @foreach ($news['gambar'] as $gambar )
                            @if ($loop->index === 1)
                                <div class="row-span-2 col-span-2">
                                    <img class="rounded-2xl object-cover w-full h-62" src="{{ @asset($gambar) }}" alt="gambar-1">
                                </div>
                            @else
                                <div class="col-1">
                                    <img class="rounded-2xl object-cover w-full h-30" src="{{ @asset($gambar) }}" alt="gambar-1">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-span-3 flex flex-col justify-center pl-5">
                    <p class="text-[30px] font-semibold mb-2 line-clamp-2">{{ $news['nama_berita'] }}</p>
                    <div class="text-[20px] font-light tracking-[0.5px] line-clamp-2">
                        {!! $news['deskripsi_berita'] !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-layout>