<?php

class GalleryController extends Controller
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

    public function actionProfile($id)
    {
        $this->layout = '//layouts/column1';
        $dataProvider=new CActiveDataProvider('Albums', array(
            'criteria'=>array(
                'condition'=>'profile_id='.(int)$id,
            )
        ));
        $this->render('albums',array(
            'dataProvider'=>$dataProvider,
        ));
    }

    // done
    public function actionUpload($id)
    {
        $album = Albums::model()->findByPk($id);
        $user = Users::model()->findByPk(Yii::app()->user->id);
        $photo = new Photo;
        //if($album->profile_id == $user->profile_id){
            if(isset($_POST['Photo'])){
                $photo->attributes = $_POST['Photo'];
                $photo->photo_file = $_POST['Photo']['photo_file'];
                $photo->type = '1'; // TODO: wtf
                $photo->album_id = $album->id;
                $photo->profile_id = $user->profile_id;
                $photo->photo_file = CUploadedFile::getInstance($photo,'photo_file');
                $temp = getimagesize($photo->photo_file->tempName);
                if($temp['mime']=="image/png" OR $temp['mime']=="image/jpg" OR $temp['mime']=="image/jpeg"){
                    $extension = explode("/", $temp['mime']);
                    $extension = $extension[count($extension)-1];
                    if($extension=="jpeg"){
                        $extension = "jpg";
                    }
                    $photo->extension = $extension;
                    if($photo->save()){
                        if(!is_dir("albums/".$user->profile_id)){
                            mkdir("albums/".$user->profile_id);
                        }
                        if(!is_dir("albums/".$user->profile_id."/mini")){
                            mkdir("albums/".$user->profile_id."/mini");
                        }
                        $photo->photo_file->saveAs("albums/".$user->profile_id."/".$photo->id.".".$extension);

                        $filename = "albums/".$user->profile_id."/".$photo->id.".".$extension;
                        list($width, $height) = getimagesize($filename);

                        if($width>$height){
                            $newheight = 112;
                            $maxwidth = 148;
                            $newwidth = round($width / ($height / $newheight));
                            $thumb = imagecreatetruecolor($maxwidth, $newheight);
                        } else {
                            $newwidth = 148;
                            $maxheight = 112;
                            $newheight = round($height / ($width / $newwidth));
                            $thumb = imagecreatetruecolor($newwidth, $maxheight);
                        }

                        if($extension=='jpg'){
                            $source = imagecreatefromjpeg($filename);
                        } else {
                            $source = imagecreatefrompng($filename);
                        }
                        imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                        if($extension=='jpg'){
                            imagejpeg($thumb, "albums/".$user->profile_id."/mini/".$photo->id.".".$extension);
                        } else {
                            imagepng($thumb, "albums/".$user->profile_id."/mini/".$photo->id.".".$extension);
                        }

                        /*$newwidth = '100';
                        $newheight = round($height / ($width / $newwidth));
                        $thumb = imagecreatetruecolor($newwidth, $newheight);
                        if($extension=='jpg'){
                            $source = imagecreatefromjpeg($filename);
                        } else {
                            $source = imagecreatefrompng($filename);
                        }
                        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                        if($extension=='jpg'){
                            imagejpeg($thumb, "albums/".$user->profile_id."/mini/".$photo->id.".".$extension);
                        } else {
                            imagepng($thumb, "albums/".$user->profile_id."/mini/".$photo->id.".".$extension);
                        }*/

                        $album->last_update = date("Y.m.d H:i:s");
                        $album->save();
                        $this->redirect($this->createAbsoluteUrl('albums/'.$album->id));
                    }
                }

            }
        //}

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
            $model->last_update = date("Y.m.d H:i:s");
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

	// done
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Albums', array(
            'criteria'=>array(
                'condition'=>'type=2',
            )
        ));
        $last_photos = Photo::model()->findAll(array('order'=>'id DESC', 'limit'=>'15'));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
            'last_photos'=>$last_photos,
		));
	}

    public function actionAdmin()
    {
        $this->layout = '//layouts/column2';
        $model=new Albums('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Albums']))
            $model->attributes=$_GET['Albums'];

        $this->render('admin',array(
            'model'=>$model,
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
