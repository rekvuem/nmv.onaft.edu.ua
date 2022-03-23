@extends('panel.layout.index')@section('title','Управління сторінками сайту')
@section('page_styles')
@endsection
@section('page_script')
    <script>
        $(document).ready(function () {

        });
    </script>
@endsection
@section('content')
    @include('panel/component/allmessage')
    <div class="col-md-12">
        <div class="row">
            <div class="col-10">
                <div class="card">
                    {{session('page_on')}}
                    <div class="card-body">
                    @if(request()->get('show') == 'edit')
                            <form action="{{route('spanel.admin.page_upd', ['id'=>$page_edit->id_page])}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <input type="hidden" name="page_on" value="{{ $pages->currentPage() }}">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="page">Сторінка</label>
                                            <input id="page" type="text" class="form-control" name="page" value="{{ $page_edit->page }}">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="grouppage">Категорія</label>
                                            <input id="grouppage" type="text" class="form-control" name="group_page" value="{{ $page_edit->page_group }}">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="titlepage">Назва сторінки</label>
                                            <input id="titlepage" type="text" class="form-control" name="title_page" value="{{ $page_edit->title_page }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <button type="submit" class="btn btn-success">Зберегти</button>
                                </div>
                            </form>
                        @else
                            <form action="{{route('spanel.admin.page_save')}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="page">Сторінка</label>
                                            <input id="page" type="text" class="form-control" name="page" value="{{ old('page') }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="grouppage">Категорія</label>
                                            <input id="grouppage" type="text" class="form-control" name="group_page" value="{{ old('group_page') }}">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="titlepage">Назва сторінки</label>
                                            <input id="titlepage" type="text" class="form-control" name="title_page" value="{{ old('title_page') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <button type="submit" class="btn btn-info">Додати</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="card">
                <div class="col-12">
                    <table class="table table-bordered mb-2">
                        <thead>
                        <tr>
                            <th>сторінка</th>
                            <th>група сторінки</th>
                            <th>назва сторінки</th>
                            <th>функції</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pages as $page)
                            <tr>
                                <td>{{$page->page}}</td>
                                <td>{{$page->page_group}}</td>
                                <td>{{$page->title_page}}</td>
                                <td>
                                    <a href="{{ route('spanel.admin.page_index', ['id'=>$page->id_page, 'show'=>'edit']) }}">ред.</a>
                                    <a href="">вид.</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                  {{ $pages->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

@endsection
