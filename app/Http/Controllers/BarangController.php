<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Barang;
use Exception;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Barang::all();

        if ($data->count() > 0) {
            return ApiFormatter::success(200, 'Data Barang', $data);
        } else {
            return ApiFormatter::error(404, 'Data Barang tidak ada', $data);
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
                'name' => 'required',
                'category' => 'required',
                'price' => 'required',
            ]);

            $barang = Barang::create([
                'name' => $request->name,
                'category' => $request->category,
                'price' => $request->price,
            ]);

            $data = Barang::where('id', "=", $barang->id)->get();

            return ApiFormatter::success(200, 'Data Barang Berhasil disimpan', $data);
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
            $data = Barang::where('id', "=", $id)->get();

            if ($data->count() > 0) {
                return ApiFormatter::success(200, 'Data Barang', $data);
            } else {
                return ApiFormatter::error(404, 'Data Barang tidak ada', $data);
            }
        } catch (Exception $e) {
            return ApiFormatter::error(400, $e->getMessage());
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
                'name' => 'required',
                'category' => 'required',
                'price' => 'required',
            ]);



            $barang = Barang::where('id', "=", $id)->update([
                'name' => $request->name,
                'category' => $request->category,
                'price' => $request->price
            ]);

            $data = Barang::where('id', "=", $id)->get();

            return ApiFormatter::success(200, 'Data Barang Berhasil di Update', $data);
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
            Barang::where('id', "=", $id)->delete();
            return ApiFormatter::success(200, 'Data Barang berhasil dihapus');
        } catch (Exception $e) {
            return ApiFormatter::error(400, $e->getMessage());
        }
    }
}
