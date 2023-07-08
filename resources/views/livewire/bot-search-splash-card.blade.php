<div>
    <a class="flex gap-x-2 hover:bg-db p-2 rounded-lg hover:cursor-pointer" @click="search = false" href="{{route('botInfo', ['botID' => $bot['id']])}}">
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
                <h1 class="flex gap-x-1 "><span class="text-accent"><li class="fa-solid fa-arrow-up text-sm"></li> {{count($bot->votes)}}</span> votes</h1>
                <h1 class="flex gap-x-1 "><span class="text-accent"># {{$rank}}</span> rank</h1>
            </div>
        </div>
    </a>
</div>
