<label class="{{$class ?? null}}">

	<span>{{$label ?? $imput ?? "ERRO" }}</span>
	{!! Form::date($imput, $value ?? null, $attributes) !!}
	
</label>