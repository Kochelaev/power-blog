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
          Редактирование поста
          
          <form action="{{route('admin.post.update', $post->id)}}" method="POST" class="col-6">
            @csrf
            @method('PATCH')
            <div class="card-body">
              <div class="form-group">
                <label for="postTitle">Название поста</label>
                <input type="text" name='title' class="form-control" id="postTitle" value="{{$post->title}}">
            </div>
            @error('title')
                <div class="text-danger">{{$message}}<div>
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