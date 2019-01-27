<?php

use Illuminate\Database\Seeder;
use App\Course;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matkul = [
            'Basis Data', 'Basis Data Lanjut', 'Programming Java 1', 'Programming Java 2', 'Java 3 Mobile',
            'Statistics', 'Data Mining', 'Image Processing', 'Algoritma Dasar', 'Algoritma Lanjut'
        ];
        // Inisial berdasarkan urutan $matkul
        $inisial = [
            'BD', 'BDL', 'PJ1', 'PJ2', 'J3M', 'S', 'DM', 'IP', 'AD', 'AL',
        ];

        // Time
        $time = [
            '08:00:00', '10:00:00', '13:30:00', '16:00:00',
        ];

        // Senin
        for($i=0; $i < 4; $i++)
        {
            Course::create([
                'course_name' => $matkul[$i],
                'initial' => $inisial[$i],
                'lecturer_id' => 1,
                'day' => 'monday',
                'time' => $time[$i],
                'sks' => '3',
                'room_id' => $i+1,
            ]);
        }

        // Selasa
        for($i=4; $i < 8; $i++)
        {
            Course::create([
                'course_name' => $matkul[$i],
                'initial' => $inisial[$i],
                'lecturer_id' => 2,
                'day' => 'tuesday',
                'time' => $time[0],
                'sks' => '3',
                'room_id' => 5,
            ]);
        }

        // Rabu
        for($i=6; $i < 10; $i++)
        {
            Course::create([
                'course_name' => $matkul[$i],
                'initial' => $inisial[$i],
                'lecturer_id' => 3,
                'day' => 'wednesday',
                'time' => $time[1],
                'sks' => '3',
                'room_id' => 6,
            ]);
        }

        // Kamis
        for($i=0; $i < 4; $i++)
        {
            Course::create([
                'course_name' => $matkul[$i],
                'initial' => $inisial[$i],
                'lecturer_id' => 4,
                'day' => 'thursday',
                'time' => $time[$i],
                'sks' => '3',
                'room_id' => $i+1,
            ]);
        }
        
        // Jumat
        for($i=4; $i < 8; $i++)
        {
            Course::create([
                'course_name' => $matkul[$i],
                'initial' => $inisial[$i],
                'lecturer_id' => 5,
                'day' => 'friday',
                'time' => $time[3],
                'sks' => '3',
                'room_id' => 5,
            ]);
        }

    }
}
