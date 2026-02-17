<?php

namespace Noor\Content\Updates\Seeders;

use Noor\Content\Models\Section;
use October\Rain\Database\Updates\Seeder;
use System\Models\File;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = Section::create([
            'section' => 'projects',
            'type' => 'section',
            'order' => 3,
            'items_count' => 4
        ]);

        dump($projects->section);

        $projects->translateContext('en');
        $projects->title = 'Ata`a Projects';
        $projects->description = '"Ataa Palestine" seeks to provide a safe, effective, and productive community, and the first "Dar Al-Raja" community has been launched. "Ataa Palestine" seeks to provide a safe and effective community.';
        $projects->save();
        
        $projects->translateContext('ar');
        $projects->title = 'مشاريع عطاء';
        $projects->description = 'تسعى "عطاء فلسطين” لتوفير مجتمع آمن وفعّال يتّسم بالإنتاجية، وقد انطلقت أولى مجتمعات "دار الرجاء"  تسعى "عطاء فلسطين” لتوفير مجتمع آمن وفعّال';
        $projects->save();

        $items = [
            ['title' => 'نبني الأثر الحقيقي', 'description' => 'مبادرات واقعية تسهم في تحسين حياة الأسر الفلسطينية وبناء مستقبل أكثر أمانًا.', 'file_path' => 'app/projects-images/30Ldq9OySLsW3C399u05Zepw2cainjOFIZR9VdRa.png'],
            ['title' => 'تمكين المجتمع', 'description' => 'توفير برامج تدريبية ومهنية لتعزيز مهارات الشباب وزيادة فرص العمل.', 'file_path' => 'app/projects-images/30Ldq9OySLsW3C399u05Zepw2cainjOFIZR9VdRa.png'],
            ['title' => 'تعزيز التعليم', 'description' => 'إنشاء مدارس جديدة وتوفير موارد تعليمية لتحسين جودة التعليم في المناطق المحرومة.', 'file_path' => 'app/projects-images/hwMD0BvKj7hvBiVlg2BH1FSIpAKJW3sU2Z99f7uw.png'],
            ['title' => 'الرعاية الصحية', 'description' => 'تقديم خدمات طبية مجانية وتحسين الوصول إلى الرعاية الصحية الأساسية للأسر المحتاجة.', 'file_path' => 'app/projects-images/hwMD0BvKj7hvBiVlg2BH1FSIpAKJW3sU2Z99f7uw.png'],
        ];

        $items_en = [
            ['title' => 'We build real impact', 'description' => 'Practical initiatives that contribute to improving the lives of Palestinian families and building a more secure future.'],
            ['title' => 'Community empowerment', 'description' => 'Providing training and vocational programs to enhance young people`s skills and increase job opportunities.'],
            ['title' => 'Promote education', 'description' => 'Establishing new schools and providing educational resources to improve the quality of education in disadvantaged areas.'],
            ['title' => 'health care', 'description' => 'Providing free medical services and improving access to basic healthcare for families in need.'],
        ];

        foreach ($items as $index => $item) {
            $projects_item = Section::create([
                'parent_id' => $projects->id,
                'section' => 'projects',
                'type' => 'item',
                'order' => $index + 1,
            ]);

            $file = new File();
            $file->fromFile(storage_path($item['file_path']));
            $projects_item->file()->add($file);

            $projects_item->translateContext('en');
            $projects_item->title = $items_en[$index]['title'];
            $projects_item->description = $items_en[$index]['description'];
            $projects_item->save();

            $projects_item->translateContext('ar');
            $projects_item->title = $item['title'];
            $projects_item->description = $item['description'];
            $projects_item->save();
        }
    }
}