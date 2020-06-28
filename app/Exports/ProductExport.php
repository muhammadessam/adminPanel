<?php

namespace App\Exports;

use App\Http\Resources\ProductResource;
use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductExport implements FromCollection
{
    /**
    * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    */
    public function collection()
    {
        return ProductResource::collection(Product::all());
    }
}
