<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
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

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Hide the element on mobile devices */
        @media only screen and (max-width: 487px) {
            .hide-on-mobile {
                position: absolute;
                left: 5px;
                top: 80px;
            }
        }
    </style>
    </head>
    <body>
    
    <!-- Your HTML content -->
    <a href="http://customer.discordadvertising.com/" class="absolute right-4 top-1/2 -translate-y-1/2 text-sm italic text-gray-400 hide-on-mobile"> manage plan <span class="text-accent text-sm"> <i class="fa-solid fa-arrow-right"></i> </span></a>
    
    </body>
    </html>
    

</div>
</body>
<br>
<div>
    <script async src="https://js.stripe.com/v3/pricing-table.js"></script>
    <stripe-pricing-table pricing-table-id="prctbl_1NiK7HFRSYCAp2ugO8qzwPWN"
    publishable-key="pk_live_51NYsI1FRSYCAp2ugXtJbsOMJqR8PtMSSSq5MWTJaIQdyrR51aozpOyE3kybmW47HiSEZxeWmcz5dPzkOTEd4n03h00dF7hei0I">
    </stripe-pricing-table>
</div>