@extends('layouts.app')

@section('content')

<div class="p-8">

    @include('profile.partials.update-profile-information-form')

    <br>

    @include('profile.partials.update-password-form')

    <br>

    @include('profile.partials.delete-user-form')

</div>

@endsection
   