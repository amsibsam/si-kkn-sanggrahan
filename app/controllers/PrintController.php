<?php

class PrintController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$jurusans = Jurusan::all();

		return View::make('admin.jurusan.print')
			->withJurusans($jurusans);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		// $input['golongan_darah'] = "Golongan " + $input['golongan_darah'];
		Jurusan::create($input);

		return Redirect::route('admin.jurusan.print')
			->with('successMessage', 'Berhasil Menambahkan Data Baru');
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
		$jurusan = Jurusan::findOrFail($id);

		return View::make('admin.jurusan.edit')
			->withJurusan($jurusan);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();

		$jurusan = Jurusan::find($id);
		$jurusan->update($input);

		return Redirect::route('admin.jurusan.index')
			->with('successMessage', 'Berhasil Mengubah Data');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Jurusan::find($id)->delete();

		return Redirect::route('admin.jurusan.index')
			->with('successMessage', 'Berhasil Menghapus Data');
	}


}
