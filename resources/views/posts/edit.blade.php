@extends('layouts.app')


@section('content')


    <form method="post" action="/posts">

        @csrf

        <input type="text" name="title" value="{{$posts->title}}">

        <input type="text" name="body" value="{{$posts->body}}">

        <input type="submit" name="submit">

    </form>


@endsection
