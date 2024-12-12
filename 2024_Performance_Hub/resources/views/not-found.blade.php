{{-- resources/views/errors/not-found.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Merry Christmas Anne, but this Performance Was Not Found</h1>
    <p>We're sorry, but the performance you are looking for does not exist.</p>
    <p>You will be redirected to the performances index in 5 seconds.</p>
    <p>If you are not redirected, <a href="{{ route('performances.index') }}">click here</a>.</p>
</div>

<script>
    setTimeout(function() {
        window.location.href = "{{ route('performances.index') }}";
    }, 5000);
</script>
@endsection