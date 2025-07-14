<x-layout>

    {{-- Banner Utama --}}
    <div id="gambarutama" class="mb-15 pt-15 px-10 w-screen -mx-[calc((100vw-100%)/2)]">
        <div class="w-full h-[500px] bg-gradient-to-l from-primary-300 from-10% to-primary-200 to-90% rounded-3xl">
            <img src="#" alt="gambar-utama">
        </div>
    </div>
    
    {{-- Tentang EXPO --}}
    <div id="aboutus" class="mb-15 pt-5">
        <p class="text-center mb-5 text-[50px] font-bold">Apa itu IT EXPO?</p>
        <div class="grid grid-cols-3 gap-4">
            <div class="font-normal h-[186px] place-content-center col-span-2 bg-gradient-to-r from-primary-200 from-10% to-primary-300 to-90% py-5 px-10 rounded-3xl text-white">
                <p class="text-[14px] text-base/8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aspernatur harum dolores ea! Itaque quidem sit error quos, ducimus corrupti quia repellendus! Possimus laboriosam tenetur quidem ipsum officiis nulla excepturi!</p>
            </div>
            <div class="bg-amber-500 rounded-3xl">
                <img src="#" alt="gambar-expo">
            </div>
            <div class="bg-amber-500 rounded-3xl">
                <img src="#" alt="gambar-latar-belakang">
            </div>
            <div class="h-[186px] place-content-center font-normal col-span-2 bg-gradient-to-l from-primary-200 from-10% to-primary-300 to-90% py-5 px-10 rounded-3xl text-white">
                <p class="text-[25px] mb-3">Tujuan</p>
                <p class="text-[14px] text-base/8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto aspernatur harum dolores ea! Itaque quidem sit error quos, ducimus corrupti quia repellendus! Possimus laboriosam tenetur quidem ipsum</p>
            </div>
            <div class="h-[186px] place-content-center font-normal col-span-2 bg-gradient-to-r from-primary-300 from-10% to-primary-200 to-90% py-5 px-10 rounded-3xl text-white">
                <p class="text-[14px] text-base/8 italic">“Kreativitas adalah awal dari inovasi. <br>
                    Lihat bagaimana mahasiswa TI mengubah ide menjadi karya nyata.”</p>
            </div>
            <div class="bg-amber-500 rounded-3xl">
                <img src="#" alt="gambar-tujuan">
            </div>
        </div>
    </div>

    {{-- Categories --}}
    <div id="categories" class="mb-15 pt-5 w-full max-w-screen-sm mx-auto">
        <p class="text-center mb-10 text-[20px] font-medium">Categories</p>
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
    <div id="recentprojects" class="mx-auto justify-items-center mb-15 pt-10">
        <p class="text-center mb-10 text-[20px] font-medium">Recent Projects</p>
        <div class="grid grid-flow-row grid-cols-4 gap-x-15 gap-y-20">
            @php
                $rows = 8;
            @endphp
            @for ($i = 0; $i < $rows; $i++)
                <div class="aspect-[16/9]">
                    <img class="w-full h-full rounded-md object-fill mb-3" src="{{ @asset('thumbnail/01JZZNX06AYF6FVX0WP74AKXPW.png') }}" alt="content 1">
                    <p class="truncate text-[15px] font-semibold">Judul 1</p>
                    <p class="truncate mt-1 text-[10px]">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus dolorem ab voluptas libero. Temporibus, molestias odio eius similique maxime totam sequi ullam voluptas aut, laborum asperiores veritatis a vero quae!</p>
                </div>
            @endfor
        </div>
        <div class="mt-10">
            <a href="#" class="underline text-[15px] hover:text-primary-200 transition-all duration-300">Lihat Selengkapnya</a>
        </div>
    </div>
     
    {{-- Berita Terbaru--}}
    <div id="news" class="pt-10 mb-30">
        <p class="text-center mb-10 text-[20px] font-medium">News</p>
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
            <div class="col-span-3 flex flex-col justify-center pl-5">
                <p class="text-[30px] font-semibold mb-2">5 Mahasiswa Lolos Pendanaan PKM</p>
                <p class="text-[20px] font-light tracking-[0.5px]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur quis repellat odio molestiae nam iusto? Magni explicabo natus vitae eos eum! In totam alias consectetur praesentium nulla voluptate quis nihil.</p>
            </div>
        </div>
    </div>

</x-layout>