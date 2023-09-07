<div>
    <h1 class="text-3xl text-white font-semibold">Server List</h1>
    <div class="mt-10">
        <div class="w-full p-6 bg-dsb rounded-lg border border-db relative overflow-hidden ">
            <div class=" grid gap-y-6">

                <div class="grid gap-y-2">

                    <label class="text-gray-400" for="search">Filter</label>
                    <div class="md:flex grid gap-5">
                        <input wire:model="search" name="search" type="text"
                        class="w-full bg-input p-4 rounded-lg focus:ring-2 focus:ring-accent  focus:outline-none text-gray-200" required>
                        <select wire:model="category" class="md:w-1/3 w-full bg-input p-4 rounded-lg focus:ring-2 focus:ring-accent  focus:outline-none text-gray-200" required>
                            <option value="name">Name</option>
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
            @foreach ($servers as $server)
                <div class="p-2 w-full bg-dmb flex">
                    @if($server['icon'])
                        <img  src="https://cdn.discordapp.com/icons/{{$server['id']}}/{{$server['icon']}}.png?size=256" alt="" class="h-14 w-14 mr-2 border border-db bg-db rounded-full">
                    @else
                        <img  src="{{asset('img/logo.png')}}" alt="" class="h-14 w-14 mr-2 border bg-cover border-db bg-db rounded-full">
                    @endif
                    <div class="grid grid-cols-5 w-full my-auto gap-x-5 ml-5 text-gray-400 text-lg">
                        <h1 class="font-semibold text-white">{{$server['name']}}</h1>
                        <h1 class=""><li class="fa-solid fa-id-card mr-2 text-accent"></li>{{$server['id']}}</h1>
                        <div class="w-full grid grid-cols-2">
                            <h1 class=""><li class="fa-solid fa-tags mr-2 text-accent"></li>{{count($server->tags)}}</h1>
                            <h1 class=""><li class="fa-solid fa-user mr-2 text-accent"></li>{{count($server->users) + 1}}</h1>
                        </div>
                        <h1 class=""><li class="fa-solid fa-calendar mr-2 text-accent"></li>{{Carbon\Carbon::parse($server->created_at)->diffForHumans()}}</h1>
                        <h1><span class="text-sm px-3 py-1.5 bg-accent font-semibold text-white rounded-lg">{{$server['status']}}</span><li wire:click="setPage('serverManage', '{{$server['id']}}')" class="float-right fa-solid fa-arrow-right text-accent text-xl mt-1 mr-2 hover:cursor-pointer"></li></h1>
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
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/64f936f1b2d3e13950ee65f6/1h9mnt8g4';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>