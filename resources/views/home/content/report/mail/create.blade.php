@extends('home.dashboard.layouts.index')

@section('content')
    <x-reportMail.keterangan-dokter.form :dokter="$dokter" />
@endsection