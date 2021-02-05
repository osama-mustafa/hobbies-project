@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">{{ __('All The Hobbies') }}</div> --}}

                @isset($filter)

                <div class="card-header">Filtered Hobbies by: 
                    
                    <span style="font-size: 105%" class="badge badge-{{ $filter->style }}">{{ $filter->name }}</span>
                    <span class="float-right"><a href="{{ route('hobby') }}">Show All Hobbies</a></span>

                </div>

                @else 

                <div class="card-header">All Hobbies</div>

                @endisset

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($hobbies as $hobby)

                        <li class="list-group-item">
                            <a title="Show Details" href="{{route('hobby.show', $hobby->id)}}">{{$hobby->name}}</a> 
                            @auth
                            <a class="btn btn-light btn-sm ml-2" href="{{route('hobby.edit', $hobby->id)}}"><i class="fas fa-edit"></i> Edit Hobby</a> 
                            @endauth

                            <span class="mx-2">Posted by: <a href="{{route('user.show', $hobby->user->id)}}">{{$hobby->user->name}} ({{ $hobby->user->hobbies->count() }} Hobbies)</a></span>

                            @auth
                            <form class="float-right" style="display: inline" action="{{route('hobby.delete', $hobby->id)}}" method="post">    
                                @csrf 
                                @method('DELETE')
                                <input class="btn-outline-danger btn-sm" type="submit" value="Delete">
                           </form>
                           @endauth
                          <span class="float-right mx-2">{{ $hobby->created_at->diffForHumans() }}</span>

                          <br>

                          @foreach($hobby->tags as $tag)
                              <a href="{{ route('hobby.tag', $tag->id) }}"><span class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a>
                          @endforeach 

                        </li>

                         
                        @endforeach
                    </ul>
                </div>

                <div class="mt-2">
                    {{ $hobbies->links() }} 
                </div>

                @auth
                 <div class="mt-2">
                       <a class="btn btn-success" href="{{route('hobby.create')}}"><i class="fas fa-plus-circle"></i> Create New Hobby</a>
                 </div>
                 @endauth

            </div>
        </div>
    </div>
</div>
@endsection
