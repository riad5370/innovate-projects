@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Message Details</h3></div>
                    @if (session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <div class="card-body">
                       <div class="div">
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <span>Name :</span>
                                </div>
                                <div class="col-md-9">{{$message->name}}</div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <span>Email :</span>
                                </div>
                                <div class="col-md-9">{{$message->email}}</div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <span>Subject :</span>
                                </div>
                                <div class="col-md-9">{{$message->subject}}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <span>Description :</span>
                                </div>
                                <div class="col-md-9">{{$message->description}}</div>
                            </div>
                       </div>
                       <a href="{{route('inbox')}}" class="btn btn-primary mt-3">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
