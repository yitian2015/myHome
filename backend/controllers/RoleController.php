<?php

namespace backend\controllers;

use yii\filters\AccessControl;
use yii\rbac\DbManager;
use backend\models\User;
use backend\models\RoleForm;
use yii\data\ArrayDataProvider;
use common\controllers\DController;
use common\models\Util;

class RoleController extends DController
{
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['index', 'update'],
				'rules' => [
				    [
					'allow' => true,
					'actions' => ['index', 'update'],
					'roles' => ['author'],
				    ],
				],
			]
		];
	  }


    public function actionIndex()
    {
	$user = new User;
	$provider = $user->getAllRolesData(); 	
        return $this->render('index', [
		'dataProvider' => $provider,
	]);
    }


    public function actionCreate($item_name)
    {
	$mainMenus = $this->mainMenus;	
	$util = new Util;
	$permissions = array_unique($util->getAllMenuContext($mainMenus));	
	$model = new RoleForm;
	$allPermissions = $model->getAllPermissions();
	$data = $model->alreadyGetPermissionByTag($permissions, $allPermissions);
	$provider = $model->addPermission($data);
	echo '<pre>';
	print_r($provider);exit;
	return $this->render('add', [
		'dataProvider' => $provider 
	]);
    }


    public function actionUpdate($item_name)
    {
	$dbmanager = new DbManager;
	$data = $dbmanager->getPermissionsByRole($item_name);	
	$model = new RoleForm;
	$provider = $model->updatePermission($data);
	return $this->render('update', [
		'dataProvider' => $provider 
	]);
    }

}
