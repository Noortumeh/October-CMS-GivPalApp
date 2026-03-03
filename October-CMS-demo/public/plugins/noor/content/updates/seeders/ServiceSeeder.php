<?php

namespace Noor\Content\Updates\Seeders;

use Noor\Content\Models\Section;
use October\Rain\Database\Updates\Seeder;
use System\Models\File;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = Section::create([
            'section' => 'services',
            'type' => 'section',
            'order' => 2,
            'items_count' => 3
        ]);
        dump($services->section);


        $services->translateContext('en');
        $services->title = 'Ataa Services';
        $services->save();

        $services->translateContext('ar');
        $services->title = 'خدمات عطاء';
        $services->save();

        $items = [
            ['title' => 'دار الرجاء', 'description' => 'تسعى "عطاء فلسطين” لتوفير مجتمع آمن وفعّال يتّسم بالإنتاجية، وقد انطلقت أولى مجتمعات "دار الرجاء" كفكرة رائدة تساهم في تخفيف أعباء الحرب على قطاع غزة، حيث يقع', 'file_path' => 'app/services-icons/7pS5ybGFv5qAJxfVgRP1hjSEGy3QJ9EYLZpGRHz6.png'],
            ['title' => 'البرنامج الاغاثي وكفالة الأيتام', 'description' => 'ان حاجة المجتمع الفلسطيني للإغاثة تزداد مع الحصار وجدار الفصل العنصري وسرقة وتهويد المنازل والأرض . ان محدودية قدرات المؤسسات الفاعلة بهذا المجال  شكلت ضرورة', 'file_path' => 'app/services-icons/LvmXSbMhwVDNuW3maQ3iElmEDTLNCmYE4CFeg8Po.png'],
            ['title' => 'أنا المبدع', 'description' => 'تبنت جمعية عطاء فلسطين الخيرية مشاريع التنمية المستدامة بدءاً من العام 2011 وذلك بتأهيل منازل الفقراء بقطاع غزه الذين تعرضت بيوتهم للهدم الجزئي،  أنهينا إصلاح 200 منزل ', 'file_path' => 'app/services-icons/lYmdbvbII3nJxpCzwsgslJUZjq1Byy9PUyZYXm6Q.png'],
        ];

        $items_en = [
            ['title' => 'House of Raja', 'description' => '"Ataa Palestine" seeks to provide a safe, effective, and productive community. The first "Dar Al-Raja" community was launched as a pioneering idea to contribute to alleviating the burdens of war on the Gaza Strip, where it is located.'],
            ['title' => 'Relief program and orphan sponsorship', 'description' => 'The Palestinian community`s need for aid is increasing due to the siege, the apartheid wall, and the theft and Judaization of homes and land. The limited capacity of organizations operating in this field has created a necessity.'],
            ['title' => 'I am creative', 'description' => 'The Ata`a Palestine Charity Association adopted sustainable development projects starting in 2011 by rehabilitating the homes of the poor in the Gaza Strip whose homes were partially destroyed. We have completed the repair of 200 homes.'],
        ];

        foreach ($items as $index => $item) {
            $serviceItem = Section::create([
                'parent_id' => $services->id,
                'section' => 'services',
                'type' => 'item',
                'order' => $index + 1,
            ]);

            $file = new File();
            $file->fromFile(storage_path($item['file_path']));
            $serviceItem->file()->add($file);

            $serviceItem->translateContext('en');
            $serviceItem->title = $items_en[$index]['title'];
            $serviceItem->description = $items_en[$index]['description'];
            $serviceItem->save();

            $serviceItem->translateContext('ar');
            $serviceItem->title = $item['title'];
            $serviceItem->description = $item['description'];
            $serviceItem->save();
        }
    }
}
