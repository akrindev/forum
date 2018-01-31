<?php


$config = [
  'tulis' => [
		[
			'field' => 'judul',
			'label'	=> 'Judul',
			'rules'	=> 'required|min_length[5]|is_unique[timeline.judul]'
		],
		[
			'field' => 'kategori',
			'label'	=> 'Arsip',
			'rules'	=> 'required'
		],
		[
			'field' => 'isi',
			'label'	=> 'Isi Artikel',
			'rules'	=> 'required|min_length[15]'
		]
	],
  
	'komentar' => [
		[
			'field' => 'isi',
			'label'	=> 'Isi Komentar',
			'rules'	=> 'required|min_length[5]'
		]
	],
  
	'login' => [
		[
			'field' => 'username',
			'label'	=> 'Username',
			'rules'	=> 'required|alpha_numeric|trim'
		],
		[
			'field' => 'password',
			'label'	=> 'Password',
			'rules'	=> 'required|min_length[5]'
		]
	],
  
	'register' => [
		[
			'field' => 'username',
			'label'	=> 'Username',
			'rules'	=> 'required|min_length[3]|max_length[8]|trim|alpha_numeric|is_unique[users.username]'
		],
		[
			'field' => 'ign',
			'label'	=> 'IGN',
			'rules'	=> 'required|max_length[8]'
		],
		[
			'field' => 'email',
			'label'	=> 'Email',
			'rules'	=> 'required|valid_email|is_unique[users.email]'
		],
		[
			'field' => 'password',
			'label'	=> 'Password',
			'rules'	=> 'required|min_length[6]'
		],
		[
			'field' => 're-password',
			'label'	=> 'Ulangi password',
			'rules'	=> 'required|matches[password]'
		],
		[
			'field' => 'quotes',
			'label'	=> 'Signature',
			'rules'	=> 'required|min_length[5]'
		],
		[
			'field' => 'kota',
			'label'	=> 'Kota',
			'rules'	=> 'required'
		],
		[
			'field' => 'fullname',
			'label'	=> 'Nama Lengkap',
			'rules'	=> 'required|min_length[2]'
		]
	],
  
	'setting' => [
		[
			'field' => 'sfullname',
			'label'	=> 'Nama Lengkap',
			'rules'	=> 'required|min_length[2]'
		],
		[
			'field' => 'sign',
			'label'	=> 'IGN',
			'rules'	=> 'required|min_length[2]'
		],
      	[
			'field' => 'skota',
          	'label'	=> 'Kota',
			'rules'	=> 'required|min_length[2]'
		],
      	[
			'field' => 'semail',
			'label'	=> 'Email',
			'rules'	=> 'required|valid_email|trim'
		]
	],
  
  	'quiz' => [
      	[
          	'field' => 'pertanyaan',
          	'label' => 'Question',
          	'rules' => 'trim|required|min_length[5]'
        ],
      	[
          	'field' => 'ja',
          	'label' => 'Answer A',
          	'rules' => 'trim|required'
        ],
      	[
          	'field' => 'jb',
          	'label' => 'Answer B',
          	'rules' => 'trim|required'
        ],   
      	[
          	'field' => 'jc',
          	'label' => 'Answer C',
          	'rules' => 'trim|required'
        ],
      	[
          	'field' => 'jd',
          	'label' => 'Answer D',
          	'rules' => 'trim|required'
        ],
      
      	[
          	'field' => 'correct',
          	'label' => 'Correct answer',
          	'rules' => 'required'
        ],
      
      	[
          	'field' => 'lang',
          	'label' => 'Language',
          	'rules' => 'required'
        ]
    
    ],
  
  	'scam' => [
    	
      	[
          	'field' => 'kasus',
          	'label' => 'kasus',
          	'rules' => 'trim|required'
        ],
      	[
          	'field' => 'ign',
          	'label' => 'Scammer ign',
          	'rules' => 'trim'
        ],
      	[
          	'field' => 'fb',
          	'label' => 'Fb scammer',
          	'rules' => 'trim'
        ],
      	[
          	'field' => 'kronologi',
          	'label' => 'Kronologi',
          	'rules' => 'trim|min_length[5]|required'
        ],
      
      	[
          	'field' => 'file',
          	'label' => 'gambar',
          	'rules' => 'trim'
        ]
    
    ],
  
  's_edit' => [
    	
      	[
          	'field' => 'kasus',
          	'label' => 'kasus',
          	'rules' => 'trim|required'
        ],
      	[
          	'field' => 'ign',
          	'label' => 'Scammer ign',
          	'rules' => 'trim'
        ],
      	[
          	'field' => 'fb',
          	'label' => 'Fb scammer',
          	'rules' => 'trim'
        ],
      	[
          	'field' => 'kronologi',
          	'label' => 'Kronologi',
          	'rules' => 'trim|min_length[5]|required'
        ],
      
      	[
          	'field' => 'file',
          	'label' => 'gambar',
          	'rules' => 'trim'
        ]
    
    ],
  
  'guild' => [
    
  		[
          	'field' => 'name',
          	'label' => 'Name',
          	'rules' => 'required|max_length[20]|trim'
        ],	
  		[
          	'field' => 'level',
          	'label' => 'level',
          	'rules' => 'required'
        ],	
  		[
          	'field' => 'members',
          	'label' => 'Members',
          	'rules' => 'required'
        ],	
  		[
          	'field' => 'slogan',
          	'label' => 'Slogan',
          	'rules' => 'required|max_length[200]|trim'
        ],	
  		[
          	'field' => 'rulez',
          	'label' => 'Rules',
          	'rules' => 'required|trim'
        ],	
    
  
  
  
  
  
  ]


];