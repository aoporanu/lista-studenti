<?php ob_start();
require_once 'elements/header.php'; ?>
    <div class="well clearfix">
        <?php require_once 'left_menu.php'; ?>
        <div class="col-md-8">
            <?php
            $sql = 'SELECT
    s.nume AS snume,
    s.id AS sid,
    e.id AS eid,
    e.id_prof AS eidprof,
    gc.grupa AS gc_nume,
    grupe.nume as g_nume,
    e.id_sala AS eids,
    e.id_curs AS eidc,
    e.ora,
    e.data,
    c.id,
    c.name,
    c.semestru,
    u.id,
    u.full_name
FROM
    examene e
        LEFT JOIN
    cursuri c ON c.id = e.id_curs
        LEFT JOIN
    users u ON u.id = e.id_prof
        LEFT JOIN
    sali s ON s.id = e.id_sala
        LEFT JOIN
    grupe_curs gc ON gc.id_curs = e.id_curs
        LEFT JOIN grupe ON grupe.id=gc.grupa
WHERE
    u.id = "' . $_SESSION['user']['user_id'] . '" AND c.semestru = "1"';

            $result = $link->query($sql);
            $html = '<style>th { font-weight; 600; }</style>';
            if ($result->num_rows > 0) {
                $nume_prof = '';
                $html .= '<table><tr><th style="font-weight: 600">Grupa</th><th style="font-weight: 600">Sala</th><th style="font-weight: 600">Data</th><th style="font-weight: 600">Ora</th><th style="font-weight: 600">Materie</th></tr><tr><td colspan="4">&nbsp;</td></tr>';
                while ($examen = $result->fetch_object()) {
                    $nume_prof = $examen->full_name;
                    $html .= '<tr>';
                    $html .= '<td>' . $examen->g_nume . '</td>';
                    $html .= '<td>' . $examen->snume . '</td>';
                    $html .= '<td>' . $examen->data . '</td>';
                    $html .= '<td>' . $examen->ora . '</td>';
                    $html .= '<td>' . $examen->name . '</td>';
                    $html .= '</tr>';
                }
                $html .= '</table>';
                include 'tcpdf/tcpdf.php';

                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('Export examene');
                $pdf->SetTitle('Export examene 001');
                $pdf->SetSubject('TCPDF Tutorial');
                $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
                $pdf->SetHeaderData(0, 0, ' Export examene ' . $nume_prof . ' semestrul 1', '', array(0, 64, 255), array(0, 64, 128));
                $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

// set header and footer fonts
                $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
                $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
                $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
                if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
                    require_once(dirname(__FILE__) . '/lang/eng.php');
                    $pdf->setLanguageArray($l);
                }

// ---------------------------------------------------------

// set default font subsetting mode
                $pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
                $pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
                $pdf->AddPage();


                // Print text using writeHTMLCell()
                $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
                $pdf->writeHTML($table, true, 0, true, 0);
                ob_end_clean();
                $pdf->Output('export_examene_' . $nume_prof . '.pdf');
            } else {
                echo '<div class="alert alert-warning">Nu aveti programate examene pentru semestrul 1</div>';
            }

            ?>
        </div>
    </div>
<?php require_once 'elements/footer.php'; ?>