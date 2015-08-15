<?php

/* @var $this GenerateController */;
# render (full page)
if (isset($_GET['idr']) && isset($_GET['ids'])) {
    $student = Students::model()->findByPk(($_GET['ids']));

    $model = Requirements::model()->findByPk(($_GET['idr']));
} else {
    $this->redirect(array('requirements/index'));
}
$colleges_name = $model->colleges->name;
$title_d = 0;
$title_a = 0;
$title_ap = 0;
$title_n = 0;
//Configuracion
$mPDF1 = Yii::app()->ePdf->mpdf();
$mPDF1 = Yii::app()->ePdf->mpdf('utf-8', 'Letter');
//Cabeceras
$mPDF1->SetTitle('Requirements Report');
$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/via-college-pdf.css');
$mPDF1->WriteHTML($stylesheet, 1);
?>

<?php

$mPDF1->WriteHTML("<div>");
$mPDF1->WriteHTML("<div><img src='" . Yii::app()->theme->baseUrl . "/img/logos/logo-requisito.png'/></div>");
$mPDF1->WriteHTML("<div></div>");
$mPDF1->WriteHTML("<div><table><tbody><tr><td class='title-college'>" . $colleges_name);
?>
<?php foreach ($model->requirementsHasRequirementsFields as $id => $requirementsHasRequirementsField) { ?>
    <?php

    $i = RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->id;
    //GRAFICO GPA
    if (($i == 1)) {
        $html_gpa .= '<tr><td class="title-field">GPA & TESTS SCORE GRAPHIC FOR ADMISSIONS</td><tr>'
                . '<tr><td class="description">' . CHtml::image(Yii::app()->baseUrl . '/images/uploads/' . $requirementsHasRequirementsField->description1) . '</td></tr>';
    }
    //APPLICATION FIELDS
    if ((($i >= 66) && $i <= 69)) {
        if ($i == 66) {
            $ai1 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 67) {
            $ai2 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 68) {
            $ai3 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 69) {
            $ai4 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }

        $app_items_ordered = $ai1 . $ai3 . $ai4 . $ai2;

        $html_app = $app_items_ordered;
    }
    if ((($i >= 54) && $i <= 64) OR ( $i == 84)) {
        if ($i == 59) {
            $di1 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 54) {
            $di2 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 55) {
            $di3 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 58) {
            $di4 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 60) {
            $di5 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 61) {
            $di6 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 64) {
            $di7 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 62) {
            $di8 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 63) {
            $di9 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 84) {
            $di10 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($title_d == 0) {

            $html_title_deadline.= '<tr><td class="title-field">DEADLINE:</td><tr>';
            // . '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
            // . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
            $title_d = 1;
        } /* else if ($i != 54) {
          $html_deadlines .= '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
          . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
          } */
        $deadlines_items_ordered = $di1 . $di2 . $di3 . $di4 . $di5 . $di6 . $di7 . $di8 . $di9 . $di10;
        $html_deadlines = $html_title_deadline . $deadlines_items_ordered;
    }
    // SUBMIT THESE ITEMS
    if (($i == 5) OR ( $i == 83) OR ( $i == 7) OR ( ($i >= 8) && ($i <= 9)) OR ( ($i >= 13) && ($i <= 14)) OR ( ($i >= 19) && ($i <= 21)) OR ( $i == 23) OR ( $i == 24) OR ( ($i >= 33) && ($i <= 46)) OR ( $i == 49) OR ( $i == 53) OR ( ($i >= 71) && ($i <= 82))) {
        if ($i == 82) {
            $si1 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 71) {
            $si2 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 72) {
            $si3 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 73) {
            $si4 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 74) {
            $si5 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 23) {
            $si6 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 21) {
            $si7 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 20) {
            $si8 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 19) {
            $si9 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 77) {
            $si10 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 76) {
            $si11 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 78) {
            $si12 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 79) {
            $si13 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 80) {
            $si14 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 81) {
            $si15 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 75) {
            $si16 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 8) {
            $si37 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($title_a == 0) {
            $html_title_submit .= '<tr><td class="title-field">SUBMIT THESE ITEMS:</td><tr>';
            $title_a = 1;
        } else if (($i != 82) && ($i != 71) && ($i != 72) && ($i != 73) && ($i != 74) && ($i != 23) && ($i != 21) && ($i != 20) && ($i != 19) && ($i != 77) && ($i != 76) && ($i != 78) && ($i != 79) && ($i != 80) && ($i != 81) && ($i != 75) && ($i != 8) && ($i != 5)) {
            $html_submit_rest .= '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        $submit_items_ordered = $html_app . $si1 . $si2 . $si3 . $si4 . $si5 . $si6 . $si7 . $si8 . $si9 . $si10 . $si11 . $si12 . $si13 . $si14 . $si15 . $si16;
        $html_submit = $html_title_submit . $submit_items_ordered . $html_submit_rest . $si37;
    }
    // ADMISSIONS ADDRESS
    if (($i == 3)) {
        $html_admissions .= '<tr><td class="title-field">ADMISSIONS ADDRESS</td><tr>'
                . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
    }
    // INTERNATIONAL COUNSELOR
    if (($i == 4)) {
        $html_counselor .= '<tr><td class="title-field">INTERNATIONAL COUNSELOR</td><tr>'
                . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
    }
    if (($i != 1) &&
            ($i != 3) &&
            ($i != 4) &&
            ($i != 52) &&
            ($i != 25) &&
            ($i != 47) &&
            ($i != 48)) {
        $html .= '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
    }
    // PORTFOLIO
    if (($i == 25)) {
        $html_portfolio .= '<tr><td class="title-field">PORTFOLIO</td><tr>'
                . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
    }
    //NOTAS ADICIONALES
    if (($i == 9) OR ( $i == 10) OR ( $i == 12) OR ( $i == 70) OR ( $i == 85)) {
        if ($i == 9) {
            $ni1 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 10) {
            $ni2 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 12) {
            $ni3 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 70) {
            $ni4 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($i == 85) {
            $ni5 = '<tr><td class="title-field">' . RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name . '</td><tr>'
                    . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
        }
        if ($title_n == 0) {
            $html_title_notes.= '<tr><td class="title-field">NOTAS ADICIONALES:</td><tr>';
            $title_n = 1;
        }
        $notes_items_ordered = $ni1 . $ni4 . $ni2 . $ni5 . $ni3;
        $html_notes = $html_title_notes . $notes_items_ordered;
    }
    if (($i == 48)) {
        $html_misc .= '<tr><td class="title-field">MISCELANEOS</td><tr>'
                . '<tr><td class="description">' . $requirementsHasRequirementsField->description1 . '</td></tr>';
    }
    ;
    ?>

<?php

}
$mPDF1->WriteHTML($html_gpa . "<BR><BR>" . $nombre_college . "<BR><BR>"  . $html_deadlines . "<BR><BR>"  . $html_admissions . "<BR><BR>"  . $html_counselor . "<BR><BR>");
//$mPDF1->WriteHTML($html_submit . "<BR><BR>"  . $html_portfolio . "<BR><BR>"  . $html_notes . "<BR><BR>"  . $html_misc);
$mPDF1->WriteHTML("</table></tbody></tr></div>");
$mPDF1->AddPage();
$mPDF1->WriteHTML("<table><tbody><tr><div>" . $html_submit . "<BR><BR>"  . $html_portfolio . "<BR><BR>"  . $html_notes . "<BR><BR>"  . $html_misc);
$mPDF1->WriteHTML("</table></tbody></tr></div>");
$mPDF1->Output();
?>