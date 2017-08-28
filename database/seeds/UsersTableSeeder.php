<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 9,
                'paytraq_id' => 120817,
                'name' => 'test2',
                'type' => '2',
                'email' => 'test2@test.test',
                'status' => 1,
                'password' => '$2y$10$GbzNpfNwPpxIMktlCXjMd.zgIiuXDJ52ufWx54H3XtJ.eHQUORj4.',
                'reg_number' => NULL,
                'vat_number' => NULL,
                'address' => 'fghr',
                'zip' => '64764',
                'country' => 'AS',
                'phone' => '6756',
                'currency' => ' €',
                'price_group_id' => 10011,
                'remember_token' => NULL,
                'created_at' => '2017-08-28 11:38:37',
                'updated_at' => '2017-08-28 11:38:37',
            ),
        ));
        
        
    }
}