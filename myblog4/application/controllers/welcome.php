<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load -> model('message_model');
		$this -> load -> model('comment_model');
		$this -> load -> model('blog_model');

	}

	public function index()
	{
		$this -> load -> view('index');
	}
	public function single()
	{
		$this -> load -> view('single');
	}
	public function contact()
	{
		$this -> load -> view('contact');
	}
	public function message()
	{
		$username = $this -> input -> post('username');
		$email = $this -> input -> post('email');
		$content = $this -> input -> post('content');

		if($username == '' || $email == '' || $content == ''){
			echo 'fail';
		}else{
			$this -> message_model -> save($username, $email, $content);
			echo "success";
		}
	}

	public function comment(){
		$blog_id = $this -> input -> post('blog_id');
		$name = $this -> input -> post('name');
		$email = $this -> input -> post('email');
		$website = $this -> input -> post('website');
		$subject = $this -> input -> post('subject');


		if($name == '' || $email == '' || $subject == ''){
			echo 'fail';
		}else{
			$rows = $this -> comment_model -> save($blog_id, $name, $email, $website, $subject);

			if($rows > 0){
				//$this -> detail($blog_id);
				redirect('welcome/detail/'.$blog_id);//重定向, .为PHP中的拼接符
			}
		}



//		$this -> load -> model('comment_model');
//		$this -> comment_model -> save($name,$email,$website,$subject);
	}

	public function waterfall(){
		$this -> load -> view('waterfall');
	}

	public function detail($blog_id){
		//$blog_id = $this -> input -> get('blog_id');

		$blog = $this -> blog_model -> get_by_id($blog_id);//从blog_model的get_by_id方法中导过来的row
		if($blog){
			$blog ->comments = $this -> comment_model -> get_by_blog_id($blog_id);
			$this -> load -> view('single',array(
					'blog'=>$blog
			));
		}

	}

	public function get_blogs(){
		$page = $this -> input -> get('page');
		$offset = ($page - 1) * 6;


		$blogs = $this -> blog_model -> get_by_page($offset);

		$totalCount = $this -> blog_model -> get_total_count();

		$res = array(
				'data' => $blogs,
				'isEnd' => ceil($totalCount/6) == $page ? true : false
		);
		echo json_encode($res);
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */