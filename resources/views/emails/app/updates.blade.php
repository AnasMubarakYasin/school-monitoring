<x-mail::message>
# Application New Updates!

Dear {{ $stakeholder }}.  
The {{ $name }} v{{ $last_version }} was update to v{{ $version }}.  
You can see **[here]({{ $link }})**.

## What's Changes
{{ $changes }}

Regards,  
{{ $vendor }}.

---

the message was send by **bot**, don't reply.
</x-mail::message>
