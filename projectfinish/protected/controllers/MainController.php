<?php
  include_once("function.php");
class MainController extends Controller
{	
	
	public function  actionIndex(){
		
		$id =Yii::app()->user ->id;
		$user=User::model()->find('id=:id', array(':id'=>$id));
		
		if($this->allowUser()== ADMAIN){
			 $title  = "ממשק ניהול";
			$this->render("administrator",array("user"=> $user,"title"=>$title));
		}else{
			$model = new LoginForm();
			$form = new CForm('application.views.main.loginForm', $model);
			$form->action =$this->createUrl("Main/login");
			$this->render("login",array("form"=>$form));
		}

	}
	public function actionLogin(){
		
		$model=new LoginForm;

		if(isset($_POST['LoginForm'])){
			
			$model->attributes=$_POST['LoginForm'];
			
			if(!$model->validate()){
				$form = new CForm('application.views.main.loginForm', $model);
				$this->render("login",array("form"=>$form));
			}else{

				$username = $_POST['LoginForm']['username'];
				$password = md5($_POST['LoginForm']['password']);
				$identity=new UserIdentity($username,$password);

				if($identity->authenticate()){

					Yii::app()->user->login($identity,60 *5);
					$id =Yii::app()->user ->id;
					$user=User::model()->find('id=:id', array(':id'=>$id));
					$this->init();
					  $session=new CHttpSession;
 					  $session->open();
 					   $session['user']= $user;


					 Yii::app()->session['user'] =$user;

					if($this->allowUser()== ADMAIN ){

						$this->actionIndex();
					}

					
				} else{
					Yii::app()->user->setFlash('msg', NOTLOGIN);
					$this->actionIndex();
				}
			}
		}else{

			Yii::app()->user->setFlash('msg', NOTPARAMETERS);
			$this->actionIndex();
		}
	}
	public function actionLogout(){

		Yii::app()->user->logout();
		$this->init();
		Yii::app()->user->setFlash("msg",THANKS);
		$this->actionIndex();

	}


	public function actionError(){
		
		if($error=Yii::app()->errorHandler->error){
			
			$this->render("error",$error);
		}

	}

}