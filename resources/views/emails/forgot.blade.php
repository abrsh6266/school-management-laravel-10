@component('mail::message')
    <p>Hello {{$user->name}},</p>
    @component('mail::button',['url'=>url('reset/'.$user->remember_token)])
        Reset your Password
    @endcomponent
    <p>Incase you have any esssue when recovering your password, please contact us. </p>
    Thanks,<br>
    {{config('app.name')}}
@endcomponent