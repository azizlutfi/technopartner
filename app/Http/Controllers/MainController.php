<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Transaction;

use Carbon\Carbon;

class MainController extends Controller
{
    public function index()
    {   
        $transaksi_in = Transaction::where("transaction_type", "in")->sum('nominal');
        $transaksi_out = Transaction::where("transaction_type", "out")->sum('nominal');
        return view('home', ["in" => $transaksi_in, "out" => $transaksi_out]);
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


    public function transaksi(Request $request)
    {   
        if ($request->input('from') || $request->input('to')) {
            $request->validate([
                'from' => 'date_format:d-m-Y',
                'to' => 'date_format:d-m-Y',
            ]);

            $from = Carbon::createFromFormat('d-m-Y', $request->input('from'))->format('Y-m-d');
            $to = Carbon::createFromFormat('d-m-Y', $request->input('to'))->format('Y-m-d');

            $transaction = Transaction::whereBetween('created_at', [$from." 00:00:00", $to." 23:59:59"])->get();
        } else {
            $transaction = Transaction::whereMonth('created_at', Carbon::now()->month)->get();
        }

        $saldo = Transaction::where("transaction_type", "in")->sum('nominal') - Transaction::where("transaction_type", "out")->sum('nominal');
        
        return view('transaksi', ['transaksi' => $transaction, "saldo" => $saldo]);
    }

    public function saveTransaksi(Request $request)
    {   
        $request->validate([
            'transaction_type' => 'required',
            'category' => 'required',
            'nominal' => 'required',
            'description' => 'required',
        ]);


        $new_trans = new Transaction;
        $new_trans->transaction_type = $request->transaction_type;
        $new_trans->category = $request->category;
        $new_trans->nominal = $request->nominal;
        $new_trans->description = $request->description;
        $new_trans->save();

        return back()->with("success", "Transaksi Berhasil Ditambahkan.");
    }

    public function editTransaksi($id)
    {   
        $trans = Transaction::find($id);
        $cat = Category::where("type", $trans->transaction_type)->get();

        return view('edit_transaksi', ['transaction' => $trans, 'category' => $cat]);
    }

    public function updateTransaksi(Request $request)
    {   
        $request->validate([
            'id' => 'required',
            'transaction_type' => 'required',
            'category' => 'required',
            'nominal' => 'required',
            'description' => 'required',
        ]);


        $new_trans = Transaction::find($request->id);
        $new_trans->transaction_type = $request->transaction_type;
        $new_trans->category = $request->category;
        $new_trans->nominal = $request->nominal;
        $new_trans->description = $request->description;
        $new_trans->save();

        return redirect('transaksi')->with("success", "Transaksi Berhasil Ditambahkan.");
    }

    public function deleteTransaksi($id)
    {
        $trans = Transaction::find($id);
        $trans->delete();

        return back()->with('success', 'Transaksi berhasil dihapus!');
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
    }

    public function optionKategori(Request $request){
        $cat = Category::where("type", $request->tipe)->get();
            return response()->json(
                [
                    'success' => true,
                    'data' => $cat
                ]
            );
    }

}
