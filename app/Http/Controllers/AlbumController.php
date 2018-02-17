<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Theme;
use App\Http\Requests\StoreAlbumRequest;


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
    $album = new Album();
    $album->title = $request->title;
    $album->theme_id = $request->theme_id;
    $album->description = $request->description;
    $album->save();
    return redirect('/admin/album')->with(['message'=>'Album add success']);
  }
}
