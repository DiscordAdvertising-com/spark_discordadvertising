<nav class="h-[100vh] min-w-[300px] overflow-y-auto bg-dsb border-r border-db z-0 lg:block hidden">
    <div class="  h-[calc(100vh-80px)] p-6 mt-[80px] space-y-8">

        <div class=" flex flex-col gap-y-5">

            <div>
                <h1 class="text-white font-bold text-xs px-3 pb-2">MAIN</h1>
                <ul class="text-gray-200 grid gap-y-1">
                    <a href="{{route('home')}}">
                        <li class="hover:bg-dmb cursor-pointer flex gap-4 text-lg py-2 px-3 rounded-lg"><i class="fa-solid fa-arrow-left text-accent my-auto w-[20px]"></i><h1 class="text-base">Home Page</h1></li>
                    </a>
                    <a href="{{route('dashboard', ['page' => 'premium'])}}" class="hover:bg-dmb  @if($page == 'premium') bg-dmb @endif cursor-pointer flex gap-4 text-lg py-2 px-3 rounded-lg"><i class="fa-solid fa-star text-accent my-auto w-[20px]"></i><h1 class="text-base">Premium</h1></a>
                    <li class="hover:bg-dmb cursor-pointer flex gap-4 text-lg py-2 px-3 rounded-lg"><i class="fa-solid fa-right-from-bracket text-accent my-auto w-[20px]"></i><h1 class="text-base">Logout</h1></li>
                </ul>    
            </div>

                        @if(Auth::check() && Auth::user()->access)
                        <a href="{{route('admin-dashboard')}}">
                        <li class="hover:bg-dmb cursor-pointer flex gap-4 text-lg py-2 px-3 rounded-lg"><i class="fa-solid fa-arrow-left text-accent my-auto w-[20px]"></i><h1 class="text-base">Admin Dashboard</h1></li>
                        @endif
                        </a>


     <hr class="border border-white border-opacity-10">

            <div>
                <h1 class="text-white font-bold text-xs px-3 pb-2">BOT</h1>
                <ul class="text-gray-200 grid gap-y-1">
    
                    <li wire:click="setPage('botUpload')" class="hover:bg-dmb  @if($page == 'botUpload') bg-dmb @endif cursor-pointer flex gap-4 text-lg py-2 px-3 rounded-lg"><i class="fa-solid fa-upload text-accent my-auto w-[20px]"></i><h1 class="text-base">Bot Upload</h1></li>
                    <li wire:click="setPage('botList')" class="hover:bg-dmb  @if($page == 'botList') bg-dmb @endif cursor-pointer flex gap-4 text-lg py-2 px-3 rounded-lg"><i class="fa-solid fa-list text-accent my-auto w-[20px]"></i><h1 class="text-base">My Bots</h1></li>
    
                </ul>
            </div>

            <hr class="border border-white border-opacity-10">

            <div>
                <h1 class="text-white font-bold text-xs px-3 pb-2">SERVER</h1>
                <ul class="text-gray-200 grid gap-y-1">
                    
                    <li wire:click="setPage('serverUpload')" class="hover:bg-dmb  @if($page == 'serverUpload') bg-dmb @endif cursor-pointer flex gap-4 text-lg py-2 px-3 rounded-lg"><i class="fa-solid fa-upload text-accent my-auto w-[20px]"></i><h1 class="text-base">Server Upload</h1></li>
                    <li wire:click="setPage('serverList')" class="hover:bg-dmb  @if($page == 'serverList') bg-dmb @endif cursor-pointer flex gap-4 text-lg py-2 px-3 rounded-lg"><i class="fa-solid fa-list text-accent my-auto w-[20px]"></i><h1 class="text-base">My Servers</h1></li>
                    
                </ul>
            </div>

        </div>

    </div>
</nav>
