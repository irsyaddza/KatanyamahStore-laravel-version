<?php

namespace Database\Seeders;

use App\Models\Faq;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Skin;
use App\Models\Team;
use App\Models\User;
use App\Models\About;
use App\Models\Contact;
use App\Models\Pricing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Contact::create([
            'email' => 'irsyaddza@katanyamah.my.id',
            'phone' => '+6282233965010'
        ]);
        Contact::create([
            'email' => 'nopalk@katanyamah.my.id',
            'phone' => '+6282299876666'
        ]);

        Faq::create([
            'question' => 'What payment methods do you accept?',
            'answer' => 'We accept payments via Indonesian bank transfer, PayPal, e-wallets such as GoPay and Dana.',
        ]);
        Faq::create([
            'question' => 'For making skins and other things, do you often give discounts?',
            'answer' => 'Yes, we sometimes give out discounts on special days, and we even give out free skins to all of you',
        ]);
        Faq::create([
            'question' => 'I want to retexture my skin and also headswap, is the material from the customer or from the modder?',
            'answer' => 'For retexture and headswap, the materials are from the customer, modders only apply the materials from the customer to your skin.',
        ]);
        Faq::create([
            'question' => 'What do you think about creating an environment? Can it be less than IDR 20,000? Or could it be more than the initial price?',
            'answer' => 'The starting price is IDR 20,000, and the maximum price depends on the difficulty and the number of objects',
        ]);
        Faq::create([
            'question' => 'Also, does the environment mod you create have collisions?',
            'answer' => 'The environment we creating doesnt have collisions since we provide mods for roleplay servers, and roleplay servers dont allow environment mods with collisions.',
        ]);

        About::create([
            'story' => 'Starting in 2023, it began with a novice modder who was trying to learn the ins and outs of modding GTA San Andreas, 
            he tried to learn the field of skin modding using YouTube tutorials. After being able to master different ways, he got 
            from YouTube tutorials. This modder intends to open a GTA San Andreas skin editing service, he invites his friend who is 
            also studying GTA San Andreas modding. And thats when Katanyamah Store started to enter the GTA San Andreas skin modding 
            market.',
            'story2' => 'Every day, the 2 modders of Katanyamah Store try to learn about modding the environment and vehicles, and to date they are still growing.',
            'story_img' => 'https://www.upload.ee/image/17922172/skin7.png',
        ]);

        Team::create([
            'team_name' => 'Abidin',
            'team_rank' => 'Modder',
            'team_img' => 'https://www.upload.ee/image/17922172/skin7.png',
        ]);
        Team::create([
            'team_name' => 'Nopal',
            'team_rank' => 'Founder',
            'team_img' => 'https://www.upload.ee/image/17922172/skin7.png',
        ]);

        Skin::Factory(100)->create();
        Faq::Factory(10)->create();

        Pricing::create([
            'price_title' => 'Custom Skin',
            'price_desc' => 'Make your own custom skin',
            'price' => 'Rp20.000',
            'price_feature1' => 'Full request',
            'price_feature2' => 'Cheap price',
            'price_feature3' => 'Good quality',
            'price_feature4' => 'Warranty',
            'price_feature5' => 'Fast respons',
        ]);
        Pricing::create([
            'price_title' => 'Environtment',
            'price_desc' => 'Make your own custom skin',
            'price' => 'Rp20.000+',
            'price_feature1' => 'Full request',
            'price_feature2' => 'Cheap price',
            'price_feature3' => 'Good quality',
            'price_feature4' => 'Warranty',
            'price_feature5' => 'Fast respons',
        ]);
        Pricing::create([
            'price_title' => 'Retexture & Headswap',
            'price_desc' => 'Make your own custom skin',
            'price' => 'Rp10.000',
            'price_feature1' => 'Full request',
            'price_feature2' => 'Cheap price',
            'price_feature3' => 'Good quality',
            'price_feature4' => 'Warranty',
            'price_feature5' => 'Fast respons',
        ]);
    }
}
