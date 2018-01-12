<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quiz extends CI_Controller {
  

	function __construct()
	{
		parent::__construct();
      
      	$this->load->helper('language');
      
      	if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2) == 'id')
        {
			$this->lang->load('quiz','indonesia');
        } else {
          	$this->lang->load('quiz','english');
        }
      
      	$this->load->model('quiz_model');

		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('adminlte');
		$this->load->js('https://code.jquery.com/jquery-3.2.1.min.js');
      
      $og = '<img class="img-responsive" src="https://rokoko-iruna.com/a-iruna-quiz.png"/>';
      
      $this->output->set_title("Iruna Online Quiz");
	  $this->output->set_output_data('deskripsi','');
      $this->output->set_output_data('og',$og);
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
  
  	function quizLang()
    {
      $this->needLogin();
      
      $this->load->view('quiz_lang');
    }
  
  	function begin()
    {
      $this->needLogin();
      
      $lang = $this->input->get('lang');
      if(empty($lang))
      {
        redirect('quiz/quizLang');
      }
      
      if(!$this->input->get())
      {
        redirect('quiz/quizLang');
      }
      
      $quizs = $this->quiz_model->getRand($lang);
      
      $sessquiz = $this->session->set_userdata($quizs);
      $key = sha1(date('Y-m-d H:i:s'));
      $this->session->set_userdata('qkey',$key);
      
      $this->load->view('quiz_index');
    }
  
  
  	function beginQuiz()
    {
      
      $id = $this->uri->segment(3) ?? 1;
      
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
  
  	function beginAjax($id)
    {
    	$this->output->unset_template();
    	$this->needLogin();
      
      
    	if($id > 10)
        {
          exit('Not found!!');
        }
        
        $data = $this->session->userdata('q-'.$id);
        $data['id'] = $id;
      
        $this->load->view('quiz_ajax',$data);
    }
  
  	function submitAjax()
    {
      
      $this->output->unset_template();
      
      if(!$this->input->is_ajax_request())
      {
        exit('No direct script access allowed!');
      }
      
      $id = $this->input->post('certid') ?? 1;
      
      if($id > 10 || $id < 0 || !$this->session->userdata('q-'.$id) || !$this->session->qkey)
      {
        exit('Sorry!');
      }
     
      $data = [
        	'me' => $id,
            'status' => false,
        ];
      
      $set = $this->input->post();
      $this->session->set_userdata($set);
      
      $thq = 0;
      
      if($this->input->post('qid'))
      {
        $thq = (int)$set['qid'];
      }
      
      if($thq != 0)
      {
        $trjwb = $this->quiz_model
          				->ambilTerjawab($thq);
        
        $upd = $trjwb+1;
        
        $this->quiz_model
          		->updateTerjawab($thq,[
                  'terjawab'=>$upd
                ]);
      }
      
      
      if($this->input->post('answer-'.$id))
      {
        $data['status'] = true;
      }
      $trjwb = 0;
      for($o=1;$o<=10;$o++)
      {
      	$trjwb += count($this->session->userdata('answer-'.$o));
      }
      
      $data['dijawab'] = $trjwb;
      
      echo json_encode($data);

    }
  
  function submitQuiz()
  {
    $this->needLogin();
    
    if(!$this->session->userdata('qkey'))
    {
      return redirect('/quiz');
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
        $salah++;
        
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
    $sekor = 0;
    $slh = 0;
    $pnt = 0;
    
    if($udata->num_rows() > 0)
    {
      	foreach($udata->result() as $score)
      	{
        	$sekor = $score->score;
          	$slh = $score->salah;
          	$pnt = $score->point;
      	}
    } else {
      $us = [
        'user_id' => $this->session->iduser,
        'score' => 0,
        'salah' => 0,
        'point' => 0
      ];
      	$this->quiz_model
          		->insertUserScore($us);
    }
    
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
    	'score'	=> $sekor+$benar,
      	'salah' => $slh+$salah,
      	'point' => $pnt+$point
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
      
      if(!$this->input->is_ajax_request())
      {
        exit('No direct script allowed');
      }
      
      $data = [
        'success'  => false,
        'messages' => [],
      	'csrfName' => $this->security->get_csrf_token_name(),
        'csrfHash' => $this->security->get_csrf_hash()
      ];
      
      
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
          	'correct'	=> $this->input->post('correct'),
          	'lang'	=> $this->input->post('lang')
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
  
  	function quizAdmin()
    {
      if($this->session->userdata('level') == 'user' || !$this->session->userdata('user'))
      {
         redirect('forum');
      }
      
      $y = $this->uri->segment(3) ?? 1;
      
      if($y > 1 || $y < 0)
      {
        $y = 1;
      }
      
      $this->config->load('pagination',TRUE);
 	  $configg = $this->config->item('pagination');
      $configg["base_url"] = base_url() . "quiz/quizAdmin/$y";
      $total_row = $this->quiz_model->countQuizStatus($y);
        
      $configg["total_rows"] = $total_row;
      
      $this->pagination->initialize($configg);
      
      $page = $this->uri->segment(4) ?? 0;
   
      $data["page"] = $this->quiz_model->fetch_data($y,$configg["per_page"], $page);
      $str_links = $this->pagination->create_links();
      
      $data["links"] = explode('&nbsp;',$str_links );
      
      $this->load->view('quiz_admin',$data);
    }
  
  function quizAdminLang()
    {
      if($this->session->userdata('level') == 'user' || !$this->session->userdata('user'))
      {
         redirect('forum');
      }
      
      $lang = $this->uri->segment(3);
      $y = $this->uri->segment(4) ?? 1;
      
      if($y > 1 || $y < 0)
      {
        $y = 1;
      }
      
      $this->config->load('pagination',TRUE);
 	  $configg = $this->config->item('pagination');
      $configg["base_url"] = base_url() . "quiz/quizAdminLang/$lang/$y";
      $total_row = $this->quiz_model->countQuizStatus($y);
        
      $configg["total_rows"] = $total_row;
      
      $this->pagination->initialize($configg);
      
      $page = $this->uri->segment(5) ?? 0;
   
      $data["page"] = $this->quiz_model->fetch_data_lang($lang,$y,$configg["per_page"], $page);
      $str_links = $this->pagination->create_links();
      
      $data["links"] = explode('&nbsp;',$str_links );
      
      $this->load->view('quiz_admin',$data);
    }
  
  	function quizUser()
    {
      if(!$this->session->userdata('user'))
      {
         return redirect('/quiz');
      }
      
      
      $y = $this->uri->segment(3) ?? 1;
      
      if($y > 1 || $y < 0 || !$y)
      {
        $y = 1;
      }
      
      $this->config->load('pagination',TRUE);
 	  $configg = $this->config->item('pagination');
      $configg["base_url"] = base_url() . "quiz/quizUser/$y";
      $total_row = $this->quiz_model->countQuizStatusByUser($y);
        
      $configg["total_rows"] = $total_row;
      
      $this->pagination->initialize($configg);
      
      $page = $this->uri->segment(4) ?? 0;
   
      $data["page"] = $this->quiz_model->fetch_data_by($y,$configg["per_page"], $page);
      $str_links = $this->pagination->create_links();
      
      $data["links"] = explode('&nbsp;',$str_links );
      
      $this->load->view('quiz_user',$data);
    }
  
  	function modQuiz($key,$id)
    {
      if($this->session->userdata('level') == 'user' || !$this->session->userdata('user'))
      {
        $data['status'] = false;
      }
      
      $this->output->unset_template();
      
      $kunci = [
      	'status' => $key
      ];
      
      if($this->quiz_model->moderasiQuiz($id,$kunci))
      {
        $data['status'] = true;
      }
      
      echo json_encode($data);
      
    }
  
  	function quizEdit($id)
    {
      
      $this->output->unset_template();
      
      if(!$this->session->level == 'user' || !$this->session->user)
      {
        exit('Sorry!!');
      }
      
      $q = $this->db->query("select * from quiz where quiz_id=$id");
      
      if(count($q) > 0)
      {
        foreach($q->result() as $k)
        {
          $data = $k;
        }
      }
      
      echo json_encode($data);
    }
  
  	function quizEditPost()
    {
      if(!$this->input->is_ajax_request())
      {
        exit('no direct script allowed!');
      }
      
      $id = $this->input->post('id');
      
      $data = [
      	'question' => $this->input->post('question'),
      	'answer_a' => $this->input->post('answer_a'),
      	'answer_b' => $this->input->post('answer_b'),
      	'answer_c' => $this->input->post('answer_c'),
      	'answer_d' => $this->input->post('answer_d'),
      	'correct' => $this->input->post('correct')
      ];
      
      
      $response['status'] = false;
      
      if($this->session->level == 'user' || !$this->session->user)
      {
      	$response['status'] = false;
      }
      
      if($this->quiz_model->editQuiz($id,$data))
      {
        $response['status'] = true;
      }
      
      echo json_encode($response);
    }
  
  
  	function peringkat()
    {
$this->config->load('pagination',TRUE);
 	  $configg = $this->config->item('pagination');
      $configg["base_url"] = base_url() . "quiz/peringkat";
      $total_row = $this->db->count_all('quiz_users');
      
      $configg["per_page"] = 50;
      $configg["total_rows"] = $total_row;
      
      $this->pagination->initialize($configg);
      
      $page = $this->uri->segment(3) ?? 0;
   
      $data["tops"] = $this->quiz_model->getAllScore($configg["per_page"], $page);
      $str_links = $this->pagination->create_links();
      
      $data["links"] = explode('&nbsp;',$str_links );
      
      $this->load->view('quiz_scores',$data);
    }
  
  	function needLogin()
    {
      if(!$this->session->userdata('user'))
      {
        return redirect('quiz');
      }
    }
  
}