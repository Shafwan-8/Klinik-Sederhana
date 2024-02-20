@extends('home.dashboard.layouts.index')

@section('headerContainer')
    <x-surat.partial.header/>
@endsection

@section('container')

@if ($surat == 'dokter')

    <x-surat.keterangan-dokter 
        :inspection="$inspection" 
        :patient="$patient"
    />

@elseif ($surat == 'sehat')

    <x-surat.keterangan-sehat 
        :inspection="$inspection" 
        :patient="$patient"
    />

@elseif ($surat == 'buta-warna')

    <x-surat.keterangan-buta-warna 
        :inspection="$inspection" 
        :patient="$patient"
    />
    
@endif
    
@endsection