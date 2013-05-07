<?php

class SiteController extends Controller
{
	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

    public function actionRss()
    {
        $this->layout = ' ';
        $news = News::model()->findAll('id<>0 ORDER BY id DESC');

        $this->render('rss',array(
            'news'=>$news,
        ));
    }

	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	public function actionLogin()
	{
        $model = new UserLogin;

		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['UserLogin']))
		{
			$model->attributes=$_POST['UserLogin'];
			if($model->validate() && $model->login()){
                $this->redirect(Yii::app()->user->returnUrl);
            } else {
                if($model->errorCode==UserIdentity::ERROR_USERNAME_INVALID){
                    $model->addError('login','Login invalid');
                } elseif($model->errorCode==UserIdentity::ERROR_PASSWORD_INVALID) {
                    $model->addError('password','Password invalid');
                } else {
                    // skip
                }
            }
		}

		$this->render('login',array(
            'model'=>$model,
        ));
	}

    public function actionRegister()
    {
        $model = new Users;
        $profile = new Profile;
        $group = Groups::model()->findAll();
        $groups['0'] = 'без группы';
        for($i=0, $count=count($group); $i<$count; $i++)
        {
            $id = $group[$i]->id;
            $groups[$id] = $group[$i]->group_name;
        }

        if(isset($_POST['ajax']) && $_POST['ajax']==='register-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['Users']) AND isset($_POST['Profile']))
        {
            $model->attributes=$_POST['Users'];
            $profile->attributes=$_POST['Profile'];
            if($model->validate() AND $profile->validate()){
                if($profile->save()){
                    $model->profile_id = $profile->id;
                    if($model->save()){
                        $this->redirect(Yii::app()->user->returnUrl);
                    }
                }
            } else {
                // skip
            }
        }

        $this->render('register',array(
            'model'=>$model,
            'profile'=>$profile,
            'groups'=>$groups,
        ));
    }

    public function actionProfile()
    {
        $model = Users::model()->findByPk(Yii::app()->user->id);
        $profile = $model->profile;
        $group = Groups::model()->findAll();
        $groups['0'] = 'без группы';
        for($i=0, $count=count($group); $i<$count; $i++)
        {
            $id = $group[$i]->id;
            $groups[$id] = $group[$i]->group_name;
        }

        if(isset($_POST['ajax']) && $_POST['ajax']==='profile-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['Profile']))
        {
            $profile->attributes=$_POST['Profile'];
            if($model->validate() AND $profile->validate()){
                if($profile->save()){
                    if($model->save()){
                        $this->redirect(Yii::app()->user->returnUrl);
                    }
                }
            } else {
                // skip
            }
        }

        $this->render('profile',array(
            'model'=>$model,
            'profile'=>$profile,
            'groups'=>$groups,
        ));
    }

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}