@extends('layout')

@section('datagrid')
<data-grid-wrapper
    :columns="{{json_encode($columns)}}"
    :rows="{{json_encode($rows)}}"
></data-grid-wrapper>
@endsection
