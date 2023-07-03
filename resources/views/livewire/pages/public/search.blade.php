<div>
    
    <livewire:filter-search :filter="$filter" :search="$query"/>

    @if($query) 
        <h1 class="mt-24 text-2xl text-gray-300">Search results for "{{$query}}"...</h1>
    @else
        <h1 class="mt-24 text-2xl text-gray-300">All registerd bots on our site...</h1>
    @endif

    <div class="w-full mt-10 grid grid-cols-4 gap-x-10 ">
        
        @foreach ($bots as $bot)
            
            <div class="rounded-xl bg-dsb h-[25rem] overflow-hidden">
                <div class="h-2/5 relative" style="background-image: @if($bot['avatar']) url('https://cdn.discordapp.com/avatars/{{$bot['id']}}/{{$bot['avatar']}}.jpg') @else url('{{asset('img/logo.png')}}') @endif; background-size: cover;">
                    <div class="w-full h-full backdrop-blur-lg ">
                            <div class="absolute right-1/2 translate-x-1/2 top-1/2 -translate-y-1/2 p-3 overflow-hidden rounded-full  h-[8rem] w-[8rem] flex place-items-center">
                            @if($bot['avatar'])
                                <img  src="https://cdn.discordapp.com/avatars/{{$bot['id']}}/{{$bot['avatar']}}.png?size=256" alt="" class="h-8/10">
                            @else
                                <img  src="{{asset('img/logo.png')}}" alt="" class="h-8/10">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="h-3/5">
                    <h1 class="text-center text-2xl text-white font-semibold mt-2 max-h-[32px] overflow-hidden truncate mx-5">{{$bot['username']}}</h1>
                    <div class="flex gap-x-5 w-fit mx-auto my-3 text-gray-300 font-semibold">
                        <h1 class="flex gap-x-1 px-3 py-1.5 bg-dmb rounded-2xl"><span class="text-accent"><li class="fa-solid fa-arrow-up text-sm"></li> 30</span> Votes</h1>
                        <h1 class="flex gap-x-1 px-3 py-1.5 bg-dmb rounded-2xl"><span class="text-accent"><li class="fa-solid fa-eye text-sm"></li> 300</span> Views</h1>
                    </div>
                    <h1 class="text-gray-300 m-1 text-center tracking-widest w-3/4 mx-auto h-[48px]">
                        {{$bot['headline']}}
                    </h1>
                    <div class="w-full flex place-items-center">
                        <button class=" bg-accent rounded text-white font-semibold py-3 px-3 w-[10rem] mx-auto text-lg mt-2"><li class="fa-solid fa-eye mr-2"></li>View</button>
                    </div>
    
                </div>
            </div>

        @endforeach

    </div>

</div>

<script type="text/javascript">
    window.onscroll = function(ev) {
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
    window.livewire.emit('load-more');
    }
    };
 </script>