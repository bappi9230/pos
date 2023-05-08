<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductImport implements ToModel,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

            return new Product([
                'product_name' => $row[0],
                'category_id' => $row[1],
                'supplier_id' => $row[2],
                'product_code' => $row[3],
                'product_garage' => $row[4],
                'product_image' => $row[5],
                'product_store' => $row[6],
                'buying_date' => $row[7],
                'expire_date' => $row[8],
                'buying_price' => $row[9],
                'selling_price' => $row[10],
            ]);
    }
    public function rules(): array
    {
        return [
          '*.3' => 'unique:products,product_code',
          '*.5' => 'unique:products,product_image',
        ];
    }
    public function customValidationMessages()
    {
        return [
            '*.3' => 'Product code Must be Unique',
            '*.5' => 'Product Image Must be Unique',
        ];
    }


}
