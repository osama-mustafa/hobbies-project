@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Hobby Details') }}</div>

                <div class="card-body">
                    <h3>{{ $hobby->name }}</h3>
                    <p>{{ $hobby->description }}</p>

                   @if ($hobby->tags->count() > 0)
                        <b>Used Tags:</b> (Click to Remove)
                        <p>
                            @foreach ($hobby->tags as $tag)

                            <a href="{{ route('detach.tag', ['hobby_id'=>$hobby->id, 'tag_id'=>$tag->id]) }}"><span class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a> 

                        {{-- <a href="{{ route('detach.tag', ['hobby_id'=>$hobby_id,'tag_id'=>$tag_id]) }}"><span class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a>  --}}

                            @endforeach
                        </p>
                    @endif

                @if ($availableTags->count() > 0)
                    <b>Available Tags:</b> (Click to Add)
                    <p>
                        @foreach ($availableTags as $tag)

                    {{-- <a href="{{ route('attach.tag', $hobby->id, $tag->id) }}"><span class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a>  --}}
                    <a href="{{ route('attach.tag', ['hobby_id'=>$hobby->id, 'tag_id'=>$tag->id]) }}"><span class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a> 


                        @endforeach
                    </p>
                @endif

                </div>

                 {{-- <div class="mt-2">
                       <a class="btn btn-primary bt-sm" href="{{ URL::previous() }}"><i class="fas fa-arrow-circle-up"></i> Back to overview</a>
                 </div> --}}

            </div>
        </div>
    </div>
</div>
@endsection
