<?php

namespace Modules\Production\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Modules\Production\Models\Machine;
use Modules\Production\Models\Mill;

class MachineCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->transform(function( Machine $row) {
            return $row->getCollectionData();
        });
    }

}
