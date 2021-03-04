<?php 
ob_start();
session_start();
include('database_connection.php');
require_once('session.php');
require_once('tema.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profilini Düzenle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv=content-type content=text/html;charset=utf-8>
    <link rel="stylesheet" type="text/css" href="css/<?php echo $temacss; ?>.css" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

    <style>
			#preview {
				width: 80%; max-width: 300px;
			}
			#preview img {
				width: 100%;
			}
			.hiddenfile {
			 width: 0px;
			 height: 0px;
			 overflow: hidden;
			}
			.choose_file{
    position:relative;
    display:inline-block;    
	border-radius:8px;
    border:#ebebeb solid 1px;
    width:250px; 
    padding: 4px 6px 4px 8px;
    font: normal 14px Myriad Pro, Verdana, Geneva, sans-serif;
    color: #7f7f7f;
    margin-top: 2px;
	background:white
}
.choose_file input[type="file"]{
    -webkit-appearance:none; 
    position:absolute;
    top:0; left:0;
    opacity:0; 
}
		</style>
        <script language=" JavaScript" >
    function yenile()
    {
    window.location.reload();
    }
	</script>
</head>
<Body onLoad="yenile()" > 

	<?php 
		if($_POST){
			if($_FILES["resim"]["size"]<4194304  /*En fazla 4 MB yüklenir*/){
				if($_FILES["resim"]["type"]=="image/jpeg" or $_FILES["resim"]["type"]=="image/png"){

					$fileName = $_FILES["resim"]["name"]; 
					$fileTmpLoc = $_FILES["resim"]["tmp_name"];
					$fileType = $_FILES["resim"]["type"]; 
					$fileSize = $_FILES["resim"]["size"]; 
					$fileErrorMsg = $_FILES["resim"]["error"];
					$uret=array("1","2","3","4","5");
					$uzanti=substr($dosya_adi,-4,4);
					$rastgelesayi=rand(1,100000);					
					
					$kaboom = explode(".", $fileName); 
					$fileExt = end($kaboom); 
					$yeniad=$uret[rand(0,4)].$rastgelesayi.$uzanti;
					$thumbrandom=rand(1,10);
					
					if (!$fileTmpLoc) { 
						echo "HATA: Kaydet butonuna basmadan önce bir resim dosyası seçmelisin.";
						exit();
					} else if ($fileErrorMsg == 1) { 
						echo "HATA: Dosya yüklenirken bir hata oluştu. Dada sonra tekrar dene.";
						exit();
					}
					$moveResult = move_uploaded_file($fileTmpLoc, "uploads/$fileName");
					if ($moveResult != true) {
						echo "HATA: Dosya yüklenemedi.";
						unlink($fileTmpLoc); 
						exit();
					}
					@unlink($fileTmpLoc); 
					include_once("ak_php_img_lib_1.0.php");
					$target_file = "uploads/$fileName";
					$resized_file = "uploads/resized_$yeniad.$fileExt";
					$wmax = 300;
					$hmax = 300;
					ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
					$target_file = "uploads/resized_$yeniad.$fileExt";
					$thumbnail = "uploads/$yeniad.$fileExt";
					$wthumb = 200;
					$hthumb = 200;
					ak_img_thumb($target_file, $thumbnail, $wthumb, $hthumb, $fileExt);
					unlink("uploads/resized_$yeniad.$fileExt");
					unlink("uploads/$fileName");
					
					$profil_foto_guncelle=mysql_query("update uye set profil_resmi='$yeniad.$fileExt' where kadi='$kadi'");
					echo '<script>document.location.replace("anasayfa.php");</script>';
					
					}else{
						echo "Fotoğrafınız yüklenirken hata oluştu";
					}
					
				}else{
					echo "Dosya sadece .jpeg yada .png formatında olmalıdır";
				}
			}else{
				echo "Dosya boyutu 1 mb ı geçemez!";
			}
	
	?>
 
     <div data-role="page" id="page">
		
        <div data-role="header" data-theme="b">
            <h3><div style="font-size:14px;">Fotoğraf Yükle</div></h3>
        </div>
        <div data-role="content" data-theme="d">
        <h3><div style="font-size:14px; font-family: 'Ubuntu', sans-serif;">Sadece .jpeg, .png uzantılı dosya yükleyebilirsiniz ve seçtiğiniz görselin boyutu 4 Mb'ı aşmamalı</div></h3>
         <form action="profilduzenle.php" method="POST" data-ajax="false" enctype="multipart/form-data">
			<div class="choose_file">
        	<span><center>Dosya Seç</center></span>
       		 <input name="resim" type="file" /></div></br></br>

		
			 
        
            <input type="submit" name="gonder" value="Kaydet" data-theme="a"/>
            
            
             
        </form>
    </div>

     <script>
    $('#page').on('pageinit', function(){
		$("#chooseFile").click(function(e){
			e.preventDefault();
			$("input[type=file]").trigger("click");
		});
		$("input[type=file]").change(function(){
			var file = $("input[type=file]")[0].files[0];            
			$("#preview").empty();
			displayAsImage3(file, "preview");
			
			$info = $("#info");
			$info.empty();
			if (file && file.name) {
				$info.append("<li>name:<span>" + file.name + "</span></li>");
			}
			if (file && file.type) {
				$info.append("<li>size:<span>" + file.type + " bytes</span></li>");
			}
			if (file && file.size) {
				$info.append("<li>size:<span>" + file.size + " bytes</span></li>");
			}
			if (file && file.lastModifiedDate) {
				$info.append("<li>lastModifiedDate:<span>" + file.lastModifiedDate + " bytes</span></li>");
			}
			$info.listview("refresh");
		});
    });

    function displayAsImage3(file, containerid) {
		if (typeof FileReader !== "undefined") {
			var container = document.getElementById(containerid),
			    img = document.createElement("img"),
			    reader;
			container.appendChild(img);
			reader = new FileReader();
			reader.onload = (function (theImg) {
				return function (evt) {
					theImg.src = evt.target.result;
				};
			}(img));
			reader.readAsDataURL(file);
		}
	}
	
    </script>
</body>
</html>