<?php

namespace App\Imports;

use App\Models\Atom;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AtomImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Atom([
            'name' => $row['name'],
            'mass' => $row['atomic_mass'],
            'boiling_point' => $row['boil'],
            'category' => $row['category'],
            'density' => $row['density'],
            'discovered_by' => $row['discovered_by'],
            'melting_point' => $row['melt'],
            'molar_heat' => $row['molar_heat'],
            'number' => $row['number'],
            'period' => $row['period'],
            'phase' => $row['phase'],
            'source' => $row['source'],
            'summary' => $row['summary'],
            'symbol' => $row['symbol'],
            'group' => $row['xpos'],
            'shells' => $row['shells'],
            'electron_configuration' => $row['electron_configuration_semantic'],
            'electron_affinity' => $row['electron_affinity'],
            ]);
    }
}
