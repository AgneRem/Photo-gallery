<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Theme;
use App\Http\Requests\StoreAlbumRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;



class AlbumController extends Controller
{
  public function index()
  {
    $albums = Album::all();
    return view('admin.album.index', compact('albums'));
  }

  public function create()
  {
    $this->authorize('create', Album::class);
    $themes = Theme::all();
    return view('admin.album.create', compact('themes'));
  }

  public function store(StoreAlbumRequest $request)
  {
    $name = $request->file('cover_image')->getClientOriginalName();
    $request->file('cover_image')->storeAs('public/image', $name);
    Image::make(Input::file('cover_image'))->resize(300, 200)->save(storage_path('app/public/image/'.$name));
    $album = new Album();
    $album->title = $request->title;
    $album->theme_id = $request->theme_id;
    $album->cover_image = $name;
    $album->description = $request->description;
    $album->save();
    return redirect('/admin/albums')->with(['message'=>'Album add success']);
  }
}
