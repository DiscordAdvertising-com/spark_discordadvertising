<div class="overflow-x-hidden flex"  x-data="{mobile: false}">

    <div class="absolute lg:hidden right-0 top-0">
        <i x-cloak @click="mobile = true" x-show="!mobile" class="fa-solid fa-bars right-5 top-2 text-3xl text-accent absolute cursor-pointer"></i>
        <i x-cloak @click="mobile = false" x-show="mobile" class="fa-solid fa-x right-5 top-2 text-3xl text-accent absolute cursor-pointer"></i>
    </div>

    <span x-show="mobile" x-cloak>
        @include('layouts.dashboard.mobile-navigation')
    </span>

    @include('layouts.dashboard.navigation')

    {{-- Main Container --}}

    <div class="lg:mt-[80px] overflow-y-auto md:max-h-[calc(100vh-80px)] custom-scrollbar w-screen">

        <div class="p-10">

            <div class="max-w-[1540px]">

                @switch($page)
                @case('botUpload')
                    <div>
                        <livewire:pages.dashboard.bot-upload />
                    </div>
                @break
                @case('serverUpload')
                    <div>
                        <livewire:pages.dashboard.server-upload />
                    </div>
                @break
                @case('botList')
                    <div>
                        <livewire:pages.dashboard.bot-list />
                    </div>
                @break
                @case('serverList')
                    <div>
                        <livewire:pages.dashboard.server-list />
                    </div>
                @break
                @case('botManage')
                <div>
                    <livewire:pages.dashboard.bot-manage />
                </div>
                @break
                @case('serverManage')
                <div>
                    <livewire:pages.dashboard.server-manage />
                </div>
                @break
                @case('successScreen')
                <div>
                    <livewire:pages.dashboard.success-screen />
                </div>
                @break
                @case('premium')
                <div>
                    <livewire:pages.dashboard.premium />
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