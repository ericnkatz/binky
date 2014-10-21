@extends('layouts.scaffold')

@section('main')

<h1>All Products</h1>

<p>{{ link_to_route('products.create', 'Add new product') }}</p>

@if ($products->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Link</th>
				<th>Photo</th>
				<th>Live</th>
				<th>Featured</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($products as $product)
				<tr>
					<td>{{{ $product->name }}}</td>
					<td>{{ str_limit($product->link, 50) }}</td>
					<td>{{{ $product->photo }}}</td>
					<td>{{{ $product->live }}}</td>
					<td>{{{ $product->featured }}}</td>
                    <td>{{ link_to_route('products.edit', 'Edit', array($product->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('products.destroy', $product->id))) }}
                            {{ Form::submit('X', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no products
@endif

@stop
