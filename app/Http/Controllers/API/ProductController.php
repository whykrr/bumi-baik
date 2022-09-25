<?php

namespace App\Http\Controllers\API;

use App\Models\TreeType;
use Illuminate\Http\Request;
use App\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Models\Planting;
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

        $data = [];

        foreach ($product as $key => $value) {
            foreach ($product as $key => $value) {
                $data[$key]['id'] = $value->id;
                $data[$key]['name'] = $value->name;
                $data[$key]['location'] = $value->partner->name;
                $data[$key]['images'] = explode(',', $value->image);
            }
        }

        return response()->json([
            'message' => ResponseMessage::SUCCESS_RETRIEVE,
            'data' => $data,
        ]);
    }

    /**
     * Get Product Planting
     * 
     */
    public function product_planting()
    {
        $tenDaysLater = date('Y-m-d', strtotime('+10 days'));
        $product = Planting::where('planting_date', '>=', $tenDaysLater)->get();

        $data = [];

        foreach ($product as $key => $value) {
            $data[$key]['id'] = $value->id;
            $data[$key]['name'] = $value->name . ' di ' . $value->partner->name;
            $data[$key]['date_planting'] = date('Y-m-d', strtotime($value->planting_date));
            $data[$key]['images'] = explode(',', $value->image);
        }

        return response()->json([
            'message' => ResponseMessage::SUCCESS_RETRIEVE,
            'data' => $data,
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

    /**
     * Get Product Planting Detail
     *
     */

    public function planting_detail($id)
    {
        $product = Planting::findOrfail($id);

        $data = [
            'id' => $product->id,
            'name' => $product->name . ' di ' . $product->partner->name,
            'detail' => $product->description,
            'tree' => [
                'name' => $product->tree_type->name,
                'detail' => $product->tree_type->description,
            ],
            'location' => $product->partner->name,
            'images' => explode(',', $product->image),
            'price' => 200000,
            'date_planting' => date('Y-m-d', strtotime($product->planting_date)),
        ];

        return response()->json([
            'message' => ResponseMessage::SUCCESS_RETRIEVE,
            'data' => $data,
        ]);
    }
}
