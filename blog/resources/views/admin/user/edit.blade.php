@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      
      <div class="row">

        <div class = "col-12">
          Редактирование пользователя
          
          <form action="{{route('admin.user.update', $user->id)}}" method="POST" class="col-6">
            @csrf
            @method('PATCH')
            <div class="card-body">
              <div class="form-group">
                <label for="userName">Имя пользователя</label>
                <input type="text" name='name' class="form-control" id="categoryTitle" value="{{$user->name}}">
              </div>
              @error('name')
                <div class="text-danger">{{$message}}</div>
              @enderror
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name='email' class="form-control" id="categoryTitle" value="{{$user->email}}">
              </div>
              @error('email')
                <div class="text-danger">{{$message}}</div>
              @enderror
              <input type="submit" class="btn btn-primary" value="Обновить">
            </div>
          </form>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection