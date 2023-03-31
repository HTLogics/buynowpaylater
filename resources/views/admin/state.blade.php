<option name="">Select State</option>
@foreach($states as $state)
	<option value="{{$state->iso2}}">{{$state->name}}</option>
@endforeach