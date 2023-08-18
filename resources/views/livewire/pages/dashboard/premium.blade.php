<div class=" text-center text-xl text-white p-3 bg-dsb rounded-xl mx-auto relative">

    @switch(Auth::user()->premium)
        @case(1)
            <h1>Active Plan: <span class="text-accent">Basic</span></h1>
            @break
        @case(2)
            <h1>Active Plan: <span class="text-accent">Supreme</span></h1>
            @break
        @case(2)
            <h1>Active Plan: <span class="text-accent">Highlighted</span></h1>
            @break
        @default
            <h1>Active Plan: None</h1>
    @endswitch

    <a href="http://customer.discordadvertising.com/" class=" absolute right-4 top-1/2 -translate-y-1/2 text-sm italic text-gray-400 "> manage plan <span class="text-accent text-sm"> <i class="fa-solid fa-arrow-right"></i> </span></a>

</div>

<div>
<script async src="https://js.stripe.com/v3/pricing-table.js"></script>
<stripe-pricing-table pricing-table-id="prctbl_1NaOYNFRSYCAp2ugYGmfUjzs"
publishable-key="pk_live_51NYsI1FRSYCAp2ugXtJbsOMJqR8PtMSSSq5MWTJaIQdyrR51aozpOyE3kybmW47HiSEZxeWmcz5dPzkOTEd4n03h00dF7hei0I">
</stripe-pricing-table>
</div>
