@extends('layouts.dashboardmaster')
@section('title')
Blog Create Page's
@endsection
@section('contant')
<x-breadcum  sabbir="Blog's Show Page"></x-breadcum>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-3">Blog's Create</h4>

            <form role="form" action="" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Blogs Title</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Blog Title"
                            name="title">
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Blogs Slug</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputPassword3" placeholder="Blog Slug"
                            name="slug">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Categories</label>
                    <div class="col-sm-9">

                        <select class="form-control" data-toggle="select2" name="category_id">
                            <option>Select</option>
                            <optgroup>
                                @foreach ($cetegories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        @error('category_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <img id="montrimosai" src="{{ asset('uploads/default/deafulttt.jpg') }}" alt=""
                        style="width:100%; height:300px; object-fit:contain;">
                </div>
                <div class="row mb-2">
                    <label for="inputPassword5" class="col-sm-3 col-form-label">Blog Thumbnail</label>
                    <div class="col-sm-9">
                        <input onchange="document.querySelector('#montrimosai').src = window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="inputPassword5"  name="thumbnail">
                        @error('thumbnail')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="justify-content-end row">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-info waves-effect waves-light col-12">Insert</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
