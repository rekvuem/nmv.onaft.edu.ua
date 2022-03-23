@extends('panel.layout.index')
@section('title','Головна')
@section('content')
    @can('posit-admin-role')
        <div class="row">
            <div class="col-6 col-sm-6 col-md-2">
                <div class="card card-body bg-blue-600 has-bg-image">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="mb-0">-</h3>
                            <span class="text-uppercase font-size-xs">total comments</span>
                        </div>

                        <div class="ml-3 align-self-center">
                            <i class="icon-bubbles4 icon-3x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-6 col-md-2">
                <div class="card card-body bg-success-400 has-bg-image">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="mb-0">-</h3>
                            <span class="text-uppercase font-size-xs">total clicks</span>
                        </div>
                        <div class="mr-3 align-self-center">
                            <i class="icon-pointer icon-3x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-6 col-md-2">
                <div class="card card-body bg-brown-400 has-bg-image">
                    <div class="media">
                        <div class="mr-3 align-self-center">
                            <i class="icon-pointer icon-3x opacity-75"></i>
                        </div>

                        <div class="media-body text-right">
                            <h3 class="mb-0">-</h3>
                            <span class="text-uppercase font-size-xs">total clicks</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-6 col-md-2">
                <div class="card card-body bg-indigo-400 has-bg-image">
                    <div class="media">
                        <div class="mr-3 align-self-center">
                            <i class="icon-pointer icon-3x opacity-75"></i>
                        </div>

                        <div class="media-body text-right">
                            <h3 class="mb-0">-</h3>
                            <span class="text-uppercase font-size-xs">total clicks</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endsection