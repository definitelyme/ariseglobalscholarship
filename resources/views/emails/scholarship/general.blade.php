@component('mail::message')
## Hi {{ $user->first_name }},

<span style="text-align: justify; text-justify: inter-word;">
{{ $body }}
<span>

@if ($has_action_button)
    @component('mail::button', ['url' => $route])
        Attach Documents
    @endcomponent

    If you're having trouble clicking the "Attach Documents" button, copy and paste the URL below into your web browser: [{{ $route }}]({{ $route }})
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent
