<x-layout>
    <div class="my-20">
        <p class="text-[30px] font-bold mb-5 text-primary-100">My Projects</p>
        <div class="grid grid-cols-4 gap-2 mb-10">
            @php
                $rows = 8;
            @endphp
            @for ($i = 0; $i < $rows; $i++)
                <div class="relative bg-primary-100 w-full h-full rounded-[8px] p-4 text-primary-900 aspect-[111/100]">
                    <div class="flex justify-center aspect-[16/9]">
                        <img class=" w-full h-full rounded-[4px] bg-primary-600" src="{{ asset('thumbnail/01JZZNX06AYF6FVX0WP74AKXPW.png') }}" alt="proyek-1">
                    </div>
                    <p class="truncate text-[15px] font-semibold mt-2">Judul</p>
                    <p class="truncate text-[10px] mt-1">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro qui provident ex consequuntur culpa quas ipsa iste voluptatibus vero! Officia inventore animi dolore voluptate. Exercitationem quibusdam consequuntur corporis accusamus error!</p>
                    <div class="flex justify-end">
                        <img class="absolute bottom-4 right-4 w-[20px] h-[20px] rounded-2xl" src="{{ asset('thumbnail/01JZZNX06AYF6FVX0WP74AKXPW.png') }}" alt="proyek-1">
                    </div>
                </div>
            @endfor
        </div>
    </div>
</x-layout>