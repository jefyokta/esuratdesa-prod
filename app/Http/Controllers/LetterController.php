<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Letter;
use App\Models\Resident;
use App\Models\VillageManager;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    public function index()
    {
        return view("letter.index");
    }
    public function dashboard(Request $request)
    {


        $status = $request->query('s') ?? false;
        $signers = VillageManager::all();


        $letters = Letter::with(['category', 'resident', 'villageManager'])
            ->where('status', $status)
            ->paginate(50);
        return view("pages.dashboard.letter.index", compact('letters', "status", 'signers'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            "resident_id" => "required",
            "category_id" => "required",
            "needed_for" => "required",
            "redirect" => "nullable"
        ]);
        $resident = Resident::find($data['resident_id']);

        if (!$resident) {
            return back()->with('error', 'Data penduduk tidak ditemukan.');
        }
        $category = Category::find($data['category_id']);
        if (!$category) {
            return back()->with('error', 'Jenis Surat Tidak ditemukan.');
        }
        if ($category['title'] == 'Rekomendasi Kerja' || $category['title'] == 'Usaha') {
            $data = $request->validate([
                "resident_id" => "required",
                "category_id" => "required",
                "needed_for" => "required",
                "redirect" => "nullable",
                "details" => "required"
            ]);
        }
        Letter::create([
            "resident_id" => $resident['id'],
            "category_id" => $data['category_id'],
            "needed_for" => $data['needed_for'],
            "details" => $data['details'] ?? null,
            "status" => false
        ]);

        if (isset($data['redirect'])) {
            return redirect($data['redirect'])->with("success", "berhasil menambahkan surat");
        }

        return redirect("/")->with("success", "berhasil menambahkan surat");
    }

    public function add($id, Request $request)
    {

        $category = Category::find($id);

        return view("letter.letterCategory", compact("category"));
    }
    public function create(Request $request)
    {

        $nik = $request->query('nik');
        if (!$nik) {
            return   back()->with('error', 'nik is required');
        }
        $catid = $request->query('catid') ?? back()->with('error', 'nik is required');
        if (!$catid) {
            return   back()->with('error', 'Category is Invalid');
        }
        $person = Resident::select("*")->where('nik', $nik)->first();
        if (!$person) {
            return back()->with('error', 'Penduduk Tidak terdaftar');
        }
        $category = Category::find($catid);
        if (!$category) {
            return back()->with('error', 'Jenis Surat Tidak valid');
        }

        return view("letter.create", compact("person", "category"));
    }

    public function confirm(Request $request)
    {
        $id = $request->query('id');
        $signer = $request->query('signer');
        $number = $request->query('number');

        if (!$id || !Letter::find($id)) {
            return back()->with('error', 'Surat tidak ditemukan.');
        }

        if (!$signer || !VillageManager::find($signer)) {
            return back()->with('error', 'Pendanda tangan tidak valid.');
        }
        if (!$number) {
            return back()->with('error', 'No Surat Tidak Boleh Kosong.');
        }

        $letter = Letter::find($id);
        $letter->update(['issued_by' => $signer, "status" => 1, 'number' => $number]);
        return redirect('/dashboard/letters?s=1')->with('success', 'Surat berhasil diperbarui.');
    }
    public function myletter(Request $request)
    {
        $nik = $request->query('nik') ?? false;
        if (!$nik) {
            return view("pages.search");
        }
        $person = Resident::select("*")->where("nik", $nik)->first();
        if (!$person) {
            return back()->with("error", "Penduduk tidak terdaftar");
        }
        $letters =  Letter::with(['Category', 'Resident', 'VillageManager'])->where("resident_id", $person['id'])->get();

        return view("pages.myletters", compact('letters', 'person'));
    }

    public function delete(Request $request)
    {
        $id = $request->query('id');
        if (!$id) {
            return back()->with("error", "ID diperlukan");
        }

        $letter = Letter::find($id);
        if (!$letter) {
            return back()->with("error", "Surat tidak ditemukan");
        }

        $letter->delete();
        return back()->with("success", "Surat berhasil dihapus");
    }
    public function dashboardcreate(Request $request)
    {

        $id = $request->query('resident') ?? null;
        $categoryid = $request->query('category') ?? null;
        $person = Resident::find($id);
        if (!$person) {
            return back()->with('error', 'Penduduk Tidak Ditemukan');
        }
        $category = Category::find($categoryid);
        if (!$category) {
            return back()->with('error', 'Jenis Surat Tidak Diemukan');
        }

        return view("pages.dashboard.letter.create", compact("person", "category"));
    }

    public function api(Request $request)
    {
        $option = $request->query('o');

        if (is_null($option)) {
            $letters = Letter::count();
            return response()->json(['count' => $letters]);
        }
        switch ($option) {
            case 'done':
                $letters = Letter::where('status', 1)->count();
                break;
            default:
                $letters = Letter::where('status', '<>', 1)->count();
                break;
        }

        return response()->json(['count' => $letters]);
    }


    public function print($id)
    {
        $letter = Letter::find($id);

        if (!$letter) {
            return redirect()->back()->with("error", "Surat tidak ditemukan");
        }

        $person = Resident::find($letter['resident_id']);
        $category = Category::find($letter['category_id']);
        $issuer = VillageManager::find($letter['issued_by']);

        if (!$person || !$category || !$issuer) {
            return redirect()->back()->with("error", "Data tidak lengkap untuk generate PDF");
        }

        switch ($category['title']) {
            case 'Tidak Mampu':
                $pdf = Pdf::loadView("letter.letters.sktm", compact("letter", "person", "issuer"))
                    ->setOption('isRemoteEnabled', true);
                break;
            case 'Berkelakuan Baik':
                $pdf = Pdf::loadView("letter.letters.skkb", compact("letter", "person", "issuer"))
                    ->setOption('isRemoteEnabled', true);
                break;
            case 'Rekomendasi Kerja':
                $pdf = Pdf::loadView("letter.letters.rekom", compact("letter", "person", "issuer"))
                    ->setOption('isRemoteEnabled', true);
                break;
            case 'Usaha':
                $pdf = Pdf::loadView("letter.letters.sku", compact("letter", "person", "issuer"))
                    ->setOption('isRemoteEnabled', true);
                break;
            default:
                return redirect()->back()->withErrors("Kategori surat tidak valid");
        }

        return $pdf->download($person['name'] . "- Surat Keterangan " . $category['title'] . ".pdf");
    }



    public function update(Request $request) {}
}
