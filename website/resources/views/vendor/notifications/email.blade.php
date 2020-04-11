@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Bonjour!')
@endif
@endif

{{-- Intro Lines --}}

<span>Vous recevez cet e-mail, car nous avons reçu une demande de réinitialisation de mot de passe pour votre compte.</span>

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
<span>

Ce lien de réinitialisation de mot de passe expirera dans 60 minutes.
<br>
Si vous n'avez pas demandé de réinitialisation du mot de passe, aucune autre action n'est requise.
<br>
Cordialement,
</span>


{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')

@endslot
@endisset
@endcomponent
