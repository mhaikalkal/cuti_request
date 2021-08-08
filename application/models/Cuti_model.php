<?php

class Cuti_model extends CI_model
{

    // Fetch Data Cuti
    public function getAllCuti()
    {
        return $this->db->get('cuti');

    }

    public function getCutiById($id)
    {
        return $this->db->get_where('cuti', ['id' => $id]);

    }

    public function getCutiByNIP($nip) 
    {
        return $this->db->get_where('cuti', ['id_nip' => $nip]);

    }

    public function getCutiPending()
    {
        $query = $this->db->query("SELECT * FROM cuti WHERE status = 'Pending'");
        return $query;

    }

    public function getCutiPendingByNIP($nip)
    {
        $query = $this->db->query("SELECT * FROM cuti WHERE id_nip = ${nip} AND status = 'Pending'");
        return $query;

    }

    public function getCutiApprovedByNIP($nip)
    {
        $query = $this->db->query("SELECT * FROM cuti WHERE id_nip = ${nip} AND status = 'Approved'");
        return $query;

    }

    public function getCutiDeclinedByNIP($nip)
    {
        $query = $this->db->query("SELECT * FROM cuti WHERE id_nip = ${nip} AND status = 'Declined'");
        return $query;

    }

    // Jenis Cuti
    public function getJenisCuti()
    {
        return $this->db->get('jenis_cuti');

    }
    
    // Cuti CRUD
    public function tambahCuti()
    {
        $data = [
            'id' => $this->input->post('id', TRUE),
            'id_nip' => $this->input->post('nip', TRUE),
            'id_jenis_cuti' => $this->input->post('jenis_cuti', TRUE),
            'keterangan' => $this->input->post('keterangan', TRUE),
            'tgl_awal' => $this->input->post('tgl_awal', TRUE),
            'tgl_akhir' => $this->input->post('tgl_akhir', TRUE),
            'edited_by' => $this->input->post('edited_by', TRUE),
        ];

        $this->db->insert('cuti', $data);

    }

    public function ubahCuti()
    {
        $data = [
            'id' => $this->input->post('id', TRUE),
            'id_nip' => $this->input->post('nip', TRUE),
            'id_jenis_cuti' => $this->input->post('jenis_cuti', TRUE),
            'keterangan' => $this->input->post('keterangan', TRUE),
            'tgl_awal' => $this->input->post('tgl_awal', TRUE),
            'tgl_akhir' => $this->input->post('tgl_akhir', TRUE),
            'status' => $this->input->post('status', TRUE),
            'edited_by' => $this->input->post('edited_by', TRUE),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('cuti', $data);

    }

    public function hapusCuti($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('cuti');

    }

    // SHOW TABLE CUTI
    // Admin
    public function showCuti()
    {
        $query = $this->db->query(
            "SELECT
            cuti.id,
            cuti.id_nip,
            user_profile.nama,
            divisi.divisi,
            jabatan.jabatan,
            jenis_cuti.jenis_cuti,
            cuti.tgl_pengajuan,
            cuti.keterangan,
            cuti.tgl_awal,
            cuti.tgl_akhir,
            cuti.`status`,
            cuti.edited_by,
            jenis_cuti.`value` 
        FROM
            cuti
            INNER JOIN user_profile ON cuti.id_nip = user_profile.nip
            INNER JOIN divisi ON user_profile.divisi = divisi.id
            INNER JOIN jabatan ON user_profile.jabatan = jabatan.id 
            AND divisi.id = jabatan.id_divisi
            INNER JOIN jenis_cuti ON cuti.id_jenis_cuti = jenis_cuti.id
        ORDER BY
	        cuti.tgl_pengajuan DESC"

        );

        return $query;

    }

    public function showCutiApproved()
    {
        $query = $this->db->query(
            "SELECT
            cuti.id,
            cuti.id_nip,
            user_profile.nama,
            divisi.divisi,
            jabatan.jabatan,
            jenis_cuti.jenis_cuti,
            cuti.tgl_pengajuan,
            cuti.keterangan,
            cuti.tgl_awal,
            cuti.tgl_akhir,
            cuti.`status`,
            cuti.edited_by,
            jenis_cuti.`value` 
        FROM
            cuti
            INNER JOIN user_profile ON cuti.id_nip = user_profile.nip
            INNER JOIN divisi ON user_profile.divisi = divisi.id
            INNER JOIN jabatan ON user_profile.jabatan = jabatan.id 
            AND divisi.id = jabatan.id_divisi
            INNER JOIN jenis_cuti ON cuti.id_jenis_cuti = jenis_cuti.id
        WHERE
            cuti.status = 'Approved'
        ORDER BY
	        cuti.tgl_pengajuan DESC"

        );

        return $query;

    }

    // HRD
    public function showCutiManager()
    {
        $query = $this->db->query(
            "SELECT
            cuti.id,
            cuti.id_nip,
            user_profile.nama,
            divisi.divisi,
            jabatan.jabatan,
            jenis_cuti.jenis_cuti,
            cuti.tgl_pengajuan,
            cuti.keterangan,
            cuti.tgl_awal,
            cuti.tgl_akhir,
            cuti.`status`,
            cuti.edited_by,
            jenis_cuti.`value`,
            ROW_NUMBER() OVER ( ORDER BY cuti.`status` DESC, jenis_cuti.`value` DESC ) AS `urutan` 
        FROM
            cuti
            INNER JOIN user_profile ON cuti.id_nip = user_profile.nip
            INNER JOIN divisi ON user_profile.divisi = divisi.id
            INNER JOIN jabatan ON user_profile.jabatan = jabatan.id 
            AND divisi.id = jabatan.id_divisi
            INNER JOIN jenis_cuti ON cuti.id_jenis_cuti = jenis_cuti.id"

        );

        return $query;

    }

    public function showCutiStaff($nip)
    {
        $query = $this->db->query(
            "SELECT
            cuti.id,
            cuti.id_nip,
            user_profile.nama,
            divisi.divisi,
            jabatan.jabatan,
            jenis_cuti.jenis_cuti,
            cuti.tgl_pengajuan,
            cuti.keterangan,
            cuti.tgl_awal,
            cuti.tgl_akhir,
            cuti.`status`,
            cuti.edited_by,
            jenis_cuti.`value` 
        FROM
            cuti
            INNER JOIN user_profile ON cuti.id_nip = user_profile.nip
            INNER JOIN divisi ON user_profile.divisi = divisi.id
            INNER JOIN jabatan ON user_profile.jabatan = jabatan.id 
            AND divisi.id = jabatan.id_divisi
            INNER JOIN jenis_cuti ON cuti.id_jenis_cuti = jenis_cuti.id 
        WHERE
            cuti.id_nip = $nip
        ORDER BY
            cuti.tgl_pengajuan DESC"
        );

        return $query;

    }

    public function detailCuti($id)
    {
        $query = $this->db->query(
            "SELECT
            cuti.*,
            user_profile.nama,
            divisi.divisi,
            jabatan.jabatan,
            jenis_cuti.jenis_cuti,
            jenis_cuti.`value` 
        FROM
            cuti
            INNER JOIN user_profile ON cuti.id_nip = user_profile.nip
            INNER JOIN divisi ON user_profile.divisi = divisi.id
            INNER JOIN jabatan ON user_profile.jabatan = jabatan.id 
            AND divisi.id = jabatan.id_divisi
            INNER JOIN jenis_cuti ON cuti.id_jenis_cuti = jenis_cuti.id 
        WHERE
            cuti.id = $id"

        );

        return $query;

    }

    public function searchPeriode($awal, $akhir)
    {
        $query = $this->db->query(
            "SELECT
            cuti.id,
            cuti.id_nip,
            user_profile.nama,
            divisi.divisi,
            jabatan.jabatan,
            jenis_cuti.jenis_cuti,
            cuti.tgl_pengajuan,
            cuti.keterangan,
            cuti.tgl_awal,
            cuti.tgl_akhir,
            cuti.`status`,
            cuti.edited_by,
            jenis_cuti.`value` 
        FROM
            cuti
            INNER JOIN user_profile ON cuti.id_nip = user_profile.nip
            INNER JOIN divisi ON user_profile.divisi = divisi.id
            INNER JOIN jabatan ON user_profile.jabatan = jabatan.id 
            AND divisi.id = jabatan.id_divisi
            INNER JOIN jenis_cuti ON cuti.id_jenis_cuti = jenis_cuti.id
        WHERE (cuti.tgl_awal BETWEEN '$awal' AND '$akhir')
        AND cuti.status = 'Approved'
        ORDER BY 
            cuti.tgl_awal DESC"
        );
        
        return $query;

    }
    
}