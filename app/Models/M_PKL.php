<?php
namespace App\Models;
use CodeIgniter\Model;

class M_PKL extends Model
{
   protected $table = 'user'; // Nama tabel m_office
    protected $primaryKey = 'id_user'; // Primary key dari tabel m_office
    protected $allowedFields = ['foto']; // Kolom-kolom yang diizinkan untuk diisi

    protected $table1= 'pelamaran';
    protected $primaryKey2 = 'id_pelamaran';
    protected $allowedFields3 = ['status'];
    
   
    public function tampilPerusahaanByUser($id_user)
    {
        return $this->db->table('perusahaan')
                        ->where('perusahaan.id_user', $id_user)
                        ->get()
                        ->getResult();
    }
    
    public function tampilSekolah()
    {
        return $this->db->table('sekolah')
                        ->get()
                        ->getResult();
    }

   public function tampil($tabel){
      return $this->db->table($tabel)   
                       ->get()
                       ->getResult(); 
   }
   public function tampil_urut($tabel){
      return $this->db->table($tabel)
          ->orderBy('id_barang', 'DESC') // Menambahkan klausa orderBy untuk mengurutkan berdasarkan ID secara descending
          ->get()
          ->getResult();   
  }
  public function tampil_sesuai_admin($table, $id_user)
{
    return $this->db->table($table)->where('perusahaan.id_user', $id_user)->get()->getResult();
}
public function tampil_sesuai_kajur($table, $id_user)
{
    return $this->db->table($table)->where('sekolah.id_user', $id_user)->get()->getResult();
}
public function tampil_sesuai_join($table1, $tabel2, $on, $id_user)
{
    return $this->db->table($table1)->where('lowongan.id_user', $id_user)
                     ->join($tabel2,$on,'left')
                     ->get()
                     ->getResult(); 
}
public function tampil_sesuai_join4($table1, $tabel2, $tabel3, $tabel4, $on1, $on2, $on3, $id_user)
{
    return $this->db->table($table1)->where('pelamaran.id_user', $id_user)
                     ->join($tabel2, $on1, 'left')
                     ->join($tabel3, $on2, 'left')
                     ->join($tabel4, $on3, 'left')
                     ->get()
                     ->getResult(); 
}
public function tampil_sesuai_join4_2($id_user)
{
    // Subquery untuk mendapatkan id_sekolah
    $subquery = $this->db->table('kajur')
                         ->select('id_sekolah')
                         ->where('id_user', $id_user)
                         ->getCompiledSelect();

    // Gunakan subquery dalam WHERE clause utama
    return $this->db->table('pelamaran')
                    ->select('*')
                    ->where("pelamaran.id_sekolah = ($subquery)", null, false) // Tambahkan parameter false untuk menghindari escape karakter
                    ->join('siswa', 'pelamaran.nis = siswa.nis', 'inner')
                    ->join('perusahaan', 'pelamaran.id_perusahaan = perusahaan.id_perusahaan', 'inner')
                    ->join('sekolah', 'pelamaran.id_sekolah = sekolah.id_sekolah', 'inner')
                    ->get()
                    ->getResult(); 
}

public function tampil_sesuai_join4_nis($table1, $tabel2, $tabel3, $tabel4, $on1, $on2, $on3, $nis)
{
    return $this->db->table($table1)->where('pelamaran.nis', $nis)
                     ->join($tabel2, $on1, 'left')
                     ->join($tabel3, $on2, 'left')
                     ->join($tabel4, $on3, 'left')
                     ->get()
                     ->getResult(); 
}
  public function join($tabel1, $tabel2, $on){
   return $this->db->table($tabel1)  
                   ->join($tabel2,$on,'left')
                   ->get()
                   ->getResult();   

  }
   public function join1($tabel1, $tabel2, $on){
   return $this->db->table($tabel1)  
                   ->join($tabel2,$on,'inner')
                   ->get()
                   ->getResult();   

  }
  public function join4tbl($tabel1, $tabel2, $tabel3, $tabel4, $on1, $on2, $on3){
   return $this->db->table($tabel1)
                  ->join($tabel2, $on1, 'inner')
                  ->join($tabel3, $on2, 'inner')
                  ->join($tabel4, $on3, 'inner')
                  ->get()
                  ->getResult();     

  }
  public function joinWhere($tabel1, $tabel2, $on, $where){
   return $this->db->table($tabel1, $where)  
                   ->join($tabel2,$on,'inner')
                   ->get()
                   ->getRow();   

  }
  public function joinWhere2($tabel1, $tabel2, $on, $where){
   return $this->db->table($tabel1)  
                   ->join($tabel2,$on,'left')
                   ->where($where)
                   ->get()
                   ->getResult();   
}

  public function joinWherer($tabel1, $tabel2, $on, $where){
   return $this->db->table($tabel1)  
                   ->join($tabel2,$on,'left')
                   ->getWhere($where)
                   ->getRow();   

  }
  public function getWhereWithJoin($tabel1, $tabel2, $onCondition, $where){
   return $this->db->table($tabel1)
       ->join($tabel2, $onCondition)
       ->getWhere($where)
       ->getRow();
   }
   public function getWhereWithJoin2($tabel1, $tabel2,$tabel3, $onCondition,$onCondition2, $where){
    return $this->db->table($tabel1)
        ->join($tabel2, $onCondition)
        ->join($tabel3, $onCondition2)
        ->getWhere($where)
        ->getRow();
    }
   public function getWhereWithJoin4Tbl($tabel1, $tabel2, $tabel3, $tabel4, $onCondition1, $onCondition2, $onCondition3, $where){
    return $this->db->table($tabel1)
        ->join($tabel2, $onCondition1)
        ->join($tabel3, $onCondition2)
        ->join($tabel4, $onCondition3)
        ->getWhere($where)
        ->getRow();
}

 public function tambah($table,$isi){
    return $this->db->table($table)
                ->insert($isi);
 }
 public function tambahKajur($table,$isi){
  return $this->db->table($table)
              ->insert($isi);
  return $this->db->insertID();
}
  public function upload($file){
     $imageName = $file->getName();
       $file->move(ROOTPATH . 'public/img', $imageName);
 }
 public function hapus($table,$where){
      return $this->db->table($table)
                      ->delete($where);
  }
  public function edit($tabel,$isi,$where){
      return $this->db->table($tabel)
                      ->update($isi,$where);
  }
  public function updatee($tabel,$isi){
      return $this->db->table($tabel)
                      ->update($isi);
  }
  public function getWhere($tabel,$where){
      return $this->db->table($tabel)
                      ->getwhere($where)
                      ->getRow();
  }
  public function getIdSekolahKajur($id_user) {
    return $this->db->table('kajur')
                    ->select('id_sekolah')
                    ->where('id_user', $id_user)
                    ->get()
                    ->getRow('id_sekolah');
}
public function getNamaKajurByIdPelamaran($id_pelamaran)
    {
        return $this->db->table('kajur')
                        ->select('kajur.nama_kajur')
                        ->join('pelamaran', 'kajur.id_sekolah = pelamaran.id_sekolah')
                        ->where('pelamaran.id_pelamaran', $id_pelamaran)
                        ->get()
                        ->getRow('nama_kajur');
    }


}



