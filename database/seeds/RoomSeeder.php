<?php

use Illuminate\Database\Seeder;
use App\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ruangan di urut berdasarkan urutan numerik
        $rooms = ['FIK LAB 302', 'FIK LAB 303', 'FIK LAB 304', 'FIK LAB 401', 'FIK LAB 402', 'FIK LAB 403'];

        for($i=0; $i < count($rooms); $i++)
        {
            Room::create(['room' => $rooms[$i]]);
        }
    }
}
