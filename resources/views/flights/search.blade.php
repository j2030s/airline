<!-- Departure Airport -->
<div class="mb-3">
    <label for="departure_airport_id" class="form-label">Departure Airport</label>
    <select class="form-select" id="departure_airport_id" name="departure_airport_id">
        <option value="">Select Departure Airport</option>
        @foreach($airports as $airport)
            <option value="{{ $airport->id }}">{{ $airport->name }}</option>
        @endforeach
    </select>
</div>

<!-- Arrival Airport -->
<div class="mb-3">
    <label for="arrival_airport_id" class="form-label">Arrival Airport</label>
    <select class="form-select" id="arrival_airport_id" name="arrival_airport_id">
        <option value="">Select Arrival Airport</option>
        @foreach($airports as $airport)
            <option value="{{ $airport->id }}">{{ $airport->name }}</option>
        @endforeach
    </select>
</div>

<!-- Departure Date -->
<div class="mb-3">
    <label for="departure_date" class="form-label">Departure Date</label>
    <input type="date" class="form-control" id="departure_date" name="departure_date">
</div>

<!-- Flight Class -->
<div class="mb-3">
    <label for="flight_class" class="form-label">Flight Class</label>
    <select class="form-select" id="flight_class" name="flight_class">
        <option value="">Select Flight Class</option>
        @foreach($classOptions as $class)
            <option value="{{ $class }}">{{ $class }}</option>
        @endforeach
    </select>
</div>

<!-- Add more fields as needed -->

<button type="submit" class="btn btn-primary">Search Flights</button>
