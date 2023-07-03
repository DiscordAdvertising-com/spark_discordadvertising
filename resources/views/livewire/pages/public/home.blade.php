<div class="pb-20"> 
    <h1 class="mt-10 text-gray-500 mb-4 text-lg border-b w-[45rem] border-gray-500 border-opacity-40 pb-2"> <li class="fa-solid fa-tags mr-1 text-accent"></li>Tags</h1>
    <div class="flex gap-x-8 gap-y-5 w-[45rem] flex-wrap">
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
    <div class="w-full mt-40">
        <div class="w-full relative">
            <div class="font-bold tracking-widest">
                <h1 class="text-accent">Just Added</h1>
                <h1 class="text-white text-3xl">Recently Added Bots</h1>
            </div>
            <h1 class="text-white text-opacity-60 italic absolute right-0 bottom-0 font-semibold text-sm">View More <li class="fa-solid fa-arrow-right text-accent"></li></h1>
        </div>
        <div class="w-full mt-4 grid grid-cols-4 gap-x-10">
        
            @foreach ($latest as $bot)
                
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
    <div class="w-full mt-40">
        <div class="w-full relative">
            <div class="font-bold tracking-widest">
                <h1 class="text-accent">Populare Bots</h1>
                <h1 class="text-white text-3xl">Highly Upvoted Bots</h1>
            </div>
            <h1 class="text-white text-opacity-60 italic absolute right-0 bottom-0 font-semibold text-sm">View More <li class="fa-solid fa-arrow-right text-accent"></li></h1>

        </div>
        <div class="w-full mt-4 grid grid-cols-4 gap-x-10">
        
            <div class="rounded-xl bg-dsb h-[25rem] overflow-hidden">
                <div class="h-2/5 relative" style="background-image: url('https://trustee.lol/img/logo.png'); background-size: cover;">
                    <div class="w-full h-full backdrop-blur-lg">
                        <div class="absolute right-1/2 translate-x-1/2 top-1/2 -translate-y-1/2 p-3 overflow-hidden rounded-full border-2 border-db border-opacity-40 h-[8rem] w-[8rem] flex place-items-center">
                            <img src="https://trustee.lol/img/logo.png" class=" h-8/10 " alt="">
                        </div>
                    </div>
                </div>
                <div class="h-3/5">
                    <h1 class="text-center text-2xl text-white font-semibold mt-2">Trustee</h1>
                    <div class="flex gap-x-5 w-fit mx-auto my-3 text-gray-300 font-semibold">
                        <h1 class="flex gap-x-1 px-3 py-1.5 bg-dmb rounded-2xl"><span class="text-accent"><li class="fa-solid fa-arrow-up text-sm"></li> 30</span> Votes</h1>
                        <h1 class="flex gap-x-1 px-3 py-1.5 bg-dmb rounded-2xl"><span class="text-accent"><li class="fa-solid fa-eye text-sm"></li> 300</span> Views</h1>
                    </div>
                    <h1 class="text-gray-300 m-1 text-center tracking-widest w-3/4 mx-auto">
                        Lorem Ipsum is simply dummy text of the
                    </h1>
                    <div class="w-full flex place-items-center">
                        <button class=" bg-accent rounded text-white font-semibold py-3 px-3 w-[10rem] mx-auto text-lg mt-2"><li class="fa-solid fa-eye mr-2"></li>View</button>
                    </div>
    
                </div>
            </div>


        </div>
    </div>
</div>
<script>
        setTimeout(function() {
        $('#session').fadeOut('veryslow');
    }, 4000);
</script>