@extends('layouts.topic')

@section('title', isset($topic) ? $topic->title : 'Topic')

@section('content')

<div class="container">
    <markdown-it :body="{{ $topic }}"></markdown-it>
</div>

@endsection

