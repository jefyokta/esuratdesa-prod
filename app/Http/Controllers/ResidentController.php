<?php

namespace App\Http\Controllers;

use App\Exports\ResidentsExport;
use App\Imports\ResidentsImport;
use App\Models\Category;
use App\Models\Resident;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class ResidentController extends Controller
{
    public function index()
    {
        Carbon::setLocale('id');
        $residents = Resident::select('*')->paginate(50);
        $categories = Category::all();
        return view('pages.dashboard.residents', compact('residents', 'categories'));
    }
    public function create()
    {

        return view("pages.dashboard.createresident");
    }
    public function edit(Request $request)
    {
        $id = $request->query('id') ?: abort(400);
        $resident = Resident::find($id);

        return view("pages.dashboard.editresident", compact('resident'));
    }

    public function store(Request $request)
    {


        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'nik' => 'required|numeric|unique:residents,nik',
                'birthday' => 'required|date_format:Y-m-d',
                'gender' => 'required|string|max:10',
                'dusun' => 'required|string|max:255',
                'rt' => 'required|string|max:3',
                'rw' => 'required|string|max:3',
                'religion' => 'required|string|max:50',
                'father_name' => 'required|string|max:255',
                'father_birthday' => 'required|string|max:255',
                'father_job' => 'required|string|max:255',
                'mother_name' => 'required|string|max:255',
                'job' => 'required|string|max:255',
                'last_study' => 'required|string|max:255',
                'current_study' => 'nullable|string|max:255',
                'born_in' => 'required|string|max:255',
                'no_kk' => 'required|numeric',
                'status' => 'required|string|max:50',
                'status_in_family' => 'required|string|max:50',
            ]);

            Resident::create($data);

            return back()->with('success', 'Data resident berhasil disimpan.');
        } catch (\Throwable $th) {
            // dd($th);
            throw $th;
        }
    }
    public function update(Request $request, $id)
    {

        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'nik' => [
                    'required',
                    'numeric',
                    Rule::unique('residents')->ignore($id),
                ],
                'birthday' => 'required|date_format:Y-m-d',
                'gender' => 'required|string|max:10',
                'dusun' => 'required|string|max:255',
                'rt' => 'required|string|max:3',
                'rw' => 'required|string|max:3',
                'religion' => 'required|string|max:50',
                'father_name' => 'required|string|max:255',
                'mother_name' => 'required|string|max:255',
                'job' => 'required|string|max:255',
                'last_study' => 'required|string|max:255',
                'current_study' => 'nullable|string|max:255',
                'born_in' => 'required|string|max:255',
                'no_kk' => 'required|numeric',
                'status' => 'required|string|max:50',
                'status_in_family' => 'required|string|max:50',
            ]);
            // dd($data);
            $resident = Resident::findOrFail($id);

            $resident->update($data);

            return redirect('/dashboard/residents')->with('success', 'Data resident berhasil diperbarui.');
        } catch (\Throwable $th) {
            // dd($th);

            throw $th;
        }
    }
    public function import(Request $request)
    {

        try {
            $request->validate([
                'file' => 'required|mimes:xlsx,xls,csv',
            ]);
            Excel::import(new ResidentsImport, $request->file('file'));


            return back()->with('success', 'Data berhasil diimpor!');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            return back()->with('error', 'Terdapat kesalahan dalam data yang diimpor.');
        } catch (\Throwable $th) {
            return back()->with('error', 'Data gagal diimpor! Pesan error: ' . $th->getMessage());
        }
    }

    public function export(){

      return  Excel::download(new ResidentsExport,'Penduduk.xlsx');
    }

    public function delete($id)
    {
        if (!$id) {
            return back()->with("error", "penduduk tidak di temukan");
        }
        $resident = Resident::findOrFail($id);
        $resident->delete();
        return back()->with('success', 'Berhasil Mengapus Penduduk');
    }
}
