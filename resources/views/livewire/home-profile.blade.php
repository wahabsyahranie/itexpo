<div class="relative h-[57px]" wire:click="hide">
    <div class="relative h-full flex items-center" wire:click.stop>
        <button wire:click="toggle" class="h-[57px] w-[57px] rounded-full overflow-hidden">
            <img src="{{ asset(auth()->user()->xpUserExpo->foto_profile) }}"
                 alt="Profile"
                 class="w-full h-full object-cover rounded-full" />
        </button>

        @if ($show)
            <div class="absolute right-0 top-full mt-2 w-40 bg-primary-100 rounded-md shadow-lg border border-gray-200 z-50 transition-all duration-200 ease-in-out" wire:click.stop>
                <ul class="text-sm text-gray-700">
                    <li>
                        <a href="{{ url('/itexpo') }}" class="block px-4 py-2 hover:bg-gray-100 w-full text-left" wire:click="hide">
                            My Panel
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</div>
