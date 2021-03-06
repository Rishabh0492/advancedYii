<?php

namespace backend\controllers;

use PHPUnit\Util\getInstance;
use Yii;
use backend\models\Branches;
use backend\models\Companies;
use backend\models\CompaniesSearch;
use backend\models\Departments;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * CompaniesController implements the CRUD actions for Companies model.
 */
class CompaniesController extends Controller
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

    /**
     * Lists all Companies models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompaniesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Companies model.
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

    public function saveModel($model)
{
    // Here is called getQuantArray() getter from TakMolForm model
    $model->hobby = implode(',', $model->hobby);
    return $model->save();    
}

    /**
     * Creates a new Companies model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (yii::$app->user->can('create-company')) {
            $model  = new Companies();
            $branch = new Branches(); 
        if ($model->load(Yii::$app->request->post()) && $branch->load(Yii::$app->request->post())) {

              $imageName=$model->name;
            $model->file = UploadedFile::getInstance($model,'file');

             $model->file->saveAs('uploads/'.$imageName.'-'.$model->file->extension); 

             $model->logo = 'uploads/'.$imageName.'-'.$model->file->extension; 


            $model->created_date=date('Y-m-d h:m:s');
             $model->save();

             $branch->company_id   = $model->id;
             $branch->created_date = date('Y-m-d H:m:s');
             $branch->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
            'branch'=>$branch
        ]);
        } else{
             throw new ForbiddenHttpException;
        }
      
    }

    /**
     * Updates an existing Companies model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Companies model.
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
     * Finds the Companies model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Companies the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Companies::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionTest()
    {
      $departments = Departments::findAll(1);
     dd($departments);
    }
}
