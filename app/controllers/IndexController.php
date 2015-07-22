<?php
use  Modules\Models\Login;
class IndexController extends ControllerBase
{

	public function indexAction()
	{
		$this->session->destroy();
		if ($this->session->get("username") != null)
		{
			return $this->response->redirect('thanhvien');
		}
		
	}
	public function loginAction()
	{
		

		if($this->request->isPost()==true)
		{
			$this->view->disable();
			$params = $this->request->getPost();
			$username = $params['username'];
			$pass = $params['pass'];
			
			$lg = Login::find(array("username = '$username'"));
			$count = 0;
			$count = count($lg);
			if($count>0)
			{
				$lg1 = Login::find(array("pass = '$pass'"));
				$count = 0;
				$count = count($lg1);
				if($count>0)
				{
					$this->session->set("username", $username);
					return $this->response->redirect('thanhvien');
				}
				else
				{
					$this->session->set("erorr", "Tên đăng nhập hoặc mật khẩu không đúng");
					return $this->response->redirect('index');
				}
			}
			else
			{
				$this->session->set("erorr", "Tên đăng nhập hoặc mật khẩu không đúng");
				return $this->response->redirect('index');
			}
		}
	}
	public function logoutAction()
	{
		if($this->request->isPost()==true)
		{
			$this->view->disable();
			$this->session->destroy();
			return $this->response->redirect("index");
		}
	}
	
}

