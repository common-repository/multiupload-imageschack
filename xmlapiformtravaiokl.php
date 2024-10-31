<?php
// ici c\est le formulaire classique en html echo est la commande qui cré le code html
echo '<table><form method="post" action="xmlapiform.php" enctype="multipart/form-data">
		<input type="hidden" name="MAX_FILE_SIZE" value="40000096">
		<input type="file" name="fileupload[]" size="30">    
		Taille Image? <input type="checkbox" name="optimage[]" id="optimage" value="1" checked onclick="optsize.disabled=!this.checked">
 <select name="optsize[]" id="optsize" >
<option value="800x800">800x600 </option>
<option value="640x640">640x480</option>
<option value="100x100">100x75</option>
<option value="150x150">150x112</option>
<option value="320x320">320x240</option>
</select>
		Taille mini? <input type="text" name="mini[]" id="mini" size="7" value="400">
 <br />   
 		<input type="hidden" name="MAX_FILE_SIZE" value="40000096">   
		<input type="file" name="fileupload[]" size="30">  
		Taille Image? <input type="checkbox" name="optimage[]" id="optimage1" value="1" checked onclick="optsize.disabled=!this.checked">
 <select name="optsize[]" id="optsize2">
<option value="800x800">800x600 </option>
<option value="640x640">640x480</option>
<option value="100x100">100x75</option>
<option value="150x150">150x112</option>
<option value="320x320">320x240</option>
 </select>
		Taille mini? <input type="text" name="mini[]" id="mini" size="7" value="400">
 <br />   
 		<input type="hidden" name="MAX_FILE_SIZE" value="40000096">   
		<input type="file" name="fileupload[]" size="30">  
		Taille Image? <input type="checkbox" name="optimage[]" id="optimage1" value="1" checked onclick="optsize.disabled=!this.checked">
 <select name="optsize[]" id="optsize2">
<option value="800x800">800x600 </option>
<option value="640x640">640x480</option>
<option value="100x100">100x75</option>
<option value="150x150">150x112</option>
<option value="320x320">320x240</option>
 </select>
 		Taille mini? <input type="text" name="mini[]" id="mini" size="7" value="400">
 <br />   
 		<input type="hidden" name="MAX_FILE_SIZE" value="40000096">   
		<input type="file" name="fileupload[]" size="30">  
		Taille Image? <input type="checkbox" name="optimage[]" id="optimage1" value="1" checked onclick="optsize.disabled=!this.checked">
 <select name="optsize[]" id="optsize2">
<option value="800x800">800x600 </option>
<option value="640x640">640x480</option>
<option value="100x100">100x75</option>
<option value="150x150">150x112</option>
<option value="320x320">320x240</option>
 </select>
		Taille mini? <input type="text" name="mini[]" id="mini" size="7" value="400">
   <br />
 		<input type="hidden" name="MAX_FILE_SIZE" value="40000096">   
		<input type="file" name="fileupload[]" size="30">  
		Taille Image? <input type="checkbox" name="optimage[]" id="optimage1" value="1" checked onclick="optsize.disabled=!this.checked">
 <select name="optsize[]" id="optsize2">
<option value="800x800">800x600 </option>
<option value="640x640">640x480</option>
<option value="100x100">100x75</option>
<option value="150x150">150x112</option>
<option value="320x320">320x240</option>
 </select>
 Taille mini? <input type="text" name="mini[]" id="mini" size="7" value="400">
   <br />
 		<input type="hidden" name="MAX_FILE_SIZE" value="40000096">   
		<input type="file" name="fileupload[]" size="30">  
		Taille Image? <input type="checkbox" name="optimage[]" id="optimage1" value="1" checked onclick="optsize.disabled=!this.checked">
 <select name="optsize[]" id="optsize2">
<option value="800x800">800x600 </option>
<option value="640x640">640x480</option>
<option value="100x100">100x75</option>
<option value="150x150">150x112</option>
<option value="320x320">320x240</option>
 </select>
 		Taille mini? <input type="text" name="mini[]" id="mini" size="7" value="400">
  <br />
 		<input type="hidden" name="MAX_FILE_SIZE" value="40000096">   
		<input type="file" name="fileupload[]" size="30">  
		Taille Image? <input type="checkbox" name="optimage[]" id="optimage1" value="1" checked onclick="optsize.disabled=!this.checked">
 <select name="optsize[]" id="optsize2">
<option value="800x800">800x600 </option>
<option value="640x640">640x480</option>
<option value="100x100">100x75</option>
<option value="150x150">150x112</option>
<option value="320x320">320x240</option>
 </select>
 		Taille mini? <input type="text" name="mini[]" id="mini" size="7" value="400">
  <br />
 		<input type="hidden" name="MAX_FILE_SIZE" value="40000096">   
		<input type="file" name="fileupload[]" size="30">  
		Taille Image? <input type="checkbox" name="optimage[]" id="optimage1" value="1" checked onclick="optsize.disabled=!this.checked">
 <select name="optsize[]" id="optsize2">
<option value="800x800">800x600 </option>
<option value="640x640">640x480</option>
<option value="100x100">100x75</option>
<option value="150x150">150x112</option>
<option value="320x320">320x240</option>
 </select>
 		Taille mini? <input type="text" name="mini[]" id="mini" size="7" value="400">
  <br />
		<input style="width: 100px;" type="submit" value="Envoyer" >
		</form></table> ';
?>