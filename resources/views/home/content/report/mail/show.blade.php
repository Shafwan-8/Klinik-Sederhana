@extends('home.dashboard.layouts.index')

@section('headerContainer')
<x-reportMail.keterangan-dokter.partial.headerShow />
@endsection

@section('content')
@if ($type == 'suratDokter')

<x-reportMail.keterangan-dokter.show :surat="$surat" />

@elseif ($type == 'suratSehat')

<x-reportMail.keterangan-sehat.show :surat="$surat" />

@elseif ($type == 'suratButaWarna')

<x-reportMail.keterangan-buta-warna.show :surat="$surat" />

@endif
@endsection