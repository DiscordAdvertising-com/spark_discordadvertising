<div>
  @include('layouts.header')

  <div class="w-full flex flex-col text-gray-400 gap-5 mt-48">

    <div class="w-full relative">
      <div class="font-bold tracking-widest">
          <h1 class="text-accent">Contact</h1>
          <h1 class="text-white text-3xl">Contact us trough the form below</h1>
          <br>
      </div>
  </div>

    <div class="w-full flex flex-col gap-2">
      <label for="name">Name</label>
      <input wire:model="name" class="w-full bg-input p-4 rounded-lg focus:ring-2 focus:ring-accent  focus:outline-none text-gray-200" type="text">
    </div>
    
    <div class="w-full flex flex-col gap-2">
      <label for="email">Email</label>
      <input wire:model="email" class="w-full bg-input p-4 rounded-lg focus:ring-2 focus:ring-accent  focus:outline-none text-gray-200" type="email">
    </div>

    <div class="w-full flex flex-col gap-2">
      <label for="description">Description</label>
      <textarea wire:model="description" class="w-full bg-input p-4 rounded-lg focus:ring-2 focus:ring-accent  focus:outline-none text-gray-200" rows="7"></textarea>
    </div>

    <button wire:click="contact" class="w-fit text-lg @if($sent) bg-green-500 @else bg-accent @endif rounded-lg text-white font-semibold p-3 px-5"> <li class="@if($sent) fa-solid fa-check @else fa-solid fa-paper-plane @endif mr-1"></li> @if($sent) Sent @else Send @endif</button>


  </div>

</div>