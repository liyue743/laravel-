<?php

use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           for ($i=0; $i < 30; $i++) { 
            DB::table('goods')->insert([
               'cid' => 1,
               'gname' => rand(1,99).'卡丁车'.str_random(3),
               'stock' => rand(1,999),
               'price' => 100,
               'desc' => str_random(10),
               'addtime' => time(),
               'gpic' => '/goods/images/5b5598d8Nc063a177.jpg',
               'size' => rand(1,99),
               'company' => '九号',
               'color' => '红色',
               'mid' => rand(1,99),
              ]);
	    	  }
    }


            // DB::table('details')->insert([
           		// 	'oid' => '201808010128112344',
           		// 	'gid' => rand(1,10),
           		// 	'price' => rand(1,100),
           		// 	'sum' => 1,
           		// ]);

      
              // DB::table('orders')->insert([
              //  'oid' => date('YmdHis',time()).rand(1111,9999),
              //  'hid' => rand(1,50),
              //  'sum' => rand(1,10),
              //  'total' => rand(1,99),
              //  'status' => 0,
              //  'create_at' => time(),
              //  'link_man' => str_random(5),
              //  'addr' => str_random(8),
              //  'mail' => rand(100000,999999),
              //  'otel' => '1'.rand(3,9).mt_rand(111111111,999999999),
              //  'msg' => str_random(10),
              //   ]);
	      
}
