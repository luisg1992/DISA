<?php
/**
 * 
 * @author Rodolfo Crisanto Rosas
 * @fecha 12/01/20017
 *****/
class utilitarioModelo extends Modelo {
	public function __construct() {
		parent::__construct ();
	}
	public function obtenerCondicionesTrabajo() {
		$consultaSql = "exec UtilitarioListarCondicionTrabajo";
		$parametros = NULL;
		$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
		return $respuesta;
	}
	public function obtenerTiposEmpleos() {
		$consultaSql = "exec UtilitarioListarTipoEmpleado";
		$parametros = NULL;
		$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
		return $respuesta;
	}
	public function obtenerRoles() {
		$consultaSql = "exec UtilitarioListarRoles";
		$parametros = NULL;
		$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
		return $respuesta;
	}
	public function obtenerTiposParentesco() {
		$consultaSql = "exec UtilitarioListarParentesco";
		$parametros = NULL;
		$respuesta = $this->_consultas->ConsultaGeneral ( $consultaSql, $parametros );
		return $respuesta;
	}
}
?>