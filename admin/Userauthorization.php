<?php

namespace app\modules\admin;
use app\modules\admin\models\TBLAUTHORIZATION;
use Yii;
/**
 * admin module definition class
 */
class Userauthorization extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    public function Authorization($myaction)
    {

        ####### Default pages to be allowed
        if($myaction=='site/logout' || $myaction=='site/login'){
            return true;
        }

        ######### get page Permission ################
        /*
         * We do not know yet either user permission exits or group permission in auth)desc
         * */
        $rows = $this->getPage($myaction);
        //print_r($rows);
        if (sizeof($rows) > 0) {
            //echo $rows[0]->AUTH_TYPE;
            $isvalid=false;
            for($i=0;$i<sizeof($rows);$i++){
                if ($rows[$i]->AUTH_TYPE == 'user') {
                    if($this->getUser($myaction, Yii::$app->user->identity->USERID)){return true;}
                } else {
                    if($this->getGroup($myaction, Yii::$app->user->identity->GROUPID)){return true;}
                }

            }// end of for loop

        }
            return false;
    }
    public function getPage($myaction){
        $model=new TBLAUTHORIZATION();
        $rows=$model->find()->where(['PAGE'=>$myaction])->all();
        return $rows;
    }
    public function getPageByUser($myaction,$USERID){
        $model=new TBLAUTHORIZATION();
        $rows=$model->find()->where(['PAGE'=>$myaction,'AUTH_DESC'=>$USERID])->all();
        return $rows;
    }
    public function getUser($myaction,$USERID){
        $rows = $this->getPageByUser($myaction,$USERID);
        if (sizeof($rows) > 0) {
            $identity_table = new Yii::$app->user->identityClass();
            $rows = $identity_table->find()->where(['USERID' => $USERID])->all();
            if (sizeof($rows) > 0) {
                return true;
            } else {
                return false;
            }
        }else{
            return false;
        }
    }
    public function getGroup($myaction,$GROUPID){
        $rows = $this->getPageByUser($myaction,$GROUPID);
        if (sizeof($rows) > 0) {
        $identity_table=new Yii::$app->user->identityClass();
        $rows=$identity_table->find()->where(['GROUPID'=>$GROUPID])->all();
        if(sizeof($rows)>0) {
            return true;
        }else{
            return false;
        }
        }else{
            return false;
        }
    }

}
