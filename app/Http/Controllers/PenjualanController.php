<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Penjualan;
use Exception;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Penjualan::all();

        if ($data->count() > 0) {
            return ApiFormatter::success(200, 'Data Penjualan', $data);
        } else {
            return ApiFormatter::error(404, 'Data Penjualan tidak ada');
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
                'id_pelanggan' => 'required',
                'total_price' => 'required',
            ]);

            $barang = Penjualan::create([
                'id_pelanggan' => $request->id_pelanggan,
                'total_price' => $request->total_price,
            ]);

            $data = Penjualan::where('id', "=", $barang->id)->get();

            return ApiFormatter::success(200, 'Data Penjualan Berhasil di update', $data);
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
        $data = Penjualan::where('id', "=", $id)->get();
        if ($data->count() > 0) {
            return ApiFormatter::success(200, 'Data Penjualan', $data);
        } else {
            return ApiFormatter::error(404, 'Data Penjualan tidak ada');
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
                'id_pelanggan' => 'required',
                'total_price' => 'required',
            ]);

            $barang = Penjualan::where('id', "=", $id)->update([
                'id_pelanggan' => $request->id_pelanggan,
                'total_price' => $request->total_price,
            ]);

            $data = Penjualan::where('id', "=", $id)->get();

            return ApiFormatter::success(200, 'Data Penjualan Berhasil diupdate', $data);
        } catch (Exception $e) {
            return ApiFormatter::error(400, $e->getMessage());
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
        try {
            $barang = Penjualan::where('id', "=", $id)->delete();
            return ApiFormatter::success(200, 'Data Penjualan berhasil dihapus', $barang);
        } catch (Exception $e) {
            return ApiFormatter::error(400, $e->getMessage());
        }
    }
}
