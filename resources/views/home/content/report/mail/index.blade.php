@extends('home.dashboard.layouts.index')

@section('headerContainer')
<x-reportMail.keterangan-dokter.partial.header />    
@endsection

@section('content')
    
@if ($type == 'suratDokter')

<x-reportMail.keterangan-dokter.index :surat="$surat" />

@endif

@endsection