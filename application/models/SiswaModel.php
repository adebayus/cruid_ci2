<?php

  /**
   *
   */
  class SiswaModel extends CI_Model
  {
      //fungsi untuk menampilkan semua data siswaa
      public function view()
      {
        return $this->db->get('siswa')->result();
        # code...
      }
      //data berdasakan nis
      public function view_by($nis)
      {
        $this->db->where('nis',$nis);
        return $this->db->get('siswa')->row();

        # code...
      }
      //validasi tambah dan ubah data
      public function validation($mode)
      {
        //load validasi librari
        $this->load->library('form_validation');


        if($mode == "save")

          $this->form_validation->set_rules('input_nis','NIS','required|numeric|max_length[11]');
          $this->form_validation->set_rules('input_jeniskelamin','Jenis Kelamin','required');
          $this->form_validation->set_rules('input_telp','telp','required|numeric|max_length[15]');
          $this->form_validation->set_rules('input_alamat','Alamat','required');

          if ($this->form_validation->run())
          return TRUE;
          else
          return FALSE;
        # code...
      }
      public function save()
      {
        $data = array(
                "nis" => $this->input->post('input_nis'),
                      "nama" => $this->input->post('input_nama'),
                      "jenis_kelamin" => $this->input->post('input_jeniskelamin'),
                      "telp" => $this->input->post('input_telp'),
                      "alamat" => $this->input->post('input_alamat')
        );
        $this->db->insert('siswa' | $data);

        # code...
      }

        public function edit($nis)
        {
          $data = array(
          "nama" => $this->input->post('input_nama'),
          "jenis_kelamin" => $this->input->post('input_jeniskelamin'),
          "telp" => $this->input->post('input_telp'),
          "alamat" => $this->input->post('input_alamat')
        );
        $this->db->where('nis', $nis);
        $this->db->update('siswa', $data); // Untuk mengeksekusi perintah update data
       }

        public function delete($nis)
        {
        $this->db->where('nis',   $nis);
        $this->db->delete('siswa'); // Untuk mengeksekusi perintah delete data
       }

  }


  ?>
