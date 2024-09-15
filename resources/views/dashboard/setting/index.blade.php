@extends('layouts.dashboardmaster')

@section('contant')


    <div class="row">
        <div class="col-lg-6 row-10">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Username Update </h4>

                    <form  action="{{ route('setting.username') }} " method="POST" >
                        @csrf
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input style="border: 1px solid rgb(43, 112, 97);" type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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

        {{-- <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3"> Useremail Update</h4>

                    <form>

                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input style="border: 1px solid rgb(43, 112, 97);" type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <button style="background-color:rgb(54, 95, 97); border:none;" type="submit" class="btn btn-primary col-12">Update</button>
                    </form>
                </div>
            </div>
        </div> --}}

 @endsection

@section('script')
@if (session('name_update'))

<script>
    Swal.fire("Name Update Success ");
</script>

@endif
@endsection
