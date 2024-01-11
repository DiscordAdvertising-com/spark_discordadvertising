<div class="w-full lg:p-10 p-4 flex flex-col gap-6">

    <div class="w-full">

        <h1 class="text-5xl text-white tracking-wide font-semibold border-b pb-6">Home <span
                class="text-2xl text-gray-400">/ ServerList</span></h1>

    </div>

    <div class="lg:w-fit flex flex-col md:flex-row gap-x-5">

        <div class="w-full">
            <label for="filter" class="text-gray-500 italic block">Filter</label>
            <select wire:model="filter" name="filter" id="filter"
                class="p-3 h-[3.5rem] rounded-lg w-full lg:w-[20rem] 2xl:w-[30rem] bg-sb border-opacity-10 text-gray-400 cursor-pointer focus:ring-1 focus:ring-accent focus:outline-none">
                <option value="id">ID</option>
                <option value="name">Name</option> 
            </select>
        </div>

        <div class="w-full">
            <label for="filter" class="text-gray-500 italic block">Search</label>
            <input wire:model="search" name="filter" id="filter"
                class="p-3 h-[3.5rem] rounded-lg w-full lg:w-[20rem] 2xl:w-[40rem] bg-sb border-opacity-10 text-gray-400 cursor-pointer focus:ring-1 focus:ring-accent focus:outline-none"
                placeholder="Search by filter..." />
        </div>

        <div>
            <button
                class="my-auto bg-accent text-white rounded-lg w-full md:w-[4rem] h-[3.5rem] mt-[1.5rem] text-xl font-bold">
                <i class="fa-solid fa-search"></i>
            </button>
        </div>
    </div>

    <div class=" pr-4 overflow-y-auto flex flex-col gap-6 custom-scrollbar w-full bg-sb rounded-xl p-4 ">

        <div class="flex flex-col">
            <div class="overflow-x-auto custom-scrollbar">
                <div class="inline-block min-w-full">
                    <div class="overflow-hidden">
                        <table class=" min-w-full text-left text-sm font-light text-gray-400">
                            <thead class="border-b font-medium">

                                <tr>
                                    <th scope="col" class="px-6 py-4 text-white"></th>
                                    <th scope="col" class="px-6 py-4 text-white">ID</th>
                                    <th scope="col" class="px-6 py-4 text-white">Name</th>
                                    <th scope="col" class="px-6 py-4 text-white">Tags</th>
                                    <th scope="col" class="px-6 py-4 text-white">Owners</th>
                                    <th scope="col" class="px-6 py-4 text-white">Listing Date</th>
                                    <th scope="col" class="px-6 py-4 text-white w-[10rem]">Status</th>
                                    <th scope="col" class="px-6 py-4 text-white"></th>
                                </tr>

                            </thead>
                            <tbody>

                                @foreach ($servers as $server)

                                    <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:hover:bg-neutral-600 relative h-14 ">
                                        <td>
                                            @if($server['icon'])
                                                <img  src="https://cdn.discordapp.com/icons/{{$server['id']}}/{{$server['icon']}}.png?size=256" alt="" class="h-14 w-14 mr-2 border border-db bg-db rounded-full">
                                            @else
                                                <img  src="{{asset('img/logo.png')}}" alt="" class="h-14 w-14 mr-2 border bg-cover border-db bg-db rounded-full">
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">#{{$server['id']}}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{$server['name']}}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{count($server->tags)}}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{count($server->users) + 1}}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{Carbon\Carbon::parse($server->created_at)->diffForHumans()}}</td>
                                        <td class="whitespace-nowrap px-6 py-4 w-[10rem]">
                                            @if($server['status'] == 'Accepted')
                                                <div class="px-3 py-1.5 rounded-xl bg-green-500 text-white font-semibold min-w-[130px] text-center">
                                                    {{$server['status']}}
                                                </div>
                                            @else
                                                <div class="px-3 py-1.5 rounded-xl bg-red-500 text-white font-semibold min-w-[130px] text-center">
                                                    {{$server['status']}}
                                                </div>
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap float-right py-4"  href="{{route('serverInfo', ['serverID' => $server['id']])}}">
                                            <a  href="{{route('serverInfo', ['serverID' => $server['id']])}}" class="px-3 py-1.5 rounded-xl bg-accent text-white font-semibold">Server Page <i class="fa-solid fa-arrow-right my-auto"></i></a>
                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- <div class="flex items-center justify-between">
        <div class="flex flex-1 justify-between sm:hidden">
            <a href="#"
                class="relative inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-400 hover:bg-gray-50">Previous</a>
            <a href="#"
                class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-400 hover:bg-gray-50">Next</a>
        </div>
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-400">
                    Showing
                    <span class="font-medium">1</span>
                    to
                    <span class="font-medium">10</span>
                    of
                    <span class="font-medium">97</span>
                    results
                </p>
            </div>
            <div>
                <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                    <a href="#"
                        class="bg-sb relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-white ring-opacity-10 hover:bg-neutral-600 focus:z-20 focus:outline-offset-0">
                        <span class="sr-only">Previous</span>
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" aria-current="page"
                        class="relative z-10 inline-flex items-center bg-accent px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">1</a>
                    <a href="#"
                        class="bg-sb relative inline-flex items-center px-4 py-2 text-sm font-semibold text-accent ring-1 ring-inset ring-white ring-opacity-10 hover:bg-neutral-600 focus:z-20 focus:outline-offset-0">2</a>
                    <a href="#"
                        class="bg-sb relative hidden items-center px-4 py-2 text-sm font-semibold text-accent ring-1 ring-inset ring-white ring-opacity-10 hover:bg-neutral-600 focus:z-20 focus:outline-offset-0 md:inline-flex">3</a>
                    <span
                        class="bg-sb relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-400 ring-1 ring-inset ring-white ring-opacity-10 focus:outline-offset-0">...</span>
                    <a href="#"
                        class="bg-sb relative hidden items-center px-4 py-2 text-sm font-semibold text-accent ring-1 ring-inset ring-white ring-opacity-10 hover:bg-neutral-600 focus:z-20 focus:outline-offset-0 md:inline-flex">8</a>
                    <a href="#"
                        class="bg-sb relative inline-flex items-center px-4 py-2 text-sm font-semibold text-accent ring-1 ring-inset ring-white ring-opacity-10 hover:bg-neutral-600 focus:z-20 focus:outline-offset-0">9</a>
                    <a href="#"
                        class="bg-sb relative inline-flex items-center px-4 py-2 text-sm font-semibold text-accent ring-1 ring-inset ring-white ring-opacity-10 hover:bg-neutral-600 focus:z-20 focus:outline-offset-0">10</a>
                    <a href="#"
                        class="bg-sb relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-white ring-opacity-10 hover:bg-neutral-600 focus:z-20 focus:outline-offset-0">
                        <span class="sr-only">Next</span>
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </nav>
            </div>
        </div>
    </div> --}}

</div>