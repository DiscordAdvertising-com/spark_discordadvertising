<div class="w-full lg:p-10 p-4 flex flex-col gap-6">

    <div class="w-full">

        <h1 class="text-5xl text-white tracking-wide font-semibold border-b pb-6">Home <span
                class="text-2xl text-gray-400">/ BotList</span></h1>

    </div>

    <div class="lg:w-fit flex flex-col md:flex-row gap-x-5">

        <div class="w-full">
            <label for="filter" class="text-gray-500 italic block">Search</label>
            <input wire:model="search" name="filter" id="filter"
                class="p-3 h-[3.5rem] rounded-lg w-full lg:w-[20rem] 2xl:w-[40rem] bg-sb border-opacity-10 text-gray-400 cursor-pointer focus:ring-1 focus:ring-accent focus:outline-none"
                placeholder="Search..." />
        </div>

        <div>
            <button
                class="my-auto bg-accent text-white rounded-lg w-full md:w-[4rem] h-[3.5rem] mt-[1.5rem] text-xl font-bold">
                <i class="fa-solid fa-search"></i>
            </button>
        </div>
    </div>

    <div class="w-full grid grid-cols-5 gap-5">

        @foreach($tags as $tag) 

            <div class="w-full text-accent rounded-xl p-4 bg-sb">

                <div class="relative"> 
                    <h1 class="text-white text-xl">{{$tag->name}}</h1>
                    <i wire:click="remove('{{$tag->name}}')" class="fa-solid fa-x cursor-pointer absolute top-1/2 -translate-y-1/2 right-0"></i>
                </div>

            </div>

        @endforeach

    </div>

    <div class="lg:w-fit flex flex-col md:flex-row gap-x-5">

        <div class="w-full">
            <label for="filter" class="text-gray-500 italic block">Create</label>
            <input wire:model="tag" name="filter" id="filter"
                class="p-3 h-[3.5rem] rounded-lg w-full lg:w-[20rem] 2xl:w-[40rem] bg-sb border-opacity-10 text-gray-400 cursor-pointer focus:ring-1 focus:ring-accent focus:outline-none"
                placeholder="" />
        </div>

        <div>
            <button
                wire:click="add"
                class="my-auto bg-accent text-white rounded-lg w-full md:w-[4rem] h-[3.5rem] mt-[1.5rem] text-xl font-bold">
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>
    </div>

</div>