<?php

namespace App\Http\Controllers\API;

use App\Constants\ResponseMessage;
use App\Models\UserTree;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tree;

class TreeController extends Controller
{
    /**
     * Get Detail Tree
     */
    public function get_detail_tree($id)
    {
        $tree = Tree::findOrFail($id);

        $data = [
            'id' => $tree->id,
            'code' => $tree->code,
            'name' => $tree->type->name,
            'description' => $tree->type->description,
            'location_name' => $tree->type->partner->name,
            'planting_date' => date('Y-m-d', strtotime($tree->planting_date)),
            'location' => [
                'latitude' => $tree->latitude,
                'longitude' => $tree->longitude,
            ],
            'images' => explode(',', $tree->image),
            'created_at' => date('Y-m-d H:i:s', strtotime($tree->created_at)),
        ];

        return response()->json([
            "message" => ResponseMessage::SUCCESS_RETRIEVE,
            "data" => $data
        ]);
    }

    /**
     * Get User Tree
     */
    public function get_tree_user()
    {
        $user_id = auth()->user()->id;

        // get user tree
        $user_tree = UserTree::where('user_id', $user_id)->get();

        $data = [];
        foreach ($user_tree as $key => $item) {
            $data[$key] = [
                'id' => $item->tree->id,
                'code' => $item->tree->code,
                'name' => $item->tree->type->name,
            ];
        }

        return response()->json([
            'message' => ResponseMessage::SUCCESS_RETRIEVE,
            'data' => $data
        ]);
    }
}
