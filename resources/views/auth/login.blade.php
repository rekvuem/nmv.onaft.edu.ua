@extends('layouts.app')
@section('content')
    <div class="content d-flex justify-content-center align-items-center">
        <!-- Login form -->
        <div class="card mb-0">


            <div class="tab-content card-body">


                    <form method="POST" action="{{ route('login') }}" class="login-form">
                        {{ csrf_field() }}
                        <div class="text-center mb-3">
                            <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                            <h5 class="mb-0">{{ __('Форма авторизування') }}</h5>
                            <span class="d-block text-muted">Ваші данні</span>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="text" id="email" name="email" class="form-control"
                                    placeholder="{{ __('E-Mail') }}" value="{{ old('email') }}" autocomplete="email" autofocus>
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                            @if ($errors->has('email'))
                                @foreach ($errors->get('email') as $error)
                                    <span class="badge d-block bg-warning-600 form-text">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="password" name="password" class="form-control" placeholder="{{ __('Пароль') }}" autocomplete="current-password">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                            @if ($errors->has('password'))
                                @foreach ($errors->get('password') as $error)
                                    <span class="badge d-block bg-warning-600 form-text">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>

                        <div class="form-group d-flex align-items-center">
                            <div class="form-check mb-0">
                                <label class="form-check-label">
                                    <input type="checkbox" name="remember" class="form-input-styled" id="remember" {{ old('remember') ? 'checked' : '' }} data-fouc \> запам'ятати
                                </label>
                            </div>

                            <a href="#" class="ml-auto">Забули пароль?</a>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Авторизуватись
                                <i class="icon-circle-right2 ml-2"></i>
                            </button>
                        </div>

                    </form>

                <div class="form-group text-center text-muted content-divider">
                    <span class="px-2">чи зареїстрируйтесь</span>
                </div>

                <div class="form-group">
                    <a href="{{ route('register') }}" class="btn btn-light btn-block legitRipple">Реїстрація</a>
                </div>

            </div>
        </div>
    </div>
@endsection
