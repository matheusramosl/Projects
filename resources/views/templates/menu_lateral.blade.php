<nav id="principal">
	<ul>
		<li>
			<a href="{{ route('user.dashboard') }}">
				<i class="fas fa-home"></i>
				<h3>Home</h3>			
			</a>
		</li>
		<li>
			<a href="{{ route('student.index') }}">
				<i class="fas fa-users"></i>
				<h3>Aluno</h3>			
			</a>
		</li>
		<li>
			<a href="{{ route('professor.index') }}">
				<i class="fas fa-chalkboard-teacher"></i>
				<h3>Professor</h3>			
			</a>
		</li>
		<li>
			<a href="{{ route('curso.index') }}">
				<i class="fas fa-signature"></i>
				<h3>Curso</h3>			
			</a>
		</li>
		<li>
			<a href="{{ route('grid.index') }}">
				<i class="fas fa-grip-horizontal"></i>
				<h3>Grade</h3>			
			</a>
		</li>
		<li>
			<a href="{{ route('sala.index') }}">
				<i class="fas fa-bookmark"></i>
				<h3>Salas</h3>			
			</a>
		</li>
		<li>
			<a href="{{ route('user.index') }}">
				<i class="far fa-address-card"></i>
				<h3>Usuários</h3>			
			</a>
		</li>
		<li>
			<a href="{{ route('finance.index')}}">
				<i class="fas fa-money-check-alt"></i>
				<h3>Planos</h3>			
			</a>
		</li><li>
			<a href="{{ route('aluno-plano.index')}}">
				<i class="fas fa-money-check-alt"></i>
				<h3>Finanças</h3>			
			</a>
		</li>
	</ul>

</nav>