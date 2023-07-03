<div x-data="{search: false, tags: false}">
    <h1 class="mt-10 text-gray-500 mb-4 text-lg border-b w-[45rem] border-gray-500 border-opacity-40 pb-2"> <li class="fa-solid fa-tags mr-1 text-accent"></li>Tags</h1>
    <div class="flex gap-x-8 gap-y-5 w-[45rem] flex-wrap h-[136px] overflow-hidden relative">
        <li class="fa-solid fa-arrow-down text-accent absolute right-0 top-1/2 -translate-y-1/2 text-lg" @click="tags = true"></li>
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
    <div class="relative z-40 w-[45rem] mt-5" @click.away="tags = false" x-show="tags">
        <div class="w-full h-fit top-0 rounded-lg border border-db bg-dsb absolute z-30" x-cloak>
            <div class="flex gap-x-4 pt-4 px-4">
                <h1 class="px-3 py-1 text-gray-400 w-fit bg-dmb rounded xl"><li class="fa-solid fa-tags text-accent mr-1"></li>Tag: {{$filter ?? 'No Tag'}}</h1>
                <h1 class="px-3 py-1 text-gray-400 w-fit bg-dmb rounded xl"><li class="fa-solid fa-square-poll-vertical text-accent mr-1"></li>Results: {{count($allSearch)}}</h1>

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
    <div class="z-30 h-screen w-screen bg-black top-0 left-0 fixed bg-opacity-50" x-show="tags" x-cloak>

    </div>
    <div class="z-10 h-screen w-screen bg-black top-0 left-0 fixed bg-opacity-50" x-show="search" x-cloak>

    </div>
    <div class="relative z-20" @click.away="search = false">
        <div class="w-[45rem] flex gap-x-5 mt-10">
            <input type="text" placeholder="Search for the perfect bot..." @click="search = true" class="bg-input p-5 text-lg rounded-lg focus:ring-2 focus:ring-accent  focus:outline-none text-gray-200 w-full" required>
            <button class=" h-[68px] w-[68px] bg-accent rounded-lg text-white font-semibold p-5 text-lg" @click="search = false"> <li class="fa-solid fa-search text-xl"></li></button>
        </div>
        <div class="w-full max-h-[26rem] top-[78px] rounded-lg border border-db bg-dsb absolute z-10" x-cloak x-show="search">
            <div class="flex gap-x-4 pt-4 px-4">
                <h1 class="px-3 py-1 text-gray-400 w-fit bg-dmb rounded xl"><li class="fa-solid fa-tags text-accent mr-1"></li>Tag: {{$filter ?? 'No Tag'}}</h1>
                <h1 class="px-3 py-1 text-gray-400 w-fit bg-dmb rounded xl"><li class="fa-solid fa-square-poll-vertical text-accent mr-1"></li>Results: {{count($allSearch)}}</h1>

            </div>
            <div class="max-h-[20rem] overflow-hidden">
                <div class="p-5 grid grid-cols-4 gap-3">
                    @foreach ($search as $bot)
                        <div class="flex gap-x-5 hover:bg-db p-2 rounded-lg hover:cursor-pointer" >
                            <div class="h-[4rem] w-[4rem] rounded-full overflow-hidden bg-db">
                                @if($bot['avatar'])
                                    <img  src="https://cdn.discordapp.com/avatars/{{$bot['id']}}/{{$bot['avatar']}}.png?size=256" alt="" class="h-[4rem] w-[4rem]">
                                @else
                                    <img  src="{{asset('img/logo.png')}}" alt="" class="h-[4rem] w-[4rem]">
                                @endif
                            </div>
                            <div>
                                <h1 class="text-white font-bold overflow-hidden truncate w-[180px]">{{$bot['username']}}</h1>
                                <div class="flex gap-x-5 w-fit my-3 text-gray-300 font-semibold bg-dmb rounded-lg px-2">
                                    <h1 class="flex gap-x-1 "><span class="text-accent"><li class="fa-solid fa-arrow-up text-sm"></li> 30</span></h1>
                                    <h1 class="flex gap-x-1 "><span class="text-accent"><li class="fa-solid fa-eye text-sm"></li> 300</span></h1>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @if(count($allSearch) > 16)
            <div class="w-full text-center text-gray-400 text-sm">
                <h1 class="mx-auto mb-4">Show the remaining {{count($allSearch) - 16}} results <li class="fa-solid fa-arrow-right text-accent mt-1"></li></h1>
            </div>
            @endif
        </div>
    </div>
</div>