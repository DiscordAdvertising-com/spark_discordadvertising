<div class=" text-center text-xl text-white p-3 bg-dsb rounded-xl mx-auto relative">

    @switch(Auth::user()->premium)
        @case(1)
            <h1>Active Plan: <span class="text-accent">Basic</span></h1>
            @break
        @case(2)
            <h1>Active Plan: <span class="text-accent">Supreme</span></h1>
            @break
        @case(3)
            <h1>Active Plan: <span class="text-accent">Highlighted</span></h1>
            @break
        @default
            <h1>Active Plan: Free</h1>
    @endswitch

    <a href="http://customer.discordadvertising.com/" class=" absolute right-4 top-1/2 -translate-y-1/2 text-sm italic text-gray-400 "> manage plan <span class="text-accent text-sm"> <i class="fa-solid fa-arrow-right"></i> </span></a>

</div>
<br>
<div>
    <script async src="https://js.stripe.com/v3/pricing-table.js"></script>
    <stripe-pricing-table pricing-table-id="prctbl_1NiK7HFRSYCAp2ugO8qzwPWN"
    publishable-key="pk_live_51NYsI1FRSYCAp2ugXtJbsOMJqR8PtMSSSq5MWTJaIQdyrR51aozpOyE3kybmW47HiSEZxeWmcz5dPzkOTEd4n03h00dF7hei0I">
    </stripe-pricing-table>
</div>
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/64f936f1b2d3e13950ee65f6/1h9mnt8g4';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3693059889859602"
    crossorigin="anonymous"></script>