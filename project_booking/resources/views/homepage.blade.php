@extends('layout')

@section('title', 'Trang chủ')

<h1>đây la trnag chủ
</h1>

@auth
    <a href="{{ route('logout') }}">Logout</a>
    <h1>{{ auth()->user()->name }}</h1>
    <h1>da dangn hap</h1>
    
@endauth
