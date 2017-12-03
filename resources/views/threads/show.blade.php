@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default panel-success">
                    <div class="panel-heading">
                        <a href="#">{{ $thread->creator->name }}</a> posted : {{ $thread->title }}
                    </div>

                    <div class="panel-body">
                        {{ $thread->body }}
                    </div>
                </div>
            </div>
        </div>

        @foreach($thread->replies as $reply)
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ $reply->owner->name }} said {{ $reply->created_at->diffForHumans() }}
                        </div>

                        <div class="panel-body">
                            {{ $reply->body }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @if(auth()->check())
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form action="{{ $thread->path() . '/replies' }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea class="col-md-12 form-control" name="body" placeholder="Add response?"></textarea>
                            <button class="pull-right btn btn-infoform-control">Comment</button>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="row col-md-8 col-md-offset-2">
                <p>Please <a href="{{ route('login') }}">sign in</a> to participate to this discussion.</p>
            </div>
        @endif
    </div>
@endsection
