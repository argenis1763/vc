<?php

/* @var $this GenerateController */;
# render (full page)
if (isset($_GET['id'])) {
    $essay = EssaysHistorical::model()->findByPk(($_GET['id']));
    $essay_content = $essay['content'];
} else {
    $this->redirect(array('essays/essays/index'));
}

//Configuracion
$mPDF1 = Yii::app()->ePdf->mpdf();
$mPDF1 = Yii::app()->ePdf->mpdf('utf-8', 'Letter');
//Cabeceras
$mPDF1->SetTitle('Essay - Via-College.com');
$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/via-college-pdf.css');
$mPDF1->WriteHTML($stylesheet, 1);
?>

<?php

$mPDF1->WriteHTML("<div>");
$mPDF1->WriteHTML("<div><img src='" . Yii::app()->theme->baseUrl . "/img/logos/logo-requisito.png'/></div>");
$mPDF1->WriteHTML("<div></div>");
$mPDF1->WriteHTML("<div><table><tbody><tr><td class='title-college'>Essay");
?>
<?php
$mPDF1->WriteHTML("</table></tbody></tr></div>");
$mPDF1->WriteHTML("</table></tbody></tr></div>");
$mPDF1->WriteHTML("<div class='essay-content'>$essay_content</div>");
$mPDF1->Output();
?>
