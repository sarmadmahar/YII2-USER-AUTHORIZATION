<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use Yii;
use app\modules\admin\models\TBLAUTHORIZATION;
use yii\data\ActiveDataProvider;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        //$identity_table=new Yii::$app->user->identityClass();
        $model=new TBLAUTHORIZATION();
        $msg="";

        if ($model->load(Yii::$app->request->post())) {
            if($model->save()) {
                $msg = "Save Successfully";
            }
            else{
                $msg="Fail to Save";
            }
        }

        $dataProvider = new ActiveDataProvider([
            'query' => TBLAUTHORIZATION::find(),
            'pagination' => [
                'pageSize' => 300,
            ],

        ]);
        return $this->render('index',['model'=>$model,'dataProvider'=>$dataProvider,'msg'=>$msg]);
    }


}
