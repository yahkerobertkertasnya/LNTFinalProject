@extends('template')

@section('title', 'PT Meksiko Login')

@section('content')
    <div class="position-absolute top-50 vw-100 h-50 ">
        <div class="card w-25 start-50 translate-middle">
            <div class="card-header text-bg-primary text-center">
                Login
            </div>
            <div class="card-body w-100 p-5">
                <form action="{{ url('/login') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn mt-4 btn-outline-primary">Login</button>
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
