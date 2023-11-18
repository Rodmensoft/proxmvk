<?php

namespace Modules\Inventory\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Inventory\Models\Warehouse;
use Modules\Inventory\Models\ItemWarehouse;
use Modules\Inventory\Http\Resources\SaleNoteItemToReturnCollection;
use App\Models\Tenant\SaleNoteItem;
use Illuminate\Support\Facades\DB;


class InventoryToReturnController extends Controller
{

    public function index()
    {
        return view('inventory::to-return.index');
    }

    public function columns()
    {
        return [];
    }

    public function records(Request $request) {
        $column = $request->input('column');
        $saleNoteItems = SaleNoteItem::where('to_return', 1)->whereHas('sale_note.customer', function($query) use($request) {
            if ($request->value !== '') {
                $query->where('number', 'like', '%' . $request->value . '%')
                ->orWhere('name', 'like', '%' . $request->value . '%')
                ->orWhere('address', 'like', '%' . $request->value . '%');
            }
        })
        ->with('sale_note.customer', 'relation_item', 'sale_note.user');
        $records = $saleNoteItems;

        return new SaleNoteItemToReturnCollection($records->orderBy('id', 'desc')->paginate(config('tenant.items_per_page')));
    }

    public function getCommonRecords($request)
    {
        return ItemWarehouse::with(['item', 'warehouse'])
            ->whereHas('item', function ($query) use ($request) {
                $query->where('unit_type_id', '!=', 'ZZ');
                $query->whereNotIsSet();

                if ($this->applyAdvancedRecordsSearch() && $request->column === 'description') {
                    if ($request->value) $query->whereAdvancedRecordsSearch($request->column, $request->value);
                } else {
                    $query->where($request->column, 'like', '%' . $request->value . '%');
                }
            })
            ->orderBy('item_id');
    }

    public function devolver(Request $request) {
        $result = DB::connection('tenant')->transaction(function () use ($request) {
            $saleNoteItem = SaleNoteItem::find($request->id);
            if ($saleNoteItem->quantity < ($saleNoteItem->returned + $request->quantity)) {
                return [
                    'success' => false,
                    'message' => 'No puedes devolver una cantidad mayor a la prestada.'
                ];
            }

            if ($saleNoteItem->returned + $request->quantity == $saleNoteItem->quantity) {
                $saleNoteItem->to_return = 0;
            }
            $saleNoteItem->returned = $saleNoteItem->returned + $request->quantity;
            $saleNoteItem->save();
            $establishment_id = auth()->user()->establishment_id;
            $warehouse = Warehouse::where('establishment_id', $establishment_id)->first();
            $item = ItemWarehouse::where([
                ['item_id', $saleNoteItem->item_id],
                ['warehouse_id', $warehouse->id]
            ])->first();
            $item->stock = $item->stock + $request->quantity;
            $item->save();

            return [
                'success' => true,
                'message' => 'Se devolvieron ' . $request->quantity . ' productos.'
            ];
        });

        return $result;
    }
}
