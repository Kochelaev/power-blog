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
          Добавить пользователя
          
          <form action="{{route('admin.user.store')}}" method="POST" class="col-6">
            <div class="card-body">
              @csrf
              <div class="form-group">
                <label for="name">Имя пользователя</label>
                <input type="text" name='name' class="form-control" id="userName" placeholder="Имя пользователя">
              </div>
              @error('name')
                <div class="text-danger">{{$message}}<div>
              @enderror

              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name='email' class="form-control" id="userEmail" placeholder="Email">
              </div>
              @error('email')
                <div class="text-danger">{{$message}}<div>
              @enderror

              <div class="form-group">
                <label for="password">Пароль</label>
                <input type="text" name='password' class="form-control" id="userPassword" placeholder="Пароль">
              </div>
              @error('password')
                <div class="text-danger">{{$message}}<div>
              @enderror

              <div class="form-group w-50">
                <label>Выберите Роль</label>
                <select class="form-control" name="role_id">

                  @foreach ($roles as $roleId => $role) 
                  <option value="{{$roleId}}" 
                  >
                      {{$role}}
                    </option>
                  @endforeach
                </select>
                @error('role_id')
                <div class="text-danger">{{$message}}<div>
                @enderror
              </div>
              <input type="submit" class="btn btn-primary" value="Добавить">
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