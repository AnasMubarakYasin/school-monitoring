<x-mail::message>
{{-- <p style="text-align: center;">
    <img src="{{  $url."/mstile-70x70.png"  }}" alt="brand bladerlaiga" width="64" height="64" />
</p> --}}

# Application Updated Notification!

Dear client.  
The {{ $name }} was update to v{{ $num }}.  
You can see **[here]({{ $url }})**.

{{-- ![The San Juan Mountains are beautiful!]({{ $url."/favicon-32x32.png" }} "brand bladerlaiga") --}}
{{-- <x-mail::button :url="$url">
</x-mail::button> --}}

Regards,  
{{ $vendor }}.

---

the message was send by **bot**, don't reply.
</x-mail::message>
