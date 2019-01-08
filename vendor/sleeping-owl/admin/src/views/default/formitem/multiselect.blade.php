<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
	<label for="{{ $name }}">{{ $label }}</label>
	<div>
		<select id="{{ $name }}" name="{{ $name }}[]" class="form-control multiselect" multiple="multiple">
			@foreach ($options as $optionValue => $optionLabel)
				@if(isset($value) && in_array($optionValue, $value))
					<option value="{{ $optionValue }}" selected="selected">{{ $optionLabel }}</option>
				@else
					<option value="{{ $optionValue }}" >{{ $optionLabel }}</option>
				@endif
			@endforeach
		</select>
	</div>
	@include(AdminTemplate::view('formitem.errors'))
</div>