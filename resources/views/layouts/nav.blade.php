<nav class="py-[40px] relative md:block hidden lg:px-0 px-10">
    <a href="{{route('home')}}">
        <img src="{{asset('img/logo.png')}}" class="h-[3.5rem]" alt="">
    </a>
    <div class="flex gap-x-10 float-right absolute top-1/2 -translate-y-1/2 right-10 lg:right-0 text-lg font-semibold text-white">
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
            <h1>Add Bot</h1>
        </a>
        <a href="{{route('home')}}/dashboard/serverUpload">
            <h1>Add Server</h1>
        </a>
        @endif
        @if(Auth::check()) 
            <a href="{{route('login')}}">
                <button class="w-[7rem] bg-accent rounded text-white font-semibold py-1.5 px-3 -mt-1 " >{{Auth::user()->username}}</button>
            </a>
        @else 
            <a href="{{route('login')}}">
                <button class="w-[7rem] bg-accent rounded text-white font-semibold py-1.5 px-3 -mt-1 " >Login</button>
            </a>
        @endif

    </div>
</nav>
