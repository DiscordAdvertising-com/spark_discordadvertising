<div> 
    @include('layouts.header')

    <livewire:bot-filter-search/>

    <div class="w-full mt-32">
        <div class="w-full relative">
            <div class="font-bold tracking-widest">
                <h1 class="text-accent">Just Added</h1>
                <h1 class="text-white text-3xl">Recently Added Bots</h1>
            </div>
        </div>
        <div class="w-full mt-4 grid md:grid-cols-2 lg:grid-cols-4 gap-10">
        
            @foreach ($latestBots as $bot)

                <livewire:bot-splash-card :bot="$bot" />

            @endforeach

        </div>
    </div>
    <div class="w-full mt-32">
        <div class="w-full relative">
            <div class="font-bold tracking-widest">
                <h1 class="text-accent">Just Added</h1>
                <h1 class="text-white text-3xl">Recently Added Servers</h1>
            </div>
        </div>
        <div class="w-full mt-4 grid md:grid-cols-2 lg:grid-cols-4 gap-10">
        
            @foreach ($latestServers as $server)

                <livewire:server-splash-card :server="$server" />

            @endforeach

        </div>
    </div>
</div>