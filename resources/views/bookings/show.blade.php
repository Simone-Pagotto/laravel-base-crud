@extends('layouts.main')

@section('content')

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">#{{$booking->id}}-{{$booking->guest_full_name}}</h5>
            <h6>CC: {{$booking->guest_credit_card}}</h6>
            <h6>Room: {{$booking->room}}</h6>
            <p class="card-text">{{$booking->more_details}}</p>
            <a href="{{route('bookings.index')}}" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>

@endsection
