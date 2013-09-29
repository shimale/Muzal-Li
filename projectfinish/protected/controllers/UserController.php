<?php

class UserController extends  Controller {

	public function actionRegister($msg=""){
		$this->render("insert",array("msg"=>$msg));

	}

	public function actionReviewUser($id="",$msg=""){
		
		$msg =($msg =="")?  "" :  constant($msg);

		if($this->allowUser()== ADMAIN || $this->allowUser()==SHOP){

				
			$user=User::model()->findByPk($id);
		
			if($user){
				
				$listshop =Shop ::model()->findAll("iduser=:iduser",array(":iduser"=>$id));
			 	 $this->render("view",array("user"=> $user,"msg"=>$msg,"listshop"=>$listshop));
			
			}else{

				if($this->allowUser()==ADMAIN){
					
					$this->actionUsers("msg6");
				}else{

					$this->actionReviewUser(YII::app()->user->id ,"msg9");
				}
			}
		}else{
			$this->redirect("index?msg=msg5");
		}

	}
	public function actionEditUser($id=""){
		
		

		if($this->allowUser()== ADMAIN || $this->allowUser()==SHOP){

				
			$user=User::model()->findByPk($id);
		
			if($user){
				
				$listshop =Shop ::model()->findAll("iduser=:iduser",array(":iduser"=>$id));
				$this->render("adit",array("user"=> $user));
				
			}else{

				if($this->allowUser()==ADMAIN){
					$this->actionUsers("msg6");
				}else{

					$this->actionReviewUser(YII::app()->user->id ,"msg9");
				}
			}
		}else{
			$this->redirect("index?msg=msg5");
		}

	}
	public function actionInsertUser(){// ׳˜׳™׳₪׳•׳� ׳‘׳�׳™׳™׳�׳� ׳©׳� ׳�׳ ׳”׳�׳™ ׳—׳ ׳•׳™׳•׳×

		if(isset($_POST['checkregister'])&& $_POST['checkregister']=="register"){

			$user=User::model()->exists('username=:username', array(':username'=>$_POST['username']));

			if($user == false){

				$user = new User();
				$user->setUsername( mysql_real_escape_string($_POST['username']));
				$user->setPassword(md5(  mysql_real_escape_string(($_POST['password']))));
				$user->setName( mysql_real_escape_string($_POST['name']));
				$user->setPhone( mysql_real_escape_string($_POST['phone']));
				$user->setLevel(SHOP);
					
				if( $user->save()){

					if($this->allowUser()==ADMAIN){
						$this->actionUsers();
					}else {
						$this->redirect("index?msg=msg1");
					}
				}else{
					if($this->allowUser()==0){
						$this->actionUsers(msg2);
					}else{
						$this->redirect("index?msg=msg2");
					}

				}
			}else{
					
					
				$this->actionRegister(msg1);
			}


		}else{
			if($this->allowUser()==ADMAIN){

				$this->actionUsers("msg3");
			}else {

				$this->redirect("index?msg=msg3");
			}
		}
	}
	public function  actionUpdateUser(){

		$msg="";
		$flag=false;
		if( $this->allowUser()== ADMAIN ||$this->allowUser()==SHOP){

			if(isset($_POST['updateregister'])&& $_POST['updateregister']=="register"){
				$id= $_POST['id'];


				$user=User::model()->findByPk($id);

				if($user){
						
					if($this->allowUser()==SHOP){

						if($user->getId() !=YII::app()->user->id){
							$this->redirect("index?msg=msg6");
						}
					}
					$user->setUsername( mysql_real_escape_string($_POST['username']));
					$user->setPassword(md5(  mysql_real_escape_string(($_POST['password']))));
					$user->setName( mysql_real_escape_string($_POST['name']));
					$user->setPhone( mysql_real_escape_string($_POST['phone']));

					if(!$user->save()){
						$msg ="msg4";
					}
					$this->actionReviewUser($id,$msg);

				}else{
					if($this->allowUser()==ADMAIN){
						$this->actionUsers("msg5");
					}else {
						$this->actionReviewUser(YII::app()->user->id,"msg9");
					}

				}
			}else{
				if($this->allowUser()==ADMAIN){
					$this->actionUsers("msg8");
				}else{
					$this->actionReviewUser(YII::app()->user->id ,"msg8");
				}
			}
		}
		else{
			$this->redirect("index?msg=msg7");
		}
	}
	public function actionDeleteUser($id=""){
		if(	$this->allowUser()== ADMAIN || $this->allowUser()==SHOP){
			$user=User::model()->findByPk($id);
			if($user){

				if($this->allowUser()==SHOP){
						
					if(Yii::app()->user->id != $user->getId()){

						$this->actionViewUpdate(Yii::app()->user->id,"true","msg10");
						return EXIT;
					}
				}
				if($user->delete()){
					Shop ::model()->deleteAll("iduser=:iduser",array(":iduser"=>$id));
					if($this->allowUser()==ADMAIN){
						$this->actionUsers("msg7");
					}else{
						$this->redirect("index?msg=msg4");
					}
				}
			}else{
				if($this->allowUser()==0){
					$this->actionViewAllUser(msg5);
				}else{
					$this->actionViewUpdate(Yii::app()->user->id,"true","msg10");
				}
			}
		}else{
			$this->redirect("index?msg=msg7");
		}


	}
	public function actionUsers($msg =""){
		
		$msg =($msg == "")?  "" : constant($msg);
		$users =User::model()->findAll("level=:level",array(":level"=>"1"));
		
		if($users){
			$this->render("users",array("listuser" =>$users ,"msg"=>$msg));
		}else{
			$this->actionRegister();
		}
	}
	
	public function actionArror()
	{	
		
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
			echo $error['message'];
			else
			$this->render('error', $error);
		}
	}
}

?>