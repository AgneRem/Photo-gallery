<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use Image;
use App\Album;
use App\Http\Requests\StorePhotoRequest;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    // public function index($id){
    //   $album = Album::find($id);
    //   $photo = Album::find($id)->photos;
    //   return view('admin.photos.index', compact('album', 'photo'));
    // }

    public function store(StorePhotoRequest $request)
    {
      $photo = new Photo();
      $photo->album_id = $request->input('album_id');

      //save our image
      if ($request->hasFile('photo')){
        $image = $request->file('photo');
        $filename = time() . '.'  . $image->getClientOriginalName();
        $location = public_path('images/' . $filename);
        Image::make($image)->resize(800, 400)->save($location);

        $photo->photo = $filename;
      }

      $photo->save();

      return redirect('admin/albums/'.$request->input('album_id'))->with(['success'=>'Photo add success']);
    }

    public function destroy($id)
      {
        $photo = Photo::find();
        // if (!empty($album->photo)){
        //   Storage::delete($album->photo);
        //
        // }
        $photo->delete();
        return redirect('admin/albums')->with(['message'=>'photo is deleted']);
      }


      public function create($album_id)
      {
        return view('admin.photos.create', compact('album_id'));
      }
}
