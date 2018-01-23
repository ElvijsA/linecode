<?php
namespace App\Http\Controllers\Api\V1;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImagesController extends Controller
{
    public function index()
    {
      return Image::all();
    }

    public function show($id)
    {
      return Image::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
      $image = Image::findOrFail($id);
      $image->update($request->all());

      return $image;
    }

    public function store(Request $request)
    {
      $image = Image::create($request->all());
      return $image;
    }

    public function destroy(Request $request)
    {
      $image = Image::findOrFail($id);
      $image->delete();
      return '';
    }
}
