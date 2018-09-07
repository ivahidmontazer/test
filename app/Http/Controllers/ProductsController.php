<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{

    public function index()
    {

        $storagePath = storage_path('app\\');
        $products =  scandir($storagePath);
        foreach ($products as $key => $product)
            if(is_file($file = $storagePath . $product) && str_contains($product, '.json')){
                $products[$key] = (array)json_decode(file_get_contents($file));
            }
            else
                unset($products[$key]);
            $products = (array)$products;
        usort($products, function ($item1, $item2) {
            return $item2['time'] <=> $item1['time'];
        });
        return view('products.list', compact('products'));
    }

    public function store(ProductsFormRequest $request)
    {
        $request->merge(['time' => time()]);
        if(Storage::disk('local')->put(time().'.json', json_encode($request->only(['time', 'price', 'quantity', 'name']))))
            return response(['message' => 'Successfully created!'], 201);
        else
            return response(['message' => "Product wasn't saved"], 400);
    }

    public function edit($id)
    {
        $product = (array)json_decode(file_get_contents(storage_path('app\\' . $id) . '.json'));
        return view('products.edit', compact('product'));
    }
    public function update($id ,Request $request)
    {
        if(Storage::disk('local')->exists($file =  $id . '.json')){
            $request->merge(['time' => time()]);
            if(Storage::disk('local')->put($file, json_encode($request->only(['time', 'price', 'quantity', 'name']))))
                return response(['message' => 'Successfully updated!']);
            return response(['message' => 'Update error'], '400');
        }
        else
            return response(['message' => 'File not exists'], '400');
    }
}
