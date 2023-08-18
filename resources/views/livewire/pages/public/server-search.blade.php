<div>
    @include('layouts.header')

    <livewire:server-filter-search :filter="$filter" :search="$query"/>

    @if($query) 
        <h1 class="mt-24 text-2xl text-gray-300">Search results for "{{$query}}"...</h1>
    @else
        <h1 class="mt-24 text-2xl text-gray-300">All registerd servers on our site...</h1>
    @endif

    <div class="w-full mt-4 grid md:grid-cols-2 lg:grid-cols-4 gap-10">
        
        @foreach ($server as $server)
            
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