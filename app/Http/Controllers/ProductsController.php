<?php namespace BustedBinky\Http\Controllers;

use Illuminate\Routing\Controller;
use BustedBinky\Product, BustedBinky\Category;
use Cache, Amazon, Etsy, Response;

class ProductsController extends Controller {



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::where('type', '=', 'amazon')->paginate( $limit = 30 );

		return view('home', compact('products'));
	}

	public function category($slug)
	{
		$categories = Category::all()->toArray();

		$categorySlugList = array_map( function($value)
			{
				return $value['slug'];
			}, $categories);

		$products = Product::whereHas('categories', function($q) use ($slug)
		{
			$q->where('slug', '=', $slug);
		})->paginate( $limit = 30 );

		if(in_array($slug, $categorySlugList)) {
			return view('home', compact('products'));
		}

		return view('404');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
