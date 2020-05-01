<?php

class Pasien_model
{

    private $table = 'tb_pasien';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPasienById($id_pasien)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_pasien = :id_pasien');
        $this->db->bind('id_pasien', $id_pasien);
        return $this->db->single();
    }

    public function getAllPasien()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function tambahDataPasien($data)
    {
        $query = "INSERT INTO tb_pasien
        VALUES ('', :tgl_regis_pasien, :nama, :nik, :jk, :umur, :no_hp, :pekerjaan, :alamat)";

        $this->db->query($query);
        $this->db->bind('tgl_regis_pasien', $data['tgl_regis_pasien']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nik', $data['nik']);
        $this->db->bind('jk', $data['jk']);
        $this->db->bind('umur', $data['umur']);
        $this->db->bind('no_hp', $data['no_hp']);
        $this->db->bind('pekerjaan', $data['pekerjaan']);
        $this->db->bind('alamat', $data['alamat']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPasien($id_pasien)
    {
        $query = "DELETE FROM tb_pasien WHERE id_pasien = :id_pasien";
        $this->db->query($query);
        $this->db->bind('id_pasien', $id_pasien);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataPasien($data)
    {
        $query = "UPDATE tb_pasien SET
                    tgl_regis_pasien = :tgl_regis_pasien,
                    nama = :nama,
                    nik = :nik,
                    jk = :jk,
                    umur = :umur,
                    no_hp = :no_hp,
                    pekerjaan = :pekerjaan,
                    alamat = :alamat
                WHERE id_pasien = :id_pasien ";

        $this->db->query($query);
        $this->db->bind('tgl_regis_pasien', $data['tgl_regis_pasien']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nik', $data['nik']);
        $this->db->bind('jk', $data['jk']);
        $this->db->bind('umur', $data['umur']);
        $this->db->bind('no_hp', $data['no_hp']);
        $this->db->bind('pekerjaan', $data['pekerjaan']);
        $this->db->bind('alamat', $data['alamat']);

        $this->db->bind('id_pasien', $data['id_pasien']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
