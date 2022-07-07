<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Pelanggan;
use Exception;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pelanggan::all();

        if ($data->count() > 0) {
            return ApiFormatter::success(200, 'Data pelanggan', $data);
        } else {
            return ApiFormatter::error(404, 'Data pelanggan tidak ada');
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
                'address' => 'required',
                'gender' => 'required',
            ]);

            $pelanggan = Pelanggan::create([
                'name' => $request->name,
                'address' => $request->address,
                'gender' => $request->gender
            ]);

            $data = Pelanggan::where('id', "=", $pelanggan->id)->get();

            if ($data) {
                return ApiFormatter::success(200, "Data Pelanggan Berhasil ditambahkan", $data);
            } else {
                return ApiFormatter::error(400, "Data Pelanggan Gagal ditambahkan", $data);
            }
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
        $data = Pelanggan::where('id', "=", $id)->get();

        if ($data->count() > 0) {
            return ApiFormatter::success(200, 'Data pelanggan', $data);
        } else {
            return ApiFormatter::error(400, 'Data pelanggan tidak ada', $data);
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
                'address' => 'required',
                'gender' => 'required'
            ]);

            $pelanggan = Pelanggan::findOrFail($id);

            $pelanggan->update([
                'name' => $request->name,
                'address' => $request->address,
                'gender' => $request->gender,
            ]);

            $data = Pelanggan::where('id', '=', $pelanggan->id)->get();

            if ($data) {
                return ApiFormatter::success(200, "Update data pelanggan berhasil", $data);
            } else {
                return ApiFormatter::error(400, "Update data pelanggan gagal", $data);
            }
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
            $pelanggan = Pelanggan::findOrFail($id);

            $pelanggan->delete();

            if ($pelanggan) {
                return ApiFormatter::success("Data pelanggan berhasil dihapus", $pelanggan, 200);
            } else {
                return ApiFormatter::error("Data pelanggan gagal dihapus", $pelanggan, 400);
            }
        } catch (Exception $e) {
            return ApiFormatter::error(400, $e->getMessage());
        }
    }
}
