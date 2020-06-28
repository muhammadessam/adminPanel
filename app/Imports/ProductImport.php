<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name'          => $row[0],
            'bar_code'      => $row[1],
            'selling_price' => $row[2],
            'buying_price'  => $row[3],
            'lower_price'   => $row[4],
            'quantity_type' => $row[5],
            'quantity'      => $row[6],
            'group_id'      => $row[7],
            'sub_group_id'  => $row[8],
            'expired_at'    => $row[9],
            'img'           => '0',
            'can_sell_unavailable'=> 0,
        ]);
    }
}
