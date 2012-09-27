<?php
	echo $test;
	echo html_entity_decode($test, ENT_QUOTES, 'ISO-8859-1'); // NOTE: UTF-8 does not work!
	echo form_open('buatArtikel');
	echo $this->ckeditor->editor('text_editor');
	echo form_submit('', 'Submit Post!');
	echo form_close();
?>
