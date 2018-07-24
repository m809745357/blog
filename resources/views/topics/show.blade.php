@extends('layouts.topic')

@section('title', isset($topic) ? $topic->title : 'Topic')

@section('content')

<div class="container tw-bg-white tw-shadow">
    <markdown-it :body="{{ $topic }}"></markdown-it>
</div>

@endsection

