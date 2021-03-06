@extends('layouts.app')

@section('content')

<div class="container tw-bg-white tw-shadow">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 ">
            @include('common.error')
            <h4>
                <i class="glyphicon glyphicon-edit"></i> 编辑个人资料
            </h4>
            <form action="{{ route('users.update', $user->id) }}" method="POST" 
                    accept-charset="UTF-8" 
                    enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="name-field">用户名</label>
                    <input class="form-control" type="text" name="name" id="name-field" value="{{ old('name', $user->name) }}" />
                </div>
                <div class="form-group">
                    <label for="email-field">邮 箱</label>
                    <input class="form-control" type="text" name="email" id="email-field" value="{{ old('email', $user->email) }}" />
                </div>
                <div class="form-group">
                    <label for="introduction-field">个人简介</label>
                    <textarea name="introduction" id="introduction-field" class="form-control" rows="3">{{ old('introduction', $user->introduction) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="avatar-field">用户头像</label>

                    <input type="file" id="avatar-field" class="form-control" name="avatar">

                    @if($user->avatar)
                        <br>
                        <img class="thumbnail img-fluid" src="{{ $user->avatar }}" width="200" />
                    @endif
                </div>

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('users.show', $user->id) }}">@octicon(reply) Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection