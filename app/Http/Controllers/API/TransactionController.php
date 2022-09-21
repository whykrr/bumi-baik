<?php

namespace App\Http\Controllers\API;

use App\Models\Tree;
use Ramsey\Uuid\Uuid;
use App\Models\Voucher;
use App\Models\UserTree;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\UserCarbonOffset;
use App\Constants\ResponseMessage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\UseVoucherRequest;

class TransactionController extends Controller
{
    /**
     * Get Voucher By Code
     */
    public function redeem_code($code)
    {
        $voucher = Voucher::where('code', $code)->first();
        if (!$voucher) {
            return response()->json([
                "message" => ResponseMessage::ERROR_NOT_FOUND,
            ], 404);
        }

        return response()->json([
            "message" => ResponseMessage::SUCCESS_RETRIEVE,
            "data" => $voucher
        ]);
    }

    /**
     * User Redeem Voucher
     */
    public function use_voucher(UseVoucherRequest $request)
    {
        $voucher = Voucher::where('code', $request->voucher_code)->first();

        if (!$voucher) {
            return response()->json([
                "message" => ResponseMessage::ERROR_NOT_FOUND,
            ], 404);
        }

        //create object
        $tr = [
            'type' => $voucher->type,
            'total' => $voucher->value,
        ];

        if ($voucher->type == 'adopt') {
            $tr['product_id'] = $voucher->tree_id;
        } else {
            $tr['tree_id'] = $voucher->tree_id;
            $tr['product_id'] = $voucher->planting_id;
        }

        //convert $tr to object
        $tr = (object) $tr;

        $v = [
            'id' => $voucher->id,
            'code' => $voucher->code,
            'value' => $voucher->value,
        ];

        return $this->_doTransactions($tr, $v);
    }

    private function _doTransactions($request, $voucher = [], $payment = [])
    {
        $basic_price = 15000;
        $basic_offset = 100;
        $user_id = auth('api')->user()->id;

        $uuid = Uuid::uuid4();

        // basic data
        $data = [
            'id' => $uuid->toString(),
            'order_code' => 'ORDER-' . date('YmdHis') . '-' . $user_id . '-' . rand(1000, 9999),
            'user_id' => $user_id,
            'date' => date('Y-m-d'),
            'total' => $request->total,
            'grand_total' => $request->total,
        ];

        // check $request type
        if ($request->type == 'adopt') {
            $data['tree_type_id'] = $request->product_id;
        }

        // check $request type
        if ($request->type == 'planting') {
            $data['tree_type_id'] = $request->tree_id;
            $data['planting_id'] = $request->product_id;
        }

        // check voucher
        if (count($voucher) != 0) {
            $data['voucher_id'] = $voucher['id'];
            $data['voucher_code'] = $voucher['code'];
            $data['voucher_value'] = $voucher['value'];
            $data['grand_total'] = 0;
            $data['payment_method'] = 'reedem_voucher';
            $data['status'] = 'completed';
        }

        // check payment
        if (count($payment) != 0) {
            $data['order_id'] = $payment['order_id'];
            $data['payment_method'] = $payment['payment_method'];
            $data['payment_detail'] = json_decode($payment['payment_detail']);
            $data['grand_total'] = $payment['gross_amount'];
        }


        // db transactions
        DB::beginTransaction();

        $tr = Transaction::create($data);
        // check insert transaction
        if (!$tr) {
            DB::rollBack();
            return response()->json([
                // get error from model
                "message" => 'Error when create transaction',
            ], 400);
        }

        $data_offset = [
            'user_id' => $user_id,
            'transaction_id' => $data['id'],
            'offset_date' => $tr->date,
            'total_offset' => ($tr->total / $basic_price) * $basic_offset
        ];

        $uco = UserCarbonOffset::create($data_offset);
        // check insert user carbon offset
        if (!$uco) {
            DB::rollBack();
            return response()->json([
                // get error from model
                "message" => 'Error when create user carbon offset',
            ], 400);
        }

        if ($request->type == 'adopt') {
            $ut = $this->_findTree($data_offset['total_offset']);

            $userTrees = [];

            foreach ($ut as $u) {
                $userTrees = [
                    'user_id' => $user_id,
                    'tree_id' => $u['tree_id'],
                    'transaction_id' => $data['id'],
                    'date_adopted' => $tr->date,
                    'user_tree_sequestration' => $u['user_tree_sequestration'],
                ];
            }

            $iut = UserTree::create($userTrees);

            // check insert user tree
            if (!$iut) {
                DB::rollBack();
                return response()->json([
                    // get error from model
                    "message" => 'Error when create user tree',
                ], 400);
            }
        }

        DB::commit();

        return response()->json([
            "message" => ResponseMessage::SUCCESS_CREATE,
        ]);
    }

    private function _findTree($offset)
    {
        $userTrees = [];

        $tenYearAgo = date('Y-m-d', strtotime('-10 year'));

        $getTree = Tree::select(['trees.*', 'tree_types.name AS tree_type_name', 'tree_types.sequestration', DB::raw('COUNT(user_trees.user_tree_sequestration) as user_sequastration'), DB::raw('IF( ISNULL(SUM( user_trees.user_tree_sequestration )),tree_types.sequestration,tree_types.sequestration - SUM( user_trees.user_tree_sequestration )) as remaining_sequastration')])
            ->join('tree_types', 'tree_types.id', '=', 'trees.type_id')
            ->join('user_trees', 'user_trees.id', '=', 'trees.id', 'left')
            ->where('trees.planting_date', '<=', $tenYearAgo)
            ->groupBy('trees.id')
            ->orderBy('trees.id', 'ASC')
            ->having('remaining_sequastration', '>=', $offset)
            ->limit(1)
            ->get();

        foreach ($getTree as $tree) {
            $userTrees[] = [
                'tree_id' => $tree->id,
                'code' => $tree->code,
                'user_tree_sequestration' => $offset,
            ];
        }

        return $userTrees;
    }
}
