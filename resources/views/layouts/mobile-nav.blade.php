<nav class=" md:hidden block z-50 absolute top-0 w-full " @click.away="mobile = false" x-data="{mobile: false}">
    <a class="z-10" href="{{route('home')}}">
        <img src="{{asset('img/logo.png')}}" class="h-[2.5rem] absolute top-2 z-10 left-5" alt="">
    </a>
    <i x-cloak @click="mobile = true" x-show="!mobile" class="fa-solid fa-bars right-5 top-2 text-3xl text-accent absolute cursor-pointer"></i>
    <i x-cloak @click="mobile = false" x-show="mobile" class="fa-solid fa-x right-5 top-2 text-3xl text-accent absolute cursor-pointer"></i>
    <div class="w-full h-fit bg-dsb p-4 z-50" x-show="mobile">
        <div class="text-lg font-semibold text-white grid gap-y-5 pt-16 ">
            <a href="{{route('search')}}">
                <h1>Bots</h1>
            </a>
            <a href="https://discord.gg/GypsEsvVrU">
                <h1>Our Discord</h1>
            </a>
            <a href="{{route('home')}}/dashboard/upload">
                <h1>Add Bot</h1>
            </a>
            @if(Auth::check() && Auth::user()->access)
            <a href="{{route('admin-dashboard')}}">
                <h1>Admin Dashboard</h1>
            </a>
            @endif
            @if(Auth::check()) 
                <a href="{{route('login')}}">
                    <button class="w-full bg-accent rounded text-white font-semibold py-1.5 px-3 -mt-1 " >{{Auth::user()->username}}</button>
                </a>
            @else 
                <a href="{{route('login')}}">
                    <button class="w-full bg-accent rounded text-white font-semibold py-1.5 px-3 -mt-1 " >Login</button>
                </a>
            @endif
    
        </div>
    </div>
</nav>