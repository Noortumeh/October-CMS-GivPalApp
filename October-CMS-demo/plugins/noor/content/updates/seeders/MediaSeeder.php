<?php

namespace Noor\Content\Updates\Seeders;

use Noor\Content\Models\Section;
use October\Rain\Database\Updates\Seeder;
use System\Models\File;

class MediaSeeder extends Seeder
{
    public function run()
    {
        $media = Section::create([
            'section' => 'media',
            'type' => 'section',
            'order' => 6,
            'items_count' => 6
        ]);
        dump($media->section);


        $media->translateContext('en');
        $media->title = 'Media';
        $media->save();

        $media->translateContext('ar');
        $media->title = 'الميديا';
        $media->save();

        $files = [
            'app/media/0EjY9ybGIGjVfhAuk9XxCFP08s62fi8UdHauYP2I.png',
            'app/media/78D8jN86m5xGhKZohA7NlPC6EiLN9YXvGrYTxCv7.png',
            'app/media/A6lPz5nJaP11Oax2xvqZMBKpruKtlj5TrAhwCbZY.png',
            'app/media/akMCzJ6dhijds4Tj91RSLiAasolhbcBGyo5krwkr.png',
            'app/media/iObEUwYJAw87NuomOSkUF6mkYMBzgTOifpHRCSDk.png',
            'app/media/JTqUuby1yVLRP4BAhcX8jbHPs3WZe7MJ6yB8E0Tl.png'
        ];

        for ($i = 1; $i <= $media->items_count; $i++) {

            $item = Section::create([
                'parent_id' => $media->id,
                'section' => 'media',
                'type' => 'item',
                'order' => $i,
            ]);

            $item->translateContext('en');
            $item->title = 'Spaces that support learning';
            $item->description = 'Our main center provides an inspiring and comfortable environment for creativity.';
            $item->date = '2025/3/15';
            $item->save();

            $item->translateContext('ar');
            $item->title = 'مساحات تدعم التعلم';
            $item->description = 'مركزنا الرئيسي يوفر بيئة ملهمة ومريحة للإبداع';
            $item->date = '2025/3/15';
            $item->save();

            $file = new File();
            $file->fromFile(storage_path($files[$i-1]));
            $item->file()->add($file);
        }
    }
}
