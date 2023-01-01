<?php

namespace Database\Seeders;

use App\Models\WebsiteContent;
use Illuminate\Database\Seeder;

class WebsiteContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebsiteContent::firstOrCreate(
            ['key' => 'appInfo'],
            ['value' => json_encode([
                'ar'             => [
                    'name'        => 'Suiiz',
                    'slogan'      => 'بيع أسرع، شراء أسهل',
                    'description' =>
                    'آلاف الإعلانات المتاحة فى مصر لبيع البضائع من السيارات، الأثاث، الإلكترونيات إلى قوائم الوظائف والخدمات. مع سويز بيع أسرع، شراء أسهل',
                    'address'     => 'القاهرة، جمهورية مصر العربية',
                ],
                'en'             => [
                    'name'        => 'Suiiz',
                    'slogan'      => 'Sell Faster, Buy Easier',
                    'description' => 'site',
                    'address'     => 'Cairo, Egypt',
                ],
                'appRate'        => '4.8',
                'appReviews'     => '350',
                'contactEmail'   => 'support@suiiz.com',
                'contactPhone'   => '+201144220069',
                'facebookLink'   => 'https://www.facebook.com/suiizapp/',
                'instagramLink'  => 'https://www.linkedin.com/in/mozedan/',
                'linkedinLink'   => 'https://www.linkedin.com/in/suiizapp',
                'playStoreLink'  => 'https://play.google.com/store/apps/details?id=com.alahram.suiiz',
                'appStoreLink'   => 'https://apps.apple.com/eg/app/suiiz/id1586166664',
                'appGallaryLink' => 'https://appgallery.huawei.com/app/C105979585',
            ])]
        );

        WebsiteContent::firstOrCreate(
            ['key' => 'termsOfUse'],
            ['value' => json_encode([
                'ar' => "Suiiz helps you buy you own and sell anything you need within 48 hours. In 2017, we worked on the main idea of the app with great passion for developing the best design that makes the cycle of selling and buying anything and everything easier for users.
                    Following this, we have worked hard to continually improve your Buying and Selling experience by adding a comprehensive feature to match users' needs.
                    We can now provide you with the best experience that you need to buy or sell anything. With millions of available items on the application, you can now find everything you need like cars, apartments, electronics, kitchen, home appliances, and more; also, you can sell\rent anything you have.
                    All that's left is for you to install the app and log in and enjoy buying and selling experience! Suiiz \"Sell Faster, Buy Easier\"
                    ",
                'en' => "Suiiz helps you buy you own and sell anything you need within 48 hours. In 2017, we worked on the main idea of the app with great passion for developing the best design that makes the cycle of selling and buying anything and everything easier for users.
                    Following this, we have worked hard to continually improve your Buying and Selling experience by adding a comprehensive feature to match users' needs.
                    We can now provide you with the best experience that you need to buy or sell anything. With millions of available items on the application, you can now find everything you need like cars, apartments, electronics, kitchen, home appliances, and more; also, you can sell\rent anything you have.
                    All that's left is for you to install the app and log in and enjoy buying and selling experience! Suiiz \"Sell Faster, Buy Easier\"
                    ",
            ],
            )]
        );

        WebsiteContent::firstOrCreate(
            ['key' => 'privacyPolicy'],
            ['value' => json_encode([
                'ar' => "Suiiz helps you buy you own and sell anything you need within 48 hours. In 2017, we worked on the main idea of the app with great passion for developing the best design that makes the cycle of selling and buying anything and everything easier for users.
                    Following this, we have worked hard to continually improve your Buying and Selling experience by adding a comprehensive feature to match users' needs.
                    We can now provide you with the best experience that you need to buy or sell anything. With millions of available items on the application, you can now find everything you need like cars, apartments, electronics, kitchen, home appliances, and more; also, you can sell\rent anything you have.
                    All that's left is for you to install the app and log in and enjoy buying and selling experience! Suiiz \"Sell Faster, Buy Easier\"
                    ",
                'en' => "Suiiz helps you buy you own and sell anything you need within 48 hours. In 2017, we worked on the main idea of the app with great passion for developing the best design that makes the cycle of selling and buying anything and everything easier for users.
                    Following this, we have worked hard to continually improve your Buying and Selling experience by adding a comprehensive feature to match users' needs.
                    We can now provide you with the best experience that you need to buy or sell anything. With millions of available items on the application, you can now find everything you need like cars, apartments, electronics, kitchen, home appliances, and more; also, you can sell\rent anything you have.
                    All that's left is for you to install the app and log in and enjoy buying and selling experience! Suiiz \"Sell Faster, Buy Easier\"
                    ",
            ],
            )]
        );

        WebsiteContent::firstOrCreate(
            ['key' => 'heros'],
            ['value' => json_encode([
                [
                    'en' => [
                        "image"    => 'https://suiiz-org.s3.eu-central-1.amazonaws.com/uploads/website/heros/9QrZcJuguHzZMJgcjIj4ooBQswFXTM5akJJnjvjo.png',
                        "title"    => "Welcome in ",
                        "subtitle" => "We're in all WORLD.",
                        "content"  => "We militate to provide our users with the best buying and selling experience, to make their life more easier and shouldering them to buy and sell anything and everything without struggles on a mission to make people's life easier.",

                    ],
                    'ar' => [
                        'image'    => 'https://suiiz-org.s3.eu-central-1.amazonaws.com/uploads/website/heros/9QrZcJuguHzZMJgcjIj4ooBQswFXTM5akJJnjvjo.png',
                        'title'    => 'مرحبًا في',
                        'subtitle' => 'ستجدنا في جميع أنحاء العالم.',
                        'content'  => 'نسعى جاهدين لتزويد مستخدمينا بأفضل تجرِبة بيع وشراء، لجعل حياتهم أكثر سهولة وتحملهم على شراء وبيع أي شيء وكل شيء دون صعوبة في مهمة لجعل حياة الناس أسهل.',
                    ],
                ],
                [
                    'en' => [
                        "image"    => 'https://suiiz-org.s3.eu-central-1.amazonaws.com/uploads/website/heros/9QrZcJuguHzZMJgcjIj4ooBQswFXTM5akJJnjvjo.png',
                        "title"    => "Sell Anything & Buy Everything",
                        "subtitle" => "",
                        "content"  => "With the Suiiz app, you can buy and sell from hundreds of categories and millions of products. Vehicles, Property, Electronics & Appliances, Furniture & Antiques, Clothing & Jewelry, Beauty Products, Sporting Goods, Nutritional Supplements - Recreational Goods, Pets & Birds, Meat, Fish & Vegetables, Transformers, Generators & Engines, Mining Equipment, and there is a category for jobs as well.",

                    ],
                    'ar' => [
                        'image'    => 'https://suiiz-org.s3.eu-central-1.amazonaws.com/uploads/website/heros/9QrZcJuguHzZMJgcjIj4ooBQswFXTM5akJJnjvjo.png',
                        "title"    => "قم بالتسجيل",
                        "subtitle" => "وابدأ الآن",
                        "content"  => "سجل في Suiiz بسهولة وفي أقل من 30 ثانية، ابدأ رحلتك في عالم Suiiz. في البداية ستحدد الدولة واللغة حتى نتمكن من تسهيل الأمر عليك وابدآ رحلتك في عالم Suiiz.",
                    ],
                ],
                [
                    'en' => [
                        "image"    => 'https://suiiz-org.s3.eu-central-1.amazonaws.com/uploads/website/heros/9QrZcJuguHzZMJgcjIj4ooBQswFXTM5akJJnjvjo.png',
                        "title"    => "Sell Faster",
                        "subtitle" => "",
                        "content"  => "You can easily upload your ad on Suiiz and add images of your product and a full description with all the details to make it easier for the buyer. You can also add videos for your product and locate your site easily and without any commissions.",

                    ],
                    'ar' => [
                        'image'    => 'https://suiiz-org.s3.eu-central-1.amazonaws.com/uploads/website/heros/9QrZcJuguHzZMJgcjIj4ooBQswFXTM5akJJnjvjo.png',
                        "title"    => "بيع أسرع",
                        "subtitle" => "",
                        "content"  => "يمكنك بسهولة تحميل إعلانك على Suiiz وإضافة صور لمنتجك ووصف كامل بكل التفاصيل لتسهيل الأمر على المشتري. يمكنك أيضًا إضافة مقاطع فيديو لمنتجك وتحديد موقعك بسهولة وبدون أي عمولات.",
                    ],
                ],
                [
                    'en' => [
                        "image"    => 'https://suiiz-org.s3.eu-central-1.amazonaws.com/uploads/website/heros/9QrZcJuguHzZMJgcjIj4ooBQswFXTM5akJJnjvjo.png',
                        "title"    => "Easier & Faster",
                        "subtitle" => "",
                        "content"  => "The steps to upload an ad on Suiiz won't take much time. Suiiz support team is available 24 hours a day to receive and review your ad as soon as possible to reach the highest level of customer satisfaction and receive suggestions and complaints.",

                    ],
                    'ar' => [
                        'image'    => 'https://suiiz-org.s3.eu-central-1.amazonaws.com/uploads/website/heros/9QrZcJuguHzZMJgcjIj4ooBQswFXTM5akJJnjvjo.png',
                        "title"    => "أسهل وأسرع",
                        "subtitle" => "",
                        "content"  => "لن تستغرق خطوات تحميل إعلان على Suiiz الكثير من الوقت. فريق دعم Suiiz متاح على مدار 24 ساعة لاستلام ومراجعة إعلانك في أسرع وقت ممكن للوصول إلى أعلى مستوى من رضا العملاء وتلقي الاقتراحات والشكاوى.",
                    ],
                ],
                [
                    'en' => [
                        "image"    => 'https://suiiz-org.s3.eu-central-1.amazonaws.com/uploads/website/heros/9QrZcJuguHzZMJgcjIj4ooBQswFXTM5akJJnjvjo.png',
                        "title"    => "Buy Easier",
                        "subtitle" => "",
                        "content"  => "There are two ways to get in touch on Suiiz, by phone or via Suiiz Chat. You will be able to send a voice note, photos, location and you can also send a file or contract on Suiiz Chat. And to easily complete the sale, you will be able to make a video call on Suiiz Chat.",

                    ],
                    'ar' => [
                        'image'    => 'https://suiiz-org.s3.eu-central-1.amazonaws.com/uploads/website/heros/9QrZcJuguHzZMJgcjIj4ooBQswFXTM5akJJnjvjo.png',
                        "title"    => "شراء أسهل",
                        "subtitle" => "",
                        "content"  => "هناك طريقتان للتواصل على Suiiz، عبر الهاتف أو عبر Suiiz Chat. ستتمكن من إرسال ملاحظة صوتية وصور وموقع ويمكنك أيضًا إرسال ملف أو عقد على Suiiz Chat. ولإتمام عملية البيع بسهولة، ستتمكن من إجراء مكالمة فيديو على Suiiz Chat.",
                    ],
                ],
            ])]
        );

        WebsiteContent::firstOrCreate(
            ['key' => 'about_us'],
            ['value' => json_encode([
                'video'   => 'https://www.youtube.com/embed/DfLntFvBYDQ',
                'content' => [
                    'ar' => "Suiiz helps you buy you own and sell anything you need within 48 hours. In 2017, we worked on the main idea of the app with great passion for developing the best design that makes the cycle of selling and buying anything and everything easier for users.
                    Following this, we have worked hard to continually improve your Buying and Selling experience by adding a comprehensive feature to match users' needs.
                    We can now provide you with the best experience that you need to buy or sell anything. With millions of available items on the application, you can now find everything you need like cars, apartments, electronics, kitchen, home appliances, and more; also, you can sell\rent anything you have.
                    All that's left is for you to install the app and log in and enjoy buying and selling experience! Suiiz \"Sell Faster, Buy Easier\"
                    ",
                    'en' => "Suiiz helps you buy you own and sell anything you need within 48 hours. In 2017, we worked on the main idea of the app with great passion for developing the best design that makes the cycle of selling and buying anything and everything easier for users.
                    Following this, we have worked hard to continually improve your Buying and Selling experience by adding a comprehensive feature to match users' needs.
                    We can now provide you with the best experience that you need to buy or sell anything. With millions of available items on the application, you can now find everything you need like cars, apartments, electronics, kitchen, home appliances, and more; also, you can sell\rent anything you have.
                    All that's left is for you to install the app and log in and enjoy buying and selling experience! Suiiz \"Sell Faster, Buy Easier\"
                    ",
                ],
            ])]
        );

        WebsiteContent::firstOrCreate(
            ['key' => 'features'],
            ['value' => json_encode([
                [
                    'en' => [
                        "image"    => 'https://suiiz-org.s3.eu-central-1.amazonaws.com/uploads/website/heros/9QrZcJuguHzZMJgcjIj4ooBQswFXTM5akJJnjvjo.png',
                        "title"    => "Welcome in ",
                        "subtitle" => "We're in all WORLD.",
                        "content"  => "We militate to provide our users with the best buying and selling experience, to make their life more easier and shouldering them to buy and sell anything and everything without struggles on a mission to make people's life easier.",

                    ],
                    'ar' => [
                        'image'    => 'https://suiiz-org.s3.eu-central-1.amazonaws.com/uploads/website/heros/9QrZcJuguHzZMJgcjIj4ooBQswFXTM5akJJnjvjo.png',
                        'title'    => 'مرحبًا في',
                        'subtitle' => 'ستجدنا في جميع أنحاء العالم.',
                        'content'  => 'نسعى جاهدين لتزويد مستخدمينا بأفضل تجرِبة بيع وشراء، لجعل حياتهم أكثر سهولة وتحملهم على شراء وبيع أي شيء وكل شيء دون صعوبة في مهمة لجعل حياة الناس أسهل.',
                    ],
                ],
                [
                    'en' => [
                        "image"    => 'https://suiiz-org.s3.eu-central-1.amazonaws.com/uploads/website/heros/9QrZcJuguHzZMJgcjIj4ooBQswFXTM5akJJnjvjo.png',
                        "title"    => "Sell Anything & Buy Everything",
                        "subtitle" => "",
                        "content"  => "With the Suiiz app, you can buy and sell from hundreds of categories and millions of products. Vehicles, Property, Electronics & Appliances, Furniture & Antiques, Clothing & Jewelry, Beauty Products, Sporting Goods, Nutritional Supplements - Recreational Goods, Pets & Birds, Meat, Fish & Vegetables, Transformers, Generators & Engines, Mining Equipment, and there is a category for jobs as well.",

                    ],
                    'ar' => [
                        'image'    => 'https://suiiz-org.s3.eu-central-1.amazonaws.com/uploads/website/heros/9QrZcJuguHzZMJgcjIj4ooBQswFXTM5akJJnjvjo.png',
                        "title"    => "قم بالتسجيل",
                        "subtitle" => "وابدأ الآن",
                        "content"  => "سجل في Suiiz بسهولة وفي أقل من 30 ثانية، ابدأ رحلتك في عالم Suiiz. في البداية ستحدد الدولة واللغة حتى نتمكن من تسهيل الأمر عليك وابدآ رحلتك في عالم Suiiz.",
                    ],
                ],
                [
                    'en' => [
                        "image"    => 'https://suiiz-org.s3.eu-central-1.amazonaws.com/uploads/website/heros/9QrZcJuguHzZMJgcjIj4ooBQswFXTM5akJJnjvjo.png',
                        "title"    => "Sell Faster",
                        "subtitle" => "",
                        "content"  => "You can easily upload your ad on Suiiz and add images of your product and a full description with all the details to make it easier for the buyer. You can also add videos for your product and locate your site easily and without any commissions.",

                    ],
                    'ar' => [
                        'image'    => 'https://suiiz-org.s3.eu-central-1.amazonaws.com/uploads/website/heros/9QrZcJuguHzZMJgcjIj4ooBQswFXTM5akJJnjvjo.png',
                        "title"    => "بيع أسرع",
                        "subtitle" => "",
                        "content"  => "يمكنك بسهولة تحميل إعلانك على Suiiz وإضافة صور لمنتجك ووصف كامل بكل التفاصيل لتسهيل الأمر على المشتري. يمكنك أيضًا إضافة مقاطع فيديو لمنتجك وتحديد موقعك بسهولة وبدون أي عمولات.",
                    ],
                ],
                [
                    'en' => [
                        "image"    => 'https://suiiz-org.s3.eu-central-1.amazonaws.com/uploads/website/heros/9QrZcJuguHzZMJgcjIj4ooBQswFXTM5akJJnjvjo.png',
                        "title"    => "Easier & Faster",
                        "subtitle" => "",
                        "content"  => "The steps to upload an ad on Suiiz won't take much time. Suiiz support team is available 24 hours a day to receive and review your ad as soon as possible to reach the highest level of customer satisfaction and receive suggestions and complaints.",

                    ],
                    'ar' => [
                        'image'    => 'https://suiiz-org.s3.eu-central-1.amazonaws.com/uploads/website/heros/9QrZcJuguHzZMJgcjIj4ooBQswFXTM5akJJnjvjo.png',
                        "title"    => "أسهل وأسرع",
                        "subtitle" => "",
                        "content"  => "لن تستغرق خطوات تحميل إعلان على Suiiz الكثير من الوقت. فريق دعم Suiiz متاح على مدار 24 ساعة لاستلام ومراجعة إعلانك في أسرع وقت ممكن للوصول إلى أعلى مستوى من رضا العملاء وتلقي الاقتراحات والشكاوى.",
                    ],
                ],
                [
                    'en' => [
                        "image"    => 'https://suiiz-org.s3.eu-central-1.amazonaws.com/uploads/website/heros/9QrZcJuguHzZMJgcjIj4ooBQswFXTM5akJJnjvjo.png',
                        "title"    => "Buy Easier",
                        "subtitle" => "",
                        "content"  => "There are two ways to get in touch on Suiiz, by phone or via Suiiz Chat. You will be able to send a voice note, photos, location and you can also send a file or contract on Suiiz Chat. And to easily complete the sale, you will be able to make a video call on Suiiz Chat.",

                    ],
                    'ar' => [
                        'image'    => 'https://suiiz-org.s3.eu-central-1.amazonaws.com/uploads/website/heros/9QrZcJuguHzZMJgcjIj4ooBQswFXTM5akJJnjvjo.png',
                        "title"    => "شراء أسهل",
                        "subtitle" => "",
                        "content"  => "هناك طريقتان للتواصل على Suiiz، عبر الهاتف أو عبر Suiiz Chat. ستتمكن من إرسال ملاحظة صوتية وصور وموقع ويمكنك أيضًا إرسال ملف أو عقد على Suiiz Chat. ولإتمام عملية البيع بسهولة، ستتمكن من إجراء مكالمة فيديو على Suiiz Chat.",
                    ],
                ],
            ])]
        );

        WebsiteContent::firstOrCreate(
            ['key' => 'faqs'],
            ['value' => json_encode([
                [
                    'en' => [
                        "question" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
                        "answer"   => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, obcaecati nesciunt unde veniam earum nihil praesentium autem doloribus fugit voluptates esse asperiores ex? Et iure nostrum nisi? Dicta, quos ratione.",
                    ],
                    'ar' => [
                        "question" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
                        "answer"   => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, obcaecati nesciunt unde veniam earum nihil praesentium autem doloribus fugit voluptates esse asperiores ex? Et iure nostrum nisi? Dicta, quos ratione.",
                    ],
                ],
                [
                    'en' => [
                        "question" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
                        "answer"   => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, obcaecati nesciunt unde veniam earum nihil praesentium autem doloribus fugit voluptates esse asperiores ex? Et iure nostrum nisi? Dicta, quos ratione.",
                    ],
                    'ar' => [
                        "question" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
                        "answer"   => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, obcaecati nesciunt unde veniam earum nihil praesentium autem doloribus fugit voluptates esse asperiores ex? Et iure nostrum nisi? Dicta, quos ratione.",
                    ],
                ],
                [
                    'en' => [
                        "question" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
                        "answer"   => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, obcaecati nesciunt unde veniam earum nihil praesentium autem doloribus fugit voluptates esse asperiores ex? Et iure nostrum nisi? Dicta, quos ratione.",
                    ],
                    'ar' => [
                        "question" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
                        "answer"   => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, obcaecati nesciunt unde veniam earum nihil praesentium autem doloribus fugit voluptates esse asperiores ex? Et iure nostrum nisi? Dicta, quos ratione.",
                    ],
                ],
                [
                    'en' => [
                        "question" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
                        "answer"   => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, obcaecati nesciunt unde veniam earum nihil praesentium autem doloribus fugit voluptates esse asperiores ex? Et iure nostrum nisi? Dicta, quos ratione.",
                    ],
                    'ar' => [
                        "question" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
                        "answer"   => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, obcaecati nesciunt unde veniam earum nihil praesentium autem doloribus fugit voluptates esse asperiores ex? Et iure nostrum nisi? Dicta, quos ratione.",
                    ],
                ],
                [
                    'en' => [
                        "question" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
                        "answer"   => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, obcaecati nesciunt unde veniam earum nihil praesentium autem doloribus fugit voluptates esse asperiores ex? Et iure nostrum nisi? Dicta, quos ratione.",
                    ],
                    'ar' => [
                        "question" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
                        "answer"   => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, obcaecati nesciunt unde veniam earum nihil praesentium autem doloribus fugit voluptates esse asperiores ex? Et iure nostrum nisi? Dicta, quos ratione.",
                    ],
                ],
                [
                    'en' => [
                        "question" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
                        "answer"   => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, obcaecati nesciunt unde veniam earum nihil praesentium autem doloribus fugit voluptates esse asperiores ex? Et iure nostrum nisi? Dicta, quos ratione.",
                    ],
                    'ar' => [
                        "question" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
                        "answer"   => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, obcaecati nesciunt unde veniam earum nihil praesentium autem doloribus fugit voluptates esse asperiores ex? Et iure nostrum nisi? Dicta, quos ratione.",
                    ],
                ],
            ])]
        );
    }
}
