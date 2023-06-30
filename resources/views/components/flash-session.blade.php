<div class=" fixed bottom-[1rem] right-[1rem] h-auto w-[20rem] z-20">

    @if (session()->has('success'))

        <div x-init="setTimeout(() => { closeComponent() }, 2000);" class="bg-green-100 mt-2 border-l-4 w-full flex flex-auto alert-success border-green-500 text-green-700 p-4" role="alert">
            <i class="fa-solid fa-circle-check my-auto text-3xl mr-2"></i>
            <div>
                <p class="font-bold">Success</p>
                <p>{{session('success')}}</p>
            </div>
        </div>
        
    @endif 

    @if (session()->has('error'))
        
        <div x-init="setTimeout(() => { closeComponent2() }, 2000);" class="bg-red-100 mt-2 border-l-4 w-full flex flex-auto alert-error border-red-500 text-red-700 p-4" role="alert">
            <i class="fa-solid fa-circle-xmark my-auto text-3xl mr-2"></i>
            <div>
                <p class="font-bold">Error</p>
                <p>{{session('error')}}</p>
            </div>
        </div>
    
    @endif 

    <script>
        function closeComponent() {
            $(".alert-success").fadeOut(1000, function() { $(this).remove(); });
        }

        function closeComponent2() {
            $(".alert-error").fadeOut(1000, function() { $(this).remove(); });
        }
    </script>

</div>