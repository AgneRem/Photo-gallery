<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Theme;
use Image;
use App\Photo;
use App\Http\Requests\StoreAlbumRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;



class AlbumsController extends Controller
{
  public function index()
  {
    $albums = Album::all();
    return view('admin.albums.index', compact('albums'));
  }


  public function create()
  {
    $this->authorize('create', Album::class);
    $themes = Theme::all();
    return view('admin.albums.create', compact('themes'));
  }


  public function store(StoreAlbumRequest $request)
  {
    $this->validate($request, [
      'title' => 'required',
      'cover_image' => 'image'
    ]);

    $album = new Album();
    $album->title = $request->title;
    $album->theme_id = $request->theme_id;
    $album->description = $request->description;

    //save our image
    if ($request->hasFile('cover_image')){
      $image = $request->file('cover_image');
      $filename = time() . '.'  . $image->getClientOriginalName();
      $location = public_path('images/' . $filename);
      Image::make($image)->resize(800, 400)->save($location);

      $album->cover_image = $filename;
    }

    $album->save();
    return redirect('admin/albums')->with(['success'=>'Album add success']);
  }


  public function show($id)
  {
      $album = Album::find($id);
      $photo = Photo::all();
      return view('admin.albums.show', compact('album', 'photo'));
  }
  //
  // public function destroy(Album $album)
  //   {
  //     $this->authorize('delete', Album::class);
  //     // if (!empty($album->cover_image)){
  //     //   Storage::delete($album->cover_image);
  //     // }
  //     $album->delete();
  //     return redirect('admin/albums')->with(['message'=>'Albums is deleted']);
  //   }
}
