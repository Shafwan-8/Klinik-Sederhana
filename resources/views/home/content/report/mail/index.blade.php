@extends('home.dashboard.layouts.index')

@section('headerContainer')

@if ($type == 'suratDokter')

<x-reportMail.keterangan-dokter.partial.header />

@elseif ($type == 'suratSehat')

<x-reportMail.keterangan-sehat.partial.header />

@endif

@endsection

{{-- Datatable --}}

@section('content')
    
@if ($type == 'suratDokter')

<x-reportMail.keterangan-dokter.index :surat="$surat" />

@elseif ($type == 'suratSehat')

<x-reportMail.keterangan-sehat.index :surat="$surat" />

@endif

@endsection