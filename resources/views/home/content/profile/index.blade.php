@extends('home.dashboard.layouts.index')

@section('content_profile')

<div class="content-wrapper">
<div class="content">
<div class="bg-white border rounded">
<div class="row no-gutters">
<div class="col-lg-4 col-xl-3">
<div class="profile-content-left profile-left-spacing pt-5 pb-3 px-3 px-xl-5">
<div class="card text-center widget-profile px-0 border-0">
  <div class="card-img mx-auto rounded-circle">
    @if (auth()->user()->avatar)
        <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="profile picture" style="width: 100px; height: 100px;">
    @else
        <img src="{{ asset('img/default-profile.jpg') }}" alt="profile picture" style="width: 100px; height: 100px;">
    @endif
  </div>

  <div class="card-body">
    <h4 class="py-2 text-dark">{{ auth()->user()->name }}</h4>
    <p class="mb-2">{{ auth()->user()->email }}</p>
    <p>Role: {{ auth()->user()->role }}</p>
  </div>
</div>

<hr class="w-100">

<div class="contact-info pt-4">
  <h5 class="text-dark mb-1">Contact Information</h5>
  @if (auth()->user()->role == 'dokter')
  <p class="text-dark font-weight-medium pt-4 mb-2">Email address</p>
  <p>{{ auth()->user()->email }}</p>
  <p class="text-dark font-weight-medium pt-4 mb-2">Nomor Hp</p>
  <p>{{ $dokter->no_hp }}</p>
  <p class="text-dark font-weight-medium pt-4 mb-2">Alamat</p>
  <p>{{ $dokter->alamat }}</p>
  <p class="text-dark font-weight-medium pt-4 mb-2">Social Profile</p>
  <p class="pb-3 social-button">
    <a href="#" class="mb-1 btn btn-outline btn-twitter rounded-circle">
      <i class="mdi mdi-twitter"></i>
    </a>

    <a href="#" class="mb-1 btn btn-outline btn-linkedin rounded-circle">
      <i class="mdi mdi-linkedin"></i>
    </a>

    <a href="#" class="mb-1 btn btn-outline btn-facebook rounded-circle">
      <i class="mdi mdi-facebook"></i>
    </a>

    <a href="#" class="mb-1 btn btn-outline btn-skype rounded-circle">
      <i class="mdi mdi-skype"></i>
    </a>
  </p>
@else
<p class="text-dark font-weight-medium pt-4 mb-2">Email address</p>
  <p>{{ auth()->user()->email }}</p>
  <p class="text-dark font-weight-medium pt-4 mb-2">Social Profile</p>
  <p class="pb-3 social-button">
    <a href="#" class="mb-1 btn btn-outline btn-twitter rounded-circle">
      <i class="mdi mdi-twitter"></i>
    </a>

    <a href="#" class="mb-1 btn btn-outline btn-linkedin rounded-circle">
      <i class="mdi mdi-linkedin"></i>
    </a>

    <a href="#" class="mb-1 btn btn-outline btn-facebook rounded-circle">
      <i class="mdi mdi-facebook"></i>
    </a>

    <a href="#" class="mb-1 btn btn-outline btn-skype rounded-circle">
      <i class="mdi mdi-skype"></i>
    </a>
  </p>
  @endif
</div>
</div>
</div>

<div class="col-lg-8 col-xl-9">
<div class="profile-content-right profile-right-spacing py-5">
<ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myTab" role="tablist">

  <li class="nav-item">
    <a class="nav-link active" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
  </li>

</ul>

<div class="tab-content px-3 px-xl-5" id="myTabContent">

  <div class="tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="settings-tab">
    <div class="tab-pane-content mt-5">
      @if (auth()->user()->role == 'dokter')
      <form action="{{ route('profile.update', $dokter->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group row mb-6">
          <label for="avatar" class="col-sm-4 col-lg-2 col-form-label">User Image</label>
          <div class="col-sm-8 col-lg-10">
              <div class="custom-file mb-1">
                <input type="file" class="custom-file-input" id="avatar" name="avatar">
                <label class="custom-file-label" for="avatar">Choose file</label>
              </div>
          </div>
        </div>

        <div class="row mb-2">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="username">User Name</label>
              <input type="text" class="form-control" id="username" value="{{ auth()->user()->username }}" readonly>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <label for="inisial">Inisial</label>
              <input type="text" class="form-control" id="inisial" value="{{ strtoupper($dokter->inisial) }}" readonly>
            </div>
          </div>
          
          <div class="col-lg-6">
            <div class="form-group">
              <label for="no_ktp">Nomor KTP</label>
              <input type="number" class="form-control" id="no_ktp" name="no_ktp" value="{{ $dokter->no_ktp }}">
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <label for="sip">Nomor SIP</label>
              <input type="number" class="form-control" id="sip" name="sip" value="{{ $dokter->sip }}">
            </div>
          </div>
        </div>

        <div class="form-group mb-4">
            <label for="no_hp">Nomor Hp</label>
            <input type="number" class="form-control" id="no_hp" name="no_hp" value="{{ $dokter->no_hp }}">
        </div>

        <div class="form-group mb-4">
          <label for="alamat">Alamat</label>
          <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="1">{{ $dokter->alamat }}</textarea>
        </div>

        <div class="form-group mb-4">
          <label for="email">Email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ auth()->user()->email }}">
          @error('email')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-group mb-4">
          <label for="password">Password baru</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="d-flex justify-content-end mt-5">
          <button type="submit" class="btn btn-primary mb-2 btn-pill">Update Profile</button>
        </div>
      </form>
      @else
      <form action="{{ route('profile.update.admin', ['profile' => auth()->user()->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group row mb-6">
          <label for="avatar" class="col-sm-4 col-lg-2 col-form-label">User Image</label>
          <div class="col-sm-8 col-lg-10">
              <div class="custom-file mb-1">
                <input type="file" class="custom-file-input" id="avatar" name="avatar">
                <label class="custom-file-label" for="avatar">Choose file</label>
              </div>
          </div>
        </div>

        <div class="row mb-2">
          <div class="col-lg-12">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" value="{{ auth()->user()->name }}">
            </div>
          </div>
        </div>

        <div class="row mb-2">
          <div class="col-lg-12">
            <div class="form-group">
              <label for="username">User Name</label>
              <input type="text" class="form-control" id="username" value="{{ auth()->user()->username }}" readonly>
            </div>
          </div>
        </div>

        <div class="form-group mb-4">
          <label for="email">Email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror"" id="email" name="email" value="{{ auth()->user()->email }}">
          @error('email')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-group mb-4">
          <label for="password">Password baru</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="d-flex justify-content-end mt-5">
          <button type="submit" class="btn btn-primary mb-2 btn-pill">Update Profile</button>
        </div>
      </form>
      @endif
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div> <!-- End Content -->
</div>

@endsection

