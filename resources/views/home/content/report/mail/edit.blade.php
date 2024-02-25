@extends('home.dashboard.layouts.index')

@section('content')
<x-reportMail.keterangan-dokter.edit :dokter="$dokter" :surat="$surat" />
@endsection