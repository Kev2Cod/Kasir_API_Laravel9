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

        if($data->count() > 0) {
            return ApiFormatter::success('Data Barang', $data, 200);
        } else {
            return ApiFormatter::error('Data Barang tidak ada', $data , 400);
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
                'price' => 'required',
                'stock' => 'required',
            ]);

            $barang = Barang::create([
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock
            ]); 

            $data = Barang::where('id', "=", $barang->id)->get();

            return ApiFormatter::success('Data Barang', $data, 200);
        } catch (Exception $e) {
            return ApiFormatter::error($e->getMessage(), $data, 400);
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
        //
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
                'price' => 'required',
                'stock' => 'required',
            ]);

            $barang = Barang::where('id', "=", $id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock
            ]); 

            $data = Barang::where('id', "=", $barang->id)->get();

            return ApiFormatter::success('Data Barang', $data, 200);
        } catch (Exception $e) {
            return ApiFormatter::error($e->getMessage(), $data, 400);
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
            $barang = Barang::where('id', "=", $id)->delete();

            $data = Barang::where('id', "=", $barang->id)->get();

            return ApiFormatter::success('Data Barang', $data, 200);
        } catch (Exception $e) {
            return ApiFormatter::error($e->getMessage(), $data, 400);
        }
    }
}
