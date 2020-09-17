@extends('layouts.app')


@yield('content')


<form method="post" action="/posts">

    <input type="text" name="title">

    <input type="submit" name="submit">

</form>


@yield('footer')
