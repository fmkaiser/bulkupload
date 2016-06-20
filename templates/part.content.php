<div style="text-align: center; width: 600px;">
	<div id="dropTarget" style="width:400px; height:300px; background-color: grey; padding: 50px; margin: 50px 100px; text-align: center; border-radius: 15px; -moz-border-radius: 15px; box-shadow: 10px 10px 5px #888888;">
	  <a href="#" id="browseButton"><strong>Drag &amp; drop files here</strong></a>
	  <br/>
	  <div id="filelist" style="width: 100%; text-align: center; overflow-y: scroll; height: 120px; "></div>
	  <br/>
	  <div id="progressbar" style="width: 100%;"></div>
	  <div id="progressbar-label" style="width: 100%; text-align: center;"></div>
	</div>

	<form class="bulkupload">
		Files will be saved in: 
		<input class="url" type="text" readonly="readonly" id="bulkupload_path" value="/bulkupload/" />
		<button class="choose" type="button"><?php p($l->t('Choose')); ?></button>
	</form>
</div>
