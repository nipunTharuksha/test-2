<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductImageUploadRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductImageController extends Controller
{
    /**
     * @param ProductImageUploadRequest $request
     * @param $productId
     * @return JsonResponse
     */
    public function uploadAImageForAProduct(
        ProductImageUploadRequest $request,
        $productId
    ): JsonResponse {
        $product = Product::findOrFail($productId);
        $imageName = time() . '.' . $request->image->extension();
        $path = $request->image->move(public_path('images'), $imageName);

        return response()->json(['success' => $product->update(['image_path' => $path])]);
    }
}
