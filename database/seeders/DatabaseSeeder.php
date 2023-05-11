<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Data;
use App\Models\Trial;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // User::factory(10)->create();
       User::create([
        'name' =>'Ikhwan Arjuna',
        'username' => 'ikhwanarjuna',
        'email'=>'ikhwanarjuna@gmail.com',
        'password'=>bcrypt('12345')

    ]);
    // Trial::create([
    //     'id'=> Str::random(1),
    //     'document_number'=>'23/R&D-SJBD/1/23',
    //     'document_date'=>Carbon::parse('2023-05-04'),
    //     'trial_type'=>1,
    //     'trial_note'=>'-',
    //     'item_code'=>'RHDMN-TTVNA-001',
    //     'family_product'=>'HD',
    //     'item_name'=>'HD BOYO MERAH',
    //     'size'=>'12X27X0.3',
    //     'note'=>'Sample',
    //     'approval_created_by'=>'MUH TANIR',
    //     'approval_created_date'=>'',
    //     'approval_plant_head_name'=>'SABAR SARYANTO',
    //     'approval_plant_head_date'=>Carbon::parse('2023-05-04'),
    //     'approval_ppic_name'=>'WURYANI',
    //     'approval_ppic_date'=>Carbon::parse('2023-05-04'),
    //     'approval_gm_name'=>'KUSMASTUTI',
    //     'approval_gm_date'=>Carbon::parse('2023-05-04'),
    //     'costing_approved'=>false,
    //     'costing_staff_name'=>'INDAH',
    //     'costing_approval_name'=>'MADYA ANA',
    //     'costing_approval_date'=>Carbon::parse('2023-05-04')

    // ]);
    }
}
