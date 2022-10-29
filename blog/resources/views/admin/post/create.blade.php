@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Администрирование</h1>
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
          Добавить пост
          
          <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                @error('title')
                  <div class="text-danger">{{$message}}</div>
                @enderror
                <label for="postTitle">Название поста</label>
                <input type="text" name='title' class="form-control" id="postTitle" placeholder="Название поста"
                value="{{old('title')}}">
              </div>

              <div class="form-group">
                @error('content')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <textarea id="summernote" name="content">
                  {{old('content')}}
                </textarea>
              </div>

              <div class="form-group w-50">
                @error('preview_image')
                  <div class="text-danger">{{$message}}</div>
                @enderror
                <label for="exampleInputFile">Добавить превью</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="preview_image">
                    <label class="custom-file-label">Выберите изображение</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Загрузка</span>
                  </div>
                </div>
              </div>

              <div class="form-group w-50">
                @error('main_image')
                  <div class="text-danger">{{$message}}</div>
                @enderror
                <label for="exampleInputFile">Добавить главное изображение</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="main_image">
                    <label class="custom-file-label">Выберите изображение</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Загрузка</span>
                  </div>
                </div>
              </div>

              <div class="form-group w-50">
                @error('category_id')
                  <div class="text-danger">{{$message}}</div>
                @enderror
                <label>Выберите категорию</label>
                <select class="form-control" name="category_id">


                  @foreach ($categories as $category) 
                  <option value="{{$category->id}}" 
                    {{$category->id == old('category_id') ? 'selected' : ''}}
                  >
                      {{$category->title}}
                    </option>
                  @endforeach
                  
                </select>
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Добавить">
              </div>
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