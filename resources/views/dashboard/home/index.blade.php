
@extends('layouts.dashboardmaster')

@section('contant')

<div class="row">
    <div class="col-xl-12">

            <div class="card-body">
                <div class="">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Well Cheif.!</h4>
                        <p> Name -> <b>{{ Auth::user()->name }}</b></p>
                        <hr>
                        <p class="mb-0"> Email -> <b>{{ Auth::user()->email }}</b></p>
                    </div>
                </div>
            </div>

    </div>
</div>

@endsection


