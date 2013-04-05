<?php

class AdminController extends Controller
{
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			//'rights',
		);
	}


	public function actionIndex()
	{
		$this->render('index');
	}

}
