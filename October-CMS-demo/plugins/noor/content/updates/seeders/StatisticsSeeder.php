<?php

namespace Noor\Content\Updates\Seeders;

use Noor\Content\Models\Section;
use October\Rain\Database\Updates\Seeder;
use System\Models\File;

class StatisticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statistics = Section::create([
            'section' => 'statistics',
            'type' => 'section',
            'order' => 7,
            'items_count' => 4
        ]);
        dump($statistics->section);


        $statistics->translateContext('en');
        $statistics->title = 'Statistics';
        $statistics->description = 'At Ata`a Palestine Association, we believe in the power and impact of giving. Through years of fieldwork, we have delivered humanitarian, cultural, and educational initiatives that contribute to building a safer future for the children of Palestine.';
        $statistics->save();

        $statistics->translateContext('ar');
        $statistics->title = 'الاحصائيات';
        $statistics->description = 'نحن في جمعية عطاء فلسطين، نؤمن بقوة العطاء وأثره. على مدار سنوات من العمل الميداني، قدمنا مبادرات إنسانية وثقافية وتعليمية تساهم في بناء مستقبل أكثر أمانًا لأطفال فلسطين نحن في جمعية عطاء فلسطين،';
        $statistics->save();

        $items = [
            ['title' => 'عدد المشاريع المنفذة', 'description' => '115', 'file_path' => 'app/statistics-icons/4os64Ik5og7yYEhM91076UhhU2toTBaInD8lWjFm.png'],
            ['title' => 'مستفيدين من البرنامج الثقافي', 'description' => '92%', 'file_path' => 'app/statistics-icons/CvjEFbXA6hEmHaNV6zuFiFei4cBKIzrPGJJIVhvB.png'],
            ['title' => 'مستفيدين من البرنامج الاغاثي', 'description' => '45%', 'file_path' => 'app/statistics-icons/Rb3UtNXzD9WEZXGKXqcem3R1MgqJpgknHBe3BzEa.png'],
            ['title' => 'عدد المقالات', 'description' => '70', 'file_path' => 'app/statistics-icons/scm1vak1pBTmrgQFv25ND8tGt7ZUTajWLu8wMUDY.png'],
        ];

        $items_en = [
            ['title' => 'Number of implemented projects', 'description' => '115'],
            ['title' => 'Beneficiaries of the cultural program', 'description' => '92%'],
            ['title' => 'Beneficiaries of the relief program', 'description' => '45%'],
            ['title' => 'Number of articles', 'description' => '70'],
        ];

        foreach ($items as $index => $item) {
            $statistic_item = Section::create([
                'parent_id' => $statistics->id,
                'section' => 'statistics',
                'type' => 'item',
                'order' => $index + 1,
            ]);

            $file = new File();
            $file->fromFile(storage_path($item['file_path']));
            $statistic_item->file()->add($file);

            $statistic_item->translateContext('en');
            $statistic_item->title = $items_en[$index]['title'];
            $statistic_item->description = $items_en[$index]['description'];
            $statistic_item->save();

            $statistic_item->translateContext('ar');
            $statistic_item->title = $item['title'];
            $statistic_item->description = $item['description'];
            $statistic_item->save();
        }
    }
}
