<?php

class AlbumsController extends Controller
{
	public $layout='//layouts/column2';

	public function filters()
	{
		return array(
			'accessControl',
		);
	}


	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

    public function actionUpload($id)
    {
        /*$album = Albums::model()->findByPk($id);
        $photo = new Photo;

        if(isset($_POST['Photo']))
        {
            $photo->attributes=$_POST['Photo'];
            $photo->photo_file=CUploadedFile::getInstance($photo,'photo_file');
            //if($photo->save())
            //{
                $photo->photo_file->saveAs($photo->photo_file);
                // redirect to success page
            //}
        }*/


        $album = Albums::model()->findByPk($id);
        $user = Users::model()->findByPk(Yii::app()->user->id);
        $photo = new Photo;
        if($album->profile_id == $user->profile_id){
            if(isset($_POST['Photo'])){
                $photo->attributes = $_POST['Photo'];
                $photo->photo_file = $_POST['Photo']['photo_file'];
                $photo->type = '1'; // TODO: wtf
                $photo->album_id = $album->id;
                $photo->profile_id = $user->profile_id;
                $photo->photo_file = CUploadedFile::getInstance($photo,'photo_file');
                if($photo->save()){
                    if(!is_dir("albums/".$user->profile_id)){
                        mkdir("albums/".$user->profile_id);
                    }
                    $extension = explode(".", $photo->photo_file);
                    $extension = $extension[count($extension)-1];
                    $photo->photo_file->saveAs("albums/".$user->profile_id."/".$photo->id.".".$extension);
                    $this->redirect($this->createAbsoluteUrl('albums/'.$album->id));
                }

            }
        }

        $this->render('upload',array(
            'album'=>$album,
            'photo'=>$photo,
        ));
    }

    // done
	public function actionCreate()
	{
		$model=new Albums;

        $this->performAjaxValidation($model);

		if(isset($_POST['Albums']))
		{
			$model->attributes=$_POST['Albums'];
            $user = Users::model()->findByPk(Yii::app()->user->id);
            $model->profile_id = $user->profile_id;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

    // done
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		$this->performAjaxValidation($model);

		if(isset($_POST['Albums']))
		{
			$model->attributes=$_POST['Albums'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

    // done
	public function actionDelete($id)
	{
        $model = $this->loadModel($id);
        $user = Users::model()->findByPk(Yii::app()->user->id);
        if(isset($model->id) AND $model->profile_id==$user->profile_id){
            $model->delete();
        }

		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Albums');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function loadModel($id)
	{
		$model=Albums::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='albums-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
