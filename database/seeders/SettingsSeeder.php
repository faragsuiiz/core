<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        setting([
            "terms"           => "The Website and the Service of the application are provided to you are subject to these SUIIZ Terms of Use. For the purpose of the Terms and wherever the context so requires,  \r\nthe terms 'you' and “your” shall mean any\r\nperson who uses the Website or the Application  \r\nin any manner whatsoever including persons browsing the Website and its content, posting comments or any content or responding to any advertisements or content on the Website. By accessing, browsing or using the Website or Service, you agree to comply with these Terms. Additionally, when using a portion of the Service, you agree to conform to any applicable posted guidelines for such Service, which may change or be updated from time to time at SUIIZ’s sole discretion. You understand and agree that you are solely responsible for reviewing these Terms from time to time. Should you object to any term or condition of these Terms, any guideline, or any subsequent changes thereto or become unhappy with SUIIZ or the Service in any way, your only choice is to immediately discontinue use of the SUIIZ Website. These Terms may be updated by SUIIZ at any time at its sole discretion. SUIIZ may send you notices of changes to the Website or the Terms pursuant to Section xxi (I) herein. SUIIZ may provide a translation of the English version of the Terms into other languages. You understand and agree that any translation of the Terms into other languages is for your convenience only and that the English version governs the terms of your relationship with SUIIZ. Furthermore, if there are any inconsistencies between the English version of the Terms and any translation, the English version of the Terms shall govern.",
            "about_us"        => "Suiiz is an E-commerce application that is owned by Al Ahram Group of companies and factories.\r\nAl Ahram was founded in 2011 in Egypt, in the name of Eng. Ahmed Hussien, Chairman. We are present in more than 25 countries around the world and we have almost 120 representative offices. We organized many successful commercial and industrial profile higher global companies in Europe, USA, UK, Germany, Middle East and some other countries.\r\n\r\nSuiiz is owned by AL Ahram. Our Mission is providing consumers high-quality of products and an enjoyable safe experience of online shopping at a very relaxing and organized application and we aim for smooth cooperation and hard work to establish trusting relationships with our business partners and customers.  We are always working for your convenience whether you are buyer or seller you will find the easiness of buying and selling through SUIIZ.",
            "phone"           => "[\"0223876066\",\"0223876088\",\"01272496660\"]",
            "email"           => "[\"alahram.group.world@gmail.com\",\"alahram.group.eg@gmail.com\"]",
            "fb_link"         => "https://facebook.com",
            "tw_link"         => "https://facebook.com",
            "youtube_link"    => "https://facebook.com",
            "inst_link"       => "https://facebook.com",
            "whatsapp"        => "https://facebook.com",
            "fax"             => "0223876066",
            "latitude"        => 444444.0,
            "longitude"       => 44444.0,
            "data_updated_at" => "2022-02-20T10:22:26.000Z",
        ]);

        setting()->save();
    }
}
