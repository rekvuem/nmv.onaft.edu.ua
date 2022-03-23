<?php

namespace App\Http\Controllers\UserPanel\Ucheb;

use App\Http\Controllers\UserPanel\BaseController;
use Illuminate\Http\Request;
use App\Models\News\NewsShow;
use App\Models\News\NewsImg;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;

class NewsController extends BaseController {

  protected $messageBag;

  public function index() {
    $NewsList = NewsShow::with('newsimg')->paginate(10);

    return view('panel.ucheb.news.index', compact('NewsList'));
  }

  public function create() {
    return view('panel.ucheb.news.add');
  }

  public function store(Request $request, MessageBag $messageBag) {
    $messageBag->add('add', 'Новина додано!');
    $this->validate($request, [
      'title_news_uk'  => 'required|max:255',
      'title_news_ru'  => 'required|max:255',
      'discription_uk' => 'required',
      'discription_ru' => 'required',
    ]);

    $FileImageNews = $request->imagesadd;
    $slug          = rand(9999, 15) . '-' . $request['title_news_uk'];

    $News = NewsShow::create([
          'title_news_uk'  => $request['title_news_uk'],
          'title_news_ru'  => $request['title_news_ru'],
          'title_slug'     => str_slug($slug, '-'),
          'discription_uk' => $request['discription_uk'],
          'discription_ru' => $request['discription_ru'],
    ]);

    foreach ($FileImageNews as $FileNews)
    {
      $directory = 'news/' . date('m.Y');
      $FileName  = date('d') . "_" . $FileNews->getClientOriginalName();

      Storage::makeDirectory($directory);
      Storage::putFileAs($directory, $FileNews, $FileName);

      NewsImg::create([
        'news_show_id' => $News->id,
        'datefolder'   => date('m.Y'),
        'filename'     => $FileName,
        'mime_type'    => $FileNews->getClientMimeType(),
      ]);
    }

    return redirect()->route('spanel.ucheb.news.index')->withErrors($messageBag);
  }

  public function show($id) {
    $NewsShow = NewsShow::with('newsimg')->find($id);
    return view('panel.ucheb.news.show', compact('NewsShow'));
  }

  public function takeedit($takeIdNews) {
  
    $NewsShow = NewsShow::with('newsimg')->find($takeIdNews);
    return view('panel.ucheb.news.edit', compact('NewsShow'));
  }

  public function takeupdate(Request $request, $takeIdNews, MessageBag $messageBag) {
    $newsShow = NewsShow::findOrFail($takeIdNews);

    $messageBag->add('update', 'Новина оновлена');

    $newsShow->title_news_uk  = $request->input('title_news_uk');
    $newsShow->title_news_ru  = $request->input('title_news_ru');
    $newsShow->title_slug  = $request->input('title_slug');
    $newsShow->discription_uk = $request->input('discription_uk');
    $newsShow->discription_ru = $request->input('discription_ru');
    $newsShow->save();

    return redirect()->route('spanel.ucheb.news.index')->withErrors($messageBag);
  }

  public function destroy($id, MessageBag $messageBag) {
    $messageBag->add('delete', 'Новина виделена!');
    NewsShow::where('id', $id)->delete();
    return redirect()->route('spanel.ucheb.news.index')->withErrors($messageBag);
  }

}
