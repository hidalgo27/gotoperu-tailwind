@extends('layouts.page-layout')

@push('meta')
    <meta name="robots" content="noindex,follow">
    <link rel="canonical" href="{{ route('offers.show', ['packageSlug' => $paquete->url, 'campaignSlug' => $campaign->slug]) }}">
@endpush

@section('content')
    @include('page.partials.package.body', ['campaign' => $campaign])
    @include('page.partials.package.assets')
@endsection
