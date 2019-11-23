<?php
namespace App\Services;

use App\Models\Settings;
use App\Models\Photo;
use App\Enums\SettingType;
use GuzzleHttp\Client;

class InstagramService
{
    public $is_synchronizable = false;
    protected $url;
    protected $http;
    protected $headers;

    public function __construct()
    {
        $setting = Settings::where('setting_type', '=', SettingType::InstagramRefreshToken)->first();

        $refresh_token = '';
        
        if(!is_null($setting)) {
            $refresh_token = $setting->value;
        }

        $this->url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=' . $refresh_token;
       
        $this->headers = [
            'cache-control' => 'private, no-cache, no-store, must-revalidate',
            'content-type' => 'application/json; charset=utf-8'
        ];

        $this->http = new CLient();

        $last_update = Settings::where('setting_type', '=', SettingType::InstagramLastUpdateDate)->first();

        if(!is_null($last_update) && $last_update->value != null)
        {
            $last_date = new \DateTime($last_update->value);
            $last_date->add(new \DateInterval('P1D'));
            $current_date = new \DateTime(date("Y-m-d H:i:s"));

            if($current_date >= $last_date) {
                $this->is_synchronizable = true;
            }
        }
    }

    public function getPhotos() {
        
        
        $resultArr = [];

        $url = $this->url;

        do {
            $request = $this->http->get($url, [
                'headers'         => $this->headers,
                'timeout'         => 30,
                'connect_timeout' => true,
                'http_errors'     => true,
            ]);

            $response = $request ? $request->getBody()->getContents() : null;
            $status = $request ? $request->getStatusCode() : 500;

            $decodedResponse = null;

            $url = null;

            if ($response && $status === 200 && $response !== 'null') {
                $decodedResponse = json_decode($response, true);
                $resultArr = array_merge($resultArr, $decodedResponse['data']);

                if($decodedResponse['pagination']) {
                    $url = $decodedResponse['pagination']['next_url'];
                }
            }
        } while($url);

        return $resultArr;
    }

    public function synchronize()
    {
        $photos = $this->getPhotos();

        foreach($photos as $photo) {
            $db_photo = Photo::where('instagram_photo_id', '=', $photo['id'])->first();

            if($db_photo == null) {
                $photo_list = $photo['images'];
               
                $new_item = Photo::create([
                    'instagram_photo_id' => $photo['id'],
                    'thumbnail_url' => $photo_list['thumbnail']['url'],
                    'low_resolution_url' => $photo_list['low_resolution']['url'],
                    'standard_resolution_url' => $photo_list['standard_resolution']['url']
                ]);
                $new_item->save();
            }
        }

        $last_update = Settings::where('setting_type', '=', SettingType::InstagramLastUpdateDate)->first();

        $last_update->value = date("Y-m-d H:i:s");

        $last_update->save();
    }

    public function delete($id) {
        $photo = Photo::find($id);
        $photo->is_deleted = true;
        $photo->save();
    }
}