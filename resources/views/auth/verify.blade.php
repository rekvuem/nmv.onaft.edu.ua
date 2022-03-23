@extends('layouts.app')
@section('content')
<div class="content d-flex justify-content-center align-items-center">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header" style="font-size: 2.4em; font-weight: bold;">{{ __('Перевірте свою адресу електронної пошти') }}</div>

        <div class="card-body">
          @if (session('resent'))
          <div class="alert alert-success" role="alert">
            {{ __('На вашу електронну адресу надіслано нове підтвердження для підтвердження.') }}
          </div>
          @endif
          <div class="row">
          {{ __('Перш ніж продовжувати, перегляньте свій електронний лист на наявність підтвердження.') }}
            {{ __('Якщо ви не отримали електронний лист') }}
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('натисніть тут, щоб подати запит на інший') }}</button>.
            </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
