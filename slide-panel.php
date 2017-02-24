<style type="text/css">

.pollSlider{
    position:fixed;
    height:250px;
    background:red;
    width:100%;
    bottom:0px;
    margin-bottom: -250px;
    -webkit-box-shadow: 0 -1px 20px 1px #000000;
    box-shadow: 0 -1px 20px 1px #000000;
}

.pollSlider-button{
    position:fixed;
    width:100px;
    height:50px;
    bottom:0px;
    background:green;
    top:0;
}	

</style>


<div class="pollSlider"></div>
<div class="pollSlider-button"></div>


<script type="text/javascript">

	$(document).ready(function(){
	  $('.pollSlider-button').click(function() {
	    if($(this).css("margin-bottom") == "250px") {
	        $('.pollSlider').animate({"margin-bottom": '-=250'});
	        $('.pollSlider-button').animate({"margin-bottom": '-=250'});

	    }else{
	        $('.pollSlider').animate({"margin-bottom": '+=250'});
	        $('.pollSlider-button').animate({"margin-bottom": '+=250'});
	    }

	});
});    
</script>