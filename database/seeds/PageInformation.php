<?php

use Illuminate\Database\Seeder;
use App\Profession;
class PageInformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pageinformation = [
	    [ 
	    'name' => 'Accounting',
	    'description' => 'Accounting',
	    'description' => 'Accounting',
	    'image' => '1551453579.jpg',
	    'status'=> '1'
	    ],
	    [ 
	    'name' => 'Administrative officer',
	    'display_name' => 'Administrative',
	    'description' => 'Accounting'
	    ],
	    [ 
	    'name' => 'Agriculture',
	    'display_name' => 'South-East',
	    'description' => 'Accounting'
	    ],
	    [ 
	    'name' => 'Architecture',
	    'display_name' => 'South-West',
	    'description' => 'Accounting'
	    ],
	    [ 
	    'name' => 'Busines Development Manager',
	    'display_name' => 'South',
	    'description' => 'Accounting'
	    ],
	    [ 
	    'name' => 'Communications Officer',
	    'display_name' => 'South',
	    'description' => 'Accounting'
	    ]

    ];

    foreach ($professions as $key => $value) {
    	Profession::create($value);
    }
    }
}
