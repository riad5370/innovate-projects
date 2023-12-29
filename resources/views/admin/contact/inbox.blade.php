@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Visitor Message</h3></div>
                    @if (session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>sl</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $i=1; @endphp
                            @foreach($messages as $message)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->subject }}</td>
                                    <td>{{ $message->description }}</td>
                                    
                                    {{-- <td>{{ $product->status == 1 ? 'Published' : 'Unpublished'}}</td> --}}
                                    <td class="btn-group">
                                        <a href="{{route('message.show',$message->id)}}" class="btn btn-primary btn-sm mx-1">view</a>
                                        
                                        <form action="{{route('message.destroy')}}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ $message->id }}" name="id">
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
