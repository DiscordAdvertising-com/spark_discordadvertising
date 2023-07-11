<div>
    <h1 class="text-3xl text-white font-semibold">Bot List</h1>
    <div class="mt-10">
        <div class="w-full p-6 bg-dsb rounded-lg border border-db relative overflow-hidden ">
            <div class=" grid gap-y-6">

                <div class="grid gap-y-2">

                    <label class="text-gray-400" for="search">Filter</label>
                    <div class="md:flex grid gap-5">
                        <input wire:model="search" name="search" type="text"
                        class="w-full bg-input p-4 rounded-lg focus:ring-2 focus:ring-accent  focus:outline-none text-gray-200" required>
                        <select wire:model="category" class="md:w-1/3 w-full bg-input p-4 rounded-lg focus:ring-2 focus:ring-accent  focus:outline-none text-gray-200" required>
                            <option value="username">Name</option>
                            <option value="id">Application ID</option>
                        </select>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="mt-10 overflow-x-auto custom-scrollbar ">
        <div class="px-8 bg-dmb flex my-3 overflow-x-auto 2xl:w-full w-[1300px]">
            <span class="w-[56px] mr-[0.5rem]"></span>
            <div class="grid grid-cols-5 w-full my-auto gap-x-5 ml-5 text-gray-400 text-lg">
                <h1 class=" text-gray-400 text-sm">Name</h1>
                <h1 class=" text-gray-400 text-sm">Application ID</h1>
                <div class="w-full grid grid-cols-2">
                    <h1 class=" text-gray-400 text-sm">Tags</h1>
                    <h1 class=" text-gray-400 text-sm">Owners</h1>
                </div>
                <h1 class=" text-gray-400 text-sm">Listings Date</h1>
                <h1 class=" text-gray-400 text-sm">Status</h1>
            </div>
        </div>
        <div class=" p-6 bg-dsb rounded-lg border border-db relative overflow-hidden grid gap-y-5 overflow-x-auto 2xl:w-full w-[1300px]">
            @foreach ($bots as $bot)
                <div class="p-2 w-full bg-dmb flex">
                    @if($bot['avatar'])
                        <img  src="https://cdn.discordapp.com/avatars/{{$bot['id']}}/{{$bot['avatar']}}.png?size=256" alt="" class="h-14 w-14 mr-2 border border-db bg-db rounded-full">
                    @else
                        <img  src="{{asset('img/logo.png')}}" alt="" class="h-14 w-14 mr-2 border bg-cover border-db bg-db rounded-full">
                    @endif
                    <div class="grid grid-cols-5 w-full my-auto gap-x-5 ml-5 text-gray-400 text-lg">
                        <h1 class="font-semibold text-white">{{$bot['username']}}</h1>
                        <h1 class=""><li class="fa-solid fa-id-card mr-2 text-accent"></li>{{$bot['id']}}</h1>
                        <div class="w-full grid grid-cols-2">
                            <h1 class=""><li class="fa-solid fa-tags mr-2 text-accent"></li>{{count($bot->tags)}}</h1>
                            <h1 class=""><li class="fa-solid fa-user mr-2 text-accent"></li>{{count($bot->users) + 1}}</h1>
                        </div>
                        <h1 class=""><li class="fa-solid fa-calendar mr-2 text-accent"></li>{{Carbon\Carbon::parse($bot->created_at)->diffForHumans()}}</h1>
                        <h1><span class="text-sm px-3 py-1.5 bg-orange-300 font-semibold text-orange-600 rounded-lg">{{$bot['status']}}</span><li wire:click="setPage('botManage', '{{$bot['id']}}')" class="float-right fa-solid fa-arrow-right text-accent text-xl mt-1 mr-2 hover:cursor-pointer"></li></h1>
                    </div>
                </div>  
            @endforeach

        </div>
    </div>
</div>

<script>
    window.onbeforeunload = function() {
        return null;
    };
</script>