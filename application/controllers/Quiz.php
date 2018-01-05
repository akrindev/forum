<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quiz extends CI_Controller {
  

	function __construct()
	{
		parent::__construct();
      	
      	$this->load->model('quiz_model');

		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('adminlte');
		$this->load->js('https://code.jquery.com/jquery-3.2.1.min.js');
      
      		
      $this->output->set_title("Iruna Online Quiz");
	  $this->output->set_output_data('deskripsi','');
      $this->output->set_output_data('og','none');
	}
  
  
  	function index()
    {
      $data['tops'] = $this->quiz_model->getTopScore();
      
      $this->load->view('quiz_awal',$data);
    }
      
  
  
  /**
  * memulai quiz dengan menampilkan
  * tampilan tombol mulai
  * ketika masuk sini otomatis 
  * generate soal dan menyimpan dalam session
  */
  
  	function begin()
    {
      $this->needLogin();
      
      $quizs = $this->quiz_model->getRand();
      
      $sessquiz = $this->session->set_userdata($quizs);
      $key = sha1(date('Y-m-d H:i:s'));
      $this->session->set_userdata('qkey',$key);
      
      $this->load->view('quiz_index');
    }
  
  
  	function beginQuiz($id)
    {
      
      $this->needLogin();
      
      if($id > 10)
      {
        return redirect('/quiz/beginQuiz/10');
      }
      
      if(!$this->session->userdata('q-'.$id) || !$this->session->qkey || $id < 0)
      {
        return redirect('/quiz/begin');
      }
     
      $data = $this->session->userdata('q-'.$id);
      $data['id'] = $id;
      
      if(isset($_POST) != '')
      {
        $set = $this->input->post();
        $thq = 0;
        if($this->input->post('qid')){
        $thq = (int)$set['qid'];
        }
        if($thq){
        $trjwb = $this->quiz_model
          			->ambilTerjawab($thq);
        
        $upd = $trjwb+1;
        
        $this->quiz_model
          	->updateTerjawab($thq,['terjawab'=>$upd]);
        }
        $this->session->set_userdata($set);
      }
      
      $this->load->view('quiz_list',$data);
    }
  
  function submitQuiz()
  {
    $this->needLogin();
    
    if(!$this->session->userdata('qkey'))
    {
      return redirect('/quiz/begin');
    }
    
    
    $benar = 0;
    $salah = 0;
    $point = 0;
    /*
    * Mulai mengoreksi jawaban
    */
    for($i=1;$i<=10;$i++)
    {
      $correct = $this->session->userdata('q-'.$i) ?? 0;
      $answer = $this->session->userdata('answer-'.$i);
      
      
      if($correct['correct'] == $answer)
      {
        $benar++;
      } else 
      {
        if($salah == 0)
        {
        	$salah = 0;
        } else
        {
          $salah++;
        }
      }
      
      // hapus jawaban dan soal pada session
      $this->session->unset_userdata('answer-'.$i);
      $this->session->unset_userdata('q-'.$i);
    } // end of koreksi
    
    $userid = $this->session->userdata('iduser');
    
    //hapus quez key
    $this->session->unset_userdata('qkey');
    
    $udata = $this->quiz_model
      			->getUserScore($userid);
    
    if($benar < 8) // 1,2,3,4,5,6,7
    {
      if($benar < 6) // 1,2,3,4,5
      {
        if($benar < 3) // 1,2
        {
        	$point = 2;
        }else{ // 4,5
        	$point = 5;
        }
      }else{ // 7
        $point = 12;
      }
    }else{ // 9,10
      $point = 20;
    }
    
    $anu = [
    	'score'	=> $udata['score']+$benar,
      	'salah' => $udata['salah']+$salah,
      	'point' => $udata['point']+$point
    ];
    
    $this->quiz_model
      		->updateScore($userid,$anu);
    
    $data = [
      'score'	=> $benar,
      'salah'	=> $salah,
      'point'	=> $point
    ];
    
    
    $this->load->view('quiz_result',$data);
  }
  
  	function newQuiz()
    {
      $this->load->js('assets/js/te.js');
      $this->load->view('quiz_add');
    }
  
  	function submitNewQuiz()
    {
      
      if(!$this->session->userdata('user'))
      {
        return "login bang!";
      }
      
      $data = ['success'=>false,'messages'=>[]];
      $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
      if($this->form_validation->run('quiz'))
      {
        $anunya = [
          	'user_id' => $this->session->userdata('iduser'),
        	'question' => $this->input->post('pertanyaan'),
          	'answer_a' => $this->input->post('ja'),
          	'answer_b' => $this->input->post('jb'),
          	'answer_c' => $this->input->post('jc'),
          	'answer_d' => $this->input->post('jd'),
          	'correct'	=> $this->input->post('correct')
        ];
        
        $this->quiz_model->insertQuiz($anunya);
        
        $data['success'] = true;
      } else
      {
        foreach($_POST as $key => $value)
        {
          $data['messages'][$key] = form_error($key);
        }
      }
      $this->output->unset_template();
      
      echo json_encode($data);
    }
  
  
  
  
  	function needLogin()
    {
      if(!$this->session->userdata('user'))
      {
        return redirect('quiz');
      }
    }
  
}