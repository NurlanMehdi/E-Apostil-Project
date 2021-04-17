<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AllSelectBoxesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $selectBoxsValues = [
            ['name' => 'Sənədin məxsus olduğu şəxs','novu'=>1,'string_id'=>'senedin_mexsus_oldugu_shexs','key'=>'ishtirakchinin_novu'],
            ['name' => 'Yaxın qohumu','novu'=>1,'string_id'=>'yaxin_qohumu','key'=>'ishtirakchinin_novu'],
            ['name' => 'Nümayəndəsi (etibarnamə əsasında)','novu'=>1,'string_id'=>'numayende','key'=>'ishtirakchinin_novu'],
            ['name' => 'Sənədi imzalayan şəxs','novu'=>1,'string_id'=>'senedi_imz_shexs','key'=>'ishtirakchinin_novu'],
            ['name' => 'Səlahiyyətli şəxs','novu'=>2,'string_id'=>'selahiyyetli_shexs','key'=>'ishtirakchinin_novu'],
            ['name' => 'Təmsil edən şəxs (etibarnamə əsasında)','novu'=>2,'string_id'=>'etibarname_esasinda','key'=>'ishtirakchinin_novu'],
            ['name' => 'Təmsil edən şəxs (məktub əsasında)','novu'=>2,'string_id'=>'mektub_esasinda','key'=>'ishtirakchinin_novu'],
            ['name' => 'Pasport','novu'=>0,'string_id'=>'pasport','key'=>'senedin_tipi'],
            ['name' => 'MYİ vəsiqəsi','novu'=>0,'string_id'=>'myi_vesiqesi','key'=>'senedin_tipi'],
            ['name' => 'DYİ vəsiqəsi','novu'=>0,'string_id'=>'dyi_vesiqesi','key'=>'senedin_tipi'],
            ['name' => 'AR hüdüdlarında istifadə edilməsi üçün V.O.Ş.-un şəxsiyyət vəsiqəsi','novu'=>0,'string_id'=>'ar_v_o_sh_shexsiyyet_vesiqesi','key'=>'senedin_tipi'],
            ['name' => 'Hərbi bilet və ya HQ-nın şəxsi vəsiqəsi','novu'=>0,'string_id'=>'herbi_bilet_shexsiyyet_vesiqesi','key'=>'senedin_tipi'],
            ['name' => 'Dənizçinin şəxsiyyət sənədi','novu'=>0,'string_id'=>'denizchi_shexsiyyet_vesiqesi','key'=>'senedin_tipi'],
            ['name' => 'Ər','novu'=>0,'string_id'=>'er','key'=>'qohumluq_derecesi'],
            ['name' => 'Arvad,','novu'=>0,'string_id'=>'arvad','key'=>'qohumluq_derecesi'],
            ['name' => 'Ata','novu'=>0,'string_id'=>'ata','key'=>'qohumluq_derecesi'],
            ['name' => 'Ana','novu'=>0,'string_id'=>'ana','key'=>'qohumluq_derecesi'],
            ['name' => 'Oğlu','novu'=>0,'string_id'=>'oghlu','key'=>'qohumluq_derecesi'],
            ['name' => 'Qızı','novu'=>0,'string_id'=>'qizi','key'=>'qohumluq_derecesi'],
            ['name' => 'Baba','novu'=>0,'string_id'=>'baba','key'=>'qohumluq_derecesi'],
            ['name' => 'Nənə','novu'=>0,'string_id'=>'nene','key'=>'qohumluq_derecesi'],
            ['name' => 'Nəvə','novu'=>0,'string_id'=>'neve','key'=>'qohumluq_derecesi'],
            ['name' => 'Qardaş','novu'=>0,'string_id'=>'qardash','key'=>'qohumluq_derecesi'],
            ['name' => 'Bacı','novu'=>0,'string_id'=>'baci','key'=>'qohumluq_derecesi'],
        ];

        foreach ($selectBoxsValues as $val) {
            \DB::table('all_select_boxes')->insert([
                'name' => $val['name'],
                'novu' => $val['novu'],
                'string_id' => $val['string_id'],
                'key' => $val['key'],
            ]);
        }
    }
}
