<?php

	class ByteCount
	{
		// Set the type of Bytes needed for the program
		private $kilobytes;
		private $megabytes;
		private $gigabytes;
		private $kbEquivOutput;
		private $mbEquivOutput;
		private $storage;
		
		public function __construct( $amount_of_storage, $type_of_byte )
		{
			$storage = 0;
			$byte = 0;
			
			// Set the amount of storage and type of byte information needed to calculate the program
			if(isset($amount_of_storage) && is_numeric($amount_of_storage))
			{
				$storage = $amount_of_storage;
			}else{
				echo("We need a storage number");
			}
			
			if(isset($type_of_byte))
			{
				$byte = $type_of_byte;
			}else{
				echo("We need a byte type");
			}
			
			// Set the global variables with info retrieved from parameters
			if(isset($storage) && isset($byte))
			{
				switch($byte)
				{
					// for each case we are going to retrieve the byte, kilo, and mb. The higher storage 
					// receives more information. Ex. gigabyte will get all mb, kilo, and byte while megabyte 
					// will only get kilo and byte.
					case "kb":
						$this->kilobytes = $byte;
						$this->storage = $storage;
						$kbOutput = $this->calculateBytes($this->kilobytes);
						echo "There is ".$kbOutput." bytes in ".$storage." Kilobytes";
						break;
					case "mb":
						$this->megabytes = $byte;
						$this->storage = $storage;
						$mbOutput = $this->calculateBytes($this->megabytes);
						$this->kbEquivOutput = $this->calculateKilobytes( $this->megabytes );
						echo "There is ".$mbOutput." Bytes in ".$storage." Megabytes<br />";
						echo "and there is " .$this->kbEquivOutput. " Kilobytes in ".$storage." Megabytes";
						break;
					case "gb":
						$this->gigabytes = $byte;
						$this->storage = $storage;
						$gbOutput = $this->calculateBytes($this->gigabytes);
						$this->kbEquivOutput = $this->calculateKilobytes($this->gigabytes);
						$this->mbEquivOutput = $this->calculateMegabytes($this->gigabytes);
						echo "There is ".$gbOutput." bytes in ".$storage." Gigabyte<br />";
						echo "and there is " .$this->kbEquivOutput. " Kilobytes in ".$storage." Gigabytes.<br />";
						echo "There is also ".$this->mbEquivOutput." Megabytes in ".$storage." Gigabytes.";
						break;
					default:
						echo("Need a storage type");
				}
			}
		}
		
		private function calculateBytes( $byte_info )
		{
			// Number of bytes in each answer
			$kilobytes = 1024;
			$megabytes = 1048576;
			$gigabytes = 1073741824;
			
			
			switch( $byte_info )
			{
				// Multipliy the storage times the bytes to get answer
				case "kb":
					$kbAnswer = $this->storage * $kilobytes;
					return $kbAnswer;
					break;
				case "mb":
					$mbAnswer = $this->storage * $megabytes;
					return $mbAnswer;
					break;
				case "gb":
					$gbAnswer = $this->storage * $gigabytes;
					return $gbAnswer;
					break;
				default:
					echo("Can't calculate");
					
					
					
					
			}
		}
		
		private function calculateKilobytes( $kilobyte_info )
		{
			$num_of_kilobytes_mb = 1024;
			$num_of_kilobytes_gb = 1048576;
			
			if(isset($kilobyte_info))
			{
				switch($kilobyte_info)
				{
					case "kb":
						$noanswer = '';
						return $noanswer;
						break;
					case "mb":
						$mbAnswer = $this->storage * $num_of_kilobytes_mb;
						return $mbAnswer;
						break;
					case "gb":
						$gbAnswer = $this->storage * $num_of_kilobytes_gb;
						return $gbAnswer;
						break;
					default:
						echo "None";
				}
			}else{
				echo("No number is set");
			}
			
		}
		
		private function calculateMegabytes( $megabyte_info )
		{
			$num_of_megabytes_gb = 1024;
			
			if(isset($megabyte_info))
			{
				switch($megabyte_info)
				{
					case "kb":
						$noanswer = '';
						return $noanswer;
						break;
					case "mb":
						$noanswer = '';
						return $noanswer;
						break;
					case "gb":
						$gbAnswer = $this->storage * $num_of_megabytes_gb;
						return $gbAnswer;
						break;
					default:
						echo("No answer");
				}
				
			}else{
				echo("check Answer");
			}
		}
		
	}

?>