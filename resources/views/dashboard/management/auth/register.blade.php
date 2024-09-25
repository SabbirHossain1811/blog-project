@extends('layouts.dashboardmaster')

@section('contant')
    <div class="row">
        <div class="col-lg-7 ">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Role & User Register</h4>

                    <form role="form" action="{{ route('management.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"> Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control border-info-subtle" id="inputEmail3"
                                    placeholder="name " name="name">
                                @error('name')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-3 col-form-label"> Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control border-info-subtle" id="inputPassword3"
                                    placeholder="email" name="email">
                                @error('email')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="inputPassword5" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control border-info-subtle" id="inputPassword5"
                                    placeholder="password" name="password">
                                @error('password')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="inputPassword5" class="col-sm-3 col-form-label ">Role</label>
                            <div class="col-sm-9">
                                <select class="form-select border-info-subtle" name="role">
                                    <option value="">select roles</option>
                                    <option value="manager">Manager</option>
                                    <option value="blogger">Blogger</option>
                                    <option value="user">User</option>
                                </select>
                                @error('role')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="justify-content-end row">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-info waves-effect waves-light col-12">Sign In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Manager's Table</h4>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-info">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    @if (Auth::user()->role == "admin")
                                    <th>Status</th>
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($managers as $manager)
                                    <tr>
                                        <th scope="row">
                                            {{ $loop->index + 1 }}
                                        </th>
                                        <td>
                                            <p class="fw-normal mb-1">{{ $manager->name }}</p>
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1">{{ $manager->role }}</p>
                                        </td>
                                        @if (Auth::user()->role == "admin")
                                        <td>
                                            <form id="herouser{{ $manager->id }}" action="{{ route('management.down',$manager->id) }}" method="POST">
                                                @csrf
                                                <div class="form-check form-switch">
                                                    <input onchange="document.querySelector('#herouser{{ $manager->id }}').submit()" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ $manager->role == $manager->role ? 'checked' : '' }}>
                                                </div>
                                            </form>
                                            </td>
                                        <td class="d-flex gap-2 ">
                                            <a href="" class="btn btn-info btn-sm">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="" class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div>
            </div> <!-- end card -->
        </div>
    </div>
@endsection

@section('script')
    @if (session('store_register'))
        <script>
            Toastify({
                text: "{{ session('store_register') }}",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to  right, #FF512F ,#DD2475 )",
                },
                onClick: function() {} // Callback after click
            }).showToast();
        </script>
    @endif
@endsection
