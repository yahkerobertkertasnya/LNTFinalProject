@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show position-fixed top-0 end-0 my-5">
    <strong>Error!</strong> {{$errors->first()}}
</div>
@endif

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0 my-5">
        <strong>Success!</strong> {{session('success')}}
    </div>
@endif
