@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit User</div>
                    <div class="card-body">
                        <form autocomplete="off" method="post" action="{{ route('user.update', Auth::id()) }}" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Motto</label>
                                <input type="text" class="form-control {{$errors->has('motto') ? ' border-danger' : ''}}" id="motto" name="motto" value="{{ old('motto') ?? $user->motto }}">
                                <small class="form-text text-danger">{!! $errors->first('motto') !!}</small>
                            </div>

                            @if(file_exists('img/users/' . $user->id . '_large.jpg'))
                            <div class="mb-2">
                                <img style="max-width: 400px; max-height: 300px" src="/img/users/{{$user->id}}_large.jpg" alt="">
                                <a class="btn btn-outline-danger float-right" href="{{route('delete.images.user', $user->id)}}">Delete Image</a>
                            </div>
                            @endif

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control {{$errors->has('image') ? ' border-danger' : ''}}" id="image" name="image" value="">
                                <small class="form-text text-danger">{!! $errors->first('image') !!}</small>
                            </div>



                            <div class="form-group">
                                <label for="about_me">About me</label>
                                <input type="text" class="form-control" id="about_me" name="about_me" value="{{ old('about_me') ?? $user->about_me }}">
                                <small class="form-text text-danger">{!! $errors->first('about_me') !!}</small>
                            </div>




                            <input class="btn btn-primary mt-4" type="submit" value="Update User">
                        </form>
                        <a class="btn btn-primary float-right" href="{{route('home_page')}}"><i class="fas fa-arrow-circle-up"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection