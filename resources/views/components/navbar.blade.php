<nav class="grid grid-cols-3 items-center bg-primary-900 px-8 py-4 h-[100px] font-poppins drop-shadow-lg">
    <!-- Kiri: Logo -->
    <div class="flex items-center">
        {{-- <img src="{{ @asset('img/logo.png') }}" alt="Logo" class="w-[57px] h-[57px] block" /> --}}
        <p class="text-[32px] font-bold">IT EXPO</p>
    </div>

    <!-- Tengah: Menu -->
    <ul class="flex justify-center items-center gap-8 text-[20px]">
        <li><a href="/" class="font-bold text-primary-100 hover:text-primary-200 hover:border-b border-primary-200 transition-all duration-300">Home</a></li>
        <li><a href="/#aboutus" class="font-bold text-primary-100 hover:text-primary-200 hover:border-b border-primary-200 transition-all duration-300">About Us</a></li>
        <li><a href="/#recentprojects" class="font-bold text-primary-100 hover:text-primary-200 hover:border-b border-primary-200 transition-all duration-300">Project</a></li>
        <li><a href="/project-likes" class="font-bold text-primary-100 hover:text-primary-200 hover:border-b border-primary-200 transition-all duration-300">Disukai</a></li>
    </ul>

    <!-- Kanan: Search & Profile -->
    <div class="flex justify-end items-center gap-5">
        <div class="relative">
            <form action="/search" method="POST">
                @csrf
                <input class="py-4 pr-12 pl-4 w-[228px] h-[48px] bg-primary-100 rounded-4xl text-primary-900" type="text" name="query" placeholder="Search..." id="query" autocomplete="off">
                <button type="submit">
                    <img class="absolute right-4 top-1/2 -translate-y-1/2 w-5 h-5" src="{{ asset('img/asset/ic_search.svg') }}" alt="search">
                </button>
            </form>
        </div>
        @auth
            @livewire('home-profile')
        @else
            <a href="/login" class="text-[20px] h-[48px] px-5 bg-primary-300 rounded-xl flex items-center hover:bg-primary-100 hover:text-primary-900 transition duration-300 ease-in-out">Login</a>
        @endauth
    </div>
</nav>
