<?php

use Illuminate\Database\Seeder;
use App\GradeAndSubjects;
class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $subjects = array(
            array( 'GradeLevel' => 'Grade 1','Subject' => 'Mother Tongue','count' => '1'),
            array( 'GradeLevel' => 'Grade 1','Subject' => 'Filipino 1','count' => '2'),
            array( 'GradeLevel' => 'Grade 1','Subject' => 'English 1','count' => '3'),
            array( 'GradeLevel' => 'Grade 1','Subject' => 'Math 1','count' => '4'),
            array( 'GradeLevel' => 'Grade 1','Subject' => 'Science 1','count' => '5'),
            array( 'GradeLevel' => 'Grade 1','Subject' => 'Araling Panlipunan 1','count' => '6'),
            array( 'GradeLevel' => 'Grade 1','Subject' => 'Mapeh 1','count' => '7'),
            array( 'GradeLevel' => 'Grade 1','Subject' => 'Edukasyon sa Pagpapakatao 1','count' => '8'),

            array( 'GradeLevel' => 'Grade 2','Subject' => 'Mother Tongue 2','count' => '1'),
            array( 'GradeLevel' => 'Grade 2','Subject' => 'Filipino 2','count' => '2'),
            array( 'GradeLevel' => 'Grade 2','Subject' => 'English 2','count' => '3'),
            array( 'GradeLevel' => 'Grade 2','Subject' => 'Math 2','count' => '4'),
            array( 'GradeLevel' => 'Grade 2','Subject' => 'Science 2','count' => '5'),
            array( 'GradeLevel' => 'Grade 2','Subject' => 'Araling Panlipunan 2','count' => '6'),
            array( 'GradeLevel' => 'Grade 2','Subject' => 'Mapeh 2','count' => '7'),
            array( 'GradeLevel' => 'Grade 2','Subject' => 'Edukasyon sa Pagpapakatao 2','count' => '8'),

            array( 'GradeLevel' => 'Grade 3','Subject' => 'Mother Tongue 3','count' => '1'),
            array( 'GradeLevel' => 'Grade 3','Subject' => 'Filipino 3','count' => '2'),
            array( 'GradeLevel' => 'Grade 3','Subject' => 'English 3','count' => '3'),
            array( 'GradeLevel' => 'Grade 3','Subject' => 'Math 3','count' => '4'),
            array( 'GradeLevel' => 'Grade 3','Subject' => 'Science 3','count' => '5'),
            array( 'GradeLevel' => 'Grade 3','Subject' => 'Araling Panlipunan 3','count' => '6'),
            array( 'GradeLevel' => 'Grade 3','Subject' => 'Mapeh 3','count' => '7'),
            array( 'GradeLevel' => 'Grade 3','Subject' => 'Edukasyon sa Pagpapakatao 3','count' => '8'),

            array( 'GradeLevel' => 'Grade 4','Subject' => 'Filipino 4','count' => '1'),
            array( 'GradeLevel' => 'Grade 4','Subject' => 'English 4','count' => '2'),
            array( 'GradeLevel' => 'Grade 4','Subject' => 'Math 4','count' => '3'),
            array( 'GradeLevel' => 'Grade 4','Subject' => 'Science 4','count' => '4'),
            array( 'GradeLevel' => 'Grade 4','Subject' => 'Araling Panlipunan 4','count' => '5'),
            array( 'GradeLevel' => 'Grade 4','Subject' => 'Mapeh 4','count' => '6'),
            array( 'GradeLevel' => 'Grade 4','Subject' => 'Edukasyon sa Pagpapakatao 4','count' => '7'),
            array( 'GradeLevel' => 'Grade 4','Subject' => 'Edukasyong Pantahanan at Pangkabuhayan 4','count' => '8'),

            array( 'GradeLevel' => 'Grade 5','Subject' => 'Filipino 5','count' => '1'),
            array( 'GradeLevel' => 'Grade 5','Subject' => 'English 5','count' => '2'),
            array( 'GradeLevel' => 'Grade 5','Subject' => 'Math 5','count' => '3'),
            array( 'GradeLevel' => 'Grade 5','Subject' => 'Science 5','count' => '4'),
            array( 'GradeLevel' => 'Grade 5','Subject' => 'Araling Panlipunan 5','count' => '5'),
            array( 'GradeLevel' => 'Grade 5','Subject' => 'Mapeh 5','count' => '6'),
            array( 'GradeLevel' => 'Grade 5','Subject' => 'Edukasyon sa Pagpapakatao 5','count' => '7'),
            array( 'GradeLevel' => 'Grade 5','Subject' => 'Edukasyong Pantahanan at Pangkabuhayan 5','count' => '8'),

            array( 'GradeLevel' => 'Grade 6','Subject' => 'Filipino 6','count' => '1'),
            array( 'GradeLevel' => 'Grade 6','Subject' => 'English 6','count' => '2'),
            array( 'GradeLevel' => 'Grade 6','Subject' => 'Math 6','count' => '3'),
            array( 'GradeLevel' => 'Grade 6','Subject' => 'Science 6','count' => '4'),
            array( 'GradeLevel' => 'Grade 6','Subject' => 'Araling Panlipunan 6','count' => '5'),
            array( 'GradeLevel' => 'Grade 6','Subject' => 'Mapeh 6','count' => '6'),
            array( 'GradeLevel' => 'Grade 6','Subject' => 'Edukasyon sa Pagpapakatao 6','count' => '7'),
            array( 'GradeLevel' => 'Grade 6','Subject' => 'Edukasyong Pantahanan at Pangkabuhayan 6','count' => '8'),

            array( 'GradeLevel' => 'Grade 7','Subject' => 'Filipino 7','count' => '1'),
            array( 'GradeLevel' => 'Grade 7','Subject' => 'English 7','count' => '2'),
            array( 'GradeLevel' => 'Grade 7','Subject' => 'Math 7','count' => '3'),
            array( 'GradeLevel' => 'Grade 7','Subject' => 'Science 7','count' => '4'),
            array( 'GradeLevel' => 'Grade 7','Subject' => 'Araling Panlipunan 7','count' => '5'),
            array( 'GradeLevel' => 'Grade 7','Subject' => 'Mapeh 7','count' => '6'),
            array( 'GradeLevel' => 'Grade 7','Subject' => 'Edukasyon sa Pagpapakatao 7','count' => '7'),
            array( 'GradeLevel' => 'Grade 7','Subject' => 'TLE 7','count' => '8'),

            array( 'GradeLevel' => 'Grade 8','Subject' => 'Filipino 8','count' => '1'),
            array( 'GradeLevel' => 'Grade 8','Subject' => 'English 8','count' => '2'),
            array( 'GradeLevel' => 'Grade 8','Subject' => 'Math 8','count' => '3'),
            array( 'GradeLevel' => 'Grade 8','Subject' => 'Science 8','count' => '4'),
            array( 'GradeLevel' => 'Grade 8','Subject' => 'Araling Panlipunan 8','count' => '5'),
            array( 'GradeLevel' => 'Grade 8','Subject' => 'Mapeh 8','count' => '6'),
            array( 'GradeLevel' => 'Grade 8','Subject' => 'Edukasyon sa Pagpapakatao 8','count' => '7'),
            array( 'GradeLevel' => 'Grade 8','Subject' => 'TLE 8','count' => '8'),

            array( 'GradeLevel' => 'Grade 9','Subject' => 'Filipino 9','count' => '1'),
            array( 'GradeLevel' => 'Grade 9','Subject' => 'English 9','count' => '2'),
            array( 'GradeLevel' => 'Grade 9','Subject' => 'Math 9','count' => '3'),
            array( 'GradeLevel' => 'Grade 9','Subject' => 'Science 9','count' => '4'),
            array( 'GradeLevel' => 'Grade 9','Subject' => 'Araling Panlipunan 9','count' => '5'),
            array( 'GradeLevel' => 'Grade 9','Subject' => 'Mapeh 9','count' => '6'),
            array( 'GradeLevel' => 'Grade 9','Subject' => 'Edukasyon sa Pagpapakatao 9','count' => '7'),
            array( 'GradeLevel' => 'Grade 9','Subject' => 'TLE 9','count' => '8'),

            array( 'GradeLevel' => 'Grade 10','Subject' => 'Filipino 10','count' => '1'),
            array( 'GradeLevel' => 'Grade 10','Subject' => 'English 10','count' => '2'),
            array( 'GradeLevel' => 'Grade 10','Subject' => 'Math 10','count' => '3'),
            array( 'GradeLevel' => 'Grade 10','Subject' => 'Science 10','count' => '4'),
            array( 'GradeLevel' => 'Grade 10','Subject' => 'Araling Panlipunan 10','count' => '5'),
            array( 'GradeLevel' => 'Grade 10','Subject' => 'Mapeh 10','count' => '6'),
            array( 'GradeLevel' => 'Grade 10','Subject' => 'Edukasyon sa Pagpapakatao 10','count' => '7'),
            array( 'GradeLevel' => 'Grade 10','Subject' => 'TLE 10','count' => '8'),
        );


        GradeAndSubjects::insert($subjects);
    }
}
