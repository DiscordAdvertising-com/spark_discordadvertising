<footer class="bg-dsb">
    <div class="mx-auto max-w-7xl overflow-hidden py-6 px-6 sm:py-16 lg:px-8">
        <div class="grid grid-cols-2 gap-8 px-4 py-6 lg:py-8 md:grid-cols-4">
            <div>
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Company</h2>
                <ul class="text-gray-500 dark:text-gray-400 font-medium">
                    <li class="mb-4">
                        <a href="https://blog.discordadvertising.com/welcome" class=" hover:underline">Blog</a>
                    </li>
                    <li class="mb-4">
                        <a href="https://staff.discordadvertising.com/" class="hover:underline">Apply Now</a>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Help center</h2>
                <ul class="text-gray-500 dark:text-gray-400 font-medium">
                    <li class="mb-4">
                        <a href="https://discord.gg/vUxdpAmN6v" class="hover:underline">Discord Server</a>
                    </li>
                    <li class="mb-4">
                        <a href="mailto:admin@discordadvertising.com" class="hover:underline">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                <ul class="text-gray-500 dark:text-gray-400 font-medium">
                    <li class="mb-4">
                        <a href="{{route('privacy')}}" class="hover:underline">Privacy Policy</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{route('tos')}}" class="hover:underline">Terms &amp; Conditions</a>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Dashboard</h2>
                <ul class="text-gray-500 dark:text-gray-400 font-medium">
                    <li class="mb-4">
                        <a href="{{route('botUpload')}}" class="hover:underline">Upload Bot</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{route('botList')}}" class="hover:underline">Your Bots</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{route('serverUpload')}}" class="hover:underline">Upload Server</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{route('serverList')}}" class="hover:underline">Your Servers</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-full relative">
            <div class="left-0 absolute top-1/2 -translate-y-1/2  pt-5 md:flex   hidden">
                <img src="{{asset('img/logo.png')}}" class="h-[1.5rem]" alt="">
                <h1 class="text-white my-auto text-xl ml-2 font-bold"><span class="text-accent">Discord</span> Advertising</h1>
            </div>
            <p class="mt-10 text-center text-xs leading-5 text-gray-500 border-t border-gray-500 border-opacity-40 pt-5">© 2023 Discord Advertising. All rights reserved.</p>
            <p class="text-center text-xs leading-5 text-gray-500 mt-1 italic">Developed by Bacio001.</p>
        </div>

    </div>
  </footer>
