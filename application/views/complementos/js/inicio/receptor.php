<script type="text/javascript">
$(document).ready(function()
{   
	var id = $('#hola').val();
    console.log(id);
    //aler(id);
	$('#Receptor').on("change",function()
    {
    	var id = $('#Receptor').val();
        
        console.log(id);
        aler("ok");
    }); 
    
});
</script>