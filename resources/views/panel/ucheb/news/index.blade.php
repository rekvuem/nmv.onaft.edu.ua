@extends('panel.layout.index')
@section('title','Новини')
@section('page_styles')

@endsection
@section('page_script')

@endsection
@section('content')
@include('panel/component/allmessage')
@include('panel/component/fab')
<div class="row mb-2 collapse" id="collapse-form">
  <div class="col-md-10">
    <a href="{{route('spanel.ucheb.news.create')}}" class=" btn bg-green-600 mr-1">Додати</a>
  </div>
</div>



<div class="row">
  <div class="col-md-10">
    <div class="card">
      {{ $NewsList->links() }}
      <div class="card-body">
        <table class="table table-responsive-lg table-bordered">
          <thead>
            <tr>
              <th>Дата створення</th>
              <th>Назва новини (статі)</th>
              <th>Функції</th>
            </tr>
          </thead>
          <tbody>
            @forelse($NewsList as $news)
            <tr>
              <td>
                <div class="">
                  {{$news->updated_at->format('d.m.Y H:i')}}
                </div>
              </td>
              <td>
                <div>{{$news->title_news_uk}}</div>
              </td>
              <td>
                <div class="btn-group ">
                  <a href="{{route('spanel.ucheb.news.show', $news->id)}}" class="btn btn-icon btn-sm bg-blue-600">
                    <i class="icon-file-eye2"></i>
                  </a>
                  <a href="{{route('spanel.ucheb.news.edit', $news->id)}}" class="btn btn-icon btn-sm bg-info-600">
                    <i class="icon-pencil6"></i>
                  </a>
                  <form action="{{route('spanel.ucheb.news.destroy', $news->id)}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-icon btn-sm bg-danger-600" title="видалити"><i class="icon-cross2"></i></button>    
                  </form>
                </div>
              </td>
            </tr>
            @empty
            <tr><td colspan="5">Пусто</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
      {{ $NewsList->links() }}
    </div>
  </div>
</div>
@endsection