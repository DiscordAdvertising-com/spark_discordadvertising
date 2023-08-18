<div x-cloak class=" w-full lg:hidden fixed z-50" x-data="{mobile: false}">

    <i x-cloak class="fa-solid fa-bars text-accent absolute right-4 top-4 text-4xl cursor-pointer" x-show="!mobile"
        @click="mobile = true"></i>
    <i x-cloak class="fa-solid fa-x text-accent absolute right-4 top-4 text-4xl cursor-pointer" x-show="mobile"
        @click="mobile = false"></i>

    <nav class="h-screen bg-sb p-10 px-4 w-[85%] shadow-2xl border-r border-accent border-opacity-10 overflow-hidden overflow-y-auto"
        x-show="mobile">

        <div class="h-full text-3xl p-4 flex flex-col gap-[16px] text-white font-semibold tracking-wide">

            <a href="{{route('home')}}"
                class="flex p-[10px] gap-x-5 h-[50px] w-[50px] w-full rounded cursor-pointer hover:bg-mb ">

                <div class="grid place-items-center w-[30px]">
                    <i class="fa-solid fa-house text-[20px] text-accent px-1 "></i>
                </div>
                <span class="text-lg my-auto leading-tight min-w-[20rem]">Home</span>

            </a>

            <hr class="border-[1px] border-gray-500 border-opacity-40">

            <a wire:click="setAdminPage('botList')"
                class="flex p-[10px] gap-x-5 h-[50px] w-[50px] w-full rounded cursor-pointer @if($page == 'botList') bg-accent @else hover:bg-mb @endif">

                <div class="grid place-items-center w-[30px]">
                    <i
                        class="fa-solid fa-list text-[20px] text-accent px-1 @if($page == 'botList') text-white @endif"></i>
                </div>
                <span class="text-lg   my-auto leading-tight min-w-[20rem]">Bot List</span>

            </a>
        <a  wire:click="setAdminPage('serverList')"
        class="flex p-[10px] gap-x-5 h-[50px] w-[50px] w-full rounded cursor-pointer @if($page == 'serverList') bg-accent @else hover:bg-mb @endif">

            <div class="grid place-items-center w-[30px]">
                <i
                    class="fa-solid fa-list text-[20px] text-accent px-1 @if($page == 'serverList') text-white @endif"></i>
            </div>
            <span class="text-lg hidden group-hover:block  my-auto leading-tight min-w-[20rem]">Server List</span>

        </a>
        </div>

    </nav>
