<x-admin-master>
@section('content')

<h1>Roles</h1>

<div class="row">

    <div class="col-sm-6">
    
            <form action="{{route('roles.store')}}" method="post">
            @csrf
            
            <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
    
    </div>

</div>

<div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Slug</th>                            
          </tr>
          </thead>
        
        <tbody>
        @foreach($roles as $role)

          <tr>
            <td>{{$role->id}}</td>
            <td>{{$role->name}}</td>
            <td><a href="#">{{$role->slug}}</a></td>        
            
            
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