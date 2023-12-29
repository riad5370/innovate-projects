@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header bg-primary"><h3 class="text-center font-weight-light my-2">service Details</h3></div>
                    <div class="card-body">
                        <form action="{{route('services.update',$service->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-floating mb-3">
                                <input class="form-control" name="name" value="{{$service->name}}" id="productName" type="text" placeholder="" />
                                <label for="productName">Name</label>
                                @error('name')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>   
                            <div class="form-floating mb-3">
                                <input class="form-control" name="title" value="{{$service->title}}" id="productName" type="text" placeholder="" />
                                <label for="productName">Title</label>
                                @error('title')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3 mb-md-0">
                                    <textarea name="description" id="" class="form-control" >{{$service->description}}</textarea>
                                    <label for="">Description</label>
                                    @error('description')
                                    <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input type="file" name="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"><br>
                                    <img src="{{asset('uploads/service/'.$service->image)}}" width="100" id="blah" alt="">
                                    @error('image')
                                    <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
