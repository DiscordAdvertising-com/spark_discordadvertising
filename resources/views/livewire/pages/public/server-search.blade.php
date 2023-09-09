<div>
    @include('layouts.header')

    <livewire:server-filter-search :filter="$filter" :search="$query"/>

    @if($query) 
        <h1 class="mt-24 text-2xl text-gray-300">Search results for "{{$query}}"...</h1>
    @else
        <h1 class="mt-24 text-2xl text-gray-300">All registerd servers on our site...</h1>
    @endif

    <div class="w-full mt-4 grid md:grid-cols-2 lg:grid-cols-4 gap-10">
        
        @foreach ($servers as $server)
            
            <livewire:server-splash-card :server="$server" />

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
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3693059889859602"
    crossorigin="anonymous"></script>