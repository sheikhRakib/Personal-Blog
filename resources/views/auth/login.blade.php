@extends('auth.app')

@section('content')
<div class="card-body login-card-body">
    <p class="login-box-msg">sign-in to start your Session.</p>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <x-auth.form.input name='email' type='email' placeholder="name@domain.com" icon='envelope'/>
        <x-auth.form.input name='password' type='password' placeholder="password" icon='lock'/>

        <div class="row">
            <x-auth.form.remember />
            <x-auth.form.submit />
        </div>
    </form>
</div>
@endsection
