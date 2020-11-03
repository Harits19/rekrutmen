@extends('andrea.main')
@section('title', 'Reset Password')

@section('content')
<div class="col-xl-8 py-5 px-md-5">
    <h2 class="h3">Reset Password</h2>
    <h6>Halaman reset password untuk organisasi</h6>
    <br>
    <x-jet-validation-errors class="mb-4" />
    <div class="row pt-md-4">

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="card-body card-block">
                <div>
                    <small> Isilah Data Dibawah Ini </small> <strong>Dengan Benar</strong>
                </div>

                <div class="form-group">
                    <label class=" form-control-label">Email</label>
                    <div class="input-group">
                        <div class="input-group-addon"></div>
                        <input required type="email" id="email" name="email" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Password</label>
                    <div class="input-group">
                        <div class="input-group-addon"></div>
                        <input required type="password" id="password" name="password" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class=" form-control-label">Confirm Password</label>
                    <div class="input-group">
                        <div class="input-group-addon"></div>
                        <input required type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Reset Password</button>
                </div>

            </div>
        </form>

    </div>



    <div class="col-lg-6 d-flex">
        <div id="map" class="bg-light"></div>
    </div>
</div>

@endsection