@extends('layouts.main')

    <ul>
        @foreach(config('menu.pages') as $menu)
            @if($loop->last)
                <li class={{ Route::currentRouteName() == $menu['pathId'] ? 'active' : ''}}>
                    <button><a href="{{ route($menu['pathId'])}}">{{$menu['displayText']}}</a></button>
                </li
            @else    
                <li class={{ Route::currentRouteName() == $menu['pathId'] ? 'active' : ''}}>
                    <a href="{{ route($menu['pathId'])}}">{{$menu['displayText']}}</a>
                </li>
            @endif
        @endforeach
    </ul>

@section('content')
    <table class="table">
  <thead>
    <tr>
        @foreach ($columns as $column)
            <th scope="col"> {{ $column }} </th>
        @endforeach
            <th></th>
    </tr>
  </thead>
  <tbody>
        @foreach ( $bookings as $booking)
            <tr>
                <th scope="row">{{$booking->id}}</th>
                <td>{{$booking->guest_full_name}}</td>
                <td>{{$booking->room}}</td>
                <td>
                    <a href="{{ route('bookings.show', $booking->id)}}">VAI</a>
                </td>
            </tr>
        @endforeach
  </tbody>
</table>
@endsection