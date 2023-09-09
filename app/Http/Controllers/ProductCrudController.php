<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductUpdateOrStoreRequest;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductCrudController extends Controller
{
    /**
     * @return ProductCollection
     */
    public function index(): ProductCollection
    {
        return new ProductCollection(Product::paginate(request('per_page')));
    }

    /**
     * @param ProductUpdateOrStoreRequest $request
     * @return JsonResponse
     */
    public function store(ProductUpdateOrStoreRequest $request): JsonResponse
    {
        return response()->json(['data' => Product::create($request->validated())]);
    }

    /**
     * @param Product $product
     * @return JsonResponse
     */
    public function show(Product $product): JsonResponse
    {
        return response()->json(['data' => $product]);
    }

    /**
     * @param Product $product
     * @return JsonResponse
     */
    public function destroy(Product $product): JsonResponse
    {
        return response()->json(['success' => $product->delete()]);
    }

    /**
     * @param ProductUpdateOrStoreRequest $request
     * @param Product $product
     * @return JsonResponse
     */
    public function update(ProductUpdateOrStoreRequest $request, Product $product): JsonResponse
    {
        return response()->json(['success' => $product->update($request->validated())]);
    }


}
