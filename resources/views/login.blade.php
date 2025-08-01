<x-layout>

    <form action="/login" method="POST">
        @csrf
        <div class="mt-30">

            {{-- MAIN --}}
            <div class="relative my-auto mx-auto bg-primary-base w-[424px] h-[330px] rounded-[30px] shadow-xl/30 overflow-visible z-10">

                {{-- ICON --}}
                <div class="w-[160px] h-[160px] absolute -top-20 left-1/2 -translate-x-1/2 bg-primary-100 text-primary-100 text-[10px] px-3 py-1 rounded-full flex items-center justify-center">
                    <img class="w-[70px] h-[76.67px]" src="{{ @asset('img/asset/ic_user_black.svg') }}" alt="user_black">
                </div>

                {{-- INPUT --}}
                <div class="flex flex-col gap-y-2.5 pt-28">
                    <div class="flex flex-row mx-auto">
                        <div class="flex flex-items-center my-auto px-3 w-[50px] h-[50px] bg-primary-900">
                            <img src="{{ @asset('img/asset/ic_person.svg') }}" alt="user" class="w-[25px]">
                        </div>
                        <input @error('email') is-invalid @enderror type="email" name="email" class="my-auto px-3 bg-primary-100 w-[300px] h-[50px] text-primary-900" placeholder="Email" id="email" autofocus required value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <div class="px-9 text-red-500 text-[10px]">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="flex flex-row mx-auto">
                        <div class="flex flex-items-center my-auto px-3 w-[50px] h-[50px] bg-primary-900">
                            <img src="{{ @asset('img/asset/ic_lock.svg') }}" alt="user" class="w-[25px]">
                        </div>
                        <input type="password" name="password" class="my-auto px-3 bg-primary-100 w-[300px] h-[50px] text-primary-900" placeholder="Password" id="password" required>
                    </div>
                </div>

                {{-- ACTION --}}
                <div class="flex justify-between px-9 text-[10px] pt-10">
                    <div class="flex items-center gap-2 text-primary-900">
                        <input type="checkbox" id="remember" class="w-[12px] h-[12px]">
                        <label for="remember">Remember Me</label>
                    </div>
                    <div class="text-primary-900">
                        <a class="hover:underline hover:text-primary-300" href="#">Forgot Password?</a>
                    </div>
                </div>
            </div>

            {{-- SUBMIT --}}
            <div class="w-[327px] h-[60px] mx-auto z-0 flex justify-center items-center">
                <button type="submit" class="w-full h-full rounded-b-[30px] bg-primary-base text-primary-100 text-[20px] uppercase flex items-center justify-center shadow-md hover:bg-primary-300 hover:shadow-xl cursor-pointer transition duration-300 ease-in-out">
                    Login
                </button>
            </div>

        </div>
    </form>

</x-layout>