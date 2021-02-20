<?php
            $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetTitle('Daftar alumni');
            $pdf->SetHeaderMargin(30);
            $pdf->SetTopMargin(20);
            $pdf->setFooterMargin(20);
            $pdf->SetAutoPageBreak(true);
            $pdf->SetAuthor('Author');
            $pdf->SetDisplayMode('real', 'default');
            $pdf->AddPage();
            $i=0;
            $html='<h3>Daftar alumni</h3>
                    <table cellspacing="1" bgcolor="#666666" cellpadding="2">
                        <tr bgcolor="#ffffff">
                            <th width="5%" align="center">No</th>
                            <th width="10%" align="center">NISN</th>
                            <th width="30%" align="center">Nama</th>
                            <th width="10%" align="center">Tahun Lulus</th>
                            <th width="20%" align="center">Email</th>
                            <th width="20%" align="center">Pekerjaan</th>
                        </tr>';
            foreach ($alumni->result_array() as $row) 
                {
                    $i++;
                    $html.='<tr bgcolor="#ffffff">
                                <td align="center">'.$i.'</td>
                                <td>'.$row['nisn'].'</td>
                                <td>'.$row['nama'].'</td>
                                <td>'.$row['tahun_lulus'].'</td>
                                <td>'.$row['email'].'</td>
                                <td>'.$row['pekerjaan'].'</td>
                            </tr>';
                }
            $html.='</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Output('daftar_alumni.pdf', 'I');
?>