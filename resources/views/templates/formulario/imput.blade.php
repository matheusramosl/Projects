<label class="{{$class ?? null}}">

	<span>{{$label ?? $imput ?? "ERRO" }}</span>
	{!! Form::text($imput, $value ?? null, $attributes) !!}
	
</label>