<?php

class UloginController extends Controller
{

    public function actionLogin() {

        if (isset($_POST['token'])) {
            $ulogin = new UloginModel();
            $ulogin->setAttributes($_POST);
            $ulogin->getAuthData();
            if ($ulogin->validate() && $ulogin->login()) {
                $this->redirect(Yii::app()->user->returnUrl);
            } else {
                if($ulogin->step=='reg'){
                    $values = urlencode(json_encode($ulogin->getAttributes()));
                    $this->redirect('register/?values='.$values);
                } else {
                    $this->render('error');
                }
            }
        } else {
            $this->redirect(Yii::app()->homeUrl, true);
        }
    }

    public function actionRegister()
    {
        if(isset($_GET['values'])){
            $values = json_decode($_GET['values']);
            $model = new Users;
            $model->email = $values->email;
            $model->identity = $values->identity;
            $model->network = $values->network;

            $profile = new Profile;
            $profile->first_name = $values->first_name;
            $profile->second_name = $values->second_name;

            $group = Groups::model()->findAll();
            $groups['0'] = 'без группы';
            for($i=0, $count=count($group); $i<$count; $i++)
            {
                $id = $group[$i]->id;
                $groups[$id] = $group[$i]->group_name;
            }
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
                    $model->state = '1';
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

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
}