@extends('layouts.app')
@section('content')
    <div class="content d-flex justify-content-center align-items-center">
        <form method="POST" id="formRegisration" class="login-form" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="card mb-0">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
                        <h5 class="mb-0">Реєстрація користувача</h5>
                        <span class="d-block text-muted">Всі поля потрібно заповнити</span>
                    </div>

                    <div class="form-group text-center text-muted content-divider">
                        <span class="px-2">Данні для авторизації</span>
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input id="email" type="email"
                                class="form-control"
                                value="{{ old('email') }}"
                                name="email"
                                autocomplete="email"
                                placeholder="{{ __('E-Mail') }}" autofocus>
                        <div class="form-control-feedback">
                            <i class="icon-mention text-muted"></i>
                        </div>
                        @if ($errors->has('email'))
                            @foreach ($errors->get('email') as $error)
                                <span class="badge d-block bg-teal-600 form-text">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input id="password" type="password"
                                class="form-control"
                                name="password"
                                placeholder="{{ __('Пароль') }}"
                                >
                        <div class="form-control-feedback">
                            <i class="icon-user-lock text-muted"></i>
                        </div>
                        @if ($errors->has('password'))
                            @foreach ($errors->get('password') as $error)
                                <span class="badge d-block bg-teal-600 form-text">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation"
                                placeholder="{{ __('Підвердження паролю')  }}"
                                autocomplete="new-password">
                        <div class="form-control-feedback">
                            <i class="icon-user-lock text-muted"></i>
                        </div>
                    </div>

                    <div class="form-group text-center text-muted content-divider">
                        <span class="px-2">Ваші данні</span>
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="text" class="form-control" name="familia" value="{{ old('familia') }}" placeholder="Призвіще">
                        <div class="form-control-feedback">
                            <i class="mi-assignment-ind text-muted"></i>
                        </div>
                        @if ($errors->has('familia'))
                            @foreach ($errors->get('familia') as $error)
                                <span class="badge d-block bg-teal-600 form-text">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="text" class="form-control" name="imya" value="{{ old('imya') }}" placeholder="І`мя">
                        <div class="form-control-feedback">
                            <i class="mi-assignment-ind text-muted"></i>
                        </div>
                        @if ($errors->has('imya'))
                            @foreach ($errors->get('imya') as $error)
                                <span class="badge d-block bg-teal-600 form-text">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="text" class="form-control" name="otchestvo" value="{{ old('otchestvo') }}" placeholder="Побатькові">
                        <div class="form-control-feedback">
                            <i class="mi-assignment-ind text-muted"></i>
                        </div>
                        @if ($errors->has('otchestvo'))
                            @foreach ($errors->get('otchestvo') as $error)
                                <span class="badge d-block bg-teal-600 form-text">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input id='department'
                                type="text"
                                class="form-control"
                                name="department"
                                value="{{ old('department') }}"
                                placeholder="{{ __('Відділ / Підрозділ') }}">
                        <div class="form-control-feedback">
                            <i class="icon-reading text-muted"></i>
                        </div>
                        @if ($errors->has('department'))
                            @foreach ($errors->get('department') as $error)
                                <span class="badge d-block bg-teal-600 form-text">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input id='position' type="text" class="form-control" name="position" value="{{ old('position') }}" placeholder="{{ __('Посада') }}">
                        <div class="form-control-feedback">
                            <i class="icon-user-tie text-muted"></i>
                        </div>
                        @if ($errors->has('position'))
                            @foreach ($errors->get('position') as $error)
                                <span class="badge d-block bg-teal-600 form-text">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="text"
                                class="form-control phone"
                                name="num_mobile"
                                value="{{ old('num_mobile') }}"
                                >
                        <div class="form-control-feedback">
                            <i class="icon-mobile2 text-muted"></i>
                        </div>
                        @if ($errors->has('num_mobile'))
                            @foreach ($errors->get('num_mobile') as $error)
                                <span class="badge d-block bg-teal-600 form-text">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="text" class="form-control datehappy" name="happy" value="{{ old('date_happy') }}" placeholder="{{ __('Дата народження') }}">
                        <div class="form-control-feedback">
                            <i class="icon-calendar2 text-muted"></i>
                        </div>
                        @if ($errors->has('happy'))
                            @foreach ($errors->get('happy') as $error)
                                <span class="badge d-block bg-teal-600 form-text">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group text-center text-muted content-divider">
                        <span class="px-1">Terms &amp; Conditions and Cookie Policy</span>
                    </div>

                    <div class="form-check mb-2">
                        <label class="form-check-label">
                            <input type="checkbox" name="accept_terms" class="form-input-styled" {{ old('accept_terms') ? 'checked' : '' }} data-fouc \> Accept terms of service
                        </label>
                    </div>

                    <div class="form-check mb-0">
                        <label class="form-check-label">
                            <input type="checkbox" name="cookie_policy" class="form-input-styled" {{ old('cookie_policy') ? 'checked' : '' }} data-fouc \> Cookie Policy
                        </label>
                    </div>

                    <div class="form-group text-center text-muted content-divider">
                        <span class="px-2">Додатково</span>
                    </div>


                    <div class="form-group text-justify">
                        <p>При заповненні форми Ви автоматично підтверджуєте передачу та обробку персональних даних.</p>
                    </div>

                    <button type="submit" class="btn bg-teal-400 btn-block">{{ __('Зареїструватися') }}
                        <i class="icon-circle-right2 ml-2"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
