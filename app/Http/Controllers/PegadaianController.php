<?php

namespace App\Http\Controllers;

use App\Models\Pegadaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class PegadaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('landing-page');
    }

    public function admin(Request $request)
    {
        if ($request->has('search')) {
            $search = $request->search;
            $reports = Pegadaian::where('name', 'LIKE', '%' . $search . '%')->orderBy('created_at', 'DESC')->get();
            return view('admin.admin', compact('reports'));
        } else {
            $reports = Pegadaian::orderBy('created_at', 'DESC')->get();
            return view('admin.admin', compact('reports'));
        }
    }

    public function petugas(Request $request)
    {
        if ($request->has('search')) {
            $search = $request->search;
            $reports = $reports = Pegadaian::where('status', 'Pending')->where('name', 'LIKE', '%' . $search . '%')->orderBy('created_at', 'DESC')->get();
            return view('petugas.index', compact('reports'));
        } else if ($request->has('create')) {
            $id = $request->create;
            $reports = Pegadaian::where('status', 'Pending')->orderBy('created_at', 'DESC')->get();
            return view('petugas.index', compact('reports', 'id'));
        } else {
            $reports = Pegadaian::where('status', 'Pending')->orderBy('created_at', 'DESC')->get();
            return view('petugas.index', compact('reports'));
        }
    }

    public function status(Request $request)
    {
        if ($request->has('update')) {
            $id = $request->update;
            $reports = Pegadaian::whereNotIn('status', ['Pending'])->orderBy('created_at', 'DESC')->get();
            return view('petugas.status', compact('reports', 'id'));
        } else if ($request->has('sort')) {
            $sort = $request->sort;
            $reports = Pegadaian::whereNotIn('status', ['Pending'])->where('status', 'LIKE', '%' . $sort . '%')->orderBy('created_at', 'DESC')->get();
            return view('petugas.status', compact('reports'));
        } else {
            $reports = Pegadaian::whereNotIn('status', ['Pending'])->orderBy('created_at', 'DESC')->get();
            return view('petugas.status', compact('reports'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id, Request $request)
    {
        $shop = Pegadaian::find($id);
        $shop->status = $request->input('status');
        $shop->shop_location = $request->input('shop_location');
        $shop->save();
        $shop->touch();
        Alert::success('Selamat', 'Anda berhasil menambahkan response!');
        return redirect()->route('status-petugas');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $shop = Pegadaian::find($id);
        $shop->status = $request->input('status');
        $shop->shop_location = $request->input('shop_location');
        $shop->save();
        $shop->touch();
        Alert::success('Selamat', 'Anda berhasil memperbarui data!');
        return redirect()->route('status-petugas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'nik' => 'required',
            'name' =>'required',
            'phone' =>'required|max:13',
            'age'=>'required',
            'email'=>'required',
            'item'=>'required',
            'foto'=>'required|image|mimes:jpg,jpeg,png,svg',
        ]);

        $image = $request->file('foto');
        $imgName = rand() . '.' . $image->extension();
        $path =public_path('assets/image/');
        $image->move($path,$imgName);

        Pegadaian::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'phone' => $request->phone,
            'age' => $request->age,
            'email'=> $request->email,
            'item'=> $request->item,
            'image' => $imgName,
        ]);
        return redirect()->back()->with('sucessAdd','Berhasil Menambahkan Data Baru!');
        //halaman home sama tambah data sama, pakai back
    }

    public function excel()
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Pegadaian $pegadaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegadaian $pegadaian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegadaian $pegadaian)
    {
        //
    }
}
