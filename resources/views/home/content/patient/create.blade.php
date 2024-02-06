@extends('home.dashboard.layouts.index')

@section('cssCamera')

<style>
    #video {
  border: 1px solid black;
  box-shadow: 2px 2px 3px black;
  width: 320px;
  height: 240px;
}

#photo {
  border: 1px solid black;
  box-shadow: 2px 2px 3px black;
  width: 320px;
  height: 240px;
}

#canvas {
  display: none;
}

.camera {
  width: 340px;
  display: inline-block;
}

.output {
  width: 340px;
  display: inline-block;
  vertical-align: top;
}

#startbutton {
  display: block;
  position: relative;
  margin-left: auto;
  margin-right: auto;
  bottom: 32px;
  background-color: rgb(0 150 0 / 50%);
  border: 1px solid rgb(255 255 255 / 70%);
  box-shadow: 0px 0px 1px 2px rgb(0 0 0 / 20%);
  font-size: 14px;
  font-family: "Lucida Grande", "Arial", sans-serif;
  color: rgb(255 255 255 / 100%);
}

.contentarea {
  font-size: 16px;
  font-family: "Lucida Grande", "Arial", sans-serif;
  width: 760px;
}

</style>

@endsection

@section('title')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-dark">
  <h1 class="h2">Tambah Pasien</h1>
</div>

@endsection

@section('container')

<form
        class="card"
        action="{{ route('patient.store') }}"
        method="POST"
        enctype="multipart/form-data"
        >
        
        <div class="card-header p-0 d-flex justify-content-start px-4 py-4">
            <a
            class="btn btn-dark"
            href="{{ route('patient.index') }}"
            >Kembali</a>
        </div>

        <div class="card-body text-dark">
            @csrf
            <div class="row">
            
                <div class="col-md-6">
                    <div class="mb-3">
                        <label
                        class="form-label"
                            for="nik_numb"
                        >NIK</label>

                        <input
                            class="form-control @error('nik_numb') is-invalid @enderror"
                            id="nik_numb"
                            name="nik_numb"
                            type="number"
                            value="{{ old('nik_numb') }}"
                        >

                        @error('nik_numb')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                        <div class="mb-3">
                        <label
                                class="form-label"
                                for="name"
                        >Nama</label>
                
                        <input
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                name="name"
                                type="text"
                                value="{{ old('name') }}"
                        >
                
                        @error('name')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                        @enderror
                        </div>
                </div>


                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="mb-3">Jenis Kelamin</label>
                        <div class="d-flex">
                            <div class="form-check">
                                <input
                                    class="form-check-input @error('gender') is-invalid @enderror"
                                    id="gender"
                                    name="gender"
                                    type="radio"
                                    value="laki-laki"
                                    @checked(old('gender') == 'laki-laki')
                                >
                                <label
                                    class="form-check-label"
                                    for="gender"
                                >
                                    Laki-laki
                                </label>
                            </div>

                            <div class="form-check mx-3">
                                <input
                                    class="form-check-input @error('gender') is-invalid @enderror"
                                    id="gender"
                                    name="gender"
                                    type="radio"
                                    value="perempuan"
                                    @checked(old('gender') == 'perempuan')
                                >
                                <label
                                    class="form-check-label"
                                    for="gender"
                                >
                                    Perempuan
                                </label>
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label
                            class="form-label"
                            for="date_birth"
                        >Tanggal Kelahiran</label>

                        <input
                            class="form-control @error('date_birth') is-invalid @enderror"
                            id="date_birth"
                            name="date_birth"
                            type="date"
                            value="{{ old('date_birth') }}"
                        >

                        @error('date_birth')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label
                        class="form-label"
                        for="address"
                        >Alamat</label>
                        
                        <textarea
                            class="form-control @error('address') is-invalid @enderror"
                            id="address"
                            name="address"
                        >{{ old('address') }}</textarea>
                    
                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3 ">
                        <label
                            class="form-label mb-3"
                            for="hp_numb"
                        >No HP</label>

                        <input
                            class="form-control @error('hp_numb') is-invalid @enderror"
                            id="hp_numb"
                            name="hp_numb"
                            type="number"
                            value="{{ old('hp_numb') }}"
                        >

                        @error('hp_numb')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label
                            class="form-label"
                            for="bpjs_numb"
                        >No BPJS</label>

                        <input
                            class="form-control @error('bpjs_numb') is-invalid @enderror"
                            id="bpjs_numb"
                            name="bpjs_numb"
                            type="number"
                            value="{{ old('bpjs_numb') }}"
                        >

                        @error('bpjs_numb')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label
                        class="form-label"
                        for="img_ktp"
                        >Foto KTP</label>
                        <input
                            class="form-control @error('img_ktp') is-invalid @enderror"
                            id="img_ktp"
                            name="img_ktp"
                            type="file"
                            value="{{ old('img_ktp') }}"
                            onchange="previewImage()"
                        >
                        
                        @error('img_ktp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-2">
                    <img 
                        class="img-preview img-fluid my-3"
                        width="150px"
                    />
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label
                            class="form-label"
                            for="email"
                        >Email</label>

                        <input
                            class="form-control @error('email') is-invalid @enderror"
                            id="email"
                            name="email"
                            type="text"
                            value="{{ old('email') }}"
                        >

                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label
                            class="form-label"
                            for="job"
                        >Pekerjaan</label>

                        <input
                            class="form-control @error('job') is-invalid @enderror"
                            id="job"
                            name="job"
                            type="text"
                            value="{{ old('job') }}"
                        >

                        @error('job')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label
                            class="form-label"
                            for="medical_record_numb"
                        >No Rekam Medis</label>

                        <input
                            class="form-control @error('medical_record_numb') is-invalid @enderror"
                            id="medical_record_numb"
                            name="medical_record_numb"
                            type="text"
                            value="{{ old('medical_record_numb') ?? $medical }}"
                            readonly
                        >

                        @error('medical_record_numb')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <input class="form-control d-none" name="img" id="image-photo" type="file" />

                <div class="camera">
                    <video id="video">Video stream not available.</video>
                    <button type="button" id="startbutton">Take photo</button>
                </div>
                <canvas name="img" id="canvas"> </canvas>
                <div class="output">
                    <img id="photo" alt="The screen capture will appear in this box." />
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button class="btn btn-dark">Simpan</button>
        </div>
    </form>
<script>
(() => {
  // The width and height of the captured photo. We will set the
  // width to the value defined here, but the height will be
  // calculated based on the aspect ratio of the input stream.

  const width = 320; // We will scale the photo width to this
  let height = 0; // This will be computed based on the input stream

  // |streaming| indicates whether or not we're currently streaming
  // video from the camera. Obviously, we start at false.

  let streaming = false;

  // The various HTML elements we need to configure or control. These
  // will be set by the startup() function.

  let video = null;
  let canvas = null;
  let photo = null;
  let startbutton = null;

  function showViewLiveResultButton() {
    if (window.self !== window.top) {
      // Ensure that if our document is in a frame, we get the user
      // to first open it in its own tab or window. Otherwise, it
      // won't be able to request permission for camera access.
      document.querySelector(".contentarea").remove();
      const button = document.createElement("button");
      button.textContent = "View live result of the example code above";
      document.body.append(button);
      button.addEventListener("click", () => window.open(location.href));
      return true;
    }
    return false;
  }

  function startup() {
    if (showViewLiveResultButton()) {
      return;
    }
    video = document.getElementById("video");
    canvas = document.getElementById("canvas");
    photo = document.getElementById("photo");
    startbutton = document.getElementById("startbutton");

    navigator.mediaDevices
      .getUserMedia({ video: true, audio: false })
      .then((stream) => {
        video.srcObject = stream;
        video.play();
      })
      .catch((err) => {
        console.error(`An error occurred: ${err}`);
      });

    video.addEventListener(
      "canplay",
      (ev) => {
        if (!streaming) {
          height = video.videoHeight / (video.videoWidth / width);

          // Firefox currently has a bug where the height can't be read from
          // the video, so we will make assumptions if this happens.

          if (isNaN(height)) {
            height = width / (4 / 3);
          }

          video.setAttribute("width", width);
          video.setAttribute("height", height);
          canvas.setAttribute("width", width);
          canvas.setAttribute("height", height);
          streaming = true;
        }
      },
      false,
    );

    startbutton.addEventListener(
      "click",
      (ev) => {
        takepicture();
        ev.preventDefault();
      },
      false,
    );

    clearphoto();
  }

  // Fill the photo with an indication that none has been
  // captured.

  function clearphoto() {
    const context = canvas.getContext("2d");
    context.fillStyle = "#AAA";
    context.fillRect(0, 0, canvas.width, canvas.height);

    const data = canvas.toDataURL("image/png");
    photo.setAttribute("src", data);
  }

  // Capture a photo by fetching the current contents of the video
  // and drawing it into a canvas, then converting that to a PNG
  // format data URL. By drawing it on an offscreen canvas and then
  // drawing that to the screen, we can change its size and/or apply
  // other changes before drawing it.

  function takepicture() {
    const context = canvas.getContext("2d");
    if (width && height) {
      canvas.width = width;
      canvas.height = height;
      context.drawImage(video, 0, 0, width, height);

      const data = canvas.toDataURL("image/png");
      photo.setAttribute("src", data);

      canvas.toBlob( (blob) => {
        const file = new File( [ blob ], "{{ $medical }}.png" );
        const dT = new DataTransfer();
        dT.items.add( file );
        dT.items.type = "image/png";
        document.querySelector("#image-photo").files = dT.files;
        });
    } else {
      clearphoto();
    }
  }

  // Set up our event listener to run the startup process
  // once loading is complete.
  window.addEventListener("load", startup, false);
})();



function previewImage() {
    const image = document.querySelector('#img_ktp');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader .readAsDataURL(image.files[0]);

    oFReader.onload = function(ofREvent) {
        imgPreview.src = event.target.result;    
    }
}

</script>
    

@endsection