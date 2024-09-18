@extends('layouts.dashboardmaster')

@section('contant')

    {{-- name --}}
    <div style="margin-top: 50px" class="row ">
        <div class="col-lg-6 row-10">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Username Update </h4>

                    <form  action="{{ route('setting.username') }} " method="POST" >
                        @csrf
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input style="border: 1px solid rgb(43, 112, 97);"  value="{{ old('password') }}" type="text" name="name" class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('name')
                            <p class="text-danger mt-2">
                                <strong>{{ $message }}</strong>
                            </p>
                            @enderror
                        </div>
                        <button style="background-color:rgb(54, 95, 97); border:none;" type="submit" class="btn btn-primary col-12">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- end col -->

        {{-- email --}}
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3"> Useremail Update</h4>

                    <form  action="{{ route('setting.useremail') }} " method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input style="border: 1px solid rgb(43, 112, 97);" value="{{ old('password') }}" type="email" name="email" class="form-control @error('name') is-invalid @enderror""  id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('email')
                            <p class="text-danger mt-2">
                                <strong>{{ $message }}</strong>
                            </p>
                            @enderror
                        </div>
                        <button style="background-color:rgb(54, 95, 97); border:none;" type="submit" class="btn btn-primary col-12">Update</button>
                    </form>
                </div>
            </div>
        </div>


         {{-- password --}}
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3"> Password Update</h4>

                    <form  action="{{ route('setting.password') }} " method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label"> Current Password</label>
                            <input style="border: 1px solid rgb(43, 112, 97);" value="{{ old('password') }}" type="password" name="c_password" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('c_password')
                            <p class="text-danger mt-2">
                                <strong>{{ $message }}</strong>
                            </p>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">New password</label>
                            <input style="border: 1px solid rgb(43, 112, 97);" value="{{ old('password') }}" type="password" name="password" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('password')
                            <p class="text-danger mt-2">
                                <strong>{{ $message }}</strong>
                            </p>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Confrim Password</label>
                            <input  style="border: 1px solid rgb(43, 112, 97);" value="{{ old('password') }}" type="password" name="password_confirmation" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('')
                            <p class="text-danger mt-2">
                                <strong>{{ $message }}</strong>
                            </p>
                            @enderror
                        </div>
                        <button style="background-color:rgb(54, 95, 97); border:none;" type="submit" class="btn btn-primary col-12">Update</button>
                    </form>
                </div>
            </div>
        </div>


      {{-- image --}}
      <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3"> Image Update</h4>

                <form  action="{{ route('setting.image') }} " method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label"> Current Password</label>
                        <input style="border: 1px solid rgb(43, 112, 97);" value="{{ old('password') }}" type="file" name="image" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('image')
                        <p class="text-danger mt-2">
                            <strong>{{ $message }}</strong>
                        </p>
                        @enderror

                    </div>
                    <button style="background-color:rgb(54, 95, 97); border:none;" type="submit" class="btn btn-primary col-12">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>


 @endsection

@section('script')
{{-- name --}}
@if (session('name_update'))

<script>
    Toastify({
  text: "{{ session('name_update') }}",
  duration: 3000,
  destination: "https://github.com/apvarun/toastify-js",
  newWindow: true,
  close: true,
  gravity: "top", // `top` or `bottom`
  position: "right",
 // `left`, `center` or `right`
  stopOnFocus: true, // Prevents dismissing of toast on hover
  style: {
    background: "linear-gradient(to  right, #FF512F ,#DD2475 )",
  },
  onClick: function(){} // Callback after click
}).showToast();
</script>

@endif

{{-- email --}}
@if (session('email_update'))

<script>
   Toastify({
  text: "{{ session('email_update') }}",
  duration: 3000,
  destination: "https://github.com/apvarun/toastify-js",
  newWindow: true,
  close: true,
  gravity: "top", // `top` or `bottom`
  position: "right", // `left`, `center` or `right`
  stopOnFocus: true, // Prevents dismissing of toast on hover
  style: {
    background: "linear-gradient(to  right, #FF512F ,#DD2475 )",
  },
  onClick: function(){} // Callback after click
}).showToast();
</script>

@endif

{{-- password --}}
@if (session('password_update'))

<script>
   Toastify({
  text: "{{ session('password_update') }}",
  duration: 3000,
  destination: "https://github.com/apvarun/toastify-js",
  newWindow: true,
  close: true,
  gravity: "top", // `top` or `bottom`
  position: "right", // `left`, `center` or `right`
  stopOnFocus: true, // Prevents dismissing of toast on hover
  style: {
    background: "linear-gradient(to  right, #FF512F ,#DD2475 )",
  },
  onClick: function(){} // Callback after click
}).showToast();
</script>
@endif

{{-- image --}}
@if (session('image_update'))

<script>
   Toastify({
  text: "{{ session('image_update') }}",
  duration: 3000,
  destination: "https://github.com/apvarun/toastify-js",
  newWindow: true,
  close: true,
  gravity: "top", // `top` or `bottom`
  position: "right", // `left`, `center` or `right`
  stopOnFocus: true, // Prevents dismissing of toast on hover
  style: {
    background: "linear-gradient(to  right, #FF512F ,#DD2475 )",
  },
  onClick: function(){} // Callback after click
}).showToast();
</script>
@endif

@endsection
