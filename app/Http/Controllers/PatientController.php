<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Master Pasien';
        $patients = Patient::latest()->get();
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
        $dokter = auth()->user()->dokter->first();
        $patient = Patient::latest()->first();
        // jika dokter belum buat akun
        if($dokter === null) {
            $title = 'Tambah Pasien';
            $active = 'patient';
            $errorr = 'Anda belum mendaftar, silahkan membuat akun Dokter terlebih dahulu';
            $linkTo = '/dokter/create';
            $backTo = 'ke pendaftaran dokter';
            return view('error.404', compact('title','active','errorr', 'linkTo', 'backTo'));
        // jika dokter punya akun
        }elseif(auth()->user()->dokter->first() ?? $patient === null  ) {
            $dokter = auth()->user()->dokter->first();
            $inisial = $dokter->inisial;
            $patient = Patient::latest()->first();
            // jika pasiennya tidak ada
            if($patient == null) {
                $patientMedic = 0;
                $lastNumber = (int)substr($patientMedic, -8);
                $newNumber = $lastNumber + 1;
                $numberMedic = str_pad($newNumber, 8, '0', STR_PAD_LEFT);
                $medical = $inisial . '-' .$numberMedic;
                return view('home.content.patient.create', compact('title', 'active','medical'));
            // jika pasiennya ada
            }else { 
            $lastNumber = (int)substr($patient->medical_record_numb, -8);
            $newNumber = $lastNumber + 1;
            $numberMedic = str_pad($newNumber, 8, '0', STR_PAD_LEFT);
            $medical = $inisial . '-' .$numberMedic; 
            return view('home.content.patient.create', compact('title', 'active','medical'));
            }
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
            'medical_record_numb' => 'required|unique:patients',
        ]);

        if ($request->hasFile('img_ktp')) {
            $namaFile = time().'_'.Str::snake($request->img_ktp->getClientOriginalName());
            $tervalidasi['img_ktp'] = $request->file('img_ktp')->storeAs('images/patient', $namaFile, 'public');
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
            'medical_record_numb' => 'nullable',
        ]);

        $patient->update($tervalidasi);

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

        if ($patient->img_ktp) {
            Storage::disk('public')->delete($patient->img_ktp);
        }

        $patient->delete();

        return redirect()->back()->with('success', 'Data pasien berhasil dihapus');
    }
}
