@extends('layouts.dashboardmaster')

@section('title')
Blog Page's
@endsection

@section('contant')
<x-breadcum  sabbir="Blog's  Page"></x-breadcum>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <table class="table align-middle mb-0 bg-gray">
                <thead class="bg-light">
                    <tr>
                        <th>Cetegory Image</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('uploads/blog') }}/{{ $blog->thumbnail }}" alt=""
                                        style="width: 55px; height: 55px; margin-left:10px;" class="rounded-circle">
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1">{{ $blog->title }}</p>

                                    </div>
                                </div>
                            </td>
                            <td>

                                <p class="fw-normal mb-1">{!! $blog->description !!}</p>
                            </td>
                            <td>
                                <form id="sabbirkharap{{ $blog->id }}"
                                    action="{{ route('category.status', $blog->id) }}" method="POST">
                                    @csrf
                                    <div class="form-check form-switch">
                                        <input
                                            onchange="document.querySelector('#sabbirkharap{{ $blog->id }}').submit()"
                                            class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckChecked"
                                            {{ $blog->status == 'active' ? 'checked' : '' }}>
                                    </div>
                                </form>
                            </td>
                            <td>
                                <a href="#" type="button"  class="btn btn-outline-info editbtn waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#Modaleedit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="{{ route('category.destroy', $blog->slug) }}"
                                    class="btn btn-outline-danger waves-effect waves-light">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
