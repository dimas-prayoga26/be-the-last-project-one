<?php

namespace Database\Seeders;

use App\Enums\SocialPlatform;
use App\Models\Designer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DesignerSeeder extends Seeder
{
    /**
     * Fictional placeholder members of the collective. Replace them through the admin panel.
     */
    public function run(): void
    {
        foreach ($this->designers() as $position => $data) {
            $designer = Designer::updateOrCreate(
                ['slug' => Str::slug($data['name'])],
                [
                    'name' => $data['name'],
                    'title' => $data['title'],
                    'email' => Str::lower(Str::before($data['name'], ' ')).'@thelatestproject.id',
                    'location' => $data['location'],
                    'bio' => $data['bio'],
                    'socials' => [
                        ['platform' => SocialPlatform::Instagram->value, 'url' => 'https://www.instagram.com/'.$data['handle']],
                        ['platform' => $data['second_platform']->value, 'url' => $data['second_url']],
                    ],
                    'is_published' => true,
                    'sort_order' => $position,
                ],
            );

            $photo = storage_path("app/seed-images/people/{$data['photo']}");

            if (is_file($photo) && ! $designer->hasMedia('photo')) {
                $designer->addMedia($photo)->preservingOriginal()->toMediaCollection('photo');
            }
        }
    }

    /**
     * @return list<array{name: string, title: array<string, string>, location: string, bio: array<string, string>, handle: string, second_platform: SocialPlatform, second_url: string, photo: string}>
     */
    private function designers(): array
    {
        return [
            [
                'name' => 'Adhitya Pranata',
                'title' => ['en' => 'Architect', 'id' => 'Arsitek'],
                'location' => 'Jakarta, Indonesia',
                'bio' => [
                    'en' => 'Adhitya designs commercial and residential buildings that answer the tropical climate with deep shade, cross ventilation and honest materials. His work moves between office towers and small family homes.',
                    'id' => 'Adhitya merancang bangunan komersial dan hunian yang menjawab iklim tropis lewat bayangan yang dalam, ventilasi silang, dan material yang jujur. Karyanya bergerak di antara menara perkantoran dan rumah keluarga yang kecil.',
                ],
                'handle' => 'adhitya.pranata',
                'second_platform' => SocialPlatform::LinkedIn,
                'second_url' => 'https://www.linkedin.com/in/adhitya-pranata',
                'photo' => 'm01.jpg',
            ],
            [
                'name' => 'Sekar Ayuningtyas',
                'title' => ['en' => 'Interior Designer', 'id' => 'Desainer Interior'],
                'location' => 'Bandung, Indonesia',
                'bio' => [
                    'en' => 'Sekar creates calm, light-filled interiors with natural textures and carefully edited details. She works on homes, studios and small retail spaces.',
                    'id' => 'Sekar menciptakan interior yang tenang dan terang dengan tekstur alami serta detail yang dipilih dengan cermat. Ia mengerjakan rumah, studio, dan ruang ritel kecil.',
                ],
                'handle' => 'sekar.ayu.studio',
                'second_platform' => SocialPlatform::Pinterest,
                'second_url' => 'https://www.pinterest.com/sekarayuningtyas',
                'photo' => 'w01.jpg',
            ],
            [
                'name' => 'Raka Wibisono',
                'title' => ['en' => 'Architect', 'id' => 'Arsitek'],
                'location' => 'Bali, Indonesia',
                'bio' => [
                    'en' => 'Raka builds villas, retreats and courtyard houses that open to the landscape. He is interested in local building craft and how it can meet contemporary living.',
                    'id' => 'Raka membangun vila, tempat peristirahatan, dan rumah berhalaman yang terbuka ke lanskap. Ia tertarik pada keterampilan membangun lokal dan bagaimana hal itu bertemu dengan cara hidup masa kini.',
                ],
                'handle' => 'raka.wibisono',
                'second_platform' => SocialPlatform::Behance,
                'second_url' => 'https://www.behance.net/rakawibisono',
                'photo' => 'm02.jpg',
            ],
            [
                'name' => 'Nadia Kusumawardani',
                'title' => ['en' => 'Interior Designer', 'id' => 'Desainer Interior'],
                'location' => 'Jakarta, Indonesia',
                'bio' => [
                    'en' => 'Nadia designs workplaces and hospitality interiors where planning and atmosphere carry equal weight. Her projects favour glass, steel and warm timber.',
                    'id' => 'Nadia merancang interior kantor dan hospitality yang memberi bobot setara pada tata ruang dan suasana. Proyeknya banyak memakai kaca, baja, dan kayu yang hangat.',
                ],
                'handle' => 'nadia.kusuma.interior',
                'second_platform' => SocialPlatform::LinkedIn,
                'second_url' => 'https://www.linkedin.com/in/nadia-kusumawardani',
                'photo' => 'w02.jpg',
            ],
            [
                'name' => 'Bima Harjono',
                'title' => ['en' => 'Product Designer', 'id' => 'Desainer Produk'],
                'location' => 'Yogyakarta, Indonesia',
                'bio' => [
                    'en' => 'Bima designs furniture and everyday objects with workshops across Java. He prototypes by hand and keeps production close to the makers.',
                    'id' => 'Bima merancang furnitur dan benda sehari-hari bersama bengkel-bengkel di Jawa. Ia membuat prototipe dengan tangan dan menjaga produksi tetap dekat dengan para perajin.',
                ],
                'handle' => 'bima.harjono',
                'second_platform' => SocialPlatform::Behance,
                'second_url' => 'https://www.behance.net/bimaharjono',
                'photo' => 'm03.jpg',
            ],
            [
                'name' => 'Laras Setyaningrum',
                'title' => ['en' => 'Landscape Architect', 'id' => 'Arsitek Lanskap'],
                'location' => 'Bali, Indonesia',
                'bio' => [
                    'en' => 'Laras shapes gardens, terraces and public parks around native planting and water. She often collaborates with architects from the first sketch.',
                    'id' => 'Laras membentuk taman, teras, dan taman publik dengan tanaman lokal dan air sebagai dasarnya. Ia kerap berkolaborasi dengan arsitek sejak sketsa pertama.',
                ],
                'handle' => 'laras.landscape',
                'second_platform' => SocialPlatform::Website,
                'second_url' => 'https://example.com/laras',
                'photo' => 'w03.jpg',
            ],
            [
                'name' => 'Dimas Arya Putra',
                'title' => ['en' => 'Urban Planner', 'id' => 'Perencana Kota'],
                'location' => 'Surabaya, Indonesia',
                'bio' => [
                    'en' => 'Dimas works on masterplans and neighbourhood revitalisation with a focus on walkable streets and shared green space.',
                    'id' => 'Dimas mengerjakan rencana induk dan revitalisasi kawasan dengan fokus pada jalan yang ramah pejalan kaki dan ruang hijau bersama.',
                ],
                'handle' => 'dimas.aryaputra',
                'second_platform' => SocialPlatform::LinkedIn,
                'second_url' => 'https://www.linkedin.com/in/dimas-arya-putra',
                'photo' => 'm04.jpg',
            ],
            [
                'name' => 'Kirana Maheswari',
                'title' => ['en' => 'Furniture Designer', 'id' => 'Desainer Furnitur'],
                'location' => 'Jepara, Indonesia',
                'bio' => [
                    'en' => 'Kirana designs furniture with Jepara carpenters, pairing traditional joinery with quiet contemporary lines.',
                    'id' => 'Kirana merancang furnitur bersama para tukang kayu Jepara, memadukan sambungan tradisional dengan garis kontemporer yang tenang.',
                ],
                'handle' => 'kirana.maheswari',
                'second_platform' => SocialPlatform::Pinterest,
                'second_url' => 'https://www.pinterest.com/kiranamaheswari',
                'photo' => 'w04.jpg',
            ],
            [
                'name' => 'Fajar Nugroho',
                'title' => ['en' => 'Architect', 'id' => 'Arsitek'],
                'location' => 'Semarang, Indonesia',
                'bio' => [
                    'en' => 'Fajar designs retail, office and residential buildings with a precise, restrained vocabulary of brick, concrete and steel.',
                    'id' => 'Fajar merancang bangunan ritel, kantor, dan hunian dengan bahasa yang presisi dan bersahaja dari bata, beton, dan baja.',
                ],
                'handle' => 'fajar.nugroho.arch',
                'second_platform' => SocialPlatform::LinkedIn,
                'second_url' => 'https://www.linkedin.com/in/fajar-nugroho',
                'photo' => 'm05.jpg',
            ],
            [
                'name' => 'Ayu Ratnasari',
                'title' => ['en' => 'Interior Designer', 'id' => 'Desainer Interior'],
                'location' => 'Bali, Indonesia',
                'bio' => [
                    'en' => 'Ayu designs restaurants, cafés and homes where lighting and texture set the mood. Her interiors are warm, tactile and made to be used.',
                    'id' => 'Ayu merancang restoran, kafe, dan rumah yang suasananya dibangun lewat cahaya dan tekstur. Interiornya hangat, kaya rasa, dan dibuat untuk dipakai.',
                ],
                'handle' => 'ayu.ratnasari',
                'second_platform' => SocialPlatform::Behance,
                'second_url' => 'https://www.behance.net/ayuratnasari',
                'photo' => 'w05.jpg',
            ],
            [
                'name' => 'Gilang Ramadhan',
                'title' => ['en' => 'Visual Merchandising Designer', 'id' => 'Desainer Visual Merchandising'],
                'location' => 'Jakarta, Indonesia',
                'bio' => [
                    'en' => 'Gilang designs booths, window displays and retail installations that are built fast and reused often.',
                    'id' => 'Gilang merancang booth, etalase, dan instalasi ritel yang cepat dibangun dan bisa dipakai berulang kali.',
                ],
                'handle' => 'gilang.ramadhan.vm',
                'second_platform' => SocialPlatform::TikTok,
                'second_url' => 'https://www.tiktok.com/@gilangramadhan.vm',
                'photo' => 'm06.jpg',
            ],
            [
                'name' => 'Maya Anindita',
                'title' => ['en' => 'Product Designer', 'id' => 'Desainer Produk'],
                'location' => 'Bandung, Indonesia',
                'bio' => [
                    'en' => 'Maya designs objects and packaging for small brands, from ceramic tableware to everyday carry. She cares about how things feel in the hand.',
                    'id' => 'Maya merancang benda dan kemasan untuk merek-merek kecil, dari peralatan makan keramik hingga barang bawaan sehari-hari. Ia peduli pada rasa sebuah benda di tangan.',
                ],
                'handle' => 'maya.anindita',
                'second_platform' => SocialPlatform::Behance,
                'second_url' => 'https://www.behance.net/mayaanindita',
                'photo' => 'w06.jpg',
            ],
        ];
    }
}
