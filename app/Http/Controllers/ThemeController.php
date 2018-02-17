<?php

namespace App\Http\Controllers;

use App\Theme;
use Illuminate\Http\Request;
use App\Http\Requests\StoreThemeRequest;


class ThemeController extends Controller
{
    public function index()
    {
      $themes = Theme::all();
      return view('admin.theme.index', compact('themes'));
    }

    public function create()
    {
        return view('admin.theme.create');
    }

    public function store(StoreThemeRequest $request)
      {
        $this->authorize('create', Theme::class);
        Theme::create($request->all());
        return redirect('admin/theme');
      }

    public function show(Theme $theme)
    {
        //
    }

      public function edit(Theme $theme)
      {
        $this->authorize('update', Theme::class);
        return view('admin.theme.edit', compact('theme'));
      }

      public function update(StoreThemeRequest $request, Theme $theme)
      {
        $this->authorize('update', Theme::class);
        $theme->update($request->all());
        return redirect('admin/theme')->with(['message'=>'Tema pakoreguota']);
      }

      public function destroy(Theme $theme)
      {
        $this->authorize('delete', Theme::class);
        $theme->delete();
        // if ($theme->albums->count()==0){
        //   $theme->delete();
        return redirect('admin/theme')->with(['message'=>'Tema istrinta']);
        // } else {
          // return redirect('admin/theme')->with(['message'=>'Temos istrinti negalima, nes jame yra albumu']);
      }

}
