<?php
class matakuliah extends CI_Controller
{
    public function Index()
    {
        $this->load->view('view-form-matakuliah');
    }

    public function cetak()
    {
        $this->form_validation->set_rules('kode', 'Kode matakuliah', 'required|min_length[3]', 
        [
            'required' => 'Kode Matakuliah Harus diisi',
            'min_length' => 'Kode terlalu pedek'
        ]);

        $this->form_validation->set_rules('nama', 'Nama matakuliah', 'required|min_length[3]', 
        [
            'required' => 'Nama Matakuliah Harus diisi',
            'min_length' => 'Nama terlalu pedek'
        ]);

        if ($this->form_validation->run() != true) {
            $this->load->view('view-form-matakuliah');
        } else {
            $data = [
                'kode' => $this->input->post('kode'),
                'nama' => $this->input->post('nama'),
                'sks' => $this->input->post('sks')
            ];

            $this->load->view('view-data-matakuliah', $data);
        }        
    }
}