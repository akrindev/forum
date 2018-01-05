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
        			->order_by('score','DESC')
        			->limit(10)
        			->get();
      
      foreach($tops->result() as $top)
      {
        $data[] = $top;
      }
      
      return $data;
    }
  
  	function getUserScore($id)
    {
      $scores = $this->db->where('user_id',$id)
        				->get('quiz_users');
      
      foreach($scores->result() as $score)
      {
        $data = [
        	'score' => $score->score,
          	'salah' => $score->salah,
          	'point' => $score->point
        ];
      }
      return $data;
    }
  
  	function updateScore($id,$data)
    {
      return $this->db->where('user_id',$id)
        		->update('quiz_users',$data);
    }
  
  	function insertQuiz($data)
    {
      return $this->db->insert('quiz',$data);
    }
  
  	function allowQuiz($id,$data)
    {
      //
    }
}