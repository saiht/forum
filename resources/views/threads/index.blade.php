@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @foreach($threads as $thread)
            <div class="card card-plain card-blog">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card-title">
                            <a href="{{ $thread->path() }}">{{ $thread->title }}</a>
                        </h3>
                        <p class="card-description">
                            {{ $thread->body }}
                            <a href="{{ $thread->path() }}"> Read More </a>
                        </p>
                        <div class="author">
                            <span>{{ $thread->creator->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
