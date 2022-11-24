<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\CalculatorItem;
use App\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\CalculatorRequest;
use App\Models\UserCalculate;
use App\Models\UserCarbonOffset;
use App\Models\UserTree;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CarbonController extends Controller
{
    /**
     * Get Item Calculator
     */
    public function get_item_calculator()
    {
        $items = CalculatorItem::all();

        // group data by type
        $data = [];
        foreach ($items as $item) {
            $data[$item->type][] = [
                'id' => $item->id,
                'name' => $item->name,
            ];
        }

        return response()->json([
            "message" => ResponseMessage::SUCCESS_RETRIEVE,
            "data" => $data
        ]);
    }

    /**
     * Count Carbon Offset
     */
    public function count_carbon_offset(CalculatorRequest $request)
    {
        $ids_type = [$request->fuel_type, $request->electricity_type, $request->gas_type];
        // get all item by ids
        $carbon_offset = CalculatorItem::whereIn('id', $ids_type)->get();
        if ($carbon_offset->count() < 3) {
            return response()->json([
                "message" => ResponseMessage::ERROR_SERVER,
            ], 500);
        }

        $result = 0;

        foreach ($carbon_offset as $key => $item) {
            $carbon_offset[$key]->result_anual = round(($request[$item->type] / $item->price_per_unit) * $item->carbon_offset * 12, 2);
            $result += $carbon_offset[$key]->result_anual;
        }

        $calc = [
            'user_id' => auth('api')->user()->id,
            'measurement_date' => date('Y-m-d'),
            'measurement_data' => [
                'fuel' => [
                    'type' => $carbon_offset[0]->name,
                    'conversion' => $carbon_offset[0]->price_per_unit,
                    'carbon_offset' => $carbon_offset[0]->carbon_offset,
                    'value' => $request->fuel,
                    'result_anual' => $carbon_offset[0]->result_anual,
                ],
                'electricity' => [
                    'type' => $carbon_offset[1]->name,
                    'conversion' => $carbon_offset[1]->price_per_unit,
                    'carbon_offset' => $carbon_offset[1]->carbon_offset,
                    'value' => $request->electricity,
                    'result_anual' => $carbon_offset[1]->result_anual,
                ],
                'gas' => [
                    'type' => $carbon_offset[2]->name,
                    'conversion' => $carbon_offset[2]->price_per_unit,
                    'carbon_offset' => $carbon_offset[2]->carbon_offset,
                    'value' => $request->gas,
                    'result_anual' => $carbon_offset[2]->result_anual,
                ],
            ],
            'result' => $result,
        ];

        // save to UserCalculate
        if (!UserCalculate::create($calc)) {
            Log::error('Error when save to UserCalculate', $calc);
            return response()->json([
                "message" => ResponseMessage::ERROR_SERVER,
            ], 500);
        }

        return response()->json([
            "message" => ResponseMessage::SUCCESS_CREATE,
            "data" => [
                "result" => $result,
                "unit" => "kg"
            ]
        ], 201);
    }

    /**
     * Get Carbon Detail
     */
    public function carbon_detail()
    {
        $oneYearAgo = date('Y-m-d', strtotime('-1 year'));
        $user_id = auth('api')->user()->id;

        $carbon = UserCalculate::where('user_id', $user_id)->orderBy('measurement_date', 'desc')->first();
        $offset = UserCarbonOffset::select(DB::raw('SUM(total_offset) as total'))->where('user_id', $user_id)->where('offset_date', '>=', $oneYearAgo)->orderBy('offset_date', 'desc')->first();
        $trees = UserTree::where('user_id', $user_id)->where('date_adopted', '>=', $oneYearAgo)->orderBy('date_adopted', 'desc')->get();

        $newTrees = [];
        foreach ($trees as $key => $tree) {
            $newTrees[] = [
                'code' => $tree->tree->code,
                'latitude' => $tree->tree->latitude,
                'longitude' => $tree->tree->longitude,
            ];
        }

        return response()->json([
            "message" => ResponseMessage::SUCCESS_RETRIEVE,
            "data" => [
                'carbon' => [
                    'user_id' => @$carbon->user_id,
                    'emision' => @$carbon->result,
                    'offset' => is_null($offset->total) ? (float) 0.00 : $offset->total,
                    'last_calculate' => @$carbon->measurement_date,
                ],
                'trees' => $newTrees,
            ]
        ]);
    }
}
