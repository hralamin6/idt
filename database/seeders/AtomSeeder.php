<?php

namespace Database\Seeders;

use App\Models\Atom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AtomSeeder extends Seeder implements  WithHeadingRow
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Atom::truncate();
        $csvData = fopen(base_path('database/csv/pt.xlsx'), 'r');
        $transRow = true;
        while (($row = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                Atom::create([
                    'name' => $row[0],
                    'appearance' => $row[1],
                    'atomic_mass' => $row[2],
                    'boil' => $row[3],
                    'category' => $row[4],
                    'density' => $row[5],
                    'discovered_by' => $row[6],
                    'melt' => $row[7],
                    'molar_heat' => $row[8],
                    'named_by' => $row[9],
                    'number' => $row[10],
                    'period' => $row[11],
                    'phase' => $row[12],
                    'source' => $row[13],
                    'spectral_img' => $row[14],
                    'summary' => $row[15],
                    'symbol' => $row[16],
                    'xpos' => $row[17],
                    'ypos' => $row[18],
                    'shells' => $row[19],
                    'electron_configuration' => $row[20],
                    'electron_configuration_semantic' => $row[21],
                    'electron_affinity' => $row[22],
                    'electronegativity_pauling' => $row[23],
                    'ionization_energies' => $row[24],
                    'cpk_hex' => $row[25],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
