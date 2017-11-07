
	<main>
	  
	  <div class="container-fluid">
		
		<!--breadcrumb-->
		<div style="margin-top:10px"></div>
		<nav aria-label="breadcrumb" role="navigation">
		<ol class="breadcrumb">
		  <li class="breadcrumb-item active" aria-current="page">Forum</li>
		</ol>
</nav>
	  
	  
	
		<div class="row">
         <div class="col-12">
           <div class="zone">Timeline</div>
          </div>
          <div class="timeline" id="timeline">
     
         </div>
         <nav aria-label="...">
         <div class="pagination" id="pagination"></div></nav>
		 
		</div><!--row-->
		
		
	  </div><!--container-->
	  
	</main><!--maiinnn-->
	
	<footer>
	  <div class="footer-forum">Copyright 2017 - All Right Reserved</div>
	</footer>
<script type="text/javascript">
$(function(){
	
	 function load_country_data(page)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>ajax/pagination/"+page,
   method:"GET",
   dataType:"json",
   success:function(data)
   {
    $('#timealine').html(data.timeline);
    $('#pagination').html(data.pagination_link);
   }
  });
 }
 
 load_country_data(1);

 $(document).on("click", ".pagination li a", function(event){
  event.preventDefault();
  var page = $(this).data("ci-pagination-page");
  load_country_data(page);
 });

	
		$('time.timeago').timeago();
});
</script>
  </body>
</html>		