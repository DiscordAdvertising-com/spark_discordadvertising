<div class="w-full h-full lg:flex">

    @include('layouts.admin-dashboard.top-navigation')
    @include('layouts.admin-dashboard.navigation')

    <div class="w-full min-h-full overflow-y-auto relative custom-scrollbar lg:ml-[82px]">

        @switch($page)
            @case('botList')
                    <livewire:pages.admin-dashboard.bot-list />
            @break
            @case('serverList')
                <livewire:pages.admin-dashboard.server-list />
            @break
        @endswitch
        
    </div>

</div>

