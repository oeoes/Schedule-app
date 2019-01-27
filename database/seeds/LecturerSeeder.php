<?php

use Illuminate\Database\Seeder;
use App\Lecturer;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // Daftar nama dosen simpan di sini
        $names = [
            'M Rafiudin', 'Indra Permana S', 'Ichsan Mardani', 'Henky Bayu Seta', 'Bambang Tri',
            'Euis Oktavianti', 'Iin Yulnelly', 'Yuni Widiastuti', 'Bayu Hananto', 'Bayu Wibisono',
            'Jayanta', 'Rio Wirawan', 'Didit', 'Nurul Chamidah', 'Mega Santoni'
        ];

        for($i=0; $i < count($names); $i++)
        {
            Lecturer::create([
                'name' => $names[$i]
            ]);
        }
        
    }
}
