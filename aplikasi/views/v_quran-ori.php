<html>
<head>
    <title>AL-Quran Digital Online : Indonesian Translation</title>
	<link rel="icon" href="<?=path_asset('favicon.ico')?>" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Al-Qur'an Digital : Indonesian Translation">
	<meta name="keywords" content="quran digital,al quran digital,al-quran digital,alquran online indonesia,indoquran,al quran digital online,alquran online,quran online indonesia,al quran online indonesia,quran web,alquran digital,al-qur'an digital,al qur'an digital,qur'an web,al quran online,al quran web,al quran,alquran,quran digital online,alquran web,alquran indonesia,web quran,quran online,al quran indonesia,qur'an digital,al qur an digital,al-quran online,alquran online digital,al quran translation,al qur'an,digital online,qur'an online indonesia,al quran bahasa indonesia,koran online indonesia,digital alquran,indonesia translation,quran,stacked pie chart,al-quran digital online,al quran digital indonesia,al qur'an on line,al'quran digital,web.id,al-qur'an online,al quran gratis,al qur`an,on line translator,translate al quran,taksbar,al quran translate,web qur'an,al-quran online indonesia,qur'an translation,al-quran translation,kata bijak dari al quran,aplikasi al-quran,digital alqur'an,al qur'an web,online qur'an,al qur'an digital online,al qur'an online indonesia,alqur'an online,alqur'an web,al qur'an online,alquran on line,qur'an online,alqur an online,filter.gif,qur an online,aplikasi al quran,taskbar,quran.web,quran indonesian translation,alqur'an indonesia,digital quran online,web alquran,al-qur'an online indonesia,indoqur'an,al'quran,ext.panel,online al quran,alkuran digital,quran digital indonesia,translate quran,digitalonline,www.al quran digital.com,alquran digital online,al - quran digital,indo quran,alquran diqital,digital al-quran,digital qur'an,al quran and translation,al-qur'an,qur an digital,digital indonesia,aplikasi alqur'an,right gif,alquran translation,al-quran web,alqur'an digital,al.qur'an,alqur,al quran on line,indonesian translation,al qur,digital al quran,al qur an online,al-quran,al-qur an digital,alquran indonesia online,hbox,bg.gif,program al quran digital,alqur'an,ext.ux.grid.gridfilters,alqur an digital,alqur'an on line,al-qur'an indonesia,quranweb,al-qur'an web,quran indonesia,al">
	<link rel="stylesheet" type="text/css" href="<?=path_asset('extjs/resources/css/ext-all.css')?>" />
    <style type="text/css">
    HTML, BODY { height: 100%; }
	#loading-mask {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: #000000;
		z-index: 1;
	}
	#loading {
		position: absolute;
		top: 40%;
		left: 40%;
		z-index: 2;
	}
	#loading SPAN {
		 background: url('<?=path_asset('images/loading.gif')?>') no-repeat left center;
		 padding: 68px 68px;
		 display: block;
	}
	#header {
		background: #7F99BE url(<?=path_asset('images/header-bg.gif')?>) repeat-x center;
	}
	#header h1 {
		font-size: 16px;
		color: #fff;
		font-weight: normal;
		padding: 5px 10px;
	}
	.x-grid-row-over .x-grid-cell-inner {
		font-weight: bold;
	}
	.ux-layout-center-item {
		margin:0 auto;
		text-align:left;
	}
	.ux-layout-center .x-panel-body,   
	body.ux-layout-center {
		text-align:center;
	}
	.x-tree-icon-parent {
		background-image: url("<?=path_asset('images/ico/book.png')?>");
	}
	.x-grid-tree-node-expanded .x-tree-icon-parent {
		background-image: url("<?=path_asset('images/ico/book_open.png')?>");
	}
	.x-tree-icon-leaf {
		background-image: url("<?=path_asset('images/ico/page_white.png')?>");
	}
	.bukutamuSend {background-image:url("<?=path_asset('images/ico/tick.png')?>")}
	.bukutamuNew {background-image:url("<?=path_asset('images/ico/page_edit.png')?>")}
	.reset {background-image:url("<?=path_asset('images/ico/arrow_refresh.png')?>")}
	.recapcha {background-image:url("<?=path_asset('images/ico/key_go.png')?>")}
	.next {background-image:url("<?=path_asset('images/ico/arrow_right.png')?>")}
	.prev {background-image:url("<?=path_asset('images/ico/arrow_left.png')?>")}
	.current {background-image:url("<?=path_asset('images/ico/arrow_in.png')?>")}
	.close {background-image:url("<?=path_asset('images/ico/door.png')?>")}
	.random {background-image:url("<?=path_asset('images/ico/arrow_switch.png')?>")}
	.link {background-image:url("<?=path_asset('images/ico/world_link.png')?>")}
	.download {background-image:url("<?=path_asset('images/ico/world_go.png')?>")}
	.clear {background-image:url("<?=path_asset('images/ico/cancel.png')?>")}
	div.eg {
		background-color: #E1E1E1;
		width: 70%;
		padding: 10px;
		margin-right: 20px;
		margin-top: 10px;
		white-space: normal;
		border-radius: 5px;
		-moz-border-radius: 5px;
		font-family: Verdana, Helvetica, sans-serif;
	}
    </style>
	<script type="text/javascript">
	var base_url = '<?=base_url()?>';
	</script>
</head>
<body>
	<div id="loading-mask"></div>
	<div id="loading">
		<span id="loading-message">Sedang Memuat. Mohon Tunggu...</span>
	</div>
	<script type="text/javascript">document.getElementById('loading-message').innerHTML = '<font face="tahoma" color="white">Memuat Style...</font>';</script>
	<script type="text/javascript">document.getElementById('loading-message').innerHTML = '<font face="tahoma" color="white">Memuat System..</font>';</script>
	<script type="text/javascript" src="<?=path_asset('extjs/ext-all.js')?>"></script>
	<script type="text/javascript">document.getElementById('loading-message').innerHTML = '<font face="tahoma" color="white">Memuat Aplikasi...</font>';</script>
	<script type="text/javascript">document.getElementById('loading-message').innerHTML = '<font face="tahoma" color="white">Inisialisasi...</font>';</script>
	<!-- aplikasi js -->
	<?=js_asset('initVar.js')?>
	<?=js_asset('funcVar.js')?>
	<?=js_asset('quran.js')?>
	<div style="display:none;">
		<div id="north-div" align="center">
			<table border="0" width="100%">
				<tr>
					<td><?=image_asset('logo.png')?></td>
					<td align="right">
						<!-- AddThis Button BEGIN -->
						<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
						<a class="addthis_button_preferred_1"></a>
						<a class="addthis_button_preferred_2"></a>
						<a class="addthis_button_preferred_3"></a>
						<a class="addthis_button_preferred_4"></a>
						<a class="addthis_button_compact"></a>
						<a class="addthis_counter addthis_bubble_style"></a>
						</div>
						<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
						<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4f801bfd4ebb5319"></script>
						<!-- AddThis Button END -->
					</td>					
				</tr>
			</table>
		</div>
        <!-- Tentang page content -->
        <div id="tentang-div">
            <center><?=image_asset('quran.png')?></br>
			<h2>Selamat Datang!</h2>
			<p>Selamat datang dihalaman aplikasi Al-Qur'an Digital dengan tarjamah berbahasa Indonesia</p><br>
			<h1>Kata Mutiara Hari Ini :</h1>
			<hr size="1" noshade=""><i><?=$kataMutiara?></i><hr size="1" noshade="">
			<br>
			</center>
            <div style="margin-left:50px;">                
				<h1>Tentang Aplikasi Ini</h1><hr size="1" noshade="" width="300" align="left">
				<br><br>Aplikasi Alquran Digital dengan tarjamah bahasa Indonesia ini menggunakan teknologi dari :
				<br>* ExtJS 4.1
				<br>* CodeIgniter 2.1.0<br>
				<br>Web developer berusaha untuk dapat memberikan sumbangsih pengetahuan yang didapat dari berbagai pengalaman dalam pembangunan aplikasi dan demi kelancaran para sabahat pengguna Internet untuk bisa mencari referensi dalam kitab yang kita imani bersama yaitu Al-Qur'anul Karim yang penuh dengan hikmah, maka terciptalah website ini.
				<br>Pakailah dengan Bijak wahai sahabatku.. :)<br>
				<br>Untuk informasi, masukan, saran dan kritik silakan layangkan email antum ke <a href="mailto:kontak@indoquran.web.id">kontak@indoquran.web.id</a>
            </div>
        </div>
		<div id="link-div" align="center">
			<hr noshade size="1">
			<h1>Link dengan gambar</h1>
			<hr noshade size="1">
			<a href="<?=base_url()?>" target="_blank"><?=image_asset('quran.png')?><br/>
			Al-Qur'an Digital : Indonesian Translation</a><br>
			<div class="eg">
				<?php
				$new = htmlspecialchars('<a href="'.base_url().'" target="_blank" >'.image_asset('quran.png').'<br>Al-Qur\'an Digital : Indonesian Translation</a>', ENT_QUOTES);
				echo $new;
				?>
			</div>
			<hr noshade size="1">
			<h1>Link hanya text</h1>
			<hr noshade size="1">
			<a href="<?=base_url()?>" target="_blank">Al-Qur'an Digital : Indonesian Translation</a><br/>
			<div class="eg">
				<?php
				$new = htmlspecialchars('<a href="'.base_url().'" target="_blank" >Al-Qur\'an Digital : Indonesian Translation</a>', ENT_QUOTES);
				echo $new;
				?>
			</div>
		</div>
		<div id="south-div" align="center">
			south
		</div>
		<div id="donasi-div" align="center">
			<h1>Donasi</h1>
			<?=image_asset('rp.jpg')?><br/>
			<i>Assalamu'alaikum Warrahmatullahi Wabarokatuh</i><br/>
			Bismillahirrohmanirrohim, untuk pengembangan website ini, antum dapat mengirimkan donasi dengan rekening berikut :<br/>
			<?=image_asset('danamon.gif')?><br/>
			a/n : Tri Murni Jamillia<br/>
			no. rek : 105398150<br/>
			<?=image_asset('mandiri.png')?><br/>
			a/n : Nova Herdi Kusumah<br/>
			no. rek : 1010006323313<br/>
			<?=image_asset('bca.gif')?><br/>
			a/n : Oman Rochman<br/>
			no. rek : 2910362031
		</div>
    </div>
	<div id="south" class="x-hide-display">
        <p>Selamat datang di indoquran.web.id</p>
    </div>
</body>
</html>