@extends('layouts.app')


@section('content')


<form method="post" action="/posts">

    @csrf

    <input type="text" name="title">

    <input type="text" name="body">

    <input type="submit" name="submit">

</form>


@endsection
