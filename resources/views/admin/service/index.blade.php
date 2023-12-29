@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="d-flex justify-content-end">
                <a href="{{route('services.create')}}" class="btn btn-primary add-list"><i class="fa-solid fa-plus me-3"></i>Add</a>
                <a href="" class="btn btn-danger add-list"><i class="fa-solid fa-trash me-3"></i>Clear Search</a>
            </div>
            <div class="col-lg-12">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header "><h3 class="text-center font-weight-light my-2">Service</h3></div>
                    @if (session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>sl</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead> 
                            <tbody>
                                @php $i=1; @endphp
                                @foreach($services as $service)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ $service->title }}</td>
                                        <td>{{ $service->description }}</td>
                                        <td>
                                            <img width="100" src="{{asset('uploads/service/'.$service->image)}}" alt="">
                                        </td>
                                        <td class="btn-group">
                                            <a href="{{route('services.status',$service->id)}}" class="btn btn-sm btn-{{$service->status == 1?'success':'secondary'}}">{{ $service->status == 1 ? 'Published' : 'Unpublished'}}</a>
                                            <a href="{{route('services.edit',$service->id)}}" class="btn btn-primary btn-sm mx-1">Edit</a>
                                            
                                            <form action="{{route('services.destroy',$service->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure Delete This !!')"> Delete</button>
                                            </form>
    
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection