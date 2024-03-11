<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Rumah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PropertiController extends Controller
{

    //PERUMAHAN
    public function category(Category $category)
    {
        return view('properti.category', compact('category'));
    }

    public function perumahan()
    {

        $data = Category::get();
        return view('admin.perumahan.perumahan', compact('data'));
    }

    public function addPerumahan()
    {
        return view('admin.perumahan.tambahperumahan');
    }

    public function storePerumahan(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama' => 'required'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['nama'] = $request->nama;

        Category::create($data);

        return redirect()->route('perumahan');
    }

    public function editPerumahan(Request $request, $id)
    {
        $data = Category::find($id);

        return view('admin.perumahan.editperumahan', compact('data'));
    }

    public function updatePerumahan(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'nama' => 'required'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['nama'] = $request->nama;

        Category::whereId($id)->update($data);

        return redirect()->route('perumahan');
    }

    public function deletePerumahan(Request $request, $id)
    {
        $data = Category::find($id);

        if ($data) {
            $data->delete();
        }
        return redirect()->route('perumahan');
    }


    //RUMAAH
    public function rumah()
    {

        $data = Rumah::get();
        return view('admin.rumah.rumah', compact('data'));
    }

    public function addRumah()
    {
        $data = Category::get();
        return view('admin.rumah.rumahtambah', compact('data'));
    }

    public function storeRumah(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'namarumah' => 'required',
            'category_id' => 'required',
            'tiperumah' => 'required',
            'hargarumah' => 'required',
            'alamatrumah' => 'required',
            'deskripsirumah' => 'required',
            'foto' => 'required|mimes:png,jpg,jpeg|max:2048',
            'status' => 'required'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $foto = $request->file('foto');
        $filename = date('Y-m-d') . $foto->getClientOriginalName();
        $path = 'foto-rumah/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($foto));

        $data['namarumah'] = $request->namarumah;
        $data['category_id'] = $request->category_id;
        $data['tiperumah'] = $request->tiperumah;
        $data['hargarumah'] = $request->hargarumah;
        $data['alamatrumah'] = $request->alamatrumah;
        $data['deskripsirumah'] = $request->deskripsirumah;
        $data['foto'] = $filename;
        $data['status'] = $request->status;


        Rumah::create($data);

        return redirect()->route('rumah');
    }

    //Tampilan User
    public function properti()
    {
        $data = Rumah::all();
        return view('properti.properti', compact('data'));
    }

    public function detailProperti(Request $request, $id)
    {
        $house = Rumah::find($id);
        $hasil = 0;
        $pinjaman = 0;
        $bunga = 0;
        $data = [];
        $rekapitulasi =  [
            "pinjaman" => 0,
            "totalBunga" => 0,
            "totalPinjaman" => 0,
            "data" => [],
            "jangkaWaktu" => 0,
        ];

        if (request()->has('pinjaman')) {
            if ($request->type === 'flat') {
                $hasilDP = $request->pinjaman * ($request->dp / 100);
                $pinjaman = $request->pinjaman - $hasilDP;

                $bunga = $request->bunga / 100; //

                $hasil = ($pinjaman + ($pinjaman * $bunga * $request->jangka_waktu)) / ($request->jangka_waktu * 12);

                $pokok = $pinjaman / 12;

                $bungaCicilan = $hasil - $pokok;

                $sisa = $pinjaman + ($pinjaman * $bunga * $request->jangka_waktu);

                for ($i = 1; $i <= $request->jangka_waktu * 12; $i++) {
                    $sisa = $sisa - $hasil;

                    $data[] = [
                        'pokok' => $pokok,
                        "bunga" => $bungaCicilan,
                        "bulan" => $i,
                        "cicilan" => $hasil,
                        "sisa" => $sisa
                    ];
                }

                $rekapitulasi =  [
                    "flat" => [
                        "pinjaman" => $pinjaman,
                        "totalBunga" => $pinjaman * $bunga,
                        "totalPinjaman" => $pinjaman + ($pinjaman * $bunga * $request->jangka_waktu),
                        "data" => $data,
                        "jangkaWaktu" => ($request->jangka_waktu * 12),
                    ]
                ];
            }

            if ($request->type === 'efektif') {
                $hasilDP = $request->pinjaman * ($request->dp / 100);
                $pinjaman = $request->pinjaman - $hasilDP;

                $data[] = [
                    "no" => 0,
                    "pinjaman" => $pinjaman,
                    "totalCicilan" => 0,
                    "hasil" => 0
                ];
                $pokokPerbulan = $request->pinjaman / ($request->jangka_waktu * 12);
                for ($i = 0; $i < $request->jangka_waktu * 12; $i++) {
                    $pinjaman = $data[$i]["pinjaman"] - $data[$i]["totalCicilan"];
                    $cicilanBunga = $pinjaman * ($request->bunga / 100) / 12;
                    if ($cicilanBunga < 0) {
                        $cicilanBunga = 0;
                    }
                    $totalCicilan = $pokokPerbulan + $cicilanBunga;

                    if ($i == 0) {
                        $hasil =  $pinjaman - $totalCicilan;
                    } else {
                        $hasil =  $pinjaman - $data[$i]["totalCicilan"];
                    }

                    $data[] = [
                        "no" => $i + 1,
                        "pinjaman" => round($pinjaman),
                        "cicilanPokokPerbulan" => round($pokokPerbulan),
                        "cicilanBunga" => round($cicilanBunga),
                        "totalCicilan" => round($totalCicilan),
                        "hasil" => round($hasil),
                    ];
                }

                $totalCicilanPinjaman = collect($data)->sum('totalCicilan');
                $y = 0;
                foreach ($data as $d) {
                    $totalCicilanPinjaman = $totalCicilanPinjaman - $d["totalCicilan"];
                    $table[] = [
                        "bulan" => $y,
                        "cicilanPokokPerbulan" => $d["cicilanPokokPerbulan"] ?? 0,
                        "cicilanBunga" => $d['cicilanBunga'] ?? 0,
                        "cicilan" => $d["totalCicilan"] ?? 0,
                        "sisa" => $totalCicilanPinjaman
                    ];
                    $y++;
                }

                $rekapitulasi = [
                    "efektif" => [
                        "pinjaman" => $request->pinjaman,
                        "waktuTenor" => $request->jangka_waktu * 12,
                        "bungaEfektif" => $request->bunga,
                        "totalCicilan" => $totalCicilan,
                        "data" => $table
                    ],
                ];
            }


            if ($request->type === 'anuitas') {
                $data[] = [
                    "bulan" => 0,
                    "pokok" => 0,
                    "bunga" => 0,
                    "pokokBunga" => 0,
                    "sisaPokok" => (int) $request->pinjaman,
                ];
                $bungaPerBulan = ($request->bunga / 100) / 12;

                $pokokBunga = ($request->pinjaman *  ($bungaPerBulan / (1 - pow((1 + $bungaPerBulan), - ($request->jangka_waktu * 12)))));

                for ($i = 0; $i < $request->jangka_waktu * 12; $i++) {
                    $bunga = ($data[$i]["sisaPokok"] * ($request->bunga / 100) / 12);

                    $data[] = [
                        "bulan" => $i + 1,
                        "pokok" => ($pokokBunga - $bunga),
                        "bunga" => ($bunga),
                        "pokokBunga" => ($pokokBunga),
                        "sisaPokok" => round($data[$i]["sisaPokok"] - ($pokokBunga - $bunga))
                    ];
                }

                $rekapitulasi = [
                    "anuitas" => [
                        "pinjaman" => $request->pinjaman,
                        "waktuTenor" => $request->jangka_waktu * 12,
                        "bunga" => $request->bunga,
                        "data" => $data
                    ],
                ];
            }
        }


        return view('properti.detail', compact('house', 'hasil', 'rekapitulasi'));
    }
}
