<div class="panel">
	<div class="panel-heading">
		<h3 class="panel-title">Categor&iacute;as</h3>
	</div>
	<div class="panel-body" >
		<strong>
		@foreach($categories as $category)
		<ul class="list-group">
			<li class="list-group-item" style="{{$category->color}}">
				<a href="{{route('filter-cate', $category->name)}}">
					{{$category->name}}
				</a>
			</li>
		</ul>
		@endforeach
		</strong>
	</div>
</div>