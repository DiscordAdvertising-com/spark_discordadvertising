<div> 
    @include('layouts.header')

    <livewire:filter-search/>

    <div class="w-full mt-32">
        <div class="w-full relative">
            <div class="font-bold tracking-widest">
                <h1 class="text-accent">Just Added</h1>
                <h1 class="text-white text-3xl">Recently Added Bots</h1>
            </div>
        </div>
        <div class="w-full mt-4 grid grid-cols-4 gap-x-10">
        
            @foreach ($latest as $bot)

                <livewire:bot-splash-card :bot="$bot" />

            @endforeach

        </div>
    </div>
    <div class="w-full mt-40">

    </div>
</div>
<script>
        setTimeout(function() {
        $('#session').fadeOut('veryslow');
    }, 4000);
</script>