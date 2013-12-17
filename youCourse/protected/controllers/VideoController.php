<?php

Yii::import('application.controllers.ChannelController');

class VideoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            array(
                'ext.starship.RestfullYii.filters.ERestFilter + REST.GET',
                //'accessControl', // perform access control for CRUD operations
                //'postOnly + delete', // we only allow deletion via POST request
            ),
        );
    }

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
            array('allow', 'actions'=>array('REST.GET', 'REST.PUT', 'REST.POST', 'REST.DELETE'),
                'users'=>array('*'),
            ),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','searchvideo'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','ajax','deleteAjax'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','ajax','deleteAjax'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{

        //load video model

        $model = $this->loadModel($id);

        //search video of the same channel

        $criteria = new CDbCriteria;

        $criteria->condition = "ChannelID=:col_val AND VidID!=:col_val2";
        $criteria->params = array(':col_val' => $model->ChannelID, ':col_val2' => $id);
        $criteria->limit = 6;

        $dataProvider =new CActiveDataProvider('Video', array(
                'criteria'=>$criteria,
            )
        );
        $dataProvider->setPagination(false);

        $item_count = Video::model()->count($criteria);

        $this->render('view',array(
			'model'=>$this->loadModel($id),
            'videos_channel' =>  $dataProvider,
            'number_videos' => $item_count
		));

	}

    public function actions()
    {
        return array(
            'REST.'=>'ext.starship.RestfullYii.actions.ERestActionProvider',
        );
    }

    /**
     * search video using search-bar
     */
    public function actionSearchvideo()
    {



        if(isset($_POST['Video']))
        {

            $search = explode(" ",$_POST['Video']['Name']);

            $criteria = new CDbCriteria();
            foreach ($search as $var){
                $criteria->compare('Name', $var, true, 'OR');
            }

            $dataProvider =new CActiveDataProvider('Video', array(
                    'criteria'=>$criteria,
                )
            );

            $dataProvider->setPagination(false);
            $item_count = Video::model()->count($criteria);

            $this->render('searchvideo',array(
                'videos_searched' =>  $dataProvider,
                'number_videos' => $item_count,
                'word_searched' => $_POST['Video']['Name']
            ));

        }


        //search video of the same channel

        /*$criteria = new CDbCriteria;

        $criteria->condition = "ChannelID=:col_val AND VidID!=:col_val2";
        $criteria->params = array(':col_val' => $model->ChannelID, ':col_val2' => $id);
        $criteria->limit = 6;

        $dataProvider =new CActiveDataProvider('Video', array(
                'criteria'=>$criteria,
            )
        );
        $dataProvider->setPagination(false);

        $item_count = Video::model()->count($criteria);

        $this->render('view',array(
            'model'=>$this->loadModel($id),
            'videos_channel' =>  $dataProvider,
            'number_videos' => $item_count
        ));*/

    }

    /**
     * Displays a particular model in modal dialog.
     * @param integer $id the ID of the model to be displayed
     */

    public function actionViewVideoModal($id)
    {
        $this->render('single_video',array(
            'model'=>$this->loadModel($id),
        ));
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Video;
		if(isset($_POST['Video']))
		{
			$model->attributes=$_POST['Video'];
			if($model->save());
				$this->redirect(array('view','id'=>$model->VidID));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
    public function actionAjax()
    {
        $model=new Video;
        $controller_channel = new ChannelController("Channel");
        $model_channel = $controller_channel->loadModelmyChannel(Yii::app()->user->id);
        if(isset($_POST['Video']))
            {
                $model->attributes=$_POST['Video'];
                $model->ChannelID = $model_channel->ChannelID;
                $model->save(false);
            }
        /*$this->render('create',array(
            'model'=>$model,
        ));*/
    }
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Video']))
		{
			$model->attributes=$_POST['Video'];
			if($model->save())
				$this->redirect($this->createAbsoluteUrl('channel/channel',array('id'=>$model->ChannelID)));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{

        $this->loadModel($id)->delete();

        //delete by id from ajax jquery call.
        if(isset($_GET['VidID']))
            $this->actionIndexByChannel(Yii::app()->user->id);
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

    /**
     * DELETE video by Post method sended by ajax call
     */
    public function actionDeleteAjax()
    {

        //delete by id from ajax jquery call.
        if(isset($_POST['VidID'])){
            $this->loadModel($_POST['VidID'])->delete();
            $this->actionIndexByChannel(Yii::app()->user->id);
        }
    }

    /**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Video');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

    /**
     * Lists all models for a single channel.
     */
    public function actionIndexByChannel($id){

        $criteria = new CDbCriteria(array(
            'condition'=>'ChannelID='.$id,
        ));
        $dataProvider =new CActiveDataProvider('Video', array(
            'criteria'=>$criteria,
            )
        );

        $item_count = Video::model()->count($criteria);

        $pages = new CPagination($item_count);
        $pages->setPageSize(Yii::app()->params['listPerPage']);
        $pages->applyLimit($criteria);  // the trick is here!

        $dataProvider->setPagination(false);

        $this->renderPartial('listChannelVideos',array(
            'dataProvider'=>$dataProvider,
            'id_channel'=>$id,
            'item_count'=>$item_count,
            'page_size'=>Yii::app()->params['listPerPage'],
            'items_count'=>$item_count,
            'pages'=>$pages,
        ));
    }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Video('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Video']))
			$model->attributes=$_GET['Video'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Video the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Video::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	/**
	 * Performs the AJAX validation.
	 * @param Video $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='video-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
