
  <div class="row">
    <div class="col-md-12">
    
              <div class="callout callout-info">
                <p><?=lang('info_save');?></p>
              </div>
    </div>
    <div class="col-md-7">
      
<div class="box box-primary">
  <div id="oper" class="overlay">
    <i class="fa fa-spinner fa-spin"></i>
  </div>
  <div class="box-header">
    Quiz: <?=$id;?> / 10
  </div>
   <div class="box-body">
				<div class="text-center"><?=$this->bbcode->bbcode_to_html($question);?></div>
			  <div class="pull-right text-muted small">quiz by <?=$by;?></div>
			</div>
   <div class="box-footer">
                <!-- radio -->
                <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="answer-<?=$id;?>" id="optionsRadios1" value="1" <?= ($this->session->userdata('answer-'.$id) == 1 ? 'checked' : '');?>> <?=$this->bbcode->bbcode_to_html($answer_a);?>
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="answer-<?=$id;?>" id="optionsRadios2" value="2"  <?= ($this->session->userdata('answer-'.$id) == 2 ? 'checked' : '');?>>
          <?=$this->bbcode->bbcode_to_html($answer_b);?>
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="answer-<?=$id;?>" id="optionsRadios3" value="3" <?= ($this->session->userdata('answer-'.$id) == 3 ? 'checked' : '');?>> <?=$this->bbcode->bbcode_to_html($answer_c);?>
                    </label>
                  </div>
                  
                  <div class="radio">
                    <label>
                      <input type="radio" name="answer-<?=$id;?>" id="optionsRadios3" value="4" <?= ($this->session->userdata('answer-'.$id) == 4 ? 'checked' : '');?>> <?=$this->bbcode->bbcode_to_html($answer_d);?>
                    </label>
                  </div>
                </div>
<input type="hidden" name="qid" value="<?=$quiz_id;?>">
          
<input type="hidden" name="certid" value="<?=$id;?>">
                <!-- select -->
        <?php
          $back = $id-1;
          echo ($id != 1 ? '<a id="backq" qid="'.$back.'" class="btn btn-default pull-left" onClick="kembali()">Back</a>&nbsp;&nbsp;&nbsp;&nbsp;' : '');?> 
          
            <button type="submit" id="submit" class="btn btn-primary"><?=lang('save_q');?></button>
          
          <?php
          $link = $id+1;
          echo ($id != 10 ? '<a id="nextq" qid="'.$link.'" class="btn btn-default pull-right" onClick="lanjut()">Next</a>' : '<span onclick="ok()" class="btn btn-success pull-right">Submit!</span>');?>
          
		</div>
            <!-- /.box-body -->
</div>
      
      
    </div>
    <div class="col-md-5">
      
<div class="box box-default">
  <div class="box-header with-padding">
    <?=lang('answered');?>: <?php
    $terjwb = 0;
    for($o=1;$o<=10;$o++)
    {
      $terjwb += count($this->session->userdata('answer-'.$o));
    }
    echo "$terjwb/10"
    ?>
  </div>
       <div class="box-body">
         <?php
         for($i=1;$i<=10;$i++)
         {
         ?>
         <a onClick="tabel(<?=$i;?>)" style="padding:10px;display:inline-block;border:1px solid grey;margin:1px">
         Q: <?=$i;?> (<?php
           $jwb = $this->session->userdata('answer-'.$i);
           if($jwb == 1)
           {
             echo "a";
           } else if($jwb == 2)
           {
             echo "b";
           } else if($jwb == 3)
           {
             echo "c";
           } else if($jwb == 4)
           {
             echo "d";
           } else
           {
             echo "&nbsp;";
           }
           
           ?>)
         
         </a>
  <?php } ?>
  </div>
      </div>
    </div>
  </div>