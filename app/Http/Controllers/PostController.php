<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::check()) {
            return redirect ('login');
        };
        $posts = Posts::get();
     
        $view_data = [
            'posts' => $posts
        ];

        return view('index', $view_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::check()) {
            return redirect ('login');
        }
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::check()) {
            return redirect ('login');
        }
        $nama = $request -> input('nama');
        $kelas = $request -> input('kelas');

        Posts::create([
            'nama' => $nama,
            'kelas' => $kelas,
        ]);

        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!Auth::check()) {
            return redirect ('login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Auth::check()) {
            return redirect ('login');
        }
        $selected_post = Posts::where('id',$id)
        ->first();        
        $data = [
            'p' => $selected_post,
            'id'=> $id
        ];
        return view('edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!Auth::check()) {
            return redirect ('login');
        }
        $nama = $request -> input('nama');
        $kelas = $request -> input('kelas');

        Posts::where('id', $id)->update([
            'nama' => $nama,
            'kelas' => $kelas,
        ]);
         
        return redirect("/");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::check()) {
            return redirect ('login');
        }
        Posts::selectById($id)->delete();
        return redirect('/');
    }
}
