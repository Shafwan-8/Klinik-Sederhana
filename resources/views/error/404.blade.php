@extends('home.dashboard.layouts.index')

@section('container')

<div class="error-wrapper rounded border bg-white">
	<div class="row justify-content-center align-items-center text-center">
		<div class="col-xl-4">
			<h1 class="text-primary bold error-title">404</h1>
			<p class="pt-4 pb-5 error-subtitle">{{$errorr}}</p>
			<a href="{{$linkTo}}" class="btn btn-primary btn-pill">Kembali ke {{$backTo}}</a>
		</div>
		
		<div class="col-xl-6 pt-5 pt-xl-0 text-center">
			<img src="/img/lightenning.png" class="img-fluid" alt="Error Page Image">
		</div>
	</div>
</div>


@endsection