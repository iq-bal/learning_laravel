@extends('layout')

@section('content')

<h1> Listings </h1>

<h1> <?php echo $heading; ?> </h1>

<?php foreach($listings as $listing): ?>
    <h2>
       <?php echo $listing['title'];?> 
    </h2>
    <p>
       <?php echo $listing['description'];?> 
    </p>
<?php endforeach; ?>

<!-- we can clear this mess by using blade -->
{{-- we can use directives  --}}

<h1>Listings after using blade</h1>

<h1> {{$heading}} </h1>

@foreach($listings as $listing)
    <h2>
      <a href="/listings/{{$listing['id']}}"> {{$listing['title']}} </a>
    </h2>
    <p>
       {{$listing['description']}}
    </p>
@endforeach

@php
   $test = 1;    
@endphp

{{$test}}

@endsection