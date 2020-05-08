$(document).ready(function(){
  $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
    
    $(".zoom").hover(function(){
		
		$(this).addClass('transition');
	}, function(){
        
		$(this).removeClass('transition');
	});

	$.ajax({
		url: "server.php",
		type: "post",
		data:{action: "photos"},
		success: function(r){
			r = JSON.parse(r);
			r.forEach(function(item){				
				$("#Row").append(`
		            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
		                <a href="${item["photo"]}" class="fancybox" rel="ligthbox">
		                    <img  src="${item["photo"]}" with="940" height="650" class="zoom img-fluid "  alt="">
		                </a>
		                <br><br>
		                <button id="delete" value="${item["id"]}" class="btn btn-info">Delete</button>
		                <button id="glav" value="${item["id"]}" class="btn btn-info"><i class="fa fa-fw fa-camera"></i>
		                Glavni</button>
		            </div>
				`);
			})
		}
	});
	$(document).on("click", "#delete", function(){
		var delVal = $(this).val();
	    $.ajax({
	    	url: "server.php",
	    	type: "post",
	    	data: {delVal, action: "delete"},
	    	success: function(r){
	    		location.reload();
	    	}
	    });
	});
	$(document).on("click", "#glav", function(){
		var glav = $(this).val();
	    $.ajax({
	    	url: "server.php",
	    	type: "post",
	    	data: {glav, action: "glav"},
	    	success: function(r){
	    		if(r == 2){
	    			location.reload();
	    		}
	    	}
	    });
	});	
});