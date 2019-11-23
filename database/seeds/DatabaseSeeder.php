<?php
use App\User;
use App\Models\Settings;
use App\Enums\SettingType;
use App\Models\Locale;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'coinjapanweb@gmail.com',
            'password' => Hash::make('1234'),
            'is_protected' => true,
            'role' => 2
        ]);

        Settings::create([
            'setting_type' => SettingType::InstagramRefreshToken,
            'value' => null
        ]);

        Settings::create([
            'setting_type' => SettingType::InstagramLastUpdateDate,
            'value' => null
        ]);

        // defoult values
        $page_index = 'home';
        // column names
        $column1 = 'locale_index';
        $column2 = 'page_index';
        $column3 = 'section_index';
        $column4 = 'slug';
        $column5 = 'text';
        foreach(['en', 'jp'] as $local) {
        
        // header section
        Locale::create([
            $column1 =>$local,
            $column2 => $page_index,
            $column3 => 'HEADER',
            $column4 => 'header-title'
        ]);
        
        Locale::create([
            $column1 =>$local,
            $column2 => $page_index,
            $column3 => 'header',
            $column4 => 'header-text'
        ]);
        
        // digital section 
        
        Locale::create([
            $column1 =>$local,
            $column2 => $page_index,
            $column3 => 'DIGITAL',
            $column4 => 'work-with-stars-title'
        ]);
        
        Locale::create([
            $column1 =>$local,
            $column2 => $page_index,
            $column3 => 'DIGITAL',
            $column4 => 'instagram-followers-label'
        ]);
        
        Locale::create([
            $column1 =>$local,
            $column2 => $page_index,
            $column3 => 'DIGITAL',
            $column4 => 'golden-discs-label'
        ]);
        
        Locale::create([
            $column1 =>$local,
            $column2 => $page_index,
            $column3 => 'DIGITAL',
            $column4 => 'you-tube-views-label'
        ]);
        
        Locale::create([
            $column1 =>$local,
            $column2 => $page_index,
            $column3 => 'DIGITAL',
            $column4 => 'diamonds-and-digital-title'
        ]);
        
        Locale::create([
            $column1 =>$local,
            $column2 => $page_index,
            $column3 => 'DIGITAL',
            $column4 => 'digital-text'
        ]);
        
        // brands section 
        
        Locale::create([
            $column1 =>$local,
            $column2 => $page_index,
            $column3 => 'BRANDS',
            $column4 => 'celebrities-title'
        ]);
        
        Locale::create([
            $column1 =>$local,
            $column2 => $page_index,
            $column3 => 'BRANDS',
            $column4 => 'brands-title'
        ]);
        
        Locale::create([
            $column1 =>$local,
            $column2 => $page_index,
            $column3 => 'BRANDS',
            $column4 => 'brands-text'
        ]);
        
        // service section 
        
        Locale::create([
            $column1 =>$local,
            $column2 => $page_index,
            $column3 => 'SERVICE',
            $column4 => 'awards-n-charts-title'
        ]);
        
        Locale::create([
            $column1 =>$local,
            $column2 => $page_index,
            $column3 => 'SERVICE',
            $column4 => 'grammys-sub-title'
        ]);
        
        Locale::create([
            $column1 =>$local,
            $column2 => $page_index,
            $column3 => 'SERVICE',
            $column4 => 'grammys-text'
        ]);
        
        Locale::create([
            $column1 =>$local,
            $column2 => $page_index,
            $column3 => 'SERVICE',
            $column4 => 'billboard-sub-title'
        ]);
        
        Locale::create([
            $column1 =>$local,
            $column2 => $page_index,
            $column3 => 'SERVICE',
            $column4 => 'billboard-text'
        ]);
        
        Locale::create([
            $column1 =>$local,
            $column2 => $page_index,
            $column3 => 'SERVICE',
            $column4 => 'gold-n-platinum-sub-title'
        ]);
        
        Locale::create([
            $column1 =>$local,
            $column2 => $page_index,
            $column3 => 'SERVICE',
            $column4 => 'gold-n-platinum-text'
        ]);
        
        Locale::create([
            $column1 =>$local,
            $column2 => $page_index,
            $column3 => 'SERVICE',
            $column4 => 'american-music-awards-sub-title'
        ]);
        
        Locale::create([
            $column1 =>$local,
            $column2 => $page_index,
            $column3 => 'SERVICE',
            $column4 => 'american-music-awards-text'
        ]);
        
                    Locale::create([
                        $column1 =>$local,
                        $column2 => $page_index,
                        $column3 => 'SERVICE',
                        $column4 => 'creative-branding-title'
                    ]);
        
                    Locale::create([
                        $column1 =>$local,
                        $column2 => $page_index,
                        $column3 => 'SERVICE',
                        $column4 => 'image-strategy-sub-title'
                    ]);
        
                    Locale::create([
                        $column1 =>$local,
                        $column2 => $page_index,
                        $column3 => 'SERVICE',
                        $column4 => 'image-strategy-text'
                    ]);
        
                    Locale::create([
                        $column1 =>$local,
                        $column2 => $page_index,
                        $column3 => 'SERVICE',
                        $column4 => 'music-video-creation-sub-title'
                    ]);
        
                    Locale::create([
                        $column1 =>$local,
                        $column2 => $page_index,
                        $column3 => 'SERVICE',
                        $column4 => 'music-video-creation-text'
                    ]);
        
                    Locale::create([
                        $column1 =>$local,
                        $column2 => $page_index,
                        $column3 => 'SERVICE',
                        $column4 => 'image-book-sub-title'
                    ]);
        
                    Locale::create([
                        $column1 =>$local,
                        $column2 => $page_index,
                        $column3 => 'SERVICE',
                        $column4 => 'image-book-text'
                    ]);
        
                    Locale::create([
                        $column1 =>$local,
                        $column2 => $page_index,
                        $column3 => 'SERVICE',
                        $column4 => 'media-channel-selection-sub-title'
                    ]);
        
                    Locale::create([
                        $column1 =>$local,
                        $column2 => $page_index,
                        $column3 => 'SERVICE',
                        $column4 => 'media-channel-selection-text'
                    ]);
        
                    Locale::create([
                        $column1 =>$local,
                        $column2 => $page_index,
                        $column3 => 'SERVICE',
                        $column4 => 'digital-promotion-title'
                    ]);
        
                    Locale::create([
                        $column1 =>$local,
                        $column2 => $page_index,
                        $column3 => 'SERVICE',
                        $column4 => 'you-tube-sub-title'
                    ]);
        
                    Locale::create([
                        $column1 =>$local,
                        $column2 => $page_index,
                        $column3 => 'SERVICE',
                        $column4 => 'you-tube-text'
                    ]);
        
                    Locale::create([
                        $column1 =>$local,
                        $column2 => $page_index,
                        $column3 => 'SERVICE',
                        $column4 => 'spotify-sub-title'
                    ]);
        
                    Locale::create([
                        $column1 =>$local,
                        $column2 => $page_index,
                        $column3 => 'SERVICE',
                        $column4 => 'spotify-text'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'SERVICE',
                        $column4 => 'instagram-sub-title'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'SERVICE',
                        $column4 => 'instagram-text'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'SERVICE',
                        $column4 => 'apple-music-n-i-tunes-sub-title'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'SERVICE',
                        $column4 => 'apple-music-n-i-tunes-text'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'SERVICE',
                        $column4 => 'collaboration-with-celebrities-title'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'SERVICE',
                        $column4 => 'influencer-matching-sub-title'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'SERVICE',
                        $column4 => 'influencer-matching-text'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'SERVICE',
                        $column4 => 'features-sub-title'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'SERVICE',
                        $column4 => 'features-text'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'SERVICE',
                        $column4 => 'dj-remixes-sub-title'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'SERVICE',
                        $column4 => 'dj-remixes-text'
                    ]);
        
                    // contact form 
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'CONTACT-FORM',
                        $column4 => 'contact-us-form-title'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'CONTACT-FORM',
                        $column4 => 'select-label'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'CONTACT-FORM',
                        $column4 => 'select-artist-option'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'CONTACT-FORM',
                        $column4 => 'select-promouter-option'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'CONTACT-FORM',
                        $column4 => 'select-manager-option'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'CONTACT-FORM',
                        $column4 => 'select-other-option'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'CONTACT-FORM',
                        $column4 => 'select-not-chossen-error'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'CONTACT-FORM',
                        $column4 => 'input-email'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'CONTACT-FORM',
                        $column4 => 'input-email-required-error'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'CONTACT-FORM',
                        $column4 => 'input-email-invalid-error'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'CONTACT-FORM',
                        $column4 => 'input-phone'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'CONTACT-FORM',
                        $column4 => 'input-name'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'CONTACT-FORM',
                        $column4 => 'input-name-required-error'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'CONTACT-FORM',
                        $column4 => 'textarea-text'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'CONTACT-FORM',
                        $column4 => 'textarea-text-requires-error'
                    ]);
        
                    Locale::create([
                        $column1 => $local,
                        $column2 => $page_index,
                        $column3 => 'CONTACT-FORM',
                        $column4 => 'submit-button-title'
                    ]);
        }
    }
}
