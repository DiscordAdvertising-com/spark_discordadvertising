<div class="fixed bottom-[1rem] right-[1rem] h-auto w-[20rem] z-20">
    @foreach($notifications as $key => $notification)
        <div x-data="{ show: true }"
             x-init="setTimeout(() => { $('.alert{{$key}}').fadeOut(1000, function() { $(this).remove(); }); }, 2000);"
             x-show="show"
             class="@if($notification['title'] == 'Success') bg-green-100 border-green-500 text-green-700 @elseif($notification['title'] == 'Error') bg-red-100 border-red-500 text-red-700 @endif mt-2 border-l-4 w-full flex flex-auto alert{{$key}} p-4"
             role="alert">
            <i class="fa-solid @if($notification['title'] == 'Success') fa-circle-check @else fa-circle-xmark @endif my-auto text-3xl mr-2"></i>
            <div>
                <p class="font-bold">{{ $notification['title'] }}</p>
                <p>{{ $notification['message'] }}</p>
            </div>
        </div>
        {{ session()->forget("notifications.$key") }}
    @endforeach
</div>