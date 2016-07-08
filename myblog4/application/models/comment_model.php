<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model {

    public function get_all(){
        return $this -> db ->get('t_comment') -> result();
    }

    public function save($blog_id,$name,$email,$website,$subject){
        $data = array(
            'blog_id' => $blog_id,
            'username' => $name,
            'email' => $email,
            'website' => $website,
            'subject' => $subject
        );
        $this -> db -> insert('t_comment', $data);

        return $this -> db -> affected_rows();
    }

    public function get_by_blog_id($blog_id){
        $this -> db -> order_by('add_time', 'desc');
        return $this -> db -> get_where('t_comment', array('blog_id' => $blog_id)) -> result();
    }

}