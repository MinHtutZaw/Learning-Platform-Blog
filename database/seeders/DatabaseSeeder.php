<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
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
        

        $mhz=User::factory()->create(['name'=>'Min Htut','username'=>'minhtut']);
        $wpt=User::factory()->create(['name'=>'Wai Paing','username'=>'waipaing']);
        
        $frontend=Category::factory()->create(['name'=>'frontend','slug'=>'frontend']);
        $backend=Category::factory()->create(['name'=>'backend','slug'=>'backend']);

        Blog::factory(20)->create();

         //overwrite
      
        Blog::factory(2)->create(['category_id'=>$frontend->id,'user_id'=>$mhz->id]);
        Blog::factory(2)->create(['category_id'=>$backend->id,'user_id'=>$wpt->id]);
  
    }
}
