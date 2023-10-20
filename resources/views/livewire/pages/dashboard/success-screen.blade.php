<div>
    <div>
        <h1 class="text-2xl text-white font-bold tracking-widest"> Thanks for submitting your bot / server!</h1>
        <p class="text-lg text-gray-400 mt-2 tracking-widest">
            Your bot / server "{{Session::get('botName')}}" is pending approval so it will not be shown on the public page yet. <br> Please wait up to 12 hours for the reviewal team to check your bot / server, you will receive an email with any updates! <br>If you need any support, <a class="text-accent" href="https://discord.gg/vUxdpAmN6v">please join our support server.</a>
        </p>
        <button wire:click="redirectToList" class="w-fit bg-accent rounded-lg text-white font-semibold py-1.5 px-3 mt-4 text-lg"> <li class="fa-solid fa-list mr-1"></li> My Bots</button>

    </div>
</div>

