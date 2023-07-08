<nav class="py-[40px] relative">
    <a href="{{route('home')}}">
        <img src="{{asset('img/logo.png')}}" class="h-[3.5rem]" alt="">
    </a>
    <div class="flex gap-x-10 float-right absolute top-1/2 -translate-y-1/2 right-0 text-lg font-semibold text-white">
        <a href="{{route('search')}}">
            <h1>Bots</h1>
        </a>
        <a href="https://discord.gg/GypsEsvVrU">
            <h1>Our Discord</h1>
        </a>
        <a href="{{route('home')}}/dashboard/upload">
            <h1>Add Bot</h1>
        </a>
        @if(Auth::check()) 
            <button class="w-[7rem] bg-accent rounded text-white font-semibold py-1.5 px-3 -mt-1 " >{{Auth::user()->username}}</button>
        @else 
            <a href="{{route('login')}}">
                <button class="w-[7rem] bg-accent rounded text-white font-semibold py-1.5 px-3 -mt-1 " >Login</button>
            </a>
        @endif

    </div>
</nav>