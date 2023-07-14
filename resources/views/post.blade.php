@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="">
@endsection

@section('content')

@if (1==1)
Yes it's correct
@endif
@if (1==2)
Yes it's correct
@else
else is executing.....
@endif



@endsection

<!-- @section('scripts')
<script>
    @json('{{ $bane }}')
</script>
@endsection -->
