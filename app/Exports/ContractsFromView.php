<?php

namespace App\Exports;

use App\Contract;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContractsFromView implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Contract::all();
    }
}
