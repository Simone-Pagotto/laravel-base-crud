<form method='get' action="{{route('bookings.index')}}">
    @csrf
    <input class="form-control" type="search" placeholder="cerco..." aria-label="Search" name="q">
    <button class="btn btn-outline-info my-2 my-sm-0" type="submit">FIND</button>
</form>