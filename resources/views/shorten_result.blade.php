@extends('layouts.base')

@section('css')
<link rel='stylesheet' href='/css/shorten_result.css' />
@endsection

@section('content')
<h3>URL laburtua</h3>
<input type='text' class='result-box form-control' value='{{$short_url}}' />
<a href='{{route('index')}}' class='btn btn-info back-btn'>Laburtu beste bat</a>
@endsection

@section('js')
<script src='/js/shorten_result.js'></script>
@endsection
