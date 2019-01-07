<label class="{{$class ?? null}}">
	
	<span>{{$label ?? $imput ?? "ERRO" }}</span>
	{!! Form::password($imput, $attributes) !!}
	
</label>