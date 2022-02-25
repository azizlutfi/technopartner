<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class MainController extends Controller
{
    public function index()
    {   
        return view('home');
    }

    public function kategori()
    {   
        $in = Category::where("type", "in")->get();
        $out = Category::where("type", "out")->get();
        return view('kategori', ['in' => $in, 'out' => $out]);
    }

    public function saveKategori(Request $request)
    {   
        $request->validate([
            'type' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);


        $new_cat = new Category;
        $new_cat->type = $request->type;
        $new_cat->name = $request->name;
        $new_cat->description = $request->description;
        $new_cat->save();

        return back()->with("success", "Kategori Berhasil Ditambahkan.");
    }

    public function editKategori(Request $request)
    {   
        $request->validate([
            'idmodal' => 'required',
            'typemodal' => 'required',
            'namemodal' => 'required',
            'descriptionmodal' => 'required',
        ]);


        $new_cat = Category::find($request->idmodal);;
        $new_cat->type = $request->typemodal;
        $new_cat->name = $request->namemodal;
        $new_cat->description = $request->descriptionmodal;
        $new_cat->save();

        return back()->with("success", "Kategori Berhasil Diperbaharui.");
    }

    public function deleteKategori($id)
    {
        $cat = Category::find($id);
        $cat->delete();

        return back()->with('success', 'Kategori '.$cat->name.' berhasil dihapus!');
    }


    public function transaksi()
    {   
        return view('transaksi');
    }


    //AJAX FUNCTION
    public function getKategori(Request $request){
        $cat = Category::find($request->id);
            return response()->json(
                [
                    'success' => true,
                    'data' => $cat
                ]
            );
        // }
    }
}
