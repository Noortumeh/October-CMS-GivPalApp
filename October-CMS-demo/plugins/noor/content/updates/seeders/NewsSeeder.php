<?php

namespace Noor\Content\Updates\Seeders;

use Noor\Content\Models\Section;
use October\Rain\Database\Updates\Seeder;
// use RainLab\Translate\Models\Attribute;
use System\Models\File;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = Section::create([
            'section' => 'news',
            'type' => 'section',
            'order' => 5,
            'items_count' => 3
        ]);
        dump($news->section);


        $news->translateContext('en');
        $news->title = 'News';
        $news->description = 'Follow the latest news and achievements of the Ata`a Palestine Association, from humanitarian initiatives and development projects to the success stories we create together on the ground. Here we share with you hope, progress, and everything else.';
        $news->save();

        $news->translateContext('ar');
        $news->title = 'الاخبار';
        $news->description = 'تابع آخر أخبار وإنجازات جمعية عطاء فلسطين، من مبادرات إنسانية ومشاريع تنموية إلى قصص النجاح التي نصنعها معًا في الميدان. هنا نشارككم الأمل، التقدّم، وكل';
        $news->save();

        $items = [
            ['title' => 'احتفاء بالتراث والفنون الفلسطينية', 'description' => 'تستعد جمعية التراث الفلسطيني لإقامة مهرجان ثقافي يضم الفنون الشعبية والموسيقى، ويهدف إلى تعزيز الهوية الثقافية الفلسطينية وإبراز التراث الغني أطلقت جمعية البيئة الفلسطينية مبادرة لزراعة الأشجار في مختلف مناطق الضفة الغربية بهدف تحسين جودة الهواء ومكافحة التلوث، وتعزيز الوعي البيئي بين المجتمعات المحلية  معرفة المزيد.', 'file_path' => 'app/news-images/2Iqj06fq3RmBvI9c4dYsNju9nFq3nptVv2liBwWc.png', 'date' => '2025\11\11', 'address' => 'الضفه الغربية'],
            ['title' => 'تطوير مهارات النساء في المجتمع', 'description' => 'أعلنت جمعية النور عن بدء برنامج تأهيل مهني للنساء في المناطق الريفية، يستهدف تعزيز المهارات الحرفية والعمالية وتمكينهن اقتصادياً أطلقت جمعية البيئة الفلسطينية مبادرة لزراعة الأشجار في مختلف مناطق الضفة الغربية بهدف تحسين جودة الهواء ومكافحة التلوث، وتعزيز الوعي البيئي بين المجتمعات المحلية  معرفة المزيد', 'file_path' => 'app/news-images/anxI3hzYTgyZ2RbGkHBRkYqoUow0W1LwsqYkzE0Q.png', 'date' => '2025\11\11', 'address' => 'الضفه الغربية'],
            ['title' => 'إطلاق مشروع زراعة الأشجار للحد الأقصى من التلوث', 'description' => 'أطلقت جمعية البيئة الفلسطينية مبادرة لزراعة الأشجار في مختلف مناطق الضفة الغربية بهدف تحسين جودة الهواء ومكافحة التلوث، وتعزيز الوعي البيئي بين المجتمعات المحلية أطلقت جمعية البيئة الفلسطينية مبادرة لزراعة الأشجار ف معرفة المزيد.', 'file_path' => 'app/news-images/B1Zw30n2CO0974u98cfuVYinOdUuca8z0WMM8Qg3.png', 'date' => '2025\11\11', 'address' => 'الضفه الغربية'],
        ];

        $items_en = [
            ['title' => 'Celebrating Palestinian heritage and arts', 'description' => 'The Palestinian Heritage Society is preparing to hold a cultural festival that includes folk arts and music, and aims to promote Palestinian cultural identity and highlight the rich heritage. The Palestinian Environment Society launched an initiative to plant trees in various areas of the West Bank with the aim of improving air quality, combating pollution, and promoting environmental awareness among local communities. Learn more.', 'file_path' => 'news-images/2Iqj06fq3RmBvI9c4dYsNju9nFq3nptVv2liBwWc.png', 'date' => '2025\11\11', 'address' => 'West Bank'],
            ['title' => 'Developing women`s skills in society', 'description' => 'Al-Nour Association announced the launch of a vocational training program for women in rural areas, aimed at enhancing their craft and labor skills and empowering them economically. The Palestinian Environment Society launched an initiative to plant trees in various areas of the West Bank with the goal of improving air quality, combating pollution, and raising environmental awareness among local communities. Learn more', 'file_path' => 'news-images/anxI3hzYTgyZ2RbGkHBRkYqoUow0W1LwsqYkzE0Q.png', 'date' => '2025\11\11', 'address' => 'West Bank'],
            ['title' => 'Launching a tree-planting project to minimize pollution', 'description' => 'The Palestinian Environmental Society launched an initiative to plant trees in various areas of the West Bank with the aim of improving air quality, combating pollution, and promoting environmental awareness among local communities. Learn more.', 'file_path' => 'news-images/B1Zw30n2CO0974u98cfuVYinOdUuca8z0WMM8Qg3.png', 'date' => '2025\11\11', 'address' => 'West Bank'],
        ];

        foreach ($items as $index => $item) {
            $newsItem = Section::create([
                'parent_id' => $news->id,
                'section' => 'news',
                'type' => 'item',
                'order' => $index + 1,
            ]);
            $file = new File();
            $file->fromFile(storage_path($item['file_path']));
            $newsItem->file()->add($file);

            $newsItem->translateContext('en');
            $newsItem->title = $items_en[$index]['title'];
            $newsItem->description = $items_en[$index]['description'];
            $newsItem->date = $items_en[$index]['date'];
            $newsItem->address = $items_en[$index]['address'];
            $newsItem->save();

            $newsItem->translateContext('ar');
            $newsItem->title = $item['title'];
            $newsItem->description = $item['description'];
            $newsItem->date = $item['date'];
            $newsItem->address = $item['address'];
            $newsItem->save();
        }
    }
}
