<?php

namespace App\Http\Controllers;

use App\Album;
use App\Photo;
use App\User;
use Illuminate\Support\Facades\URL;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Mine extends Controller
{
    public function index(){
        return view('index', ['photos' => Photo::all(), 'albums' => Album::all()]);
    }

    public function nouvelle2(){
        return view('nouvelle2', ['photos' => Photo::all(), 'albums' => Album::all()]);
    }

    public function nouvelle(){
        return view('nouvelle', ['photos' => Photo::all(), 'albums' => Album::all()]);
    }

    public function creeralbum(Request $req){
        $validator = Validator::make($req->all(), [
            'name'=>'required|min:3'
        ]);

        if($validator->fails()){
            return redirect('/nouvelle2')
                ->withErrors($validator)
                ->withInput()
                ->with('toastr', ['statut' => 'error', 'message' =>'Problème']);
        }

        if($req->hasFile('cover_image') && $req->file('cover_image')->isValid()) {
            $p = new Album();
            $p->name = $req->input('name');
            $p->description = $req->input('desc');
            $p->utilisateur_id = Auth::id();

            $p->cover_image = $req->file('cover_image')->store('public/album/'.Auth::id());
            $p->cover_image = str_replace("public/", "/storage/", $p->cover_image);

            $p->save();
        }

        return redirect('/nouvelle')->with('toastr', ['statut' => 'success', 'message' => 'Album créé !']);
    }

    public function creer(Request $req){
        $validator = Validator::make($req->all(), [
            'nom'=>'required|min:6'
        ]);

        if($validator->fails()){
            return redirect('/nouvelle')
                ->withErrors($validator)
                ->withInput()
                ->with('toastr', ['statut' => 'error', 'message' =>'Problème']);
        }

        if($req->hasFile('photo') && $req->file('photo')->isValid()) {
            $c = new Photo();
            $c->title = $req->input('nom');
            $c->album_id = $req->input('albums');
            $c->utilisateur_id = Auth::id();

            $c->photo = $req->file('photo')->store('public/photo/' . Auth::id());
            $c->photo = str_replace("public/", "/storage/", $c->photo);

            $c->save();

        }


        return redirect('/')->with('toastr', ['statut' => 'success', 'message' => 'Photo ajoutée !']);
    }

    public function update_avatar(Request $request){

        if($request->hasFile('avatar')){
            $avatar= $request->file('avatar');
            $filename  = time() . '.' . $avatar->getClientOriginalExtension();
            $path = public_path('/uploads/avatar/' . $filename);
            Image::make($avatar->getRealPath())->orientate()->save($path);

            $utilisateur = Auth::user();
            $utilisateur->avatar = $filename;
            $utilisateur->save();
        }

        return view('utilisateur', array('utilisateur' => Auth::user()) );

    }

    public function delete_pic($id)
    {

        Photo::where('id', $id)->delete();

        return redirect('/');

    }

    public function delete_album($id){

        Album::where('id', $id)->delete();
        Photo::where('album_id', $id)->delete();

        return redirect('/');

    }

    public function album($id)
    {
        $album= Album::find($id);

        if($album == false) abort(404);

        return view('album', [ 'album'=>$album]);
    }

    public function photo($id)
    {
        $photo= Photo::find($id);

        if($photo == false) abort(404);

        return view('photo', [ 'photo'=>$photo]);
    }

    public function utilisateur($id){
        $utilisateur = User::find($id);

        if($utilisateur==false)
            abort('404');

        return view('utilisateur', ['utilisateur'=>$utilisateur]);
    }

    public function suivi($id){
        $utilisateur = User::find($id);

        if($utilisateur==false){
            return redirect('/')->with('toastr', ['statut' => 'error', 'message' => 'Problème rencontré']);
        }

        Auth::user()->follow()->toggle($id);
        return back()->with('toastr', ['statut' => 'success', 'message' => 'Suivi modifié !']);
    }

    public function recherche($s){
        $users = User::whereRaw("name LIKE CONCAT(?,'%')", [$s])->get();
        $photos = Photo::whereRaw("title LIKE CONCAT(?,'%')", [$s])->get();
        $albums = Album::whereRaw("name LIKE CONCAT(?,'%')", [$s])->get();

        return view('recherche', ['utilisateur'=>$users, 'photos'=>$photos, 'albums'=>$albums]);
    }
}
