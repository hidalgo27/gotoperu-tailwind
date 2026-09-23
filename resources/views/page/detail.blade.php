@extends('layouts.page-layout')
@section('content')
    @include('page.partials.package.body', ['campaign' => null])
    @include('page.partials.package.assets')
@endsection
