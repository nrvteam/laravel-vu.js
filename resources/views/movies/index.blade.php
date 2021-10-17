@extends('layouts.app')

@section('content')
    @include ('movies/_search')
    @include ('movies/_list')
    @include ('movies/_modal')
@endsection
