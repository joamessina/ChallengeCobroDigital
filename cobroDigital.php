<?php 

class Boleta{
		
		public $idComercio = null;
		public $sid = NULL;
		public $metodo= NULL;
		public $importes = NULL;
		public $fechas = NULL;
		public $concepto = NULL;
		public $apellido = NULL;
		public $correo = NULL;
		public $documento = NULL;
		public $direccion = NULL;

		function __construct()
		{
			
		}

		function crearBoletaComprador($idComercio,$sid,$metodo,$importes,$fechas,$concepto,$apellido,$correo,$documento,$direccion){
			#$data =null;
			$this->idComercio = $idComercio;
			$this->sid = $sid;
			$this->metodo_webservice = $metodo;
			$this->importes = $importes; 
			$this->fechas = $fechas;
			$this->concepto = $concepto;
			$this->apellido = $apellido;
			$this->correo = $correo;
			$this->documento = $documento;
			$this->direccion = $direccion;
			print_r($metodo);
			#self::webServices($data);
		}

		function obtenerCodigoDeBarras(){

		}
		function obtenerPmcBoleta(){

		}
		function mostrarCuponDePago(){

		}

		static function webServices($data){
			$cliente = curl_init();

			curl_setopt_array($cliente, array(
				CURLOPT_URL            => "https://cobrodigital.com:14365/ws3",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_CONNECTTIMEOUT => 30,
				CURLOPT_TIMEOUT        => 120,
				CURLOPT_ENCODING       => "utf-8",
				CURLOPT_POST           => 1,
				CURLOPT_HTTPHEADER     => array('Content-Type: application/json'),
				CURLOPT_POSTFIELDS     => json_encode($data)
			));

			$respuesta = curl_exec($cliente);

			$info = curl_getinfo($cliente); 

			curl_close($cliente);

			if( $info["http_code"] == 200 ){
				print_r($respuesta);
				return json_decode($respuesta,true);
			}else {
				return "Error al conectarse con la API";
			}
		}
}
	
////end class///////////
	$UnaBoleta = new Boleta();
	
	$prueba = $UnaBoleta->crearBoletaComprador("HA765587","XAKXYOLYYYCVGHQHNLZHNIVPJUCDKPRMQBEKCFBPZKTMJTKBSKJIVBEJCTL","generar_boleta_comprador",100,"30/07/2020","Prueba","Perez","info@cobrodigital.com","22333444","Calle 1 3584");
	print_r($prueba);
	echo "alo";
 ?>