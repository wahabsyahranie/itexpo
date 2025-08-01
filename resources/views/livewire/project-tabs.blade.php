<div>
    {{-- PROJECT DETAIL --}}
    <div class="flex gap-x-10 h-[532px] gap-y-5 my-10">

        {{-- KIRI CARD --}}
        <div class="flex-auto flex flex-col gap-y-5">
            <div class=" w-full h-[337px] rounded-xl overflow-hidden">
                {{-- @php
                    dd($project)
                @endphp --}}
                <iframe
                    class="w-full h-full rounded-xl"
                    src="https://www.youtube.com/embed/{{ $project->video_promosi }}"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
            <div class="flex flex-row gap-x-3">
                <div class=" w-full h-[190px] rounded-xl">
                    <img class="w-full h-[190px] object-cover rounded-xl" src="{{ @asset($project->banner) }}" alt="banner">
                </div>
                <div class=" w-full h-[190px] rounded-xl">
                    <img class="w-full h-[190px] object-cover rounded-xl" src="{{ @asset($project->poster) }}" alt="poster">
                </div>
                <div class=" w-full h-[190px] rounded-xl">
                    <img class="w-full h-[190px] object-cover rounded-xl" src="{{ @asset($project->thumbnail) }}" alt="thumbnail">
                </div>
            </div>
        </div>

        {{-- KANAN CARD - DETAIL --}}
        <div class="flex-none w-[557px] h-full flex flex-col gap-y-5">
            
            {{-- JUDUL DAN TAHUN DIBUAT --}}
            <div class="p-3 bg-primary-100 text-primary-900 flex flex-row items-center justify-items-center rounded-2xl">
                <div class="flex flex-col w-full m-2">
                    <p class="text-[12px] text-primary-base">{{ $project->created_at->year }}</p>
                    <p class="text-[18px] font-medium">{{ $project->nama_karya }}</p>
                </div>
                <div class="">
                    <img src="{{ @asset('img/asset/ic_loves.svg') }}" alt="loves">
                </div>
            </div>

            {{-- DESKRIPSI KARYA --}}
            <div class="p-3 w-full h-full bg-primary-100 rounded-[21px] overflow-auto text-primary-900">

                {{-- TAB DESKRIPSI DAN PROFILE --}}
                <div class="w-full h-[70px] bg-primary-900 flex flex-row gap-3 p-2 rounded-[18px]">
                    <button wire:click="setTab('desc')" class="w-full h-full flex items-center justify-center {{ $tab === 'desc' ? 'bg-primary-100 text-primary-900 rounded-2xl' : 'text-primary-100' }}">
                        Description
                    </button>
                    <button wire:click="setTab('profile')" class="w-full h-full flex items-center justify-center {{ $tab === 'profile' ? 'bg-primary-100 text-primary-900 rounded-2xl' : 'text-primary-100' }}">
                        Profile Anggota
                    </button>
                </div>
                <div class="m-2">

                    {{-- DESCRIPTION --}}
                    @if ($tab === 'desc')
                        <div class="transition-all">
                            {{ $project->deskripsi }}
                        </div>

                    {{-- USER PROFILE --}}
                    @elseif ( $tab === 'profile')
                        <div class="flex flex-col gap-2 mx-3">
                            @foreach ($project->xpTeam->xpAnggotaTeams as $anggota)
                                <div class="bg-primary-base w-full h-[105px] rounded-full">
                                    <div class="w-full h-full flex flex-auto flex-row text-primary-900 items-center">
                                        <div class="w-[150px] flex items-center justify-center">
                                            <img src="{{ @asset($anggota->xpUserExpo->foto_profile) }}" alt="anggota" class="w-[95px] h-[95px] object-cover rounded-full">
                                        </div>
                                        <div class="mx-5 w-full h-full relative flex flex-col justify-center">
                                            @if ($anggota->xpUserExpo->user_id === $project->xpTeam->user_id)
                                                <p class="text-[15px] font-bold text-primary-300">Ketua</p>
                                            @else
                                                <p class="text-[15px] font-bold text-primary-300">Anggota</p>
                                            @endif
                                            <p class="text-[15px] font-medium">{{ $anggota->xpUserExpo->username }}</p>
                                            <button wire:click="openModal({{ $anggota->xpUserExpo->id }})" class="absolute bottom-3 right-8 flex items-end text-[10px] text-primary-300 hover:text-primary-300 hover:underline">
                                                Info Lainnya
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        {{-- MODAL --}}
                        @if ($showModal && $selectedAnggota)
                            <div class="fixed inset-0 flex flex-col items-center justify-center bg-black/50 z-50" wire:click="closeModal">
                                <div wire:click.stop class="flex flex-row justify-between w-[600px] py-5 px-15 rounded-t-2xl shadow-lg relative bg-primary-900">
                                    <p class="text-primary-100">Profil Anggota</p>
                                    {{-- <button wire:click='closeModal'>Close</button> --}}
                                </div>
                                <div wire:click.stop class="w-[600px] py-10 px-15 rounded-b-2xl shadow-lg relative bg-primary-100 text-primary-900">
                                    <div class="flex flex-row gap-10 items-center">
                                        <div class="h-[157px] min-w-[157px]">
                                            <img src="{{ @asset($selectedAnggota->xpUserExpo->foto_profile) }}" alt="picture" class="h-[157px] w-[157px] rounded-full object-cover">
                                        </div>
                                        <div class="space-y-2">
                                            <div class="pb-1 border-b border-gray-300">
                                                <p class="text-[12px] font-bold text-primary-base">Nama</p>
                                                <p class="text-[15px]">{{ $selectedAnggota->xpUserExpo->user->name }}</p>
                                            </div>

                                            <div class="pb-1 border-b border-gray-300">
                                                <p class="text-[12px] font-bold text-primary-base">Prodi / Angkatan</p>
                                                @if ($selectedAnggota->xpUserExpo->user->mahasiswa->prodi == 'ti')
                                                    <p class="text-[15px] capitalize"> Teknik Informatika / {{ $selectedAnggota->xpUserExpo->user->mahasiswa->tahun_masuk }}</p>
                                                @elseif ($selectedAnggota->xpUserExpo->user->mahasiswa->prodi == 'tk')
                                                    <p class="text-[15px] capitalize"> Teknik Komputer / {{ $selectedAnggota->xpUserExpo->user->mahasiswa->tahun_masuk }}</p>
                                                @elseif ($selectedAnggota->xpUserExpo->user->mahasiswa->prodi == 'tim')
                                                    <p class="text-[15px] capitalize"> Teknik Informatika Multimedia / {{ $selectedAnggota->xpUserExpo->user->mahasiswa->tahun_masuk }}</p>
                                                @elseif ($selectedAnggota->xpUserExpo->user->mahasiswa->prodi == 'trk')
                                                    <p class="text-[15px] capitalize"> Teknologi Rekayasa Komputer / {{ $selectedAnggota->xpUserExpo->user->mahasiswa->tahun_masuk }}</p>
                                                @endif
                                            </div>

                                            <div class="pb-1 border-b border-gray-300">
                                                <p class="text-[12px] font-bold text-primary-base">NIM</p>
                                                <p class="text-[15px]">{{ $selectedAnggota->xpUserExpo->user->mahasiswa->nim }}</p>
                                            </div>

                                            <div>
                                                <p class="text-[12px] font-bold text-primary-base">Sosial Media</p>
                                                <div class="flex flex-row gap-3 mt-1">
                                                    <a href="https://wa.me/+62{{ $selectedAnggota->xpUserExpo->whatsapp }}" target="_blank" rel="noopener noreferrer">
                                                        <img src="{{ @asset('img/asset/ic_whatsapp.svg') }}" alt="picture" class="h-[24px] object-cover"></a>
                                                    <a href="https://www.instagram.com/{{ $selectedAnggota->xpUserExpo->instagram }}" target="_blank" rel="noopener noreferrer">
                                                        <img src="{{ @asset('img/asset/ic_instagram.svg') }}" alt="picture" class="h-[24px] object-cover"></a>
                                                    <a href="https://www.linkedin.com/in/{{ $selectedAnggota->xpUserExpo->linkedin }}" target="_blank" rel="noopener noreferrer">
                                                        <img src="{{ @asset('img/asset/ic_linkedin.svg') }}" alt="picture" class="h-[24px] object-cover"></a>
                                                    <a href="https://github.com/{{ $selectedAnggota->xpUserExpo->github }}" target="_blank" rel="noopener noreferrer">
                                                        <img src="{{ @asset('img/asset/ic_github.svg') }}" alt="picture" class="h-[24px] object-cover"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- OTHER PROJECT --}}
    <div class="mt-25 mb-25">
        <p class="text-[40px] font-medium">Other Exhibitions</p>
        <div id="recentprojects" class="mx-auto justify-items-center mb-15 pt-10">
            <div class="grid grid-flow-row grid-cols-4 gap-x-15 gap-y-20">
                {{-- @foreach ($recentCreations as $creation ) --}}
                @foreach ($karyas as $karya)
                    <div class="relative aspect-[16/9]">
                        {{-- BADGE --}}
                        <div class="w-[80px] h-[34px] absolute -top-5 -right-3 bg-primary-900 text-primary-100 text-[10px] px-3 py-1 rounded-full shadow-xl/30 flex items-center justify-center">
                            {{ $karya->xpKategori->nama_kategori }}
                        </div>

                        {{-- THUMBNAIL --}}
                        <img class="w-full h-full rounded-md object-fill mb-3" src="{{ @asset($karya->thumbnail) }}" alt="content 1">
                        <p class="truncate text-[15px] font-semibold">{{ $karya->nama_karya }}</p>
                        <p class="truncate mt-1 text-[10px]">{{ $karya->deskripsi }}</p>
                    </div>
                @endforeach
                {{-- @endforeach --}}
            </div>
            <div class="mt-10">
                <a href="/project-all" class="underline text-[15px] hover:text-primary-200 transition-all duration-300">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>
</div>