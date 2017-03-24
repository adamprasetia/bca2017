<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('master/master_model');
		$this->load->model('export_model');
		$this->load->model('interview/callhis_model');
	}
	public function index(){
		$data['content'] = $this->load->view('export','',true);
		$this->load->view('template',$data);
	}
	public function execute(){		
		$this->form_validation->set_rules('date_from','Date From','trim');
		$this->form_validation->set_rules('date_to','Date To','trim');
		if($this->form_validation->run()===false){
			$this->session->set_flashdata('alert','<div class="alert alert-danger">'.validation_errors().'</div>');
			$data['content'] = $this->load->view('export','',true);
			$this->load->view('template',$data);			
		}else{
			ini_set('memory_limit','-1'); 
			
			require_once "../assets/phpexcel/PHPExcel.php";
			$excel = new PHPExcel();
			
			$excel->setActiveSheetIndex(0);
			$active_sheet = $excel->getActiveSheet();
			$active_sheet->setTitle('Candidate');
			
			//style
			$active_sheet->getStyle('A1:BH1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FF0000');
			$active_sheet->getStyle("A1:BH1")->getFont()->getColor()->setRGB('FFFFFF');			
			$active_sheet->getStyle("A1:BH1")->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$active_sheet->getStyle("A1:BZ1")->getFont()->setBold(true);
			$active_sheet->getStyle("BA")->getFont()->setBold(true);
			$active_sheet->getStyle("BB")->getFont()->setBold(true);
			$active_sheet->getStyle("BC")->getFont()->setBold(true);

			//header
			$active_sheet->setCellValue('A1', 'MOP ID');
			$active_sheet->setCellValue('B1', 'Username');
			$active_sheet->setCellValue('C1', 'Fullname');
			$active_sheet->setCellValue('D1', 'Nickname');
			$active_sheet->setCellValue('E1', 'Day of Birth');
			$active_sheet->setCellValue('F1', 'Age');
			$active_sheet->setCellValue('G1', 'City');
			$active_sheet->setCellValue('H1', 'Phonoe/HP');
			$active_sheet->setCellValue('I1', 'Email');
			$active_sheet->setCellValue('J1', 'Twitter');
			$active_sheet->setCellValue('K1', 'Brand Rokok');
			$active_sheet->setCellValue('L1', 'Judul Karya');
			$active_sheet->setCellValue('M1', 'Jenis Karya');
			$active_sheet->setCellValue('N1', 'Berhasil Dihubungi');
			$active_sheet->setCellValue('O1', 'Minta Waktu 15 Menit');
			$active_sheet->setCellValue('P1', 'Perokok Dewasa Berusia Min 18 Tahun');
			$active_sheet->setCellValue('Q1', 'Dihubungi Kembali');
			$active_sheet->setCellValue('R1', 'A-1 (Plagiat)');
			$active_sheet->setCellValue('S1', 'A-1 (Tahu Program Ini Dari Mana)');
			$active_sheet->setCellValue('T1', 'A-2 (Penjelasan Karya)');
			$active_sheet->setCellValue('U1', 'A-3 (Pernyataan Tertulis Materai)');
			$active_sheet->setCellValue('V1', 'B-1 (Kota F2F)');
			$active_sheet->setCellValue('W1', 'B-1 (Bersedia Hadir F2f)');
			$active_sheet->setCellValue('X1', 'B-2 (Terakhir Keluar Negeri)');
			$active_sheet->setCellValue('Y1', 'B-2 (Tujuan)');
			$active_sheet->setCellValue('Z1', 'B-3 (Traveling Ke Negara Visa)');
			$active_sheet->setCellValue('AA1', 'B-3 (Negara, Tahun, Jenis Visa)');
			$active_sheet->setCellValue('AB1', 'B-4 (Bersedia Memenangkan Grandprize)');
			$active_sheet->setCellValue('AC1', 'C-1 (Yang Akan Dilakukan Bila Menang Grandprize)');
			$active_sheet->setCellValue('AD1', 'C-2 (Experience seperti apa yang anda ingin dapatkan ?)');
			$active_sheet->setCellValue('AE1', 'D-1 (What do you know about Sampoerna A Mild Brand)');
			$active_sheet->setCellValue('AF1', 'D-2 (What was the most memorable Sampoerna A Mild program that you know)');
			$active_sheet->setCellValue('AG1', 'D-3 (Where do you usually see the Sampoerna A Mild campaign advertisement)');
			$active_sheet->setCellValue('AH1', 'D-3 (Nama Billboard, Magazine, Newspaper, Cinema Ad atau yang lainnya)');
			$active_sheet->setCellValue('AI1', 'D-4 (Have you ever been to Sampoerna A Mild events? If yes what was it and why did you go there)');
			$active_sheet->setCellValue('AJ1', 'A (Memiliki Passport)');
			$active_sheet->setCellValue('AK1', 'A (Nama Passport)');
			$active_sheet->setCellValue('AL1', 'A (Masa Berlaku Passport)');
			$active_sheet->setCellValue('AM1', 'B (Apakah Anda pernah mengunjungi negara-negara berikut Australia,Uni Eropa (Perancis, Italia, Inggris, Jerman, Belanda, etc))');
			$active_sheet->setCellValue('AN1', 'C (Pernah Mengikuti Campaign Amild/Sejenis)');
			$active_sheet->setCellValue('AO1', 'C (Sebutkan)');
			$active_sheet->setCellValue('AP1', 'Distribution Date');
			$active_sheet->setCellValue('AQ1', 'Status');
			$active_sheet->setCellValue('AR1', 'Call History');
			
			$date_from 	= format_ymd($this->input->post('date_from'));
			$date_to 	= format_ymd($this->input->post('date_to'));

			$result 	= $this->export_model->export($date_from,$date_to)->result();
			// $result 	= array();
			$i=2;
			foreach($result as $r){
				$active_sheet->setCellValueExplicit('A'.$i, $r->mop_id);
				$active_sheet->setCellValue('B'.$i, $r->username);
				$active_sheet->setCellValue('C'.$i, $r->fullname);
				$active_sheet->setCellValue('D'.$i, $r->nickname);
				$active_sheet->setCellValue('E'.$i, PHPExcel_Shared_Date::PHPToExcel(date_to_excel($r->dob)));
				$active_sheet->getStyle('E'.$i)->getNumberFormat()->setFormatCode('dd/mm/yyyy');		   
				$active_sheet->setCellValue('F'.$i, calcutate_age($r->dob));
				$active_sheet->setCellValue('G'.$i, $r->city);
				$active_sheet->setCellValueExplicit('H'.$i, $r->tlp);
				$active_sheet->setCellValue('I'.$i, $r->email);
				$active_sheet->setCellValue('J'.$i, $r->tw);
				$active_sheet->setCellValue('K'.$i, $r->brand);
				$active_sheet->setCellValue('L'.$i, $r->art_title);
				$active_sheet->setCellValue('M'.$i, $r->art_type);
				$active_sheet->setCellValue('N'.$i, ($r->called==1?'Berhasil Dihubungi':''));
				$active_sheet->setCellValue('O'.$i, $this->yatidak($r->minute));
				$active_sheet->setCellValue('P'.$i, $this->yatidak($r->smoker));
				$active_sheet->setCellValue('Q'.$i, $this->yatidak($r->callagain));
				$active_sheet->setCellValue('R'.$i, $this->yatidak($r->plagiat));
				$active_sheet->setCellValue('S'.$i, $r->plagiat_desc);
				$active_sheet->setCellValue('T'.$i, $r->art_desc);
				$active_sheet->setCellValue('U'.$i, $this->yatidak($r->signature));
				$active_sheet->setCellValue('V'.$i, $r->city_f2f_name);
				$active_sheet->setCellValue('W'.$i, $this->yatidak($r->facetoface));
				$active_sheet->setCellValue('X'.$i, $this->overseas($r->overseas));
				$active_sheet->setCellValue('Y'.$i, $r->overseas_desc);
				$active_sheet->setCellValue('Z'.$i, $this->yatidak($r->visa));
				$active_sheet->setCellValue('AA'.$i, $r->visa_desc);
				$active_sheet->setCellValue('AB'.$i, $this->yatidak($r->grandprize));
				$active_sheet->setCellValue('AC'.$i, $r->trivia);
				$active_sheet->setCellValue('AD'.$i, $r->experience);
				$active_sheet->setCellValue('AE'.$i, $r->english1);
				$active_sheet->setCellValue('AF'.$i, $r->english2);
				$active_sheet->setCellValue('AG'.$i, $this->english3($r->english3));
				$active_sheet->setCellValue('AH'.$i, $r->english3_desc);
				$active_sheet->setCellValue('AI'.$i, $r->english4);
				$active_sheet->setCellValue('AJ'.$i, $this->yatidak($r->passport));
				$active_sheet->setCellValue('AK'.$i, $r->passport_name);
				$active_sheet->setCellValue('AL'.$i, PHPExcel_Shared_Date::PHPToExcel(date_to_excel($r->passport_exp)));
				$active_sheet->getStyle('AL'.$i)->getNumberFormat()->setFormatCode('dd/mm/yyyy');		   
				$active_sheet->setCellValue('AM'.$i, $r->country);
				$active_sheet->setCellValue('AN'.$i, $this->yatidak($r->campaign));
				$active_sheet->setCellValue('AO'.$i, $r->campaign_desc);
				$active_sheet->setCellValue('AP'.$i, PHPExcel_Shared_Date::PHPToExcel(date_to_excel($r->dist_date)));
				$active_sheet->getStyle('AP'.$i)->getNumberFormat()->setFormatCode('dd/mm/yyyy');		   
				$active_sheet->setCellValue('AQ'.$i, $r->status_name);
				$active_sheet->setCellValue('AR'.$i, $this->callhis_model->get_note($r->id));
				$i++;
			}

			$filename='GAC2016_Candidate_'.date('Ymd_His').'.xlsx';
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="'.$filename.'"');
			header('Cache-Control: max-age=0');
								 
			$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');  
			$objWriter->save('php://output');										
		}
	}
	private function overseas($id)
	{
		switch ($id) {
			case 1:
				return "Belum pernah sama sekali";
				break;
			case 2:
				return "3 tahun yang lalu";
				break;
			case 3:
				return "2 tahun yang lalu";
				break;
			case 4:
				return "1 tahun yang lalu";
				break;
			case 5:
				return "Kurang lebih 6 bulan yang lalu";
				break;
			case 6:
				return "Dalam 3 bulan terakhir ini";
				break;
			case 7:
				return "Dalam 1 bulan terakhir ini";
				break;			
			default:
				return "";
				break;
		}
	}
	private function yatidak($id)
	{
		switch ($id) {
			case 1:
				return "Ya";
				break;
			case 2:
				return "Tidak";
				break;
			default:
				return "";
				break;
		}
	}
	private function english3($id)
	{
		switch ($id) {
			case 1:
				return "Billboard";
				break;
			case 2:
				return "Magazine";
				break;
			case 3:
				return "Newspaper";
				break;
			case 4:
				return "Cinema Ad";
				break;
			default:
				return "";
				break;
		}
	}
}