<x-mail::message>
# Status Update For {{$server->name}}

Your bot has been {{$status}}, <br>
{{$reason}}.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
