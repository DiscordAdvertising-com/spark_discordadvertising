<div>
    
    <h1 class="text-3xl text-white font-semibold">Upload Bot</h1>
    <div class="mt-10">
        <div class="w-full p-6 bg-dsb rounded-lg border border-db relative overflow-hidden ">
            <h1 class="text-gray-200 text-xl font-bold border-b border-opacity-10 border-white pb-6"> <span class="text-accent">Step 1.</span> - Bot Credentials</h1>
            <div class="max-w-[50rem] grid gap-y-6 mt-6">

                <div class="grid gap-y-2">

                    <label class="text-gray-400" for="clientid">Application ID</label>
                    <div class="md:flex grid gap-5">
                        <input wire:model="botClientID" name="clientid" type="text"
                        class="w-full bg-input p-4 rounded-lg focus:ring-2 focus:ring-accent  focus:outline-none text-gray-200" required>
                        <button wire:click="findBot" class="w-[10rem] md:h-auto h-[56px] bg-accent hover:bg-accent/60 rounded-lg text-white font-semibold"> <li class="fa-solid fa-search"></li> Find Bot</button>
                    </div>
                    <li class="fa-solid fa-arrow-right ml-1 text-accent">
                        <a href="https://docs.discordadvertising.com/getting-your-application-id" class="text-sm text-gray-500">How to find your bot's Application ID</a>
                    </li>
                </div>

            </div>
        </div>
    </div>
    @if($bot)
        <div class="mt-10 relative">
            <div class="w-full bg-dsb rounded-lg border border-db relative overflow-hidden ">
                <div class="p-6">
                    <h1 class="text-gray-200 text-xl font-bold border-b border-opacity-10 border-white pb-6"> <span class="text-accent">Step 2.</span> - Bot Descriptions</h1>
                    <div class="max-w-[50rem] grid gap-y-6 mt-6">
        
                        <div class="grid gap-y-2">
    
                            <label class="text-gray-400" for="headline">Bot Headline</label>
                            <div class="flex gap-x-5 relative">
                                <textarea wire:model="headline" class="w-full bg-input p-4 rounded-lg focus:ring-2 focus:ring-accent  focus:outline-none text-gray-200" name="headline" @if(Auth::user()->premium > 0) maxlength="60" @else maxlength="40" @endif></textarea>
                                <h1 class=" text-accent text-sm absolute right-1 bottom-1">{{strlen($headline)}} / 40</h1>
                            </div>
        
                        </div>
                        <div class="grid gap-y-2">
        
                            <label class="text-gray-400" for="description">Bot Description</label>
                            <div class="flex gap-x-5 relative">
                                <textarea class="w-full bg-input p-4 rounded-lg focus:ring-2 focus:ring-accent  focus:outline-none text-gray-200" rows="8" name="description" wire:model="description" maxlength="400"></textarea>
                                <h1 class=" text-accent text-sm absolute right-1 bottom-1">{{strlen($description)}} / 400</h1>
                            </div>
        
                        </div>
                        <div class="grid gap-y-5">
        
                            <label class="text-gray-400" for="clientid">Bot Tags</label>
                            @if(Auth::user()->premium >= 2)
                            <div class="flex gap-x-5">
                                <input type="text" wire:model="customTag" class="w-full bg-input p-4 rounded-lg focus:ring-2 focus:ring-accent  focus:outline-none text-gray-200" id=""/>
                                <button wire:click="addCustomTag" class=" bg-accent hover:bg-accent/60 rounded-lg w-[8rem] text-white font-semibold"> <li class="fa-solid fa-plus"></li> Add <span class="hidden md:block">Custom Tag</span></button>
                            </div>
                            @endif
                            <div class="flex gap-x-5">
                                <select wire:model="tag" class="w-full bg-input p-4 rounded-lg focus:ring-2 focus:ring-accent  focus:outline-none text-gray-200" id="">
                                    @foreach ($tags as $tag)
                                        <option value="{{$tag}}">{{$tag}}</option>
                                    @endforeach
                                </select>
                                <button wire:click="addTag" class=" bg-accent hover:bg-accent/60 rounded-lg w-[8rem] text-white font-semibold"> <li class="fa-solid fa-plus"></li> Add <span class="hidden md:block">Tag</span></button>
                            </div>
                            <div class="flex gap-x-5">
                                <div class="flex gap-x-5 relative w-full">
                                    <div class="w-full bg-input p-4 rounded-lg focus:ring-2 min-h-[3.5rem] focus:ring-accent focus:outline-none text-gray-200 flex  flex-wrap gap-3">

                                        @foreach ($addedTags as $tag)
                                            <span class=" bg-accent rounded-lg p-1.5 px-3 text-center">{{$tag}} <li class="fa-solid fa-x text-[0.8rem] ml-1 hover:cursor-pointer" wire:click="removeTag('{{$tag}}')"></li></span>
                                        @endforeach
            
                                    </div>                                    
                                    <h1 class=" text-accent text-sm absolute right-1 bottom-1">{{count($addedTags)}} / 3</h1>
                                </div>
                            </div>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if(count($addedTags) != 0 && strlen($description) != 0 && strlen($headline))
        <div class="mt-10">
            <div class="w-full p-6 bg-dsb rounded-lg border border-db relative overflow-hidden ">
                <h1 class="text-gray-200 text-xl font-bold border-b border-opacity-10 border-white pb-6"> <span class="text-accent">Step 3.</span> - Bot Owners</h1>
                <div class="max-w-[50rem] grid gap-y-6 mt-6">

                    <div class="grid gap-y-2">

                        <label class="text-gray-400" for="clientid">Discord ID</label>
                        <div class="md:flex grid gap-5">
                            <input name="clientid" wire:model="accountID" type="text"
                            class="w-full bg-input p-4 rounded-lg focus:ring-2 focus:ring-accent  focus:outline-none text-gray-200" required>
                            <button wire:click="addAccount" class="w-[12rem] bg-accent hover:bg-accent/60 rounded-lg text-white font-semibold md:h-auto h-[56px]"> <li class="fa-solid fa-search"></li> Find Account</button>
                        </div>
                        
                        <h1 class="text-sm text-gray-500">How to find someones discord ID<i class="fa-solid fa-arrow-right ml-1 text-accent"></i></h1>

                    </div>

                    
                    <div class="grid gap-y-2">

                        <label class="text-gray-400" for="clientid">Added Accounts</label>

                        @foreach ($accounts as $account)
                            
                            <div class="bg-input w-full p-4 rounded-lg text-gray-400">
                                <div class="relative w-full">
                                    <span class="text-gray-300">{{$account['username']}}</span> - {{$account['id']}}
                                    <li class="fa-solid absolute fa-x right-0 top-1/2 -translate-y-1/2 text-accent font-semibold hover:cursor-pointer" wire:click="removeAccount('{{$account['id']}}')"></li>
                                </div>
                            </div>

                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    @endif
    @if(count($addedTags) != 0 && strlen($description) != 0 && strlen($headline))
        <div class="mt-10">
            <div class="w-full p-6 bg-dsb rounded-lg border border-db relative overflow-hidden ">
                <h1 class="text-gray-200 text-xl font-bold border-b border-opacity-10 border-white pb-6"> <span class="text-accent">Step 4.</span> - Finish Bot Listing</h1>
                <div class="max-w-[50rem] grid gap-y-6 mt-6">
                    <div class="grid gap-y-2">
        
                        <label class="text-gray-400" for="invite">Bot Invite Link</label>
                        <div class="md:flex grid gap-5">
                            <input wire:model="invite" name="invite" type="text"
                            class="w-full bg-input p-4 rounded-lg focus:ring-2 focus:ring-accent  focus:outline-none text-gray-200" required>
                            <button wire:click="validateInvite" class="w-[10rem] bg-accent hover:bg-accent/60 rounded-lg text-white font-semibold md:h-auto h-[56px]"> <li class="fa-solid fa-search"></li> Validate</button>
                        </div>
    
                    </div>
                    <div class="grid gap-y-2">
                        
                        @if($inviteValid)
                            <button wire:click="createListing" class="w-fit bg-accent hover:bg-accent/60 rounded-lg text-white font-semibold p-3"> <li class="fa-solid fa-check mr-1"></li> Create Listing</button>
                        @endif
                        <li class="fa-solid fa-arrow-right ml-1 text-accent">
                        <a href="{{route('tos')}}" class="text-sm text-gray-500">By creating a bot listing you agree to our ToS</a>
                    </li>

                    </div>
                
                </div>
            </div>
        </div>
    @endif
</div>

{{-- Ask if want reload --}}
<script>
    window.onbeforeunload = function() {
        return "Are you sure you want to refresh the page?";
    };
</script>
