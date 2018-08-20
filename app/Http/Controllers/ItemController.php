<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Category;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ItemController extends Controller {

  /**
   * @param $id
   * @return JsonResponse
   */
  public function items($id) {
    $items = Category::find($id)->items;
    return response()->json($items);
  }

  public function itemsList() {
  	$items = Item::all();
	  return view('admin.items', [ 'items' => $items]);
  }

  /**
   * @param $request
   * @param $id integer
   * @return JsonResponse
   */
  public function postItem(Request $request, $id) {

    $item = new Item();

    $item->title = $request->item_title;
    $item->description = $request->item_description;
    $item->illustration = '';

    if (isset($request->item_categories)) {
      foreach ($request->item_categories as $category) {
          $item->categoryItems()->attach($category);
      }
    }

    $item->save();

    $item->illustration = $this->uploadFile($request->item_illustration, $item->id, $id);
    $item->save();

    $category = Category::find($id);
    foreach ($request->item_images as $image) {
      $item->image()->create([
        'path' => $this->uploadItem($image, $item->id, $category->id)
      ]);
    }

    $item->images = $item->image;

    return response()->json($item);
  }

  public function editItem(Request $request, $id) {

    $item = Item::find($id);
    $data = [];

    if(isset($request->item_title)) {
      $data['title']  = $request->item_title;
    }

    if(isset($request->item_description)) {
      $data['description'] = $request->item_description;
    }

    if(isset($request->data_illustration)) {
      Storage::delete(str_replace('storage', 'public', $item->illustration));
      $data['illustration'] = $this->uploadFile($request->data_illustration, $item->id, $item->category_id);
    }

    if(isset($request->item_images)) {
      foreach($request->item_images as $image) {

        $item->image()->create([
          'path' => $this->uploadItem($image, $item->id, $item->category_id)
        ]);
      }
    }

    $item->categoryItems()->sync($request->item_categories);

    if(!empty($data)) {
      $item->update($data);
    }

    $item->images = $item->image;

    return response()->json($item);
  }

  public function deleteItem(Request $request) {

    $item = Item::find($request->id);

    Storage::deleteDirectory(str_replace('storage', 'public', dirname($item->illustration)));
    foreach($item->image as $image) {
      $image->delete();
    }

    $item->delete();

    return response()->json('done');
  }

  /**
   * @param $file
   * @param $category_id int
   * @param $item_id int
   * @return string
   */
  private function uploadItem($file, $item_id, $category_id) {
    $filename = $file->getClientOriginalName();
    $path = $file->storeAs("public/category/$category_id/items/$item_id/images", $filename);
    return '/' . str_replace('public', 'storage', $path);
  }

  private function uploadFile($file, $item_id, $category_id) {
    $filename = $file->getClientOriginalName();
    $path = $file->storeAs("public/category/$category_id/items/$item_id", $filename);
    return '/' . str_replace('public', 'storage', $path);
  }
}