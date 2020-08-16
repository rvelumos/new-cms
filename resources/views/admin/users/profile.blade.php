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

<div class="row">
    <div class="col-sm-6">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <td></td>
            <th>ID</th>  
            <th>Name</th>          
            <th>Slug</th>
            <th>Detach</th>            
            <th>Attach</th> 
          </tr>
          </thead>
        
        <tbody>
        @foreach($roles as $role)

          <tr>
          
            <td><input type="checkbox" 
                @foreach($user->roles as $user_role)
                    @if($user_role->slug == $role->slug)
                        checked
                    @endif
                @endforeach
            /></td>
            <td>{{$role->id}}</td>
            <td>{{$role->name}}</td>
            <td>{{$role->slug}}</td>

            <td>
                <form method="post" action="{{route('user.role.attach', $user)}}">
                @method('PUT')
                @csrf
                <input type="hidden" name="role" value={{$role->id}} />
                    <button class="btn btn-primary"
                    @if($user->roles->contains($role))
                        disabled
                    @endif
                    >Attach</button>
                </form>
                </td><td>
                <form method="post" action="{{route('user.role.detach', $user)}}">
                @method('PUT')
                @csrf
                <input type="hidden" name="role" value={{$role->id}} />
                    <button class="btn btn-danger"
                    @if(!$user->roles->contains($role))
                        disabled
                    @endif
                    >Detach</button>
                </form>
                
          
            </td>            
          </tr>

        @endforeach
        
        <tbody>
          <tr>
            
          </tr>
        </tbody>
      </table>
    </div>
</div>

@endsection

</x-admin-master>

