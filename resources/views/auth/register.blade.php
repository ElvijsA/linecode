@extends('layouts.app')

@section('content')



<div class="columns">
        <div class="column is-one-third is-offset-one-third m-t-100">
            <div class="card">
                <div class="card-content">
                    <h1 class="title">Register</h1>
                <form action="{{ route('register') }}" method="POST" role="form">
                    {{csrf_field()}}
                   

                    <div class="field">
                        <label for="name" class="label">Name</label>
                        <p class="control">
                            <input type="text" class="input {{$errors->has('name') ? 'is-danger' : ''}}" name="name" value="{{ old('name') }}" required>
                        </p>
                        @if ($errors->has('name'))
                            <p class="help is-danger">{{$errors->first('name')}}</p>
                        @endif
                    </div>

                    <div class="field">
                        <label for="email" class="label">Email Address</label>
                        <p class="control">
                            <input type="text" class="input {{$errors->has('email') ? 'is-danger' : ''}}" name="email" value="{{ old('email') }}" required>
                        </p>
                        @if ($errors->has('email'))
                            <p class="help is-danger">{{$errors->first('email')}}</p>
                        @endif
                    </div>
                    <div class="columns">
                        <div class="column">
                                <div class="field">
                                    <label for="password" class="label">Password</label>
                                    <p class="control">
                                        <input type="text" class="input {{$errors->has('password') ? 'is-danger' : ''}}" name="password" id="password" required>
                                    </p>
                                    @if ($errors->has('password'))
                                        <p class="help is-danger">{{$errors->first('password')}}</p>
                                    @endif
                                
                                </div>
                        </div>

                        <div class="column">
                                <div class="field">
                                    <label for="password_confirmation" class="label">Password Confirmation</label>
                                    <p class="control">
                                        <input type="text" class="input {{$errors->has('password_confirmation') ? 'is-danger' : ''}}" name="password_confirmation" id="password_confirmation" required>
                                    </p>
                                    @if ($errors->has('password_confirmation'))
                                        <p class="help is-danger">{{$errors->first('password_confirmation')}}</p>
                                    @endif
                                
                                </div>
                        </div>
                    </div>
               
                   <button type="submit" class="button is-primary is-outlined is-fullwidth m-t-30">Register</button>
                </form>
                </div>
            </div>
            <h5 class="has-text-centered m-t-20"><a href="{{route('login')}}" class="is-muted">Already have an Account?</a>
        </div>
    </div>

<!--<section class="hero">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Register
                </h1>
            </div>
        </div>
    </section>

    <div class="columns is-marginless is-centered">
        <div class="column is-5">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">Register</p>
                </header>

                <div class="card-content">
                    <form class="register-form" method="POST" action="{{ route('register') }}">

                        {{ csrf_field() }}

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Name</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input" id="name" type="name" name="name" value="{{ old('name') }}"
                                               required autofocus>
                                    </p>

                                    @if ($errors->has('name'))
                                        <p class="help is-danger">
                                            {{ $errors->first('name') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">E-mail Address</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input" id="email" type="email" name="email"
                                               value="{{ old('email') }}" required autofocus>
                                    </p>

                                    @if ($errors->has('email'))
                                        <p class="help is-danger">
                                            {{ $errors->first('email') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Password</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input" id="password" type="password" name="password"
                                               aria-describedby="passwordHelpText" required>
                                    </p>

                                    @if ($errors->has('password'))
                                        <p class="help is-danger">
                                            {{ $errors->first('password') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Confirm Password</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input" id="password-confirm" type="password"
                                               name="password_confirmation" required>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label"></div>

                            <div class="field-body">
                                <div class="field is-grouped">
                                    <div class="control">
                                        <button type="submit" class="button is-primary">Register</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>-->
@endsection
