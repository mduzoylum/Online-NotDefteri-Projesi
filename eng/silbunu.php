<?php
include('session.php');
$id = $_GET["silsene"];
$baslik = $_GET["baslik"];

echo "<!-- Start of third page: #popup -->
<div data-role=\"page\" id=\"popup\">

	<div data-role=\"header\" data-theme=\"b\">
		<h1>Dikkat</h1>
	</div><!-- /header -->

	<div data-role=\"content\" data-theme=\"d\">	
		<p><b>$baslik</b> başlıklı notunuzu silmek üzeresiniz. Notu sildiğinizde geri getirme şansınız olmayacak. Silmek istediğinize emin misiniz?</p>
		<div class=\"ui-grid-a\">
            <div class=\"ui-block-a\">
                <a data-role=\"button\" data-transition=\"slidefade\" data-inline=\"false\" data-theme=\"b\" href=\"sil.php?Git2=$id\">
                    Notu Sil
                </a>
            </div>
            <div class=\"ui-block-b\">
                <a data-role=\"button\" data-theme=\"b\" data-inline=\"false\" href=\"duzenle.php?Git2=$id\" >
                    Düzenle
                </a>
            </div>
			<div class=\"ui-block-c\">
                <a data-role=\"button\" data-theme=\"a\" data-inline=\"false\" href=\"anasayfa.php\" >
                    İptal
                </a>
            </div>
        </div>
	</div><!-- /content -->
	
</div><!-- /page popup -->";


?>