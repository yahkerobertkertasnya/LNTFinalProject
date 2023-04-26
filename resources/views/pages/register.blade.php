@extends('template')

@section('title', 'PT Meksiko Login')

@section('content')
    <div class="position-absolute top-50 vw-100 h-50">
        <div class="card w-25 start-50 translate-middle">
            <div class="card-header text-bg-primary text-center">
                Register
            </div>
            <div class="card-body w-100 p-5">
                <form action="{{ url('/register') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input name="username" type="text" class="form-control" id="exampleInputUsername1" aria-describedby="usernameHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputHandphone1" class="form-label">Handphone</label>
                        <input name="handphone" type="text" class="form-control" id="exampleInputHandphone1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputConfirmPassword1" class="form-label">Confirm Password</label>
                        <input name="confirm-password" type="password" class="form-control" id="exampleInputConfirmPassword1">
                    </div>
                    <button type="submit" class="btn mt-4 btn-outline-primary">Register</button>
                </form>
                @if($errors->any())
                    <div class="text-bg-dark text-center pt-4">
                        {{ $errors->first() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
