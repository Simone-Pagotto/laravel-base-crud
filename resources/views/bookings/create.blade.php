@extends('layouts.main')

@section('content')

    <form method="POST" action="{{ route('bookings.store') }}">

        @csrf
        <div class="mb-3">
            <label for="full_name" class="form-label">Inserire Nome e Cognome</label>
            <input type="text" class="form-control" id="full_name" name="full_name">
        </div>
        <div class="mb-3">
            <label for="credit_card" class="form-label">Inserire numero carta di credito</label>
            <input type="text" class="form-control" id="credit_card" name="credit_card">
        </div>
        <div class="mb-3">
            <label for="room" class="form-label">Inserire stanze</label>
            <input type="number" class="form-control" id="room" name="room">
        </div>
        <div class="mb-3">
            <label for="from_date" class="form-label">Inserire data di arrivo</label>
            <input type="text" class="form-control" id="from_date" name="from_date">
        </div>
        <div class="mb-3">
            <label for="to_date" class="form-label">Inserire data di uscita</label>
            <input type="text" class="form-control" id="to_date" name="to_date">
        </div>
        <div class="mb-3">
            <label for="more_details" class="form-label">Aggiungi commenti</label>
            <input type="textarea" class="form-control" id="more_details" name="more_details">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
