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
            'appearance' => $row['appearance'],
            'atomic_mass' => $row['atomic_mass'],
            'boil' => $row['boil'],
            'category' => $row['category'],
            'density' => $row['density'],
            'discovered_by' => $row['discovered_by'],
            'melt' => $row['melt'],
            'molar_heat' => $row['molar_heat'],
            'named_by' => $row['named_by'],
            'number' => $row['number'],
            'period' => $row['period'],
            'phase' => $row['phase'],
            'source' => $row['source'],
            'spectral_img' => $row['spectral_img'],
            'summary' => $row['summary'],
            'symbol' => $row['symbol'],
            'xpos' => $row['xpos'],
            'ypos' => $row['ypos'],
            'shells' => $row['shells'],
            'electron_configuration' => $row['electron_configuration'],
            'electron_configuration_semantic' => $row['electron_configuration_semantic'],
            'electron_affinity' => $row['electron_affinity'],
            'electronegativity_pauling' => $row['electronegativity_pauling'],
            'ionization_energies' => $row['ionization_energies'],
            'cpk_hex' => $row['cpk_hex'],

            ]);
    }
}
