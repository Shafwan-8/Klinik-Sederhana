@extends('home.dashboard.layouts.index')

@section('content')

@if ($type == 'suratDokter')

<x-reportMail.keterangan-dokter.form :dokter="$dokter" />

@elseif ($type == 'suratSehat')

<x-reportMail.keterangan-sehat.form :dokter="$dokter" />

@endif

@endsection