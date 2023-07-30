<nav class="h-[100vh] min-w-[300px] overflow-y-auto bg-dsb border-r border-db z-0 lg:block hidden">
    <div class="  h-[calc(100vh-80px)] p-6 mt-[80px] space-y-8">

        <div>
            <h1 class="text-white font-bold text-xs px-3">MAIN</h1>
            <ul class="text-gray-200 mt-4 grid gap-y-1">
                <a href="{{route('home')}}">
                    <li class="hover:bg-dmb cursor-pointer flex gap-4 text-lg py-2 px-3 rounded-lg"><i class="fa-solid fa-arrow-left text-accent my-auto w-[20px]"></i><h1 class="text-base">Home Page</h1></li>
                </a>
                <li wire:click="setPage('upload')" class="hover:bg-dmb  @if($page == 'upload') bg-dmb @endif cursor-pointer flex gap-4 text-lg py-2 px-3 rounded-lg"><i class="fa-solid fa-upload text-accent my-auto w-[20px]"></i><h1 class="text-base">Upload</h1></li>
                <li wire:click="setPage('botList')" class="hover:bg-dmb  @if($page == 'botList') bg-dmb @endif cursor-pointer flex gap-4 text-lg py-2 px-3 rounded-lg"><i class="fa-solid fa-list text-accent my-auto w-[20px]"></i><h1 class="text-base">My Bots</h1></li>
                <li wire:click="setPage('premium')" class="hover:bg-dmb  @if($page == 'premium') bg-dmb @endif cursor-pointer flex gap-4 text-lg py-2 px-3 rounded-lg"><i class="fa-solid fa-star text-accent my-auto w-[20px]"></i><h1 class="text-base">Premium</h1></li>
                {{-- <a href="{{route('logout')}}"> --}}
                    <li class="hover:bg-dmb cursor-pointer flex gap-4 text-lg py-2 px-3 rounded-lg"><i class="fa-solid fa-right-from-bracket text-accent my-auto w-[20px]"></i><h1 class="text-base">Logout</h1></li>
                {{-- </a> --}}

            </ul>
        </div>

    </div>
</nav>