# YII2-USER-AUTHORIZATION
	• By Default Now User will be able to  Access Admin Panel of Authorization You have to grand Permission yourself
	• Add Following Code 
	
	Path: Project_name\vendor\yiisoft\yii2\web\Controller.php 
	
	Public function beforeAction($action)
	{
	if(!Yii::$app->getModule('admin')->Authorization()){
	echo"<h1>YouDonotHavePermissiontoaccess".$action->uniqueId."</h1>";
	exit;
	}
	
	if(parent::beforeAction($action)){
	if($this->enableCsrfValidation&&Yii::$app->getErrorHandler()->exception===null&&!Yii::$app->getRequest()->validateCsrfToken()){
	thrownewBadRequestHttpException(Yii::t('yii','Unabletoverifyyourdatasubmission.'));
	}
	
	returntrue;
	}
	
	returnfalse;
	}
	
	• You will have to add link on your Menu
