<div x-data="{search: false, tags: false}">
    <h1 class="mt-10 text-gray-500 mb-4 text-lg border-b lg:w-[45rem] border-gray-500 border-opacity-40 pb-2 hidden md:block"> <li class="fa-solid fa-tags mr-1 text-accent"></li>Tags</h1>
    <div class=" gap-x-8 gap-y-5 lg:w-[45rem] flex-wrap lg:h-[136px] overflow-hidden relative hidden md:flex">
        <li class="fa-solid fa-arrow-down text-accent absolute right-0 top-1/2 -translate-y-1/2 text-lg cursor-pointer" @click="tags = true"></li>
        <div class="border-2 border-db bg-dsb px-4 py-3 text-xl  font-bold min-w-[5rem] text-center hover:text-accent cursor-pointer @if($filter == null) text-accent @else text-gray-500 @endif" wire:click="filter('all')">
            All <span class="text-opacity-50 text-gray-500 text-[0.9rem] ">({{count($bots)}})</span>
        </div>
        @foreach ($tags as $tag)
            @php
                $name = $tag['name'];
            @endphp
            <div class="border-2 border-db bg-dsb px-4 py-3 text-xl font-bold min-w-[5rem] text-center hover:text-accent cursor-pointer @if($filter == $name) text-accent @else text-gray-500 @endif" wire:click="filter(`{{$tag['name']}}`)">
                {{$tag['name']}} <span class="text-opacity-50 text-gray-500 text-[0.9rem] ">({{count($tag->bots)}})</span>
            </div>
        @endforeach
    </div>
    <div class="relative z-40 lg:w-[45rem] mt-5" @click.away="tags = false" x-show="tags">
        <div class="w-full h-fit top-0 rounded-lg border border-db bg-dsb absolute z-30" x-cloak>
            <div class="flex gap-x-4 pt-4 px-4">
                <h1 class="px-3 py-1 text-gray-400 w-fit bg-dmb rounded xl"><li class="fa-solid fa-tags text-accent mr-1"></li>Tag: {{$filter ?? 'No Tag'}}</h1>
                <h1 class="px-3 py-1 text-gray-400 w-fit bg-dmb rounded xl"><li class="fa-solid fa-square-poll-vertical text-accent mr-1"></li>Results: {{count($allSearchResults)}}</h1>

            </div>
            <div class="flex gap-x-8 gap-y-5 flex-wrap p-5 relative">
                <div class="border-2 border-db bg-dsb px-4 py-3 text-xl  font-bold min-w-[5rem] text-center hover:text-accent cursor-pointer @if($filter == null) text-accent @else text-gray-500 @endif" wire:click="filter('all')">
                    All <span class="text-opacity-50 text-gray-500 text-[0.9rem] ">({{count($bots)}})</span>
                </div>
                @foreach ($tags as $tag)
                    @php
                        $name = $tag['name'];
                    @endphp
                    <div class="border-2 border-db bg-dsb px-4 py-3 text-xl font-bold min-w-[5rem] text-center hover:text-accent cursor-pointer @if($filter == $name) text-accent @else text-gray-500 @endif" wire:click="filter(`{{$tag['name']}}`)">
                        {{$tag['name']}} <span class="text-opacity-50 text-gray-500 text-[0.9rem] ">({{count($tag->bots)}})</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="z-30 h-screen lg:w-screen bg-black top-0 left-0 fixed bg-opacity-50" x-show="tags" x-cloak>

    </div>
    <div class="z-10 h-screen lg:w-screen bg-black top-0 left-0 fixed bg-opacity-50" x-show="search" x-cloak>

    </div>
    <div class="relative z-20" @click.away="search = false">
        <div class="lg:w-[45rem] flex lg:gap-x-5 mt-10">
            <input type="text" wire:model="search" placeholder="Search for the perfect bot..." @click="search = true" class="bg-input p-5 text-lg rounded-lg focus:ring-2 focus:ring-accent  focus:outline-none text-gray-200 w-full" required>
            <button class=" lg:block hidden h-[68px] w-[68px] bg-accent hover:bg-accent/60 rounded-lg text-white font-semibold p-5 text-lg" wire:click="search" @click="search = false"> <li class="fa-solid fa-search text-xl"></li></button>
        </div>
        <div class="w-full max-h-[26rem] top-[78px] rounded-lg border border-db bg-dsb absolute z-10" x-cloak x-show="search">
            <div class="flex gap-x-4 pt-4 px-4">
                <h1 class="px-3 py-1 text-gray-400 w-fit bg-dmb rounded xl"><li class="fa-solid fa-tags text-accent mr-1"></li>Tag: {{$filter ?? 'No Tag'}}</h1>
                <h1 class="px-3 py-1 text-gray-400 w-fit bg-dmb rounded xl"><li class="fa-solid fa-square-poll-vertical text-accent mr-1"></li>Results: {{count($allSearchResults)}}</h1>

            </div>
            <div class="max-h-[20rem] overflow-hidden">
                <div class="p-5 grid md:grid-cols-2 lg:grid-cols-4 gap-3">
                    @foreach ($allSearchResults as $bot)
                        <livewire:bot-search-splash-card :bot="$bot" :wire:key="$bot['id']"/>
                    @endforeach
                </div>
            </div>
            @if(count($allSearchResults) > 16)
            <div class="w-full text-center text-gray-400 text-sm">
                <h1 class="mx-auto mb-4">Show the remaining {{count($allSearchResults) - 16}} results <li class="fa-solid fa-arrow-right text-accent mt-1"></li></h1>
            </div>
            @endif
        </div>
    </div>
    <div class="w-full grid grid-cols-2 lg:hidden mt-5 gap-x-5 ">
        <button class="h-[68px] bg-accent hover:bg-accent/60 rounded-lg text-white font-semibold p-5 text-lg" wire:click="search" @click="search = false"><li class="fa-solid fa-search text-xl"></li> Search</button>
        <button class="h-[68px] bg-accent hover:bg-accent/60 rounded-lg text-white font-semibold p-5 text-lg" @click="tags = true"><li class="fa-solid fa-filter text-xl"></li> Filter</button>
    </div>
</div>