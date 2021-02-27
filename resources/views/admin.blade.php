@extends('layouts.app')

@section('title', $subtitle)

@can('isAdmin')
    @section('navbar')
        @component('components.navbar-admin', ['media' => $media])@endcomponent
    @endsection

    @section('content')
        <admin :header="'{{ $title }}'" :subheader="'{{ $subtitle }}'" :table="'{{ $table }}'"></admin>
    @endsection
@endcan
