@extends('template.master')

@section('content')
<div class="card">
  <div class="card-header">
     <h4>Edit User</h4>
  </div>
  <div class="card-body">
   <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="name">Nama User</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" value="{{$user->email}}">
        </div>
        <div class="form-group">
        <label for="level">Level</label>
        <div class="form-check">                    
            <input class="form-check-input" type="radio" name="level" value="author" 
            @if($user->level == 'author')
                checked
            @endif
            ><label class="form-check-label" for="level">Author</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="level" value="admin"
            @if($user->level == 'admin')
                checked
            @endif
            ><label class="form-check-label" for="level">Admin</label>
        </div>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control" name="password">
            <label>*) Jika password tidak diganti, kosongkan saja.</label>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success">Update</button> 
          <a href="/user" class="btn btn-warning">Batal</a>
      </div>
    </form>
  </div>
</div>
@endsection