@extends('tenant.layouts.app')

@section('content')

    <inventory-to-return :type-user="{{ json_encode(auth()->user()->type) }}"></inventory-to-return>

@endsection
