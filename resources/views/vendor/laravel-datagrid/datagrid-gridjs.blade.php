@extends('layout')

@section('datagrid')
<data-grid-gridjs
    base-url={{$baseUrl}}
    :columns="{{json_encode($columns)}}"
    :rows="{{json_encode($rows)}}"
></data-grid-gridjs>
@endsection
