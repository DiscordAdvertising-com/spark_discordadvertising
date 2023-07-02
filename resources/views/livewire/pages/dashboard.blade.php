<div class="overflow-x-hidden flex">

    @include('layouts.dashboard.navigation')

    {{-- Main Container --}}

    <div class="lg:mt-[80px] overflow-y-auto md:max-h-[calc(100vh-80px)] custom-scrollbar w-screen">

        <div class="p-10">

            <div class="max-w-[1540px]">

                @switch($page)
                @case('upload')
                    <div>
                        <livewire:pages.dashboard.upload />
                    </div>
                @break
                @case('botList')
                    <div>
                        <livewire:pages.dashboard.bot-list />
                    </div>
                @break
                @case('botManage')
                <div>
                    <livewire:pages.dashboard.bot-manage />
                </div>
            @break
                @endswitch

            </div>

        </div>

        {{-- Scripts --}}
        <script>
            window.addEventListener('changeUrl', function(event) {
                history.pushState(null, '', event.detail.url);
                history.replaceState(null, '', event.detail.url);
            });

        </script>

        <div>
            <livewire:notification-component/>
        </div>

    </div>

</div>