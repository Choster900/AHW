<?php
    class Gradosxmaterias_model extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function consultar_gradosxmaterias(){
            $this->db->select(" 
                        GRD_ID,
                        GRD_NOMBRE,
                        INSERT((SELECT 
                                    GROUP_CONCAT(mat_nombre
                                            SEPARATOR ', ')
                                FROM
                                    mat_materia
                                        INNER JOIN
                                    mxg_materiasxgrado ON mxg_id_mat = mat_Id
                                WHERE
                                    mxg_id_grd = grd_id),
                            0,
                            0,
                            '') AS MATERIAS");
            $this->db->from('mxg_materiasxgrado');
            $this->db->join('GRD_GRADO', 'GRD_ID = MXG_ID_GRD');
            $this->db->join('mat_materia', 'MAT_ID = MXG_ID_MAT');
            $this->db->group_by('GRD_NOMBRE');
            $this->db->order_by('GRD_ID', 'ASC');
    
            $query = $this->db->get();
            return $query->result();
        }

        public function validacion($grado,$materia){
            $this->db->select("MXG_ID_MAT");
            $this->db->from('MXG_MATERIASXGRADO');
            $this->db->where("MXG_ID_GRD",$grado);

            $query = $this->db->get();
            return $query->result();
        }
        public function guardar_materiaxgrado($data){
            $this->db->insert("MXG_MATERIASXGRADO",$data);
            return $this->db->insert_id();
        }

        public function consultar_materias_de_grados($mxg_id){
            $this->db->select("GRD_NOMBRE,MXG_ID,MAT_NOMBRE");
            $this->db->from('MXG_MATERIASXGRADO');
            $this->db->join('MAT_MATERIA', 'MXG_ID_MAT = MAT_ID');
            $this->db->join('GRD_GRADO', 'MXG_ID_GRD = GRD_ID');
            $this->db->where("MXG_ID_GRD",$mxg_id);
    
            $query = $this->db->get();
            return $query->result();
        }

        public function eliminar_materia_de_grado($materia){
            $this->db->delete('MXG_MATERIASXGRADO', array('MXG_ID' => $materia));

        }
        

        
    }