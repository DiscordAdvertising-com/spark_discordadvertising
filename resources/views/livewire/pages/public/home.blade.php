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


<!--Start of Tawk.to Script-->
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
    <!--End of Tawk.to Script-->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3693059889859602"
    crossorigin="anonymous"></script>