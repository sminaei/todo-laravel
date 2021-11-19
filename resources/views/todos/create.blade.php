@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
          @include('sections.errors')
                <div class="card">
                    <div class="card-header">create new</div>
                    <div class="card-body">
             <form action="{{route('todos.store')}}" method="POST">
                 @csrf
                 <div class="form-group">
                     <label for="title">عنوان</label>
                     <input type="text" id="title" name="title" class="form-control form-control-invalid" value="{{old('title')}}">
                     @error('title')
                     <p class="invalid-feedback d-block">
                         <strong>{{$message}}</strong>
                     </p>
                     @enderror
                 </div>

                     <div class="form-group">
                         <label for="description">توضیحات</label>
                   <textarea id="description" name="description" class="form-control" value="{{old('description')}}"></textarea>
                         @error('description')
                         <p class="invalid-feedback d-block">
                             <strong>{{$message}}</strong>
                         </p>
                         @enderror
                     </div>
                     <button class="btn btn-dark" type="submit">ارسال</button>
             </form>
                    </div>
                </div>

                </div>
            </div>
        </div>

@endsection
