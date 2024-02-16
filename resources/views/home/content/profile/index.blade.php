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
    <img src="{{ asset('storage/' . $dokter->foto) }}" alt="profile picture" style="width: 100px; height: 100px;">
  </div>

  <div class="card-body">
    <h4 class="py-2 text-dark">{{ auth()->user()->name }}</h4>
    <p class="mb-2">{{ auth()->user()->email }}</p>
    <p>Role: {{ auth()->user()->role }}</p>
  </div>
</div>

<div class="d-flex justify-content-between ">
  <div class="text-center pb-4">
    <h6 class="text-dark pb-2">1503</h6>
    <p>Friends</p>
  </div>

  <div class="text-center pb-4">
    <h6 class="text-dark pb-2">2905</h6>
    <p>Followers</p>
  </div>

  <div class="text-center pb-4">
    <h6 class="text-dark pb-2">1200</h6>
    <p>Following</p>
  </div>
</div>

<hr class="w-100">

<div class="contact-info pt-4">
  <h5 class="text-dark mb-1">Contact Information</h5>
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
      <form action="{{ route('profile.update', $idDokter) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group row mb-6">
          <label for="foto" class="col-sm-4 col-lg-2 col-form-label">User Image</label>
          <div class="col-sm-8 col-lg-10">
              <div class="custom-file mb-1">
                <input type="file" class="custom-file-input" id="foto" name="foto">
                <label class="custom-file-label" for="foto">Choose file</label>
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
          <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
        </div>

        <div class="form-group mb-4">
          <label for="password">Password baru</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="d-flex justify-content-end mt-5">
          <button type="submit" class="btn btn-primary mb-2 btn-pill">Update Profile</button>
        </div>
      </form>
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

