<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;

class ArrayExport implements FromArray
{
    protected $arrays;

    public function __construct(array $arrays)
    {
        $this->arrays = $arrays;
    }

    public function array(): array
    {
        return $this->arrays;
    }
}
