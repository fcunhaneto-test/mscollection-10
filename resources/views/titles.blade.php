@extends('layouts.app')

@section('title', $subtitle)

@section('navbar')
    @component('components.navbar', ['media' => $media])@endcomponent
@endsection

@section('content')
    <index :header="'{{ $title }}'" :subheader="'{{ $subtitle }}'" :table="'{{ $table }}'"></index>
@endsection
