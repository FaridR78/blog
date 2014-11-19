<?php

class Helper_Config

{

		private $config ;
		
		public function __construct($filename)
		{
	
			$this->loadfile($filename);

		}

		public function loadFile($filename)
		{

			$this->config = parse_ini_file($filename,true) ;

		}


		public function get($value,$section="")
		{


			if ($section == "" && isset($this->config[$value]))
			{

				return $this->config[$value];

			}

			else if (isset($this->config[$section])&& isset($this->config[$section][$value]))
			{

				return $this->config[$section][$value] ;
						
			}
			
			else
			{

				echo "non trouvé ";

				return null;

			}

		}

}