@extends('layouts.app')

@section('content')
    @include('vendor.ueditor.assets')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">发布问题</div>
                    <div class="panel-body">
                        <form action="/explore/store" method="post" >
                            {{csrf_field()}}
                            <div class="form-group {{$errors->has('title')?'has-error':''}}">
                                <label for="title">标题</label>
                                <input type="text" value="{{old('title')}}"  name="title" class="form-control" placeholder="标题" id="title">
                                @if($errors->has('title'))
                                    <span class="help-block"></span>
                                    <strong>{{$errors->first('title')}}</strong>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('body')?'has-error':''}}">
                                <label for="container">内容</label>
                                <textarea id="container" name="body" class="form-control" placeholder="内容" rows="5">
                                    {!! old('body') ? old('body') : '' !!}
                                </textarea>
                                @if ($errors->has('body'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <button class="btn btn-success pull-right" type="submit">发布问题</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--<script src="http://apps.bdimg.com/libs/jquery/1.11.1/jquery.min.js"></script>--}}
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>--}}


@endsection