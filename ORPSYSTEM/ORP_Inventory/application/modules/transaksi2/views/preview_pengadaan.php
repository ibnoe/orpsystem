<?php
date_default_timezone_set('Asia/Jakarta');
tcpdf();
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Inhouse Portal');
$pdf->SetTitle('FC Print');
$pdf->SetSubject('FC Print');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
//$pdf->SetFont('times', 'BI', 20);

// add a page
$pdf->AddPage();

// set some text to print
$html = '';
$html .= '
 	<table width="900px	">
		<tr>
			<td width="120px">
				<table>
					<tr>
						<td colspan="2">
							<img src="'.base_url().'front_assets/img/logo_mh2.png" alt="" /> 
						</td>
					</tr>
				</table>
			</td>
			<td align="left">
				<table>
					<tr>
						<td>Sekolah Mutiarah Harapan </td>
						
					</tr>
					<tr>
						<td style="font-size:10">Indonesia </td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<hr/>
	<br/>
		    <h5>Basic Information</h5>
			<table  width="400px" style="font-size:13px;">
				 <tr>
					 <td width="110px">Subject</td>
					 <td>
						'.$nomorpengadaan.'
					 </td>	
					 <td></td>
					 <td></td>
				 </tr>
				 <tr>
					 <td>Theme</td>
					 <td>
						 '.$thema.'
					 </td>
					 <td></td>
					 <td></td>
				 </tr>
				<tr>
					<td>Grade</td>
					<td>
						'.$grade1.'
					</td>
					<td>
						'.$grade2.'
					</td>
					<td>
						'.$grade3.'
					</td>
				</tr>
				<tr>
					<td>Principals</td>
					<td>
						'.$principals.'
					</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Submit Date</td>
					<td>
						'.$submit_date.'
					</td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>Time Allocations</td>
					<td>
						'.$time_alloaction.'
					</td>
					<td></td>
					<td></td>
				</tr>
			</table>	
			
			<br/>

			<h5>Competence</h5>
			<table  width="700px" style="font-size:13px;">
				<tr>
					<td width="100px">Core Competence</td>
					<td>
						'.$core_competence.'
					</td>
				</tr>
				<tr>
					<td>Basic Competence</td>
					<td>
						'.$basic_competence.'
					</td>
				</tr>	
				<tr>
				<td>Indicator</td>
					<td>
					'.$indicaator.'
					</td>
				</tr>
				<tr>
					<td>Prerequisite Knowledge</td>
						<td>
						'.$prerequisite_knowledge.'
					</td>
				</tr>
				<tr>
					<td>Expected Student Character</td>
					<td>
						'.$exp_student_character.'
					</td>
				</tr>
				<tr>
					<td>Instructional Activity</td>
					<td>
						'.$intructional_activity.'
					</td>
				</tr>
				<tr>
					<td>Material</td>
					<td>
					'.$material.'
					</td>
				</tr>
				<tr>
					<td>Method</td>
					<td>
					'.$method.'
					</td>
				</tr>
			</table>
			<br/>
		
		     <h5>Assesment</h5>
			<table  width="400px" style="font-size:13px;"> 
				<tr>
					<td width="200px">Kompetensi Sikap Spiritual</td>
					<td>
						'.$sikap_spiritual1.'
					</td>
					<td>
						'.$sikap_spiritual2.'
					</td>
				</tr>

				<tr>
					<td>Kompetensi Sikap Sosial</td>
					<td>
						'.$sikap_sosial1.'
					</td>
					<td>
						'.$sikap_sosial2.'
					</td>
				</tr>
				
				<tr>
					<td>Kompetensi Pengetahuan</td>
					<td>
						'.$kompetensi_pengetahuan1.'
					</td>
					<td>
						'.$kompetensi_pengetahuan2.'
					</td>
				</tr>
				
				<tr>
					<td>Kompetensi Keterampilan</td>
					<td>
						'.$kompetensi_keterampilan1.'
					</td>
					<td>
						'.$kompetensi_keterampilan2.'
					</td>
				</tr>
			</table>	
		
			<br/>
		
				 <h5>Activity</h5>
				<table  width="700px" style="font-size:13px;">	 
				 <tr>
					<td width="100px">Opening</td>
					<td colspan="2">'.$opening.'</td>
				 </tr>
				 <tr>
					<td rowspan="3">Main Activity</td>
				
					<td colspan="2">a. Exploration</td>
				 </tr>
				 <tr>
					<td width="400px">'.$main_observing.'</td>
					<td>Observing </td>
 				  </tr>	
				  <tr>
					<td>'.$main_questioning.'</td>
					<td width="100px">Questioning</td>
				 </tr>
				 
				 

				 <tr>
					<td rowspan="3">Closing</td>
				
					<td colspan="2">a. Exploration</td>
				 </tr>
				 <tr>
					<td>'.$close_observing.'</td>
					<td>Observing</td>
				  </tr>	
				  <tr>
					<td>'.$close_questioning.'</td>
					<td>Questioning</td>
				 </tr>
				 
			
				 
				 <tr>
					<td rowspan="3">Closing</td>
				
					<td colspan="2">b.Elaboration</td>
				 </tr>
				 <tr>
					<td>'.$experimenting.'</td>
					<td>Experimenting</td>
				  </tr>	
				  <tr>
					<td>'.$analyzing.'</td>
					<td>Analyzing</td>
				 </tr>
			
			
				 <tr>
					<td rowspan="3">Closing</td>
				
					<td colspan="2">b.Confirmation</td>
				 </tr>
				 <tr>
					<td>'.$communication.'</td>
					<td>Communication</td>
				  </tr>	
		
			</table>


			<h5>Media</h5>
			<table  width="700px" style="font-size:13px;">
				<tr>
					<td width="100px">Media</td>
						<td>
						'.$media.'   
					</td>
				</tr>
				<tr>
					<td>RESOURCES</td>
						<td>
						'.$resources.'
					</td>
				</tr>
				<tr>
					<td>FEEDBACK  (Given by Coordinator or Principal)</td>
					<td>
						'.$feedback.'
					</td>
				</tr>
				<tr>
					<td>NOTES  (Given by teacher during instructional process)</td>
					<td>
						'.$notes.'
					</td>
				</tr>
			</table>		
		
       
';

// print a block of text using Write()
$pdf->writeHTML($html, true, 0, true, 0);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('AS.pdf', 'I');
?>