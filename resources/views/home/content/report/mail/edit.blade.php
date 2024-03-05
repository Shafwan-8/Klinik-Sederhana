@extends('home.dashboard.layouts.index')

@section('content')

@if ($type == 'suratDokter')

<x-reportMail.keterangan-dokter.edit :dokter="$dokter" :surat="$surat" />

@elseif ($type == 'suratSehat')

<x-reportMail.keterangan-sehat.edit :dokter="$dokter" :surat="$surat" />

@elseif ($type == 'suratButaWarna')

<x-reportMail.keterangan-buta-warna.edit :dokter="$dokter" :surat="$surat" :kondisi="$kondisi"/>

@endif
@endsection