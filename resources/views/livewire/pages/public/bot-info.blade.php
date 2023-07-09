<div>
    
    <div class="mt-10">

        <div class="w-full flex gap-10">

            <div class="w-2/3 tracking-widest text-gray-400 ">

                <h1 class="text-3xl text-white font-semibold border-b pb-[0.8rem] border-gray-500 border-opacity-40">{{$bot['username']}}</h1>

                <div class="w-full grid grid-cols-2 mt-8">

                    <div>
                        <h1 class="text-white">Application ID</h1>
                        <h1>{{$bot['id']}}</h1>
                    </div>

                    <div>
                        <h1 class="text-white">Listing Date</h1>
                        <h1>{{Carbon\Carbon::parse($bot->created_at)->diffForHumans()}}</h1>
                    </div>

                </div>

                <div class=" mt-8">
                    <h1 class="text-white">Headline</h1>
                    <h1>{{$bot['headline']}}</h1>
                </div>
            
                <div class=" mt-8">
                    <h1 class="text-white">Description</h1>
                    <h1>{{$bot['description']}}</h1>
                </div>

                <div class=" mt-8">
                    <h1 class="text-white">Tags</h1>
                    <div class="flex gap-x-8 gap-y-5 w-full flex-wrap overflow-hidden relative mt-4">
                        @foreach ($bot->tags as $tag)
                            <div class="border-2 border-db bg-dsb px-4 py-3 text-xl font-bold min-w-[5rem] text-center hover:text-accent cursor-pointer">
                                {{$tag['tag']}} <span class="text-opacity-50 text-gray-500 text-[0.9rem]"></span>
                            </div>
                        @endforeach
                    </div>
                </div>
                
            </div>
            <div class="w-1/3">

                <div class=" h-[14rem] w-full rounded-lg relative border border-db" style="background-image: @if($bot['avatar']) url('https://cdn.discordapp.com/avatars/{{$bot['id']}}/{{$bot['avatar']}}.jpg') @else url('{{asset('img/logo.png')}}') @endif; background-size: cover;">
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
                <div class="flex gap-x-5 w-fit mx-auto my-3 text-gray-300 font-semibold">
                    <h1 class="flex gap-x-1 px-3 py-1.5 bg-dmb rounded-2xl"><span class="text-accent"><li class="fa-solid fa-arrow-up text-sm"></li> {{count($bot->votes)}}</span> Votes</h1>
                    <h1 class="flex gap-x-1 px-3 py-1.5 bg-dmb rounded-2xl"><span class="text-accent"><li class="fa-solid fa-hashtag text-sm"></li> {{$rank}}</span> Rank</h1>
                </div>
                <div class="w-full grid grid-cols-2 gap-x-5">
                    @if ($time == "00:00:00")
                        <button class="w-full bg-accent rounded-lg text-white font-semibold p-3" wire:click="vote('{{$bot['id']}}')"> <li class="fa-solid fa-arrow-up mr-1"></li> Vote</button>
                    @else
                        <button class="w-full bg-accent rounded-lg text-white font-semibold p-3"> <li class="fa-solid fa-arrow-up mr-1"></li><span id="countdown">{{$time}}</span></button>
                    @endif
                    <a target="_blank" href="{{$bot['invite']}}">
                        <button class="w-full bg-accent rounded-lg text-white font-semibold p-3"> <li class="fa-solid fa-plus mr-1"></li> Invite</button>
                    </a>

                </div>
                <h1 class="text-white mt-10 mb-5">Owners</h1>
                <div class="grid gap-5">

                    <div class="flex gap-x-3">
                        
                        @if($bot->lister['avatar'])
                            <img  src="{{$bot->lister['avatar']}}?size=256" alt="" class="h-[3.5rem] rounded-full bg-dsb border border-db">
                        @else
                            <img  src="{{asset('img/logo.png')}}" alt="" class="h-[3.5rem]">
                        @endif

                        <h1 class="my-auto text-gray-400 text-lg">{{$bot->lister['username']}}</h1>

                    </div>

                    @foreach ($bot->users as $user)
                    
                        <div class="flex gap-x-3">
                            
                            @if($user->user['avatar'])
                                <img  src="{{$user->user['avatar']}}?size=256" alt="" class="h-[3.5rem] rounded-full bg-dsb border border-db">
                            @else
                                <img  src="{{asset('img/logo.png')}}" alt="" class="h-[3.5rem]">
                            @endif

                            <h1 class="my-auto text-gray-400 text-lg">{{$user->user['username']}}</h1>

                        </div>

                    @endforeach

                    

                </div>
                @if(Auth::user()->access)
                    <h1 class="text-white mt-10 mb-5">Status: {{$bot['status']}}</h1>
                    <div class="grid gap-y-5">
                        @if ($bot['status'] == 'Awaiting Review' || $bot['status'] == 'Rejected')
                            <button class="w-full bg-green-500 rounded-lg text-white font-semibold p-3" wire:click="updateStatus('Accepted')"> <li class="fa-solid fa-check mr-1"></li> Accept</button>   
                        @endif
                        @if ($bot['status'] == 'Awaiting Review' || $bot['status'] == 'Accepted')
                            <button class="w-full bg-red-500 rounded-lg text-white font-semibold p-3" wire:click="updateStatus('Rejected')"> <li class="fa-solid fa-x mr-1"></li> Reject</button>                     
                        @endif

                    </div>
                @endif

            </div>

        </div>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Function to update the countdown every second
    function updateCountdown() {
        var countdownElement = $('#countdown');
        var countdownValue = countdownElement.text().split(':');
        var hours = parseInt(countdownValue[0]);
        var minutes = parseInt(countdownValue[1]);
        var seconds = parseInt(countdownValue[2]);

        if (hours <= 0 && minutes <= 0 && seconds <= 0) {
            location.reload();
            return;
        }

        if (seconds > 0) {
            seconds--;
        } else {
            if (minutes > 0) {
                minutes--;
                seconds = 59;
            } else {
                if (hours > 0) {
                    hours--;
                    minutes = 59;
                    seconds = 59;
                } else {
                    // Countdown finished
                    return;
                }
            }
        }

        var updatedCountdown = ('0' + hours).slice(-2) + ':' + ('0' + minutes).slice(-2) + ':' + ('0' + seconds).slice(-2);
        countdownElement.text(updatedCountdown);

        // Call the function again after 1 second (1000 milliseconds)
        setTimeout(updateCountdown, 1000);
    }

    // Call the function initially to start the countdown
    updateCountdown();
</script>

