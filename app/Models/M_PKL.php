<?php
namespace App\Models;
use CodeIgniter\Model;

class M_PKL extends Model
{
   

   public function tampil($tabel){
      return $this->db->table($tabel)   
                       ->get()
                       ->getResult(); 
   }
}


