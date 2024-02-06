<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        if(auth()->user()->dokter->first() && auth()->user()->role == 'dokter') {   // dokter yang lagi login saja bisa akses
            $dokter = auth()->user()->dokter->first();
            $inisial = $dokter->inisial;
            $patients = Patient::where('medical_record_numb', 'like', $inisial . '%')->latest()->get();
        } else {     
            $patients = Patient::latest()->get(); // bukan dokter yang bisa akses, ya admin lah yang bisa akses
        }
        $title = 'Master Pasien';
        $active = 'patient';
        
        return view('home.content.patient.index', compact('patients', 'title', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // jika admin yang login
        if(auth()->user()->role == 'admin') {
            return 'tabe anda admin';
        }    
        $title = 'Tambah Pasien';
        $active = 'patient';
        $user = auth()->user();
        $dokter = $user->dokter->first();
        $patient = Patient::latest()->first();
        if($dokter === null) {      // jika dokter belum buat akun
            $title = 'Tambah Pasien';
            $active = 'patient';
            $errorr = 'Anda belum mendaftar, silahkan membuat akun Dokter terlebih dahulu';
            $linkTo = '/dokter/create';
            $backTo = 'ke pendaftaran dokter';
            return view('error.404', compact('title','active','errorr', 'linkTo', 'backTo'));
        
        }elseif(auth()->user()->dokter->first()) {   // jika dokter punya akun
            $user = auth()->user();
            $dokter = $user->dokter->first();
            $inisial = $dokter->inisial;
            $inisiall = strtoupper($inisial);
            $lastNumber = Patient::where('medical_record_numb', 'like', $inisial . '%')->latest()->first();
            if ($lastNumber === null) {     
                $numberMedic = str_pad(1, 5, '0', STR_PAD_LEFT);   // jika dokter belum buat pasien
            } else {
                $lastNumber = (int)substr($lastNumber->medical_record_numb, -5);   // bila dokter sudah pernah buat pasien
                $numberMedic = str_pad($lastNumber + 1, 5, '0', STR_PAD_LEFT);
            }
                $medical = $inisiall . '-' .$numberMedic;
                return view('home.content.patient.create', compact('title', 'active','medical'));
            }
        }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $tervalidasi = $request->validate([
            'nik_numb' => 'required|numeric|unique:patients',
            'name' => 'required|string',
            'gender' => 'required|in:laki-laki,perempuan',
            'date_birth' => 'required|date',
            'address' => 'required|string',
            'hp_numb' => 'required|numeric',
            'bpjs_numb' => 'required|numeric|unique:patients',
            'img_ktp' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'email' => 'required|unique:patients',
            'job' => 'required|string',
            'img' => 'required',
            'medical_record_numb' => 'required|unique:patients',
        ]);

        if ($request->hasFile('img_ktp')) {
            $namaFile = time().'_'.Str::snake($request->img_ktp->getClientOriginalName());
            $tervalidasi['img_ktp'] = $request->file('img_ktp')->storeAs('images/patient', $namaFile, 'public');
        }
        
        if ($request->hasFile('img')) {
            $namaFile = time().'_'.Str::snake($request->img->getClientOriginalName());
            $tervalidasi['img'] = $request->file('img')->storeAs('images/img', $namaFile, 'public');
        }
        
        Patient::create($tervalidasi);

        return to_route('patient.index')->with('success', 'Data pasien berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return view('home.content.patient.show', [
            'title' => 'Detail Pasien',
            'patient' => $patient,
            'active' => 'patient'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $patient = Patient::findOrFail($id);
        $title = 'Sunting Pasien';
        $active = 'patient';
        return view('home.content.patient.edit', compact('title', 'patient', 'active'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $patient = Patient::findOrFail($id);
    
        $tervalidasi = $request->validate([
            'nik_numb' => 'required|numeric|unique:patients',
            'name' => 'required|string',
            'gender' => 'required|in:laki-laki,perempuan',
            'date_birth' => 'required|date',
            'address' => 'required|string',
            'hp_numb' => 'required|numeric',
            'bpjs_numb' => 'required|numeric|unique:patients',
            'img_ktp' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'email' => 'required|email:dns|unique:patients',
            'job' => 'required|string',
            'img' => 'required',
            'medical_record_numb' => 'nullable',
        ]);

        $patient->update($tervalidasi);

        if ($request->hasFile('img')) {
            if ($patient->img) {
                Storage::disk('public')->delete($patient->img);
            }
            
            $namaFile = time().'_'.Str::snake($request->img->getClientOriginalName());
            $fotoBaru = $request->file('img')->storeAs('images/img', $namaFile, 'public');
            $patient->update(['img' => $fotoBaru]);
        }

        if ($request->hasFile('img_ktp')) {
            if ($patient->img_ktp) {
                Storage::disk('public')->delete($patient->img_ktp);
            }
            
            $namaFile = time().'_'.Str::snake($request->img_ktp->getClientOriginalName());
            $fotoBaru = $request->file('img_ktp')->storeAs('images/patient', $namaFile, 'public');
            $patient->update(['img_ktp' => $fotoBaru]);
        }
        
        return to_route('patient.index')->with('success', 'Data pasien berhasil disunting');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = Patient::findOrFail($id);

        if ($patient->img) {
            Storage::disk('public')->delete($patient->img);
        }

        if ($patient->img_ktp) {
            Storage::disk('public')->delete($patient->img_ktp);
        }

        $patient->delete();

        return redirect()->back()->with('success', 'Data pasien berhasil dihapus');
    }
}
