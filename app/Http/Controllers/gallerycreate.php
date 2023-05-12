<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Photo;
use Auth;
use Carbon\Carbon;
use DB;

class gallerycreate extends Controller
{
    // main route controller

    public function welcome(){
        $galleries = Gallery::all();
        $photos = Photo::orderBy('id', 'desc')->paginate(8);
        return view('welcome', compact('galleries', 'photos'));
    }

    public function galleryview($id){
        $gallery = Gallery::find($id);
        $photos = Photo::where('gallery_id', $gallery->id)->get();
        return view('galleryview', compact('gallery','photos'));
    }

    public function photoview($id){
        $photo = Photo::find($id);
        return view('photoview', compact('photo'));
    }

     // main route controller ////

    public function gallerycreate(){
        return view('galleris.gallerycreate');
    }

    public function gallerystore(Request $request){

        $this->validate($request, [
            'title' => 'string|required|max:255',
            'cover' => 'file|required|mimes:jpeg,jpg,png|max:1000',
            'desc' => 'string|required',
        ]);

        $gallery = new Gallery;
        $gallery->title = $request->title;
        $gallery->desc = $request->desc;
        $gallery->user_id = Auth::user()->id;

        $cover = $request->file('cover');
        $cover_ext = $cover->getClientOriginalExtension();
        $cover_name = rand(123456, 99999) . '.' . $cover_ext;
        $cover_path = public_path('galleries/');
        $cover->move($cover_path, $cover_name);

        $gallery->cover = $cover_name;
        $gallery->save();

        return redirect()->route('home');
    }

    public function galleryshow($id)
    {
        $gallery = Gallery::find($id);
        $photos = Photo::where('gallery_id', $gallery->id)->get();

        return view('galleris.galleryshow', compact('gallery','photos'));
    }

    public function galleryedit($id)
    {
        $gallery = Gallery::find($id);
        return view('galleris.galleryedit', compact('gallery'));
    }

    public function galleryupdate(Request $request, $id){
        $gallery = Gallery::find($id);

        $gallery->title = $request->title;
        $gallery->desc = $request->desc;

        $gallery_cover = $gallery->cover;

        if ($request->hasFile('cover')) {
            unlink(public_path('galleries/'. $gallery_cover));

            $cover = $request->file('cover');
            $cover_ext = $cover->getClientOriginalExtension();
            $cover_name = rand(123456, 99999). '.' .$cover_ext;
            $cover_path = public_path('galleries/');
            $cover->move($cover_path, $cover_name);
            $gallery->cover = $cover_name;
        }else{
            $gallery->cover = $request->old_cover;
        }

        $gallery->save();

        return redirect()->route('galleryshow', $id);
    }

    public function gallerydelete($id){

        $photos = Photo::where('gallery_id', $id)->get();
        foreach($photos as $photo){
            $photo_name = $photo->photo;
            unlink(public_path('galleries/photos/'. $photo_name));
        }

        DB::table('photos')->where('gallery_id', $id)->delete();

        $gallery = Gallery::find($id);
        $gallery_cover = $gallery->cover;
        unlink(public_path('galleries/' . $gallery_cover));
        $gallery->delete();

        return redirect()->route('home');
    }

    // gallery photo

    public function photocreate($id){

        $gallery = Gallery::find($id);
        return view('galleris.photos.photocreate', compact('gallery'));

    }

    public function photostore(Request $request){

        $this->validate($request, [
            'title' => 'string|required|max:255',
            'photo' => 'file|required|mimes:jpeg,jpg,png|max:1000',
            'desc' => 'string|required',
        ]);

        $photo = new Photo;
        $gallery_id = $request->gallery_id;

        $photo->gallery_id = $gallery_id;
        $photo->title = $request->title;
        $photo->description = $request->desc;

        $photo_file = $request->file('photo');
        $photo_file_ext = $photo_file->getClientOriginalExtension();
        $photo_file_name = rand(123456, 99999) . '.' . $photo_file_ext;
        $photo_file_path = public_path('galleries/photos/');
        $photo_file->move($photo_file_path, $photo_file_name);

        $photo->photo = $photo_file_name;
        $photo->save();

        return redirect()->route('galleryshow', $gallery_id);
    }

    public function photoshow($id){

        $photo = Photo::find($id);
        return view('galleris.photos.photoshow', compact('photo'));

    }

    public function photoedit($id){

        $photo = Photo::find($id);
        return view('galleris.photos.photoedit', compact('photo'));

    }

    public function photoupdate(Request $request, $id){

        // $this->validate($request, [
        //     'title' => 'string|required|max:255',
        //     'photo' => 'file|required|mimes:jpeg,jpg,png|max:1000',
        //     'desc' => 'string|required',
        // ]);

       $photo = Photo::find($id);
       $photo->title = $request->title;
       $photo->description = $request->desc;
       $gallery_photo = $photo->photo;

       if ($request->hasFile('photo')){
         unlink(public_path('galleries/photos/'. $gallery_photo));

         $new_photo = $request->file('photo');
         $photo_ext = $new_photo->getClientOriginalExtension();
         $photo_name = rand(123456, 99999). '.' .$photo_ext;
         $photo_path = public_path('galleries/photos/');
         $new_photo->move($photo_path, $photo_name);

         $photo->photo = $photo_name;

       }else{
           $photo->photo = $request->old_photo;
       }

       $photo->save();

       return redirect()->route('photoshow', $id);

    }

    public function photodelete($id){

        $photo = Photo::find($id);
        $gallery_photo = $photo->photo;
        $gallery_id = $photo->gallery_id;

        unlink(public_path('galleries/photos/' . $gallery_photo));

        $photo->delete();

        return redirect()->route('galleryshow', $gallery_id);
    }

}
