<script type="text/javascript">
	
$(document).ready(function()
{    
	receptor();
    
});

function receptor(){
	var id = $('#hola').val();
        console.log(id);
	$('#Receptor').on("change",function()
    {
    	var id = $('#Receptor').val();
        
        console.log(id);
    }); 
}

	

</script>