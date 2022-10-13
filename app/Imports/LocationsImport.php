<?php

namespace App\Imports;

use App\Models\Country;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LocationsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $rows
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $country = Country::firstOrCreate(['name' => $row['country']]);
            $state = $country->states()->firstOrCreate(['name' => $row['state']]);
            $state->districts()->firstOrCreate(['name' => $row['district']]);
        }
    }
}
