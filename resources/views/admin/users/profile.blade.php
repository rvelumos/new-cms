<x-admin-master>

@section('content')

<h1>Profile {{$user->name}}</h1>



<div class="row">

<div class="col-sm-6">

<form action="{{route('user.profile.update', $user)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <img src="{{$user->avatar}}" alt="" class="img-profile rounded-circle">
    </div>

    <div class="form-group">        
        <input type="file" class="file-control" id="image" name="avatar" value="">
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{$user->username}}">
    </div>

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$user->name}}">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="" name="email" value="{{$user->email}}" >
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="" name="password" >
    </div>

    <div class="form-group">
        <label for="password-confirm">Password confirm</label>
        <input type="password" class="form-control @error('password-confirm') is-invalid @enderror" id="password-confirm" placeholder="" name="password_confirmation" >
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>

</div>

@endsection

</x-admin-master>

