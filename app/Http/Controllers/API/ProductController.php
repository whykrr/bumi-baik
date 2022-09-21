<?php

namespace App\Http\Controllers\API;

use App\Models\TreeType;
use Illuminate\Http\Request;
use App\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Get Product Adopt
     * 
     */
    public function product_adopt()
    {
        $product = TreeType::select(['tree_types.id', 'partner_id', 'name', 'sequestration', DB::raw('GROUP_CONCAT(image) as image')])
            ->join('trees', 'trees.type_id', '=', 'tree_types.id')
            ->groupBy('tree_types.id')
            ->get();

        $json_data = [];

        foreach ($product as $key => $value) {
            $json_data[$key]['id'] = $value->id;
            $json_data[$key]['name'] = $value->name;
            $json_data[$key]['location'] = $value->partner->name;
            $json_data[$key]['images'] = explode(',', $value->image);
        }

        return response()->json([
            'message' => ResponseMessage::SUCCESS_RETRIEVE,
            'data' => $json_data,
        ]);
    }

    /**
     * Get Product Adopt Detail
     *
     */
    public function adopt_detail($id)
    {
        $product = TreeType::select(['tree_types.id', 'partner_id', 'name', 'tree_types.description', 'sequestration', DB::raw('GROUP_CONCAT(image) as image')])
            ->join('trees', 'trees.type_id', '=', 'tree_types.id')
            ->where('tree_types.id', $id)
            ->groupBy('tree_types.id')
            ->first();

        $json_data = [];

        $json_data['id'] = $product->id;
        $json_data['name'] = $product->name;
        $json_data['detail'] = $product->description;
        $json_data['location'] = $product->partner->name;
        $json_data['quota'] = 10000;
        $json_data['images'] = explode(',', $product->image);

        return response()->json([
            'message' => ResponseMessage::SUCCESS_RETRIEVE,
            'data' => $json_data,
        ]);
    }
}
