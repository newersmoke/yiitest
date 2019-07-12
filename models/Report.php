<?php

namespace app\models;
use yii\db\ActiveRecord;

class Report extends ActiveRecord
{

    public static function tableName()
    {
        return 'reports';
    }
    
    /**
     * {@inheritdoc}
     */
    public function Id()
    {
        return $this->id1;
    }

    /**
     * {@inheritdoc}
     */
    public function lastModify()
    {
        return date('Y-m-d H:i:s', $this->last_modify);
    }



    
}
