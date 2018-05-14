<?php

namespace app\controllers;

use Yii;
use app\models\Products;
use app\models\Products_Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Produc_Check_out_UserInfoForm; //My model (No SQL DB connection) for User Information input in view/products/checkout.php
/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
	
	
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

	
	
	
	public function accessRules() {
    return array(
        array(
            'allow',
            'actions' => array('getajaxorderdata', 'checkout'),
            'users'   => array('*'),
        ),
    );
}
	
	
	
	
	
	
	
    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Products_Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pr_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pr_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	
	
	
	
	
	
	
	// Display all available products items from SQL DB
	// **************************************************************************************
    // **************************************************************************************
    //                                                                                     **
	
	public function actionShop()
    {
		 $query=Products::find()->orderBy ('pr_id DESC') /*->andFilterWhere(['like', 'sData_text', Yii::$app->getRequest()->getQueryParam('q')])*/  /*->where(['sData_text'=>Yii::$app->getRequest()->getQueryParam('q') ])*/ ->all();

        return $this->render('shop', [
               'query' => $query, //is in model
        ]);
    }
	// **                                                                                  **
    // **************************************************************************************
    // **************************************************************************************  
	
	
	
	// Display a Page with you products, when clicked CHECK_OUT
	// **************************************************************************************
    // **************************************************************************************
    //                                                                                     **
	
	public function actionCheckout()
    {
        //My model (No SQL DB connection) for User Information input in view/products/checkout.php
		$searchModel = new Produc_Check_out_UserInfoForm();
		
        return $this->render('checkout', [
               'searchModel' => $searchModel, //is in model
        ]);
    }
	// **                                                                                  **
    // **************************************************************************************
    // **************************************************************************************  



	
	
	// Gets Ajax data from User check out order
	// **************************************************************************************
    // **************************************************************************************
    //                                                                                     **
	
	public function actionGetajaxorderdata()
    {
		
		
	/*	if (Yii::$app->request->isAjax) {
    $data = Yii::$app->request->post();
   
	 $search = explode(":", $data['searchby']);
	 $search = $searchname[0];
	 
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    return [
        'search' => $search,
        'code' => 100,
    ];
  }
		*/
		
		
	// check if POST request	
        $dataZ = Yii::$app->request->post();
            if (isset($dataZ)) {
			
                if (Yii::$app->request->isAjax) { 
				    $test = "Ajax Worked, recognized!";
				} else {
                    $test = "Ajax Worked, not recognized!";
				}
            } else {
                $test = "Ajax failed 100%";
            }

		   $searchname = $_POST['searchname']; // gets name from js ajax
		   $controller= $_POST['controller']; // gets name from js ajax
		   
		   
         \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
          return [
             'result_status' => $test, // return ajx status
             'code' => 100,
		     'name' => $searchname,     // test name 
			 'controller' => $controller,     // csrf
          ]; 
		
		
		

	
		    /*return $this->render('ajax', [
               //'searchModel' => $searchModel, //is in model
			   'ress' => $search , //is in model
        ]);*/
		
		
    }
	// **                                                                                  **
    // **************************************************************************************
    // **************************************************************************************  
	
	
	




	
	
}
