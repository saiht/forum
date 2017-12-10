@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row section">
            <div class="col-md-12">
                <div class="h5 title">
                    <h1>{{ $thread->title }}</h1>
                    <a href="#">{{ $thread->creator->name }}</a>
                    <small> {{ $thread->updated_at->diffForHumans() }}</small>
                </div>

                <div class="panel-body">
                    {{ $thread->body }}
                </div>
            </div>
        </div>

        @if (count($thread->replies))
            <div class="section row">
                <div class="media-area">
                    <h3 class="title text-center">
                        <small>{{ count($thread->replies) }} Comments</small>
                    </h3>
                    @foreach($thread->replies as $reply)
                        <div class="media">
                            {{--<a class="pull-left" href="#pablo">--}}
                                {{--<div class="avatar">--}}
                                    {{--<img class="media-object img-raised" alt="Tim Picture" src="assets/img/olivia.jpg">--}}
                                {{--</div>--}}
                            {{--</a>--}}
                            <div class="media-body">
                                <h5 class="media-heading">{{ $reply->owner->name }}
                                    <small class="text-muted">· {{ $reply->created_at->diffForHumans() }}</small>
                                </h5>
                                <p>{{ $reply->body }}</p>
                                <div class="media-footer">
                                    <a href="#pablo" class="btn btn-primary btn-neutral pull-right" rel="tooltip"
                                       title=""
                                       data-original-title="Reply to Comment">
                                        <i class="now-ui-icons ui-1_send"></i> Reply
                                    </a>
                                    <a href="#pablo" class="btn btn-default btn-neutral pull-right">
                                        <i class="now-ui-icons ui-2_favourite-28"></i> 25
                                    </a>
                                </div>
                            </div>
                        </div>

                    @endforeach
                    @if(auth()->check())
                        <div class="col-md-12">
                            <form action="{{ $thread->path() . '/replies' }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <textarea class="col-md-12 form-control" name="body"
                                              placeholder="Add response?"></textarea>
                                    <button class="pull-right btn btn-infoform-control">Comment</button>
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="row col-md-12">
                            <p>Please <a href="{{ route('login') }}">sign in</a> to participate to this discussion.</p>
                        </div>
                    @endif

                    <ul class="pagination pagination-primary justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">
                                    <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                                </span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                @endif
            </div>
    </div>

@endsection
