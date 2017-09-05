<?php
class utilitarioLibreria extends Libreria {
	public function __construct() {
		parent::__construct ();
	}
	public function ConvertiraOpcionesSelect($array) {
		/**
		 * estructura del json
		 * 'id': valor
		 * 'texto': nombre
		 */
		$html = null;
		for($i = 0; $i < count ( $array ); $i ++) {
			$html .= "<option value='" . $array [$i] ['id'] . "'>" . $array [$i] ['texto'] . "</option>";
		}
		
		return $html;
	}
}
?>