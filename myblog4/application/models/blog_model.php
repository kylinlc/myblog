<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model {

//    public function get_by_title_author($title,$author){
//        //'select * from t_admin where admin_name=$name and admin_pwd=$pwd'
//        $data = array(
//            'title' => $title,
//            'author' => $author
//        );
//        return $this -> db -> get_where('t_blog', $data) -> row();
//    }

    public function get_all(){
        return $this ->db -> get('t_blog') -> result();
    }

    public function delete($blog_id){
        $this -> db -> delete('t_blog', array('blog_id' => $blog_id));
    }

    public function update($blog_id, $content, $author){
        $this -> db -> where ('blog_id', $blog_id);
        $this -> db -> update('t_blog',array(
            'content' => $content,
            'author' => $author
        ));
    }

    public function insert($title,$author,$content){
        $data = array(
            'title' => $title,
            'author' => $author,
            'content' => $content
        );
        $this -> db -> insert('t_blog',$data);
    }

    //瀑布流
    public function get_by_page($page){
        $this -> db -> select('*');
        $this -> db -> from('t_blog blog');
        $this -> db -> join('t_admin admin','blog.author=admin.admin_id');
        $this -> db -> limit(6,$page);
        return $this -> db -> get() ->result();
    }
    public function get_total_count(){
        return $this -> db -> count_all('t_blog');
    }

    public function get_by_id($blog_id){
        $this -> db -> select('blog.*, admin.admin_name, admin.admin_photo');
        $this -> db -> from('t_blog blog');
        $this -> db -> join('t_admin admin', 'blog.author=admin.admin_id');
        $this -> db -> where('blog.blog_id', $blog_id);
        return $this ->db -> get() ->row();
       // return $this -> db -> get_where('t_blog', array('blog_id'=>$blog_id)) -> row();
    }
}