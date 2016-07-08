<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this -> load -> model('admin_model');
    }

    public function login()
    {
        $this -> load -> view('admin/login');
    }
    public function logout()
    {
        $this -> session ->unset_userdata('admin');
        redirect('admin/login');
    }
    public function  check_login(){
        //1.接数据
        $admin_name = $this -> input -> post('admin_name');
        $admin_pwd = $this -> input -> post('admin_pwd');

        //2.查数据
        $this -> load -> model('admin_model');
        $row = $this -> admin_model ->get_by_name_pwd($admin_name, $admin_pwd);

        //跳转
        if($row){
            $this -> session -> set_userdata('admin', $row);
            $this -> load -> view('admin/admin-index');
        }else{
            $this -> load -> view('admin/login');
        }
    }

    public function index()
    {
        $this->load->view("admin/admin-index");
    }

    public function admin_mgr(){
        //分页
        $this->load->library('pagination');

        $config['base_url'] = 'admin/admin_mgr';
        $config['total_rows'] = $this -> admin_model -> get_admin_count();
        $config['per_page'] = 10;
        $config['use_page_numbers'] = TRUE;

        $config['prev_link'] = '<<';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '>>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="am-active"><a href="'.$config['base_url'].'">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $this -> load -> model('admin_model');
        $result = $this -> admin_model -> get_admin_by_page($config['per_page']);
//        if($result){
            $data = array(
                'admins' => $result,
                'total_rows' => $config['total_rows']
            );
            $this -> load -> view('admin/admin-mgr', $data);
//        }
    }

    public function delete_admin(){
        $admin_id = $this ->  input -> get('admin_id');
        $this -> load -> model('admin_model');
        $this -> admin_model -> delete($admin_id);
        $this -> admin_mgr();
    }

    public function deletes_admin(){
        $admin_id = $this ->  input -> get('admin_id');
        $this -> load -> model('admin_model');
        $this -> admin_model -> delete($admin_id);
        echo 'success';
    }

    public function update_admin(){
        $admin_id = $this -> input -> get('admin_id');
        $admin_name = $this -> input ->get('admin_name');
        $this -> load -> model('admin_model');
        $this -> admin_model -> update($admin_id, $admin_name);
        $this -> admin_mgr();
    }

    public function insert_admin(){
        $admin_name = $this ->input ->get('admin_name');
        $admin_password = $this ->input ->get('admin_password');
        $this -> load ->model('admin_model');
        $this -> admin_model -> insert($admin_name, $admin_password);
        $this -> admin_mgr();
        echo 'success';
    }

    public function admin_message()
    {
        $this ->load -> model('message_model');
        $result = $this -> message_model -> get_all();

        $data = array(
            'messages' => $result
        );
        $this->load->view("admin/admin-message", $data);

    }

    public function delete_message(){
        $message_id = $this -> input -> get('message_id');
        $this -> load -> model('message_model');
        $this -> message_model ->delete($message_id);
        $this -> admin_message();
    }

    public function deletes_message(){
        $message_id = $this -> input -> get('message_id');
        $this -> load -> model('message_model');
        $this -> message_model ->delete($message_id);
        echo 1;
    }

    public function update_message(){
        $message_id = $this ->input -> get('message_id');
        $content = $this ->input ->get('content');
        $this -> load ->model('message_model');
        $this -> message_model -> update($message_id, $content);
        $this -> admin_message();
    }

    public function  insert_message(){
        $username = $this ->input ->get('username');
        $email = $this ->input ->get('email');
        $content = $this -> input -> get('content');
        $this -> load ->model('message_model');
        $this -> message_model -> insert($username, $email, $content);
        $this -> admin_message();
        echo success;
    }
    public function message_truncate(){
        $this -> load ->model('message_model');
        $this -> message_model -> truncate();
        $this->admin_message();
    }

    public function admin_comment()
    {
        $this ->load -> model('comment_model');
        $result = $this -> comment_model -> get_all();

        $data = array(
            'comments' => $result
        );
        $this->load->view("admin/admin-comment", $data);

    }

    public function delete_comment(){
        $comment_id = $this -> input -> get('comment_id');
        $this -> load -> model('comment_model');
        $this -> comment_model ->delete($comment_id);
        $this -> admin_comment();
    }

    public function deletes_comment(){
        $comment_id = $this -> input -> get('comment_id');
        $this -> load -> model('comment_model');
        $this -> comment_model ->delete($comment_id);
        echo 1;
    }

    public function update_comment(){
        $comment_id = $this ->input -> get('comment_id');
        $subject = $this ->input ->get('subject');
        $this -> load ->model('comment_model');
        $this -> comment_model -> update($comment_id, $subject);
        $this -> admin_comment();
    }

    public function  insert_comment(){
        $username = $this ->input ->get('username');
        $email = $this ->input ->get('email');
        $website = $this -> input -> get('website');
        $subject = $this -> input ->get('subject');
        $blog_id = $this ->input ->get('blog_id');
        $this -> load ->model('comment_model');
        $this -> comment_model -> insert($username, $email, $website, $subject,$blog_id);
        $this -> admin_comment();
        echo 1;
    }
    public function comment_truncate(){
        $this -> load ->model('comment_model');
        $this -> comment_model -> truncate();
        $this->admin_comment();
    }

    public function admin_blog(){
        $this -> load -> model('blog_model');
        $result = $this -> blog_model -> get_all();
//        if($result){
        $data = array(
            'blogs' => $result
        );
        $this -> load -> view('admin/admin-blog', $data);
//        }
    }

    public function delete_blog(){
        $blog_id = $this ->  input -> get('blog_id');
        $this -> load -> model('blog_model');
        $this -> blog_model -> delete($blog_id);
        $this -> admin_blog();
    }

    public function deletes_blog(){
        $blog_id = $this ->  input -> get('blog_id');
        $this -> load -> model('blog_model');
        $this -> blog_model -> delete($blog_id);
        echo 'success';
    }

    public function update_blog(){
        $blog_id = $this ->input -> get('blog_id');
        $author = $this -> input ->get('author');
        $content = $this ->input ->get('content');
        $this -> load ->model('blog_model');
        $this -> blog_model -> update($blog_id, $content,$author);
        $this -> admin_blog();
    }

    public function insert_blog(){
        $title = $this ->input ->get('title');
        $author = $this ->input ->get('author');
        $content = $this -> input -> get('content');
        $this -> load ->model('blog_model');
        $this -> blog_model -> insert($title, $author, $content);
        $this -> admin_blog();
        echo 'success';
    }
    public function blog_truncate(){
        $this -> load ->model('blog_model');
        $this -> blog_model -> truncate();
        $this->admin_blog();
    }

    public function admin_header()
    {
        $this->load->view("admin/admin-header");
    }
    public function admin_sidebar()
    {
        $this->load->view("admin/admin-sidebar");
    }

}