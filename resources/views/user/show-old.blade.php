@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                {{-- <div class="card-header">{{ __('User Details') }}</div> --}}
                <div style="font-size: 150%;" class="card-header"><h3>{{ $user->name }}</h3></div>

                <div class="card-body">
                    <p><b>My motto:</b><br> {{ $user->motto }}</p> 
                    <p class="mt-2"> <b>About me:</b> <br> {{ $user->about_me }}</p>

                    <h5>Hobbies of {{ $user->name}}</h5>
                    <ul class="list-group">
                        @if ($user->hobbies->count() > 0)
    
                            @foreach ($user->hobbies as $hobby)
    
                            <li class="list-group-item">
                                <a title="Show Details" href="{{route('hobby.show', $hobby->id)}}">{{$hobby->name}}</a> 
    
                            <span class="float-right mx-2">{{ $hobby->created_at->diffForHumans() }}</span>
    
                            <br>
    
                            @foreach($hobby->tags as $tag)
                                <a href="{{ route('hobby.tag', $tag->id) }}"><span class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a>
                            @endforeach 
    
                            </li>
    
                            @endforeach
                    </ul>
                        @else 
                            <p>{{$user->name}} has not created any bobbies yet</p>
                        @endif
                </div>

                 <div class="mt-4">
                       <a class="btn btn-primary bt-sm" href="{{ URL::previous() }}"><i class="fas fa-arrow-circle-up"></i> Back to overview</a>
                 </div>

            </div>
        </div>
    </div>
</div>
@endsection
