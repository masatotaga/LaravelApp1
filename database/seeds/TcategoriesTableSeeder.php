<?php

use Illuminate\Database\Seeder;

class TcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tcategories')->insert([
            ['tcategory_name' => 'iheya'],
            ['tcategory_name' => 'izena'],
            ['tcategory_name' => 'kunigami'],
            ['tcategory_name' => 'nakizin'],
            ['tcategory_name' => 'motobu'],
            ['tcategory_name' => 'ie'],
            ['tcategory_name' => 'oogimi'],
            ['tcategory_name' => 'higasi'],
            ['tcategory_name' => 'nago'],
            ['tcategory_name' => 'kin'],
            ['tcategory_name' => 'ginoza'],
            ['tcategory_name' => 'onna'],
            ['tcategory_name' => 'uruma'],
            ['tcategory_name' => 'okinawa'],
            ['tcategory_name' => 'yomitan'],
            ['tcategory_name' => 'kadena'],
            ['tcategory_name' => 'tyatan'],
            ['tcategory_name' => 'kitanakagusuku'],
            ['tcategory_name' => 'nakagusuku'],
            ['tcategory_name' => 'nisihara'],
            ['tcategory_name' => 'ginowan'],
            ['tcategory_name' => 'urasoe'],
            ['tcategory_name' => 'naha'],
            ['tcategory_name' => 'haebaru'],
            ['tcategory_name' => 'tomisiro'],
            ['tcategory_name' => 'yaese'],
            ['tcategory_name' => 'nanjyou'],
            ['tcategory_name' => 'yunabaru'],
            ['tcategory_name' => 'itoman'],
            ['tcategory_name' => 'kumejima'],
            ['tcategory_name' => 'tokasiki'],
            ['tcategory_name' => 'zamami'],
            ['tcategory_name' => 'aguni'],
            ['tcategory_name' => 'tonaki'],
            ['tcategory_name' => 'kitadaitou'],
            ['tcategory_name' => 'minamidaitou'],
            ['tcategory_name' => 'miyakojima'],
            ['tcategory_name' => 'tarama'],
            ['tcategory_name' => 'isigaki'],
            ['tcategory_name' => 'taketomi'],
            ['tcategory_name' => 'yonaguni']
               ]);
    }
}
