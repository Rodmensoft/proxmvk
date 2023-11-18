<?php

namespace Modules\Inventory\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SaleNoteItemToReturnCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function toArray($request)
    {
        return $this->collection->transform(function($row, $key) {
            return [
                'id' => $row->id,
                'customer_name' => $row->sale_note->customer->name,
                'customer_address' => $row->sale_note->customer->address !== null? $row->sale_note->customer->address : '-',
                'customer_document' => $row->sale_note->customer->number,
                'user_name' => $row->sale_note->user->name,
                'customer_name' => $row->sale_note->customer->name,
                'item_description' => $row->item->description,
                'quantity' => $row->quantity - $row->returned,
                'date' => $row->sale_note->created_at->format('Y-m-d H:i:s'),
                'due_date' => $row->sale_note->due_date !== null ? $row->sale_note->due_date->format('Y-m-d H:i:s') : '-'
            ];
        });
    }
}