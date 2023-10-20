<div x-data="{rejectModal: false}">
    
    <div class="mt-10">

        <div class="w-full lg:flex gap-10">

            <div class="lg:w-2/3 tracking-widest text-gray-400 ">

                <h1 class="text-3xl text-white font-semibold border-b pb-[0.8rem] border-gray-500 border-opacity-40">{{$server['name']}}</h1>

                <div class="w-full grid lg:grid-cols-2 mt-8">

                    <div>
                        <h1 class="text-white">Application ID</h1>
                        <h1>{{$server['id']}}</h1>
                    </div>

                    <div class="mt-8 lg:mt-0">
                        <h1 class="text-white">Listing Date</h1>
                        <h1>{{Carbon\Carbon::parse($server->created_at)->diffForHumans()}}</h1>
                    </div>

                </div>

                <div class=" mt-8">
                    <h1 class="text-white">Headline</h1>
                    <h1>{{$server['headline']}}</h1>
                </div>
            
                <div class=" mt-8">
                    <h1 class="text-white">Description</h1>
                    <h1>{{$server['description']}}</h1>
                </div>

                <div class=" mt-8">
                    <h1 class="text-white">Tags</h1>
                    <div class="flex gap-x-8 gap-y-5 w-full flex-wrap overflow-hidden relative mt-4">
                        @foreach ($server->tags as $tag)
                            <div class="border-2 border-db bg-dsb px-4 py-3 text-xl font-bold min-w-[5rem] text-center hover:text-accent cursor-pointer">
                                {{$tag['tag']}} <span class="text-opacity-50 text-gray-500 text-[0.9rem]"></span>
                            </div>
                        @endforeach
                    </div>
                </div>
                
            </div>
            <div class="lg:w-1/3 mt-5 lg:mt-0">

                <div class=" h-[14rem] w-full rounded-lg relative border border-db" style="background-image: @if($server['icon']) url('https://cdn.discordapp.com/icons/{{$server['id']}}/{{$server['icon']}}.jpg') @else url('{{asset('img/logo.png')}}') @endif; background-size: cover;">
                    <div class="w-full h-full backdrop-blur-lg ">
                            <div class="absolute right-1/2 translate-x-1/2 top-1/2 -translate-y-1/2 p-3 overflow-hidden rounded-full  h-[8rem] w-[8rem] flex place-items-center">
                            @if($server['icon'])
                                <img  src="https://cdn.discordapp.com/icons/{{$server['id']}}/{{$server['icon']}}.png?size=256" alt="" class="h-8/10">
                            @else
                                <img  src="{{asset('img/logo.png')}}" alt="" class="h-8/10">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="flex gap-x-5 w-fit mx-auto my-3 text-gray-300 font-semibold">
                    <h1 class="flex gap-x-1 px-3 py-1.5 bg-dmb rounded-2xl"><span class="text-accent"><li class="fa-solid fa-arrow-up text-sm"></li> {{$server->votes()->count()}}</span> Votes</h1>
                    <h1 class="flex gap-x-1 px-3 py-1.5 bg-dmb rounded-2xl"><span class="text-accent"><li class="fa-solid fa-hashtag text-sm"></li> {{$rank}}</span> Rank</h1>
                </div>
                <div class="w-full grid grid-cols-2 gap-x-5">
                    @if ($time == "00:00:00")
                        <button class="w-full bg-accent rounded-lg text-white font-semibold p-3" wire:click="vote('{{$server['id']}}')"> <li class="fa-solid fa-arrow-up mr-1"></li> Vote</button>
                    @else
                        <button class="w-full bg-accent rounded-lg text-white font-semibold p-3"> <li class="fa-solid fa-arrow-up mr-1"></li><span id="countdown">{{$time}}</span></button>
                    @endif
                    <a target="_blank" href="{{$server['invite']}}">
                        <button class="w-full bg-accent rounded-lg text-white font-semibold p-3"> <li class="fa-solid fa-plus mr-1"></li> Join</button>
                    </a>

                </div>
                <h1 class="text-white mt-10 mb-5">Owners</h1>
                <div class="grid gap-5">

                    <div class="flex gap-x-3">
                        @if($server->lister['avatar'])
                            <img  src="{{$server->lister['avatar']}}?size=256" alt="" class="h-[3.5rem] rounded-full bg-dsb border border-db">
                        @else
                            <img  src="{{asset('img/logo.png')}}" alt="" class="h-[3.5rem]">
                        @endif

                        <h1 class="my-auto text-gray-400 text-lg">{{$server->lister['username']}}</h1>

                    </div>

                    @foreach ($server->users as $user)
                    
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
                @if( Auth::check() && Auth::user()->manageBots)
                    <h1 class="text-white mt-10 mb-5">Status: {{$server['status']}}</h1>
                    <div class="grid gap-y-5">
                        @if ($server['status'] == 'Awaiting Review' || $server['status'] == 'Rejected')
                            <button class="w-full bg-green-500 rounded-lg text-white font-semibold p-3" wire:click="updateStatus('Accepted')"> <li class="fa-solid fa-check mr-1"></li> Accept</button>   
                        @endif
                        @if ($server['status'] == 'Awaiting Review' || $server['status'] == 'Accepted')
                            <button class="w-full bg-red-500 rounded-lg text-white font-semibold p-3" @click="rejectModal = true"> <li class="fa-solid fa-x mr-1"></li> Reject</button>                     
                        @endif

                    </div>
                    <h1 class="text-white mt-10 mb-5">Refresh Server Data</h1>
                    <div class="grid gap-y-5">
  
                        <button class="w-full bg-accent rounded-lg text-white font-semibold p-3" wire:click="refreshServerData"> <li class="fa-solid fa-arrows-rotate mr-1"></li> Refresh</button>                     

                    </div>
                @endif

                <div class="z-10 h-screen lg:w-screen bg-black top-0 left-0 fixed bg-opacity-50" x-show="rejectModal" x-cloak>
                    <div class="absolute top-1/2 -translate-y-1/2 right-1/2 translate-x-1/2 z-60 w-[30rem] p-4 bg-dsb rounded-lg" @click.away="rejectModal = false">
                        <h1 class="text-gray-300 mb-1 text-sm"><i class="fa-solid fa-question mr-1 text-accent"></i>Reason</h1>
                        <textarea type="text" rows="5" wire:model="reason" @click="search = true" class="bg-input p-5 text-lg rounded-lg focus:ring-2 focus:ring-accent  focus:outline-none text-gray-200 w-full"> </textarea>
                        <button class=" mt-3 w-[10rem] float-right bg-red-500 rounded-lg text-white font-semibold p-3" @click="rejectModal = false"  wire:click="updateStatus('Rejected')"> <li class="fa-solid fa-x mr-1"></li> Reject</button>                     
                    </div>
                </div>

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