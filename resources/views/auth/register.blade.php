@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @if ($errors->any())
                <div class="section section-notifications col-md-12" id="notifications">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-warning" role="alert">
                            <div class="container">
                                <div class="alert-icon">
                                    <i class="now-ui-icons ui-1_bell-53"></i>
                                </div>
                                <strong>Warning!</strong> {{ $error }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="now-ui-icons ui-1_simple-remove"></i>
                            </span>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="card card-signup ml-auto mr-auto">
                <div class="card-body">
                    <h4 class="card-title text-center">Register</h4>

                    {{--<div class="social text-center">--}}
                    {{--<button class="btn btn-icon btn-round btn-twitter">--}}
                    {{--<i class="fa fa-twitter"></i>--}}
                    {{--</button>--}}
                    {{--<button class="btn btn-icon btn-round btn-dribbble">--}}
                    {{--<i class="fa fa-dribbble"></i>--}}
                    {{--</button>--}}
                    {{--<button class="btn btn-icon btn-round btn-facebook">--}}
                    {{--<i class="fa fa-facebook"> </i>--}}
                    {{--</button>--}}
                    {{--<h5 class="card-description"> or be classical </h5>--}}
                    {{--</div>--}}
                    <form class="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="input-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <span class="input-group-addon">
                            <i class="now-ui-icons users_circle-08"></i>
                        </span>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required
                                   autofocus placeholder="Name...">
                        </div>
                        <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <span class="input-group-addon">
                            <i class="now-ui-icons ui-1_email-85"></i>
                        </span>
                            <input type="email" name="email" class="form-control" placeholder="Email..." value="{{
                                old('email') }}" required>
                        </div>

                        <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <span class="input-group-addon">
                            <i class="now-ui-icons ui-1_lock-circle-open"></i>
                        </span>
                            <input type="password" name="password" class="form-control" placeholder="Password...">
                        </div>

                        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="now-ui-icons ui-1_lock-circle-open"></i>
                        </span>
                            <input type="password" name="password_confirmation" class="form-control"
                                   placeholder="Password confirmation...">
                        </div>

                        <!-- If you want to add a checkbox to this form, uncomment this code -->
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox">
                                <span class="form-check-sign"></span>
                                I agree to the terms and
                                <a href="#something">conditions</a>.
                            </label>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary btn-round btn-lg">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('endjs')
    @if($errors->any())
        <script>
            $('#notifications').show();
        </script>
    @endif
@endsection