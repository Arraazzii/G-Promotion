<?php 			 		  	
include '../../../components/base/head-admin.php';
include '../../../components/navigation/first-navigation-admin.php';
$base_url = 'http://promotion.gama.com/';

	if(isset($_GET['page'])){
		$page = $_GET['page'];
		$file = $page.".php";
		switch ($page) {
			case 'home':
				include "home.php";
			break;
			case 'user':
				include "m_user.php";
			break;
			case 'program':
				include "m_program.php";
			break;
			case 'unit':
				include "m_unit.php";
			break;
			case 'group':
				include "m_grup.php";
			break;
			case 'area':
				include "m_area.php";
			break;
			case 'job':
				include "m_pekerjaan.php";
			break;
			case 'company':
				include "m_perusahaan.php";
			break;
			case 'level':
				include "m_tingkat.php";
			break;
			case 'position':
				include "m_posisi.php";
			break;
			case 'role':
				include "m_role.php";
			break;
			case 'point':
				include "m_point.php";
			break;
			case 'employee':
				include "mt_employee.php";
			break;
			case 'employee_grade':
				include "mt_grade.php";
			break;
			case 'employee_point':
				include "mt_point.php";
			break;
			case 'employee_promotion':
				include "mt_promotion.php";
			break;
			case 'employee_program':
				include "mt_program.php";
			break;
			case 'add_user':
				include "add_user.php";
			break;
			case 'add_role':
				include "add_role.php";
			break;
			case 'add_program':
				include "add_program.php";
			break;
			case 'add_unit':
				include "add_unit.php";
			break;
			case 'add_area':
				include "add_area.php";
			break;
			case 'add_group':
				include "add_grup.php";
			break;
			case 'add_job':
				include "add_job.php";
			break;
			case 'add_company':
				include "add_perusahaan.php";
			break;
			case 'add_level':
				include "add_tingkat.php";
			break;
			case 'add_position':
				include "add_posisi.php";
			break;
			case 'add_point':
				include "add_point.php";
			break;
			case 'add_employee':
				include "add_employee.php";
			break;
			case 'add_employee_point':
				include "add_employee_point.php";
			break;
			case 'add_employee_program':
				include "add_employee_program.php";
			break;
			case 'user_details':
				include "user_details.php";
			break;
			case 'role_details':
				include "role_details.php";
			break;
			case 'program_details':
				include "program_details.php";
			break;
			case 'group_details':
				include "grup_details.php";
			break;
			case 'unit_details':
				include "unit_details.php";
			break;
			case 'area_details':
				include "area_details.php";
			break;
			case 'job_details':
				include "job_details.php";
			break;
			case 'company_details':
				include "perusahaan_details.php";
			break;
			case 'level_details':
				include "tingkat_details.php";
			break;
			case 'position_details':
				include "posisi_details.php";
			break;
			case 'point_details':
				include "point_details.php";
			break;
			case 'employee_details':
				include "employee_details.php";
			break;
			case 'mt_grade_details':
				include "mt_grade_details.php";
			break;
			case 'mt_point_details':
				include "mt_point_details.php";
			break;
			case 'mt_program_details':
				include "mt_program_details.php";
			break;
			case 'upload':
				include "upload.php";
			break;
			case 'download':
				include "download.php";
			break;
		}
	}
	 ?>

<?php include '../../../components/base/footer.php';
	 //} 
 ?>