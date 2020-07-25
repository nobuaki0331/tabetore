<?php
  $user = Auth::user() ?? false;

?>

@extends('layouts.app')

@section('content')
  <Hoge :user-info='@json($user)'></Hoge>
@endsection
