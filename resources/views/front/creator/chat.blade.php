@extends('layouts.master')
@section('content')
    <div>
        @livewire('chat.main', ['user' => Auth::user()], key(Auth::user()->id))
    </div>
@endsection
