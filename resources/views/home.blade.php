@extends('layouts.app')

@section('titulo')
    Feed
@endsection

@section('contenido')
    <x-list-posts :posts="$posts" />
@endsection