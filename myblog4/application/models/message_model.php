<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message_model extends CI_Model {

    public function save($username, $email, $content){
        $data = array(
            'username' => $username,
            'email' => $email,
            'content' => $content
        );
        $this -> db -> insert('t_message', $data);
    }
    public function get_all(){
        return $this -> db ->get('t_message') -> result();
    }
    public function  delete($message_id){

        $this -> db -> delete('t_message',array('message_id' => $message_id));

    }
    public function update($message_id,$content){
        $this -> db -> where ('message_id', $message_id);
        $this -> db -> update('t_message',array('content' => $content));
    }
    public function insert($username,$email,$content){
        $data = array(
            'username' => $username,
            'email' => $email,
            'content' => $content
        );
        $this -> db -> insert('t_message',$data);

    }
    public function truncate(){
        $this -> db -> truncate('t_message');
    }
}