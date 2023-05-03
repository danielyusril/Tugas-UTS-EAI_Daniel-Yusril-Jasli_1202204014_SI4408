<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\logistik;
use Exception;
use Illuminate\Http\Request;

class logistikController extends Controller
{
    public function index()
    {
        $data = logistik::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function input(Request $request)
    {
        try {
            $request->validate([
                'pengirim' => 'required',
                'alamatpengirim' => 'required',
                'barang' => 'required',
                'jumlahbarang' => 'required',
                'penerima' => 'required',
                'alamatpenerima' => 'required',
            ]);

            $logistik = logistik::create([
                'pengirim' => $request->pengirim,
                'alamatpengirim' => $request->alamatpengirim,
                'barang' => $request->barang,
                'jumlahbarang' => $request->jumlahbarang,
                'penerima' => $request->penerima,
                'alamatpenerima' => $request->alamatpenerima
            ]);

            $data = logistik::where('id', '=', $logistik->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function show($id)
    {
        $data = logistik::where('id', '=', $id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'pengirim' => 'required',
                'alamatpengirim' => 'required',
                'barang' => 'required',
                'jumlahbarang' => 'required',
                'penerima' => 'required',
                'alamatpenerima' => 'required',
            ]);


            $logistik = logistik::findOrFail($id);

            $logistik->update([
                'pengirim' => $request->pengirim,
                'alamatpengirim' => $request->alamatpengirim,
                'barang' => $request->barang,
                'jumlahbarang' => $request->jumlahbarang,
                'penerima' => $request->penerima,
                'alamatpenerima' => $request->alamatpenerima
            ]);

            $data = logistik::where('id', '=', $logistik->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function destroy($id)
    {
        try {
            $logistik = logistik::findOrFail($id);

            $data = $logistik->delete();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success Destory data');
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
