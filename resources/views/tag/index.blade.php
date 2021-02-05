@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('All Tags') }}</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($tags as $tag)

                        <li class="list-group-item">
                            {{-- <p>{{$tag->name}}</p> --}}
                            <span style="font-size: 130%;" class="mr-2 badge badge-{{ $tag->style }}">{{ $tag->name }}</span>

                            @can('update', $tag)
                            <a class="btn btn-outline-primary btn-sm ml-2" href="{{route('tag.edit', $tag->id)}}"><i class="fas fa-edit"></i> Edit Tag</a> 
                            @endcan

                            @can('delete', $tag)
                            <form style="display: inline" action="{{route('tag.delete', $tag->id)}}" method="post">
                                @csrf 
                                @method('DELETE')
                                <input class="btn-outline-danger btn-sm ml-2" type="submit" value="Delete">
                           </form>
                           @endcan

                           <a class="float-right" href="{{ route('hobby.tag', $tag->id) }}">Used {{ $tag->hobbies->count() }} times</a>
   
                        </li>
  
                        @endforeach
                    </ul>
                </div>

                @can('create', $tag)
                 <div class="mt-2">
                       <a class="btn btn-success" href="{{route('tag.create')}}"><i class="fas fa-plus-circle"></i> Create New Tag</a>
                 </div>
                 @endcan

            </div>
        </div>
    </div>
</div>
@endsection
