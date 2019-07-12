<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\Report;
use app\models\ParseData;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ParseController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($url = '', $limit = 100)
    {
        echo 'Start' . "\n";
        
        if(!$url){
            exit(ExitCode::NOINPUT);
        }
        
        $parse = new ParseData();
        $data = $parse->getData($url);
        
        if(empty($data)){
             exit(ExitCode::NOHOST);
        }
        
        
        $save = [];
        $startInd = count($data) - $limit < 0 ? 0 : count($data) - $limit;
        
        // 100 последних записей из массива от 0 индекса до -100
        foreach (array_slice($data, $startInd, $limit) as $item) {
            $save[] = [
                'id1' => $item->id,
                'internal_id' => $item->internal_id, 
                'last_modify' => date('Y-m-d H:i:s', strtotime($item->last_modify)), 
                'regulator' => $item->regulator
            ];
        }
        
        \Yii::$app->db->createCommand()->batchInsert('reports', ['id1', 'internal_id', 'last_modify', 'regulator'], $save)->execute();
        exit(ExitCode::OK);
    }
    
    
    
    
}
