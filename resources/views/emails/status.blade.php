<x-mail::message>
# Status Update For {{$bot->username}}

Your bot has been {{$status}}, <br>
{{$reason}}.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
