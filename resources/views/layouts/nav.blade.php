<nav class="py-[40px] relative md:block hidden lg:px-0 px-10">
    <a href="{{route('home')}}">
        <img src="{{asset('img/logo.png')}}" class="h-[3.5rem]" alt="">
    </a>
    <div class="flex gap-x-10 float-right absolute top-1/2 -translate-y-1/2 right-5 lg:right-0 text-lg font-semibold text-white items-center">
        <a href="{{route('botSearch')}}">
            <h1>Bots</h1>
        </a>
        <a href="{{route('serverSearch')}}">
            <h1>Servers</h1>
        </a>
        <a href="https://discord.gg/vUxdpAmN6v">
            <h1>Our Discord</h1>
        </a>
        <a href="{{route('home')}}/dashboard/botUpload">
            <button class="w-[7rem] bg-accent/70 hover:bg-accent/60 rounded text-white font-bold py-3 px-1 -mt-1">Add Bot</button>
        </a>
        <a href="{{route('home')}}/dashboard/serverUpload"> 
            <button class="w-[7rem] bg-accent/70 hover:bg-accent/60 rounded text-white font-bold py-3 px-1 -mt-1">Add Server</button>
        </a>
        @if(Auth::check()) 
            <a href="{{route('login')}}">
                <button class="w-[8rem] bg-accent hover:bg-accent/60 rounded text-white font-semibold py-3 px-4 -mt-1 " >Dashboard</button>
            </a>
        @else 
            <a href="{{route('login')}}">
                <button class="w-[7rem] bg-accent hover:bg-accent/60 rounded text-white font-semibold py-1.5 px-3 -mt-1 " >Login</button>
            </a>
        @endif

    </div>
</nav>
