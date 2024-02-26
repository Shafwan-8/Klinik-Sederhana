@extends('home.dashboard.layouts.index')

@section('content')

@if ($type == 'suratDokter')

<x-reportMail.keterangan-dokter.form :dokter="$dokter" />

@elseif ($type == 'suratSehat')

<x-reportMail.keterangan-sehat.form :dokter="$dokter" />

@elseif ($type == 'suratButaWarna')

<x-reportMail.keterangan-buta-warna.form :dokter="$dokter" :kondisi="$kondisi"/>

@endif

@endsection