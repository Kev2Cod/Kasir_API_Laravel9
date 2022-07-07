<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\ItemPenjualan;
use Error;
use Exception;
use Illuminate\Http\Request;

class ItemPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = ItemPenjualan::all();

        if ($data->count() > 0) {
            return ApiFormatter::success(200, 'Data Item Penjualan', $data);
        } else {
            return ApiFormatter::error(404, 'Data Item Penjualan tidak ada');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'id_nota' => 'required',
                'id_barang' => 'required',
                'qty' => 'required',
            ]);

            error_log($request);

            $barang = ItemPenjualan::create([
                'id_nota' => $request->id_nota,
                'id_barang' => $request->id_barang,
                'qty' => $request->qty,
            ]);

            $data = ItemPenjualan::where('id', "=", $barang->id)->get();

            return ApiFormatter::success(200, 'Data Item Penjualan Berhasil di update', $data);
        } catch (Exception $e) {
            return ApiFormatter::error(400, $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = ItemPenjualan::where('id', $id)->get();
            if ($data->count() > 0) {
                return ApiFormatter::success(200, 'Data Item Penjualan', $data);
            } else {
                return ApiFormatter::error(404, 'Data Item Penjualan tidak ada');
            }
        } catch (Exception $e) {
            return ApiFormatter::error(500, $e->getMessage());
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
        //
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
        try {
            $request->validate([
                'id_nota' => 'required',
                'id_barang' => 'required',
                'qty' => 'required',
            ]);

            $barang = ItemPenjualan::where('id', "=", $id)->update([
                'id_nota' => $request->id_nota,
                'id_barang' => $request->id_barang,
                'qty' => $request->qty,
            ]);

            $data = ItemPenjualan::where('id', "=", $id)->get();

            return ApiFormatter::success(200, 'Data Item Penjualan Berhasil di update', $data);
        } catch (Exception $e) {
            return ApiFormatter::error(400, $e->getMessage());
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ItemPenjualan::where('id', $id)->delete();
        if ($data) {
            return ApiFormatter::success(200, 'Data Item Penjualan Berhasil di hapus');
        } else {
            return ApiFormatter::error(404, 'Data Item Penjualan tidak ada');
        }
    }
}
