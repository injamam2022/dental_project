<?php  class Token_Model extends MY_Model {
	
	public $table='token';
	
	function insert($data)
	{
		$this->db->insert($this->table,$data);
		
	}
	
	function fetch($mode)
	{
		$this->db->where('date_time',date('Y-m-d'));
		$this->db->where('mode',$mode);
		return $this->db->get($this->table)->row();
		
	}
	
}
