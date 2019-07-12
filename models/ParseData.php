<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class ParseData extends Model
{
    private $url;
    private $curl;
    private $data;

    
    private function curlSetup(){
        $this->curl = curl_init();
        curl_setopt($this->curl, CURLOPT_URL, $this->url);
        curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER,1);
    }
    
    private function curlSetData(){
        $this->data = json_decode(curl_exec($this->curl));
    }

    private function curlDelete(){
        curl_close($this->curl);
    }

    private function getItems(){
        return $this->data && $this->data->items ? $this->data->items : [];
    }

    public function getData($url)
    {
        $this->url = $url;
        $this->curlSetup();
        $this->curlSetData();
        $this->curlDelete();
        
        return $this->getItems();
    }


}
