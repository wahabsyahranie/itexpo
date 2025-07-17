<div>
    <div class="flex justify-center gap-5 p-8">
        <button wire:click="setCategory(null)" class="h-[34px] px-10 text-[10px] rounded-2xl flex items-center justify-center {{ is_null($selectedCategory) ? 'bg-primary-300 text-primary-100' : 'bg-primary-base text-primary-900' }}">
            Semua
        </button>
        @foreach ($categories as $category)
            <button wire:click="setCategory({{ $category->id }})" class="h-[34px] px-10 text-[10px] rounded-2xl flex items-center justify-center {{ $selectedCategory === $category->id ? 'bg-primary-300 text-primary-100' : 'bg-primary-base text-primary-900' }}">
                {{ $category->nama_kategori }}
            </button>
        @endforeach
    </div>
  
    <div id="recentprojects" class="mx-auto justify-items-center mb-15 mt-8">
        <div class="grid grid-flow-row grid-cols-4 gap-x-15 gap-y-20">
            @foreach ($recentCreations as $creation)
                <div class="relative aspect-[16/9]">
                    <div class="w-[80px] h-[34px] absolute -top-5 -right-3 bg-primary-900 text-primary-100 text-[10px] px-3 py-1 rounded-full shadow-xl/30 flex items-center justify-center">
                        {{ $creation->xpKategori->nama_kategori }}
                    </div>
                    <img class="w-full h-full rounded-md object-fill mb-3" src="{{ asset($creation->thumbnail) }}" alt="content 1">
                    <p class="truncate text-[15px] font-semibold">{{ $creation->nama_karya }}</p>
                    <p class="truncate mt-1 text-[10px]">{{ $creation->deskripsi }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>