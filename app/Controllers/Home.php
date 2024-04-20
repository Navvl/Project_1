<?php

namespace App\Controllers;
use App\Models\M_PKL;
use Dompdf\Dompdf;
use App\Libraries\Pdf;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends BaseController
{ 
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect(); // Access the database connection via Dependency Injection
    }
    public function dashboard(){
        if(session()->get('id')>0){
        $model = new M_PKL();
        $data['elvan']=$model->tampil('perusahaan');
        $data['elvan2']=$model->join4tbl('pelamaran', 'siswa', 'perusahaan', 'sekolah',
        'pelamaran.nis = siswa.nis',
        'pelamaran.id_perusahaan = perusahaan.id_perusahaan',
        'pelamaran.id_sekolah = sekolah.id_sekolah');

        echo view('header');
        echo view('menu');
		echo view('dashboard', $data);
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
    }
	public function sekolah()
	{
        if(session()->get('id')>0){
		$model = new M_PKL();
		$data['elvan']=$model->tampil('sekolah');

        echo view('header', $data);
        echo view('menu', $data);
		echo view('sekolah', $data);
        echo view('footer', $data);
    } else {
        return redirect()->to('home/login');
    }
	}
    public function sekolah_kajur()
	{
        $id_user = session()->get('id');
        if(session()->get('id')>0){
		$model = new M_PKL();
		$data['elvan']=$model->tampil_sesuai_kajur('sekolah', $id_user);

        echo view('header', $data);
        echo view('menu', $data);
		echo view('sekolah_kajur', $data);
        echo view('footer', $data);
    } else {
        return redirect()->to('home/login');
    }
	}
    public function t_sekolah()
	{
        if(session()->get('id')>0){
		$model = new M_PKL();
		$data['elvan']=$model->tampil('sekolah');


        echo view('header');
        echo view('menu');
		echo view('t_sekolah', $data);
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
	}
    public function aksi_tsekolah() {
        $model = new M_PKL();
        $a = $this->request->getPost('nama_sekolah');
        $b = $this->request->getPost('jurusan_sekolah');
        $c = $this->request->getPost('alamat_sekolah');
        $id_user = session()->get('id');
    
        // Periksa apakah id_sekolah dari kajur dengan id_user saat ini adalah null atau 0
        $id_sekolah_kajur = $model->getIdSekolahKajur($id_user);
    
        if ($id_sekolah_kajur === null || $id_sekolah_kajur === 0) {
            // Jika id_sekolah dari kajur adalah null atau 0, maka tambahkan data sekolah baru
            $isi = array(
                'nama_sekolah' => $a,
                'jurusan_sekolah' => $b,
                'alamat_sekolah' => $c,
                'id_user' => $id_user,
            );
    
            $model->tambah('sekolah', $isi);
    
            return redirect()->to('Home/sekolah_kajur');
        } else {
            // Jika id_sekolah dari kajur bukan null atau 0, maka tampilkan pesan kesalahan atau lakukan aksi lain sesuai kebutuhan
            // Contoh: Tampilkan pesan error
            session()->setFlashdata('error', 'Anda sudah terdaftar sebagai kajur di sekolah.');
            return redirect()->to('Home/t_sekolah');
        }
    }
    
    public function e_sekolah($id)
	{
        if(session()->get('id')>0){
            $model = new M_PKL();
            $where=array('id_sekolah'=>$id);
            $data['satu']=$model->getWhere('sekolah',$where);
            
    
            echo view('header');
            echo view('menu', $data);
            echo view('e_sekolah', $data);
            echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
	}
    public function aksi_esekolah(){
        $model = new M_PKL();
		$a= $this->request->getPost('nama_sekolah');
		$b= $this->request->getPost('jurusan_sekolah');
		$c= $this->request->getPost('alamat_sekolah');
        $id= $this->request->getPost('id');
		// $uploadedFile = $this->request->getFile('foto');
		// $foto = $uploadedFile->getName();

        $where=array('id_sekolah'=>$id);

		$isi = array(
			'nama_sekolah' => $a,
			'jurusan_sekolah' => $b,
			// 'foto' =>$foto,
			'alamat_sekolah' => $c,
				);

		$model->edit('sekolah', $isi, $where);


		return redirect()->to('Home/sekolah_kajur');
    }
    public function hapus_sekolah($id){
		$model = new M_PKL();
		$where=array('id_sekolah'=>$id);

        $isi = array(
			'id_sekolah' => null
				);

		$model->edit('kajur', $isi, $where);

		$model->hapus('sekolah', $where);

		return redirect()->to('Home/sekolah_kajur');	
	}
    public function surat($id)
    {
        if(session()->get('id')>0){
    require_once  FCPATH. 'tcpdf/tcpdf.php';
    $model = new M_PKL();
	// $data['elvan']=$model->join('pelamaran', 'siswa', 'siswa.nis=pelamaran.nis');
    $data['satu']=$model->getWhereWithJoin2('pelamaran', 'siswa','perusahaan', 'siswa.nis=pelamaran.nis','perusahaan.id_perusahaan=pelamaran.id_perusahaan', ['pelamaran.id_pelamaran' => $id]);
    $data['dua']=$model->getWhereWithJoin('pelamaran', 'kajur', 'pelamaran.id_sekolah=kajur.id_sekolah', ['pelamaran.id_pelamaran' => $id]);
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Your Title');
    $pdf->SetSubject('Your Subject');
    $pdf->SetKeywords('Your Keywords');
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    // Add a page
$pdf->AddPage();


    // Set some content to print
    $html = view('surat_pkl', $data); // Ganti 'your_pdf_view' dengan nama view Anda

    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('Surat_PKL.pdf', 'I');
    exit();
} else {
    return redirect()->to('home/login');
}
    }
	public function login()

	{
		echo view ('header');
		echo view('login');
		
	}
	public function aksi_login()

	{
		$name = $this->request->getPost('username');
		$pw = $this->request->getPost('password');

		$where = array(

			'username'=>$name,
			'password'=>$pw,
		);
		
		$model = new M_PKL();
		$check = $model -> getWhere('user',$where);
		
			if ($check>0) {
				session()->set('nama',$check->username);
				session()->set('id',$check->id_user);
				session()->set('level',$check->id_level);
			return redirect()->to('home/dashboard');
		}else{
			return redirect()->to('home/login');
		

		}
	}
		public function logout()

	{
		session()->destroy();
		return redirect()->to('home/login');
	}
    public function createacc()

	{
		echo view ('header');
		echo view('createacc');
		
	}
	public function t_murid()
	{
		
		$model = new M_PKL;
        $data['elvan'] = $model->tampil('sekolah');
		
		echo view ('header');
		echo view('t_murid', $data);
		echo view('footer');
		
		
	}
	public function aksi_tmurid()
	{
		$model=new M_PKL;
		$a = $this -> request ->getPost('nama_siswa');
        $b = $this -> request ->getPost('password');
		$c = $this -> request ->getPost('kelas');
		$d = $this -> request ->getPost('nohp_siswa');
        $e = $this -> request ->getPost('jk_siswa');
        $f = $this -> request ->getPost('alamat_siswa');
        $g = $this -> request ->getPost('id_sekolah');
        $h = '1';

       

        $isi2=array(
			'username'=>$a,
			'password'=>$b,
			'id_level'=>$h,
            
		);

        $model->tambah('user',$isi2);
        $id_user = $model->insertID();

        $isi=array(
			'nama_siswa'=>$a,
			'password'=>$b,
			'kelas'=>$c,
            'nohp_siswa'=>$d,
            'jk_siswa'=>$e,
            'alamat_siswa'=>$f,
            'id_sekolah'=>$g,
            'id_level'=> $h,
            'id_user' => $id_user,
		);

        
		$model->tambah('siswa',$isi);

		return redirect()->to('home/login');
		}
        public function t_kajur()
        {
            
            $model = new M_PKL;
            $data['elvan'] = $model->tampil('sekolah');
            
            echo view ('header');
            echo view('t_kajur', $data);
            echo view('footer');
            
            
        }
        public function aksi_tkajur()
{
    $model = new M_PKL;
    $a = $this->request->getPost('nama_kajur');
    $b = $this->request->getPost('password');
    $c = $this->request->getPost('nohp_kajur');
    $d = $this->request->getPost('bidang_kajur');
    $h = '2'; // id_level

    // Data untuk tabel 'user'
    $user_data = array(
        'username' => $a,
        'password' => $b,
        'id_level' => $h,
    );

    // Memasukkan data ke tabel 'user'
    $model->tambah('user', $user_data);

    // Mendapatkan ID user yang baru saja ditambahkan
    $id_user = $model->insertID();

    // Data untuk tabel 'kajur'
    $kajur_data = array(
        'nama_kajur' => $a,
        'password' => $b,
        'nohp_kajur' => $c,
        'bidang_kajur' => $d,
        'id_user' => $id_user,
        'id_level' => $h,
    );

    // Memasukkan data ke tabel 'kajur'
    $model->tambah('kajur', $kajur_data);

    return redirect()->to('home/login');
}

            public function t_admin()
            {
                
                $model = new M_PKL;
                $data['elvan'] = $model->tampil('sekolah');
                
                echo view ('header');
                echo view('t_admin', $data);
                echo view('footer');
                
                
            }
            public function aksi_tadmin()
            {
                $model=new M_PKL;
                $a = $this -> request ->getPost('nama_admin');
                $b = $this -> request ->getPost('password');
                $h = '3';
        
                $isi2=array(
                    'username'=>$a,
                    'password'=>$b,
                    'id_level'=>$h,
                );
        
                $model->tambah('user',$isi2);
                $id_user = $model->insertID();

                $isi=array(
                    'nama_admin'=>$a,
                    'password'=>$b,
                    'id_level'=> $h,
                    'id_user' => $id_user,
                    
                );
        
               
                $model->tambah('admin',$isi);
        
                return redirect()->to('home/login');
                }

    public function perusahaan()
	{
        if(session()->get('id')>0){
		$model = new M_PKL();
		$data['elvan']=$model->join1('perusahaan', 'lowongan', 'perusahaan.id_lowongan=lowongan.id_lowongan');

        echo view('header');
        echo view('menu');
		echo view('perusahaan', $data);
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
	}
    public function data_pt()
	{
        $id_user = session()->get('id');
        if(session()->get('id')>0){
		$model = new M_PKL();
		$data['elvan']=$model->tampil_sesuai_admin('perusahaan', $id_user);

        echo view('header');
        echo view('menu');
		echo view('data_pt', $data);
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
	}
    public function t_datapt()
	{
        if(session()->get('id')>0){
		$model = new M_PKL();
		$data['elvan']=$model->tampil('perusahaan');

        echo view('header');
        echo view('menu');
		echo view('t_datapt', $data);
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
	}
    public function aksi_tdatapt(){
        $model = new M_PKL();
		$a= $this->request->getPost('nama_perusahaan');
		$b= $this->request->getPost('alamat_perusahaan');
		$c= $this->request->getPost('deskripsi_perusahaan');
        $d= $this->request->getPost('bidang_perusahaan');
        $id_user = session()->get('id');
		// $uploadedFile = $this->request->getFile('foto');
		// $foto = $uploadedFile->getName();

		$isi = array(
			'nama_perusahaan' => $a,
			'alamat_perusahaan' => $b,
			// 'foto' =>$foto,
			'deskripsi_perusahaan' => $c,
            'bidang_perusahaan' => $d,
            'id_user' => $id_user
				);

		$model->tambah('perusahaan', $isi);


		return redirect()->to('Home/data_pt');
    }
    public function e_datapt($id)
	{
        if(session()->get('id')>0){
            $model = new M_PKL();
            $where=array('id_perusahaan'=>$id);
            $data['satu']=$model->getWhere('perusahaan',$where);
            
    
            echo view('header');
            echo view('menu', $data);
            echo view('e_datapt', $data);
            echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
	}
    public function aksi_edatapt(){
        $model = new M_PKL();
		$a= $this->request->getPost('nama_perusahaan');
		$b= $this->request->getPost('alamat_perusahaan');
		$c= $this->request->getPost('deskripsi_perusahaan');
        $d= $this->request->getPost('bidang_perusahaan');
        $id= $this->request->getPost('id');
		// $uploadedFile = $this->request->getFile('foto');
		// $foto = $uploadedFile->getName();

        $where=array('id_perusahaan'=>$id);

		$isi = array(
			'nama_perusahaan' => $a,
			'alamat_perusahaan' => $b,
			// 'foto' =>$foto,
			'deskripsi_perusahaan' => $c,
            'bidang_perusahaan' => $d,
				);

		$model->edit('perusahaan', $isi, $where);


		return redirect()->to('Home/data_pt');
    }
    public function hapus_datapt($id){
		$model = new M_PKL();
		$where=array('id_perusahaan'=>$id);
		$model->hapus('perusahaan', $where);

		return redirect()->to('Home/data_Pt');	
	}
    public function lowongan_murid()
	{   
        $id_user = session()->get('id');
        if(session()->get('id')>0){
		$model = new M_PKL();
        $data['elvan']=$model->join('perusahaan', 'lowongan', 'perusahaan.id_lowongan=lowongan.id_lowongan');

        echo view('header');
        echo view('menu');
		echo view('lowongan_murid', $data);
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
	}
    public function melamar($id)
	{
        if(session()->get('id')>0){
        $id_user = session()->get('id');
		$model = new M_PKL();
        $data['siswa']=$model->tampil('siswa');
        $data['sekolah']=$model->tampil('sekolah');
        $data['elvan']=$model->join4tbl('pelamaran', 'siswa', 'perusahaan', 'sekolah',
        'pelamaran.nis = siswa.nis',
        'pelamaran.id_perusahaan = perusahaan.id_perusahaan',
        'pelamaran.id_sekolah = sekolah.id_sekolah');
        $data['satu']=$model->getWhereWithJoin('lowongan', 'perusahaan', 'perusahaan.id_lowongan = lowongan.id_lowongan' , ['lowongan.id_lowongan' => $id]);

       

        echo view('header');
        echo view('menu');
		echo view('melamar', $data);
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
	}
    public function aksi_melamar(){
        $model = new M_PKL();
        $id_perusahaan= intval($this->request->getPost('id_perusahaan'));
        $id_lowongan=intval($this->request->getPost('id_lowongan'));
        $nis= intval($this->request->getPost('nis'));
        $id_sekolah= intval($this->request->getPost('id_sekolah'));
        $id_user= intval($this->request->getPost('id_user'));
        $f= $this->request->getPost('durasi_pkl');
        $g= $this->request->getPost('bidang_pkl');
        $status= 'Belum Diterima';
        $surat= 'Tidak Ada';
        $jumlah= '1 ';
        $h= $this->request->getPost('tgl_mulai');
		// $uploadedFile = $this->request->getFile('foto');
		// $foto = $uploadedFile->getName();

        $tanggal_mulai = date_create($h);
        date_add($tanggal_mulai, date_interval_create_from_date_string("$f months")); // Menambahkan durasi bulan ke tanggal mulai
        $tgl_selesai = date_format($tanggal_mulai, 'Y-m-d'); // Format tanggal selesai sesuai kebutuhan (misalnya 'Y-m-d')

		$isi = array(
            'id_perusahaan' => $id_perusahaan,
            'id_lowongan' => $id_lowongan,
            'id_sekolah' => $id_sekolah,
            'id_user' => $id_user,
            'nis' => $nis,
            'durasi_pkl' => $f,
            'bidang_pkl' => $g,
            'status' => $status,
            'surat' => $surat,
            'jumlah' => $jumlah,
            'tgl_mulai' => $h,
            'tgl_selesai' => $tgl_selesai
     
				);

                // var_dump($isi);

		$model->tambah('pelamaran', $isi);


		return redirect()->to('Home/lowongan_murid');
    }
    public function lowongan()
	{   
        $id_user = session()->get('id');
        if(session()->get('id')>0){
		$model = new M_PKL();
        $data['elvan']=$model->tampil_sesuai_join('perusahaan', 'lowongan', 'perusahaan.id_lowongan=lowongan.id_lowongan', $id_user);

        echo view('header');
        echo view('menu');
		echo view('lowongan', $data);
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
	}
    public function t_lowongan()
	{
        if(session()->get('id')>0){
        $id_user = session()->get('id');
		$model = new M_PKL();
        $data['elvan'] = $model->tampilPerusahaanByUser($id_user);


        echo view('header');
        echo view('menu');
		echo view('t_lowongan', $data);
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
	}
    public function aksi_tlowongan(){
        $model = new M_PKL();
        $id_perusahaan= intval($this->request->getPost('id_perusahaan'));
		$a= $this->request->getPost('deskripsi_lowongan');
		$b= $this->request->getPost('fasilitas');
		$c= $this->request->getPost('tugas');
        $d= $this->request->getPost('kuota');
        $e= $this->request->getPost('jk_lowongan');
        $status= 'Tidak Terpilih';
        $id_user = session()->get('id');
		// $uploadedFile = $this->request->getFile('foto');
		// $foto = $uploadedFile->getName();

		$isi = array(
            'id_perusahaan' => $id_perusahaan,
			'deskripsi_lowongan' => $a,
			'fasilitas' => $b,
			// 'foto' =>$foto,
			'tugas' => $c,
            'kuota' => $d,
            'jk_lowongan' => $e,
            'status' => $status,
            'id_user' => $id_user
				);

                // var_dump($isi);

		$model->tambah('lowongan', $isi);


		return redirect()->to('Home/lowongan');
    }
    public function e_lowongan($id)
	{
        if(session()->get('id')>0){
            $model = new M_PKL();
            $where=array('id_lowongan'=>$id);
            $data['jk']=$model->tampil('lowongan');
            $data['satu']=$model->getWhereWithJoin('lowongan', 'perusahaan', 'perusahaan.id_lowongan = lowongan.id_lowongan' , ['lowongan.id_lowongan' => $id]);
            $data['elvan']=$model->join('lowongan', 'perusahaan', 'perusahaan.id_lowongan = lowongan.id_lowongan');
            echo view('header');
            echo view('menu', $data);
            echo view('e_lowongan', $data);
            echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
	}
    public function aksi_elowongan(){
        $model = new M_PKL();
		$a= $this->request->getPost('deskripsi_lowongan');
		$b= $this->request->getPost('fasilitas');
		$c= $this->request->getPost('tugas');
        $d= $this->request->getPost('kuota');
        $id= $this->request->getPost('id');
		// $uploadedFile = $this->request->getFile('foto');
		// $foto = $uploadedFile->getName();

        $where=array('id_lowongan'=>$id);


		$isi = array(
			'deskripsi_lowongan' => $a,
			'fasilitas' => $b,
			// 'foto' =>$foto,
			'tugas' => $c,
            'kuota' => $d,
				);

		$model->edit('lowongan', $isi, $where);


		return redirect()->to('Home/lowongan');
    }
    public function hapus_lowongan($id){
		$model = new M_PKL();
		$where=array('id_lowongan'=>$id);
		$model->hapus('lowongan', $where);

		return redirect()->to('Home/lowongan');	
	}
    public function pilih($id){
        if(session()->get('id')>0){
            $model = new M_PKL();
            $where=array('id_lowongan'=>$id);
            $data['satu']=$model->getWhere('lowongan',$where);
    
            echo view('header');
            echo view('menu', $data);
            echo view('pilih', $data);
            echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
	}
    public function aksi_pilih(){
        $model = new M_PKL();
		$a= $this->request->getPost('status');
        $id= $this->request->getPost('id');
		// $uploadedFile = $this->request->getFile('foto');
		// $foto = $uploadedFile->getName();

        $where=array('id_lowongan'=>$id);


		$isi = array(
			'status' => $a,
				);

		$model->edit('lowongan', $isi, $where);


		return redirect()->to('Home/perusahaan');
    }
   
    public function pelamar()
	{
        if(session()->get('id')>0){
		$model = new M_PKL();
        $id_user = session()->get('id');
        $data['elvan']=$model->tampil_sesuai_join4_2($id_user);

        echo view('header');
        echo view('menu');
		echo view('pelamar', $data);
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
	}
    public function penerimaan_murid()
	{
        if(session()->get('id')>0){
        $id_user = session()->get('id');
		$model = new M_PKL();
		$data['elvan']=$model->join4tbl('pelamaran', 'siswa', 'perusahaan', 'sekolah',
        'pelamaran.nis = siswa.nis',
        'pelamaran.id_perusahaan = perusahaan.id_perusahaan',
        'pelamaran.id_sekolah = sekolah.id_sekolah');

        echo view('header');
        echo view('menu');
		echo view('penerimaan_murid', $data);
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
	}
    public function penerimaan()
	{
        if(session()->get('id')>0){
        $id_user = session()->get('id');
		$model = new M_PKL();
		$data['elvan']=$model->tampil_sesuai_join4('pelamaran', 'siswa', 'perusahaan', 'sekolah',
        'pelamaran.nis = siswa.nis',
        'pelamaran.id_perusahaan = perusahaan.id_perusahaan',
        'pelamaran.id_sekolah = sekolah.id_sekolah', $id_user);

        echo view('header');
        echo view('menu');
		echo view('penerimaan', $data);
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
	}
    public function terima($id)
	{
        if(session()->get('id')>0){
            $model = new M_PKL();
            $where=array('id_pelamaran'=>$id);
            $data['satu']=$model->getWhereWithJoin4Tbl('pelamaran', 'siswa', 'perusahaan', 'sekolah',
            'pelamaran.nis = siswa.nis',
            'pelamaran.id_perusahaan = perusahaan.id_perusahaan',
            'pelamaran.id_sekolah = sekolah.id_sekolah', ['pelamaran.id_pelamaran' => $id]);
    
            echo view('header');
            echo view('menu', $data);
            echo view('terima', $data);
            echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
	}
    public function aksi_terima(){
        $model = new M_PKL();
		$a= $this->request->getPost('status');
        $id= $this->request->getPost('id');
		// $uploadedFile = $this->request->getFile('foto');
		// $foto = $uploadedFile->getName();

        $where=array('id_pelamaran'=>$id);


		$isi = array(
			'status' => $a,
				);

		$model->edit('pelamaran', $isi, $where);


		return redirect()->to('Home/penerimaan');
    }
    public function hapus_pelamar($id){
		$model = new M_PKL();
		$where=array('id_pelamaran'=>$id);
		$model->hapus('pelamaran', $where);

		return redirect()->to('Home/penerimaan');	
	}
    public function buat_surat($id)
	{
        if(session()->get('id')>0){
            $model = new M_PKL();
            $where=array('id_pelamaran'=>$id);
            $data['satu']=$model->getWhereWithJoin4Tbl('pelamaran', 'siswa', 'perusahaan', 'sekolah',
            'pelamaran.nis = siswa.nis',
            'pelamaran.id_perusahaan = perusahaan.id_perusahaan',
            'pelamaran.id_sekolah = sekolah.id_sekolah', ['pelamaran.id_pelamaran' => $id]);
    
            echo view('header');
            echo view('menu', $data);
            echo view('buat_surat', $data);
            echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
	}
    public function aksi_buat_surat(){
        $model = new M_PKL();
		$a= $this->request->getPost('surat');
        $id= $this->request->getPost('id');
		// $uploadedFile = $this->request->getFile('foto');
		// $foto = $uploadedFile->getName();

        $where=array('id_pelamaran'=>$id);


		$isi = array(
			'surat' => $a,
				);

		$model->edit('pelamaran', $isi, $where);


		return redirect()->to('Home/pelamar');
    }
    public function kajur()
	{
        if(session()->get('id')>0){
		$model = new M_PKL();
		$data['elvan']=$model->join('kajur', 'sekolah', 'kajur.id_sekolah=sekolah.id_sekolah');

        echo view('header');
        echo view('menu');
		echo view('kajur', $data);
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
	}
    public function profile_kajur()
{
    // Periksa apakah pengguna telah login dan memiliki tingkat akses yang sesuai
    if (session()->get('level') > 0) {
        // Periksa apakah pengguna memiliki tingkat akses siswa

            // Inisialisasi model M_PKL
            $model = new M_PKL();

            // Ambil data siswa berdasarkan ID pengguna yang sedang login
            $where = ['id_user' => session()->get('id')];
            $data['satu'] = $model->getWhere('kajur', $where);

            // Ambil ID sekolah dari data siswa yang sedang login
            $idSekolah = $data['satu']->id_sekolah;

            // Ambil data sekolah berdasarkan ID sekolah yang diperoleh
            $where2 = ['id_sekolah' => $idSekolah];
            $data['dua'] = $model->getWhere('sekolah', $where2);

            // Tampilkan view dengan data yang telah diperoleh
            echo view('header');
            echo view('menu', $data);
            echo view('profile_kajur', $data); 
            echo view('footer');
    } else {
        // Redirect pengguna ke halaman login jika belum login
        return redirect()->to('home/login');
    }
}
public function aksi_ekajur()
	{
		$model = new M_PKL();
		
		$a= $this->request->getPost('nama_kajur');
		$b= $this->request->getPost('nohp_kajur');
		$c= $this->request->getPost('bidang_kajur');

        $where = ['id_user' => session()->get('id')];
       

		$isi = array(
		
			'nama_kajur' => $a,
			'nohp_kajur' => $b,
			'bidang_kajur' => $c,
		
				);

		$model->edit('kajur', $isi, $where);

        $isi2 = array(
		
			'username' => $a,
			
				);
        
        $model->edit('user', $isi2, $where);


		return redirect()->to('Home/profile_kajur');
		
	}
    public function e_foto_kajur()
{
    if(session()->get('level') > 0){
		$model = new M_PKL;
		$where = array('id_user' => session()->get('id'));
		$data['user'] = $model->getWhere('kajur', $where);

		echo view('header');
		echo view('menu',$data);
		echo view('e_foto_kajur',$data); 
		echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
}

public function aksi_ubah_foto_kajur()
{
	if ($this->request->getFile('img')) {

		$file = $this->request->getFile('img');
		$newFileName = $file->getRandomName(); 
		$file->move(ROOTPATH . 'public/img', $newFileName);

		$userModel = new M_PKL(); 
		$userId = array('id_user' => session()->get('id'));
		$userData = ['img' => $newFileName];
		$userModel->edit('kajur', $userData,$userId);
		return redirect()->to('home/profile_kajur');
	} else {
		return redirect()->to('home/e_foto');
}
	}

	public function hapusfoto_kajur()
{       
        $userModel = new M_PKL(); 
        $userData = ['img' => null];
		$userId = array('id_user' => session()->get('id'));
        $userModel->edit('kajur', $userData, $userId);
		
		return redirect()->to('home/profile_kajur');

}
    public function siswa()
	{
        if(session()->get('id')>0){
		$model = new M_PKL();
		$data['elvan']=$model->join('siswa', 'sekolah', 'siswa.id_sekolah=sekolah.id_sekolah');

        echo view('header');
        echo view('menu');
		echo view('siswa', $data);
        echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
	}
    public function profile_siswa()
{
    // Periksa apakah pengguna telah login dan memiliki tingkat akses yang sesuai
    if (session()->get('level') > 0) {
        // Periksa apakah pengguna memiliki tingkat akses siswa
            // Inisialisasi model M_PKL
            $model = new M_PKL();

            // Ambil data siswa berdasarkan ID pengguna yang sedang login
            $where = ['id_user' => session()->get('id')];
            $data['satu'] = $model->getWhere('siswa', $where);

            // Ambil ID sekolah dari data siswa yang sedang login
            $idSekolah = $data['satu']->id_sekolah;

            // Ambil data sekolah berdasarkan ID sekolah yang diperoleh
            $where2 = ['id_sekolah' => $idSekolah];
            $data['dua'] = $model->getWhere('sekolah', $where2);

            // Tampilkan semua data siswa
            $data['elvan'] = $model->tampil('siswa');

            // Tampilkan view dengan data yang telah diperoleh
            echo view('header');
            echo view('menu', $data);
            echo view('profile_siswa', $data); 
            echo view('footer');
    } else {
        // Redirect pengguna ke halaman login jika belum login
        return redirect()->to('home/login');
    }
}
public function aksi_esiswa()
	{
		$model = new M_PKL();
		
		$a= $this->request->getPost('nama_siswa');
		$b= $this->request->getPost('kelas');
		$c= $this->request->getPost('nohp_siswa');
		$d= $this->request->getPost('alamat_siswa');
        $e= $this->request->getPost('jk_siswa');
	

        $where = ['id_user' => session()->get('id')];
       

		$isi = array(
		
			'nama_siswa' => $a,
			'kelas' => $b,
			'nohp_siswa' => $c,
			'alamat_siswa' => $d,
			'jk_siswa' => $e,
		
				);

		$model->edit('siswa', $isi, $where);

        $isi2 = array(
		
			'username' => $a,
			
				);
        
        $model->edit('user', $isi2, $where);


		return redirect()->to('Home/profile_siswa');
		
	}
    public function e_foto_siswa()
{
    if(session()->get('level') > 0){
		$model = new M_PKL;
		$where = array('id_user' => session()->get('id'));
		$data['user'] = $model->getWhere('siswa', $where);

		echo view('header');
		echo view('menu',$data);
		echo view('e_foto',$data); 
		echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
}

public function aksi_ubah_foto_siswa()
{
	if ($this->request->getFile('img')) {

		$file = $this->request->getFile('img');
		$newFileName = $file->getRandomName(); 
		$file->move(ROOTPATH . 'public/img', $newFileName);

		$userModel = new M_PKL(); 
		$userId = array('id_user' => session()->get('id'));
		$userData = ['img' => $newFileName];
		$userModel->edit('siswa', $userData,$userId);
		return redirect()->to('home/profile_siswa');
	} else {
		return redirect()->to('home/e_foto');
}
	}

	public function hapusfoto_siswa()
{       
        $userModel = new M_PKL(); 
        $userData = ['img' => null];
		$userId = array('id_user' => session()->get('id'));
        $userModel->edit('siswa', $userData, $userId);
		
		return redirect()->to('home/profile_siswa');

}
public function profile_admin()
{
    // Periksa apakah pengguna telah login dan memiliki tingkat akses yang sesuai
    if (session()->get('level') > 0) {
        // Periksa apakah pengguna memiliki tingkat akses siswa

            // Inisialisasi model M_PKL
            $model = new M_PKL();

            // Ambil data siswa berdasarkan ID pengguna yang sedang login
            $where = ['id_user' => session()->get('id')];
            $data['satu'] = $model->getWhere('admin', $where);

            // $idPerusahaan = $data['satu']->id_sekolah;

            // // Ambil data sekolah berdasarkan ID sekolah yang diperoleh
            // $where2 = ['id_perusahaan' => $idPerusahaan];
            // $data['dua'] = $model->getWhere('perusahaan', $where2);
            $data['dua'] = $model->getWhereWithJoin('perusahaan','admin','perusahaan.id_user =admin.id_user',['perusahaan.id_user' => $where]);

            // Tampilkan view dengan data yang telah diperoleh
            echo view('header');
            echo view('menu', $data);
            echo view('profile_admin', $data); 
            echo view('footer');
    } else {
        // Redirect pengguna ke halaman login jika belum login
        return redirect()->to('home/login');
    }
}
public function aksi_eadmin()
	{
		$model = new M_PKL();
		
		$a= $this->request->getPost('nama_admin');

        $where = ['id_user' => session()->get('id')];
       

		$isi = array(
		
			'nama_admin' => $a,
				);

		$model->edit('admin', $isi, $where);

        $isi2 = array(
		
			'username' => $a,
			
				);
        
        $model->edit('user', $isi2, $where);


		return redirect()->to('Home/profile_admin');
		
	}
    public function e_foto_admin()
{
    if(session()->get('level') > 0){
		$model = new M_PKL;
		$where = array('id_user' => session()->get('id'));
		$data['user'] = $model->getWhere('admin', $where);
        $where = ['id_user' => session()->get('id')];
        $data['satu'] = $model->getWhere('admin', $where);

		echo view('header');
		echo view('menu',$data);
		echo view('e_foto_admin',$data); 
		echo view('footer');
    } else {
        return redirect()->to('home/login');
    }
}

public function aksi_ubah_foto_admin()
{
	if ($this->request->getFile('img')) {

		$file = $this->request->getFile('img');
		$newFileName = $file->getRandomName(); 
		$file->move(ROOTPATH . 'public/img', $newFileName);

		$userModel = new M_PKL(); 
		$userId = array('id_user' => session()->get('id'));
		$userData = ['img' => $newFileName];
		$userModel->edit('admin', $userData,$userId);
		return redirect()->to('home/profile_admin');
	} else {
		return redirect()->to('home/e_foto_admin');
}
	}

	public function hapusfoto_admin()
{       
        $userModel = new M_PKL(); 
        $userData = ['img' => null];
		$userId = array('id_user' => session()->get('id'));
        $userModel->edit('admin', $userData, $userId);
		
		return redirect()->to('home/profile_admin');

}
public function laporan()
{
    if(session()->get('id')>0){
    $model = new M_PKL();
   

    echo view('header');
    echo view('menu');
    echo view('laporan');
    echo view('footer');
} else {
    return redirect()->to('home/login');
}
}
public function aksi_laporan_pdf(){
    $model = new M_PKL();
    $id_user = session()->get('id');
    $mulai = $this->request->getGetpost('mulai');
    $selesai = $this->request->getGetPost('selesai');

    // Memanggil model untuk mendapatkan data sesuai dengan ID pengguna
    $data['satu'] = $model->cari2($id_user, $mulai, $selesai); // Menggunakan model cari2()

    // Load library Dompdf
    $dompdf = new \Dompdf\Dompdf();

    // Render view 'print' menjadi HTML
    $html = view('print', $data);

    // Load HTML ke Dompdf
    $dompdf->loadHtml($html);

    // Setting ukuran dan orientasi kertas
    $dompdf->setPaper('A4', 'portrait');

    // Render PDF (Halaman)
    $dompdf->render();

    // Output file PDF (Download atau Tampil di browser)
    $dompdf->stream("laporanPKL.pdf", array("Attachment" => false));
}

    public function aksi_laporan_excel() {
        // Memuat model yang sesuai
        $model = new M_PKL();
    
        // Tangkap tanggal mulai dan tanggal selesai dari form
        $id_user = session()->get('id');
        $mulai = $this->request->getPost('mulai2');
        $selesai = $this->request->getPost('selesai2');
    
        // Memanggil model untuk mendapatkan data sesuai dengan ID pengguna
        $data = $model->cari2($id_user, $mulai, $selesai);
    
        // Membuat objek Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
    
        // Judul laporan
        $sheet->setCellValue('A1', 'Laporan Siswa Prakerind');
    
        // Merge cell untuk judul laporan
        $sheet->mergeCells('A1:H1');
    
        // Set style untuk judul laporan
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
    
        // Set style untuk cell judul laporan
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        
        // Set header untuk kolom
        $sheet->setCellValue('A2', 'NIS');
        $sheet->setCellValue('B2', 'NAMA SISWA');
        $sheet->setCellValue('C2', 'JK');
        $sheet->setCellValue('D2', 'PROGRAM KEAHLIAN');
        $sheet->setCellValue('E2', 'Nama PT');
        $sheet->setCellValue('F2', 'Durasi PKL');
        $sheet->setCellValue('G2', 'Tanggal Mulai');
        $sheet->setCellValue('H2', 'Tanggal Selesai');
    
        // Mengatur lebar kolom
        $sheet->getColumnDimension('A')->setWidth(15);
        $sheet->getColumnDimension('B')->setWidth(15);
        $sheet->getColumnDimension('C')->setWidth(30);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(15);
        $sheet->getColumnDimension('G')->setWidth(15);
        $sheet->getColumnDimension('H')->setWidth(15);
    
        // Membuat judul tebal
        $sheet->getStyle('A2:H2')->getFont()->setBold(true);
    
        // Mengisi data ke dalam sheet
        $rowIndex = 3; // Mulai dari baris 3 setelah judul dan header
        foreach ($data as $row) {
            $sheet->setCellValue('A' . $rowIndex, $row->nis);
            $sheet->setCellValue('B' . $rowIndex, $row->nama_siswa);
            $sheet->setCellValue('C' . $rowIndex, $row->jk_siswa);
            $sheet->setCellValue('D' . $rowIndex, $row->bidang_pkl);
            $sheet->setCellValue('E' . $rowIndex, $row->nama_perusahaan);
            $sheet->setCellValue('F' . $rowIndex, $row->durasi_pkl);
            $sheet->setCellValue('G' . $rowIndex, $row->tgl_mulai);
            $sheet->setCellValue('H' . $rowIndex, $row->tgl_selesai);
        
            $rowIndex++;
        }
    
        // Menambahkan border
        $lastColumn = $sheet->getHighestColumn();
        $lastRow = $sheet->getHighestRow();
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $sheet->getStyle('A2:' . $lastColumn . $lastRow)->applyFromArray($styleArray);
    
        // Setelah mengisi data, simpan spreadsheet ke dalam file atau kirim ke browser
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'laporan.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
    public function laporan_admin()
{
    if(session()->get('id')>0){
    $model = new M_PKL();
   

    echo view('header');
    echo view('menu');
    echo view('laporan_admin');
    echo view('footer');
} else {
    return redirect()->to('home/login');
}
}
public function aksi_laporan_pdf_admin(){
    $model = new M_PKL();
    $id_user = session()->get('id');
    $mulai = $this->request->getGetpost('mulai');
    $selesai = $this->request->getGetPost('selesai');

    // Memanggil model untuk mendapatkan data sesuai dengan ID pengguna
    $data['satu'] = $model->cari($id_user, $mulai, $selesai);

    // Load library Dompdf
    $dompdf = new \Dompdf\Dompdf();

    // Render view 'print' menjadi HTML
    $html = view('print', $data);

    // Load HTML ke Dompdf
    $dompdf->loadHtml($html);

    // Setting ukuran dan orientasi kertas
    $dompdf->setPaper('A4', 'portrait');

    // Render PDF (Halaman)
    $dompdf->render();

    // Output file PDF (Download atau Tampil di browser)
    $dompdf->stream("laporanPKL.pdf", array("Attachment" => false));
}
public function aksi_laporan_excel_admin() {
    // Memuat model yang sesuai
    $model = new M_PKL();

    // Tangkap tanggal mulai dan tanggal selesai dari form
    $id_user = session()->get('id');
    $mulai = $this->request->getPost('mulai2');
    $selesai = $this->request->getPost('selesai2');

    // Memanggil model untuk mendapatkan data sesuai dengan ID pengguna
    $data = $model->cari($id_user, $mulai, $selesai);

    // Membuat objek Spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Judul laporan
    $sheet->setCellValue('A1', 'Laporan Siswa Prakerind');

    // Merge cell untuk judul laporan
    $sheet->mergeCells('A1:H1');

    // Set style untuk judul laporan
    $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);

    // Set style untuk cell judul laporan
    $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    
    // Set header untuk kolom
    $sheet->setCellValue('A2', 'NIS');
    $sheet->setCellValue('B2', 'NAMA SISWA');
    $sheet->setCellValue('C2', 'JK');
    $sheet->setCellValue('D2', 'PROGRAM KEAHLIAN');
    $sheet->setCellValue('E2', 'Nama PT');
    $sheet->setCellValue('F2', 'Durasi PKL');
    $sheet->setCellValue('G2', 'Tanggal Mulai');
    $sheet->setCellValue('H2', 'Tanggal Selesai');

    // Mengatur lebar kolom
    $sheet->getColumnDimension('A')->setWidth(15);
    $sheet->getColumnDimension('B')->setWidth(15);
    $sheet->getColumnDimension('C')->setWidth(30);
    $sheet->getColumnDimension('D')->setWidth(20);
    $sheet->getColumnDimension('E')->setWidth(20);
    $sheet->getColumnDimension('F')->setWidth(15);
    $sheet->getColumnDimension('G')->setWidth(15);
    $sheet->getColumnDimension('H')->setWidth(15);

    // Membuat judul tebal
    $sheet->getStyle('A2:H2')->getFont()->setBold(true);

    // Mengisi data ke dalam sheet
    $rowIndex = 3; // Mulai dari baris 3 setelah judul dan header
    foreach ($data as $row) {
        $sheet->setCellValue('A' . $rowIndex, $row->nis);
        $sheet->setCellValue('B' . $rowIndex, $row->nama_siswa);
        $sheet->setCellValue('C' . $rowIndex, $row->jk_siswa);
        $sheet->setCellValue('D' . $rowIndex, $row->bidang_pkl);
        $sheet->setCellValue('E' . $rowIndex, $row->nama_perusahaan);
        $sheet->setCellValue('F' . $rowIndex, $row->durasi_pkl);
        $sheet->setCellValue('G' . $rowIndex, $row->tgl_mulai);
        $sheet->setCellValue('H' . $rowIndex, $row->tgl_selesai);
    
        $rowIndex++;
    }

    // Menambahkan border
    $lastColumn = $sheet->getHighestColumn();
    $lastRow = $sheet->getHighestRow();
    $styleArray = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ];
    $sheet->getStyle('A2:' . $lastColumn . $lastRow)->applyFromArray($styleArray);

    // Setelah mengisi data, simpan spreadsheet ke dalam file atau kirim ke browser
    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    $filename = 'laporan.xlsx';
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
}
    public function windows_print_kajur(){
     $model = new M_PKL();
     $id_user = session()->get('id');
     $mulai = $this->request->getPost('mulai');
     $selesai = $this->request->getPost('selesai');
 
     // Memanggil model untuk mendapatkan data sesuai dengan ID pengguna
     $data['satu'] = $model->cari2($id_user, $mulai, $selesai);



    
    echo view('print_windows', $data);
   
    }
    public function windows_print_admin(){
        $model = new M_PKL();
        $id_user = session()->get('id');
        $mulai = $this->request->getPost('mulai');
        $selesai = $this->request->getPost('selesai');
    
        // Memanggil model untuk mendapatkan data sesuai dengan ID pengguna
        $data['satu'] = $model->cari($id_user, $mulai, $selesai);
   
   
   
       
       echo view('print_windows', $data);
      
       }
    
    

}