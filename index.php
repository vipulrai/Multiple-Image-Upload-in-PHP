
<style>
#selectedFiles {
	background-color: #FFFFB9;
	float: left;
	height: 250px;
	width: 100%;
	overflow: hidden;
}
	
.img-icon {
	background-color: #FF0000;
	float: left;
	height: 100px;
	width: 150px;
	margin-right: 5px;
	margin-left: 5px;
	border: 3px solid #999999;
	margin-top: 5px;
	margin-bottom: 5px;
}

</style>


<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script>				
$(document).on("dragover drop", function(e) {
e.preventDefault();
}).on("drop", function(e) {
$("input[type='file']")
.prop("files", e.originalEvent.dataTransfer.files)
.closest("form")          
});
</script>

<script>
	var selDiv = "";
		
	document.addEventListener("DOMContentLoaded", init, false);
	
	function init() {
		document.querySelector('#files').addEventListener('change', handleFileSelect, false);
		selDiv = document.querySelector("#selectedFiles");
	}
		
		
		
		//Display Loading Image
	function Display_Load()
	{
	    $("#loadingdiv").fadeIn(300,0);
		$("#loadingdiv").html("<img src='bigLoader.gif' />");
	}
	//Hide Loading Image
	function Hide_Load()
	{
		$("#loadingdiv").fadeOut('slow');
	};
		
		
		
		
		
		
	function handleFileSelect(e) {
		
		if(!e.target.files || !window.FileReader) return;
		
		selDiv.innerHTML = "";
		
		var files = e.target.files;
		var filesArr = Array.prototype.slice.call(files);
		filesArr.forEach(function(f) {
			if(!f.type.match("image.*")) {
				return;
			}
			Display_Load();
	
			var reader = new FileReader();
			reader.onload = function (e) {
			
				var html = "<div class=\"img-icon\"><img src=\"" + e.target.result + "\" width=150 height=100></div>";
				selDiv.innerHTML += html;				
			}
			reader.readAsDataURL(f); 
			Hide_Load();
		});
		
		
	}
	</script>
    



<form id="myForm" name="form1" enctype="multipart/form-data" method="post" action="upload.php">
<div class="postyourad" id="hide-form" style="float:left;">
  <!--div1-->
  <!--end div1-->
  <!--div2-->
<div class="postdiv2">
    <div class="div_in_post">
    <table width="100%" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <td>      </tr>
      
      <tr>
        <td height="266"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
           
            <td width="757" align="left" valign="middle" class="style4 style7"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFD6C1">
              <tr>
                <td width="29%" align="center" valign="middle" bgcolor="#ebebeb"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                  <tr>
                    <td height="96" align="center" valign="top"><img src="camera.png" width="70" /></td>
                  </tr>
                  <tr>
                    <td align="center" valign="middle"><input type="file" name="image_icon[]" multiple id="files" accept="image/*"></td>
                  </tr>
                </table>                  </td>
                <td width="71%" height="250">
               
       
       <div id="selectedFiles">
         <table width="100%" height="100%" border="0" align="center" cellpadding="8" cellspacing="0">
           <tr>
             <td width="57%" height="233" align="center" valign="middle" ><div style="border: dashed 2px #FB7673; margin:0px; width:98%; height:98%; float:left;">
               <table width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                 <tr>
                   <td align="center" valign="middle"><span class="style9">Drag Photos Here!</span></td>
                 </tr>
               </table>
             </div></td>
             <td width="43%" align="left" valign="middle" bgcolor="#EBEBEB"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
                 <tr>
                   <td height="46" colspan="2" align="center" valign="top"><span class="style8">Always Remember! </span></td>
                   </tr>
                 <tr>
                   <td width="15%" height="57" align="center" valign="top"><img src="images/check-icon.png" width="15" height="15" /></td>
                   <td width="85%" align="left" valign="top">Use original photos in .jpg, .gif or .png</td>
                 </tr>
                 <tr>
                   <td height="57" align="center" valign="top"><img src="images/check-icon.png" width="15" height="15" /></td>
                   <td align="left" valign="top">Add multiple photos. You can upload max. 6 photos.</td>
                 </tr>
                 <tr>
                   <td align="center" valign="top"><img src="images/check-icon.png" width="15" height="15" /></td>
                   <td align="left" valign="top">Avoid using low-light photos.</td>
                 </tr>
               </table>               </td>
           </tr>
         </table>
       </div>       </td>
              </tr>
             
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="25" align="center" valign="middle"><label>
          <input type="submit" name="button" id="button" value="Upload" />
        </label></td>
      </tr>
      
    </table>
    </div>
   
  </div>
  
  
 

</div>
</form>
