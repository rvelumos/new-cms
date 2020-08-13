<x-admin-master>
@section('content')

<h1>Edit</h1>

<form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method('PATCH')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id='title' value='{{$post->title}}' name='title' aria-describedby="" placeholder="Enter title" class="form-control">
    </div>

    <div class="form-group">
        <label for="file">File</label>
        <input type="file" id='post_image' name='post_image' class="form-control-file">
    </div>

    <div class="form-group">
        <textarea name="body"class="form-control" id="body" cols="30" rows="10">{{$post->body}}</textarea>    
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
</x-admin-master>