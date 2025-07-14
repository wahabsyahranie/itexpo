<x-layout>

    {{-- Banner Utama --}}
    <div id="gambarutama" class="mb-10 mt-5">
        <div class="w-full h-[500px] bg-gradient-to-l from-primary-900 from-10% to-primary-700 to-90% rounded-3xl">
            <img src="#" alt="gambar-utama">
        </div>
    </div>

    {{-- Tentang EXPO --}}
    <div id="aboutus" class="mb-10">
        {{-- <p class="text-center mb-5">Tentang Expo</p> --}}
        <div class="grid grid-cols-3 gap-4">
            <div class="font-normal col-span-2 bg-gradient-to-r from-primary-900 from-10% to-primary-700 to-90% p-10 rounded-3xl text-white">
                <p class="text-[25px] mb-3">Apa itu IT EXPO</p>
                <p class="text-[14px] text-base/8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aspernatur harum dolores ea! Itaque quidem sit error quos, ducimus corrupti quia repellendus! Possimus laboriosam tenetur quidem ipsum officiis nulla excepturi!</p>
            </div>
            <div class="bg-amber-500 rounded-3xl">
                <img src="#" alt="gambar-expo">
            </div>
            <div class="bg-amber-500 rounded-3xl">
                <img src="#" alt="gambar-latar-belakang">
            </div>
            <div class="font-normal col-span-2 bg-gradient-to-l from-primary-900 from-10% to-primary-700 to-90% p-10 rounded-3xl text-white">
                <p class="text-[25px] mb-3">Latar Belakang</p>
                <p class="text-[14px] text-base/8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aspernatur harum dolores ea! Itaque quidem sit error quos, ducimus corrupti quia repellendus! Possimus laboriosam tenetur quidem ipsum officiis nulla excepturi!</p>
            </div>
            <div class="font-normal col-span-2 bg-gradient-to-r from-primary-900 from-10% to-primary-700 to-90% p-10 rounded-3xl text-white">
                <p class="text-[25px] mb-3">Tujuan</p>
                <p class="text-[14px] text-base/8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aspernatur harum dolores ea! Itaque quidem sit error quos, ducimus corrupti quia repellendus! Possimus laboriosam tenetur quidem ipsum officiis nulla excepturi!</p>
            </div>
            <div class="bg-amber-500 rounded-3xl">
                <img src="#" alt="gambar-tujuan">
            </div>
        </div>
    </div>

    {{-- Categories --}}
    <div id="categories" class="w-full max-w-screen-sm mx-auto">
        <p class="text-center mb-5 text-[20px] font-medium">Categories</p>
        <div class="grid grid-flow-col grid-cols gap-0 justify-items-center text-[15px] font-medium">
            <div class="w-30 h-25">
                <img class="rounded-md object-fill mb-2" src="{{ @asset('thumbnail/01JZZNX06AYF6FVX0WP74AKXPW.png') }}" alt="content 1">
                <p class="text-center">Website</p>
            </div>
            <div class="w-30 h-25">
                <img class="rounded-md object-fill mb-2" src="{{ @asset('thumbnail/01JZZNX06AYF6FVX0WP74AKXPW.png') }}" alt="content 1">
                <p class="text-center">Film</p>
            </div>
            <div class="w-30 h-25">
                <img class="rounded-md object-fill mb-2" src="{{ @asset('thumbnail/01JZZNX06AYF6FVX0WP74AKXPW.png') }}" alt="content 1">
                <p class="text-center">IoT</p>
            </div>
            <div class="w-30 h-25">
                <img class="rounded-md object-fill mb-2" src="{{ @asset('thumbnail/01JZZNX06AYF6FVX0WP74AKXPW.png') }}" alt="content 1">
                <p class="text-center">Jaringan</p>
            </div>
        </div>
    </div>

    {{-- Recent Projects --}}
    <div id="recentprojects" class="mt-20">
        <p class="text-center mb-5 text-[20px] font-medium">Recent Projects</p>
        <div class="grid grid-flow-row grid-cols-4 gap-10">
            <div class="w-full">
                <img class="w-full h-[200px] rounded-md object-fill mb-3" src="{{ @asset('thumbnail/01JZZNX06AYF6FVX0WP74AKXPW.png') }}" alt="content 1">
                <p class="text-[15px] font-semibold">Judul</p>
                <p class="truncate mt-1 text-[10px]">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus dolorem ab voluptas libero. Temporibus, molestias odio eius similique maxime totam sequi ullam voluptas aut, laborum asperiores veritatis a vero quae!</p>
            </div>
            <div class="w-full">
                <img class="w-full h-[200px] rounded-md object-fill mb-3" src="{{ @asset('thumbnail/01JZZNX06AYF6FVX0WP74AKXPW.png') }}" alt="content 1">
                <p class="text-[15px] font-semibold">Judul</p>
                <p class="truncate mt-1 text-[10px]">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus dolorem ab voluptas libero. Temporibus, molestias odio eius similique maxime totam sequi ullam voluptas aut, laborum asperiores veritatis a vero quae!</p>
            </div>
            <div class="w-full">
                <img class="w-full h-[200px] rounded-md object-fill mb-3" src="{{ @asset('thumbnail/01JZZNX06AYF6FVX0WP74AKXPW.png') }}" alt="content 1">
                <p class="text-[15px] font-semibold">Judul</p>
                <p class="truncate mt-1 text-[10px]">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus dolorem ab voluptas libero. Temporibus, molestias odio eius similique maxime totam sequi ullam voluptas aut, laborum asperiores veritatis a vero quae!</p>
            </div>
            <div class="w-full">
                <img class="w-full h-[200px] rounded-md object-fill mb-3" src="{{ @asset('thumbnail/01JZZNX06AYF6FVX0WP74AKXPW.png') }}" alt="content 1">
                <p class="text-[15px] font-semibold">Judul</p>
                <p class="truncate mt-1 text-[10px]">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus dolorem ab voluptas libero. Temporibus, molestias odio eius similique maxime totam sequi ullam voluptas aut, laborum asperiores veritatis a vero quae!</p>
            </div>
            <div class="w-full">
                <img class="w-full h-[200px] rounded-md object-fill mb-3" src="{{ @asset('thumbnail/01JZZNX06AYF6FVX0WP74AKXPW.png') }}" alt="content 1">
                <p class="text-[15px] font-semibold">Judul</p>
                <p class="truncate mt-1 text-[10px]">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus dolorem ab voluptas libero. Temporibus, molestias odio eius similique maxime totam sequi ullam voluptas aut, laborum asperiores veritatis a vero quae!</p>
            </div>
            <div class="w-full">
                <img class="w-full h-[200px] rounded-md object-fill mb-3" src="{{ @asset('thumbnail/01JZZNX06AYF6FVX0WP74AKXPW.png') }}" alt="content 1">
                <p class="text-[15px] font-semibold">Judul</p>
                <p class="truncate mt-1 text-[10px]">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus dolorem ab voluptas libero. Temporibus, molestias odio eius similique maxime totam sequi ullam voluptas aut, laborum asperiores veritatis a vero quae!</p>
            </div>
            <div class="w-full">
                <img class="w-full h-[200px] rounded-md object-fill mb-3" src="{{ @asset('thumbnail/01JZZNX06AYF6FVX0WP74AKXPW.png') }}" alt="content 1">
                <p class="text-[15px] font-semibold">Judul</p>
                <p class="truncate mt-1 text-[10px]">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus dolorem ab voluptas libero. Temporibus, molestias odio eius similique maxime totam sequi ullam voluptas aut, laborum asperiores veritatis a vero quae!</p>
            </div>
            <div class="w-full">
                <img class="w-full h-[200px] rounded-md object-fill mb-3" src="{{ @asset('thumbnail/01JZZNX06AYF6FVX0WP74AKXPW.png') }}" alt="content 1">
                <p class="text-[15px] font-semibold">Judul</p>
                <p class="truncate mt-1 text-[10px]">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus dolorem ab voluptas libero. Temporibus, molestias odio eius similique maxime totam sequi ullam voluptas aut, laborum asperiores veritatis a vero quae!</p>
            </div>
        </div>
        <div class="mt-10">
            <a href="#" class="underline text-[15px] hover:text-primary-600 transition-all duration-300">Lihat Selengkapnya</a>
        </div>
    </div>
     
    {{-- Berita Terbaru--}}
    <div id="beritaterbaru" class="mt-30 mb-30">
        <p class="text-center mb-5 text-[20px] font-medium">Recent News</p>
        <div class="grid grid-flow-rows grid-cols-5 gap-4">
            <div class="col-span-2">
                <div class="grid grid-cols-3 gap-2">
                    <div class="col-1">
                        <img class="rounded-2xl object-cover w-full h-30" src="{{ @asset('thumbnail/01JZZNX06AYF6FVX0WP74AKXPW.png') }}" alt="gambar-1">
                    </div>
                    <div class="row-span-2 col-span-2">
                        <img class="rounded-2xl object-cover w-full h-62" src="{{ @asset('thumbnail/01JZZNX06AYF6FVX0WP74AKXPW.png') }}" alt="gambar-2">
                    </div>
                    <div class="col-1">
                        <img class="rounded-2xl object-cover w-full h-30" src="{{ @asset('thumbnail/01JZZNX06AYF6FVX0WP74AKXPW.png') }}" alt="gambar-3">
                    </div>
                </div>
            </div>
            <div class="col-span-3 flex flex-col justify-center">
                <p class="text-[30px] font-semibold mb-2">5 Mahasiswa Lolos Pendanaan PKM</p>
                <p class="text-[20px] font-light tracking-[0.5px]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur quis repellat odio molestiae nam iusto? Magni explicabo natus vitae eos eum! In totam alias consectetur praesentium nulla voluptate quis nihil.</p>
            </div>
        </div>
    </div>

</x-layout>