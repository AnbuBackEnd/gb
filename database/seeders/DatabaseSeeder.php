<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data=array();
        $data[0]['primaryadmincode']='PRI000001';
        $data[0]['employeecode']='EMP000001';
        $data[0]['clientcode']='CLI000001';
        $data[0]['primaryadmincode_value']=1;
        $data[0]['employeecode_value']=1;
        $data[0]['clientcode_value']=1;
        DB::table('codes')->insert($data);
        DB::table('userprivileges')->insert([[
            'role' => 'secondaryadmin',
            'window' => 'employee',
            'create' => 0,
            'edit' => 0,
            'view' => 0,
            'delete' => 0,
            'downloadble' => 0,
        ],
        [
            'role' => 'secondaryadmin',
            'window' => 'client',
            'create' => 0,
            'edit' => 0,
            'view' => 0,
            'delete' => 0,
            'downloadble' => 0,
        ],
        [
            'role' => 'secondaryadmin',
            'window' => 'investmentrecords',
            'create' => 0,
            'edit' => 0,
            'view' => 0,
            'delete' => 0,
            'downloadble' => 0,
        ],
        [
            'role' => 'secondaryadmin',
            'window' => 'withdraw',
            'create' => 0,
            'edit' => 0,
            'view' => 0,
            'delete' => 0,
            'downloadble' => 0,
        ],
        [
            'role' => 'secondaryadmin',
            'window' => 'reports',
            'create' => 0,
            'edit' => 0,
            'view' => 0,
            'delete' => 0,
            'downloadble' => 0,
        ],
        [
            'role' => 'employee',
            'window' => 'client',
            'create' => 0,
            'edit' => 0,
            'view' => 0,
            'delete' => 0,
            'downloadble' => 0,
        ],
        [
            'role' => 'employee',
            'window' => 'investmentrecords',
            'create' => 0,
            'edit' => 0,
            'view' => 0,
            'delete' => 0,
            'downloadble' => 0,
        ],
        [
            'role' => 'employee',
            'window' => 'withdraw',
            'create' => 0,
            'edit' => 0,
            'view' => 0,
            'delete' => 0,
            'downloadble' => 0,
        ],
        [
            'role' => 'employee',
            'window' => 'reports',
            'create' => 0,
            'edit' => 0,
            'view' => 0,
            'delete' => 0,
            'downloadble' => 0,
        ]
        ]);
    }
}
