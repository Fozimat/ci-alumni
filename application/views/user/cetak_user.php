<?php
            $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetTitle('Daftar User');
            $pdf->SetHeaderMargin(30);
            $pdf->SetTopMargin(20);
            $pdf->setFooterMargin(20);
            $pdf->SetAutoPageBreak(true);
            $pdf->SetAuthor('Author');
            $pdf->SetDisplayMode('real', 'default');
            $pdf->AddPage();
            $i=0;
            $html='<h3>Daftar User</h3>
                    <table cellspacing="1" bgcolor="#666666" cellpadding="2">
                        <tr bgcolor="#ffffff">
                            <th width="5%" align="center">No</th>
                            <th width="25%" align="center">Nama</th>
                            <th width="35%" align="center">Email</th>
                            <th width="35%" align="center">Date Created</th>
                        </tr>';
            foreach ($user->result_array() as $row) 
                {
                    $i++;
                    $html.='<tr bgcolor="#ffffff">
                                <td align="center">'.$i.'</td>
                                <td>'.$row['name'].'</td>
                                <td>'.$row['email'].'</td>
                                <td>'.date('d M Y', $row['date_created']).'</td>
                            </tr>';
                }
            $html.='</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Output('daftar_user.pdf', 'I');
?>