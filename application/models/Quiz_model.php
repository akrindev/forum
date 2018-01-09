<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz_model extends CI_Model
 {
	
	function __construct()
	{
		parent::__construct();
	}
  
  	function getRand()
    {
      $this->db->select('*');
      $this->db->from('quiz');
      $this->db->join('users','users.id = quiz.user_id');
      $this->db->where('status',1);
      $this->db->order_by('id','RANDOM');
      $this->db->limit(10);
      $re = $this->db->get();
      
      $i = 1;
      
      foreach($re->result() as $quiz)
      {
        $data['q-'.$i] = [
          'quiz_id' => $quiz->quiz_id,
          'by' => $quiz->username,
          'question' => $quiz->question,
          'answer_a' => $quiz->answer_a,
          'answer_b' => $quiz->answer_b,
          'answer_c' => $quiz->answer_c,
          'answer_d' => $quiz->answer_d,
          'correct' => $quiz->correct ,
          'terjawab' => $quiz->terjawab
          ];
        
        $i++;
      }
      return $data;
    }
  
  	function ambilTerjawab($qid)
    {
      $i = $this->db->where('quiz_id',$qid)->get('quiz');
      
      foreach($i->result() as $h)
      {
        $data = $h->terjawab;
      }
      return $data;
    }
  
  	function updateTerjawab($qid,$data)
    {
      return $this->db
        		->where('quiz_id',$qid)
        		->update('quiz',$data);
    }
  
  	function getTopScore()
    {
      $tops = $this->db
        			->select('*')
        			->from('quiz_users')
        			->join('users','users.id = quiz_users.user_id')
        			->order_by('point','DESC')
        			->order_by('score','DESC')
        			->limit(10)
        			->get();
      
      foreach($tops->result() as $top)
      {
        $data[] = $top;
      }
      
      return $data;
    }
  
  	
  	function getAllScore($s,$l)
    {
      $tops = $this->db
        			->select('*')
        			->from('quiz_users')
        			->join('users','users.id = quiz_users.user_id')
        			->order_by('point','DESC')
        			->order_by('score','DESC')
        			->limit($s,$l)
        			->get();
      $i = 1;
      foreach($tops->result() as $top)
      {
        $data[] = $top;
//         $data = [
//           	'ke' => $i,
//         	'username' => $top->username,
//           	'score'	 => $top->score,
//           	'salah'	=> $top->salah,
//           	'point' => $top->point
//         ];
//         $i++;
      }
      
      return $data;
    }
  
  
  	function getUserScore($id)
    {
      return $this->db->where('user_id',$id)
        				->get('quiz_users');
      
    }
  
  	function updateScore($id,$data)
    {
      return $this->db->where('user_id',$id)
        		->update('quiz_users',$data);
    }
  
  	function insertUserScore($data)
    {
      return $this->db->insert('quiz_users',$data);
    }
  
  	function insertQuiz($data)
    {
      return $this->db->insert('quiz',$data);
    }
  
  	function moderasiQuiz($id,$data)
    {
      $this->db->where('quiz_id',$id)
        				->update('quiz',$data);
      return true;
    }
  
  	function countQuiz()
    {
      $co = $this->db->query('select count(*) as c from quiz');
      
      foreach($co->result() as $c)
      {
        $data = $c->c;
      }
      
      return $data;
    }
  
  	function countQuizStatus($b)
    {
      $co = $this->db->query("select count(*) as c from quiz where status=$b");
      
      foreach($co->result() as $c)
      {
        $data = $c->c;
      }
      
      return $data;
    }
  
  	function countQuizStatusByUser($b)
    {
      $id = $this->session->iduser;
      $co = $this->db->query("select count(*) as c from quiz where status=$b and user_id=$id");
      
      foreach($co->result() as $c)
      {
        $data = $c->c;
      }
      
      return $data;
    }
  
  	function fetch_data($s,$p,$l)
    {
      $ada = $this->db->query("select quiz.*,users.id,users.username from quiz join users on users.id=quiz.user_id where status=$s order by quiz_id desc limit $l,$p");
      
      if($ada->num_rows() > 0)
      {
        foreach($ada->result() as $row)
        {
          $data[] = $row;
        }
        
        return $data;
      }
      
      return false;
    }
  
  
  	function fetch_data_by($s,$p,$l)
    {
      
      $id = $this->session->iduser;
      $ada = $this->db->query("select quiz.*,users.id,users.username from quiz join users on users.id=quiz.user_id where status=$s and user_id=$id order by quiz_id desc limit $l,$p");
      
      if($ada->num_rows() > 0)
      {
        foreach($ada->result() as $row)
        {
          $data[] = $row;
        }
        
        return $data;
      }
      
      return false;
    }
  	
  	function editQuiz($id,$data)
    {
      $a = $this->db->where('quiz_id',$id)
        		->update('quiz',$data);
      
      if($a)
      {
        return true;
      }
    }
}