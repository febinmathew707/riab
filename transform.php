<?php //session_start(); 
	
	class transform
	{
		private $arr=array("a","S","c","Q","Y","3","7","K","b","8");
		private $symb=array("@","#","$","*","!","%",")","[",">","^");
		public function encrypt($strdata)
		{						  
		  	$str="";
			$j=0;
			$len=strlen($strdata);
			$len=$len-1;
			//echo "len".$len;
			while($j<=$len) 
			{
				//$this->arr[$v];
				$v=substr($strdata,$j,1);
				//echo $v." ";
				$str=$str.ord($this->arr[$v]);
				//echo "str= ".$str;
				$j=$j+1;
			}
			$re="";
			$j=0;
			$len=strlen($str);
			$len=$len-1;
			//echo "len".$len;
			while($j<=$len) 
			{
				$v=substr($str,$j,1);
				//echo $v." ";
				$re=$re.$this->arr[$v];
				//echo "str= ".$str;
				$j=$j+1;
			}
			return $re;			
	}
	Public function decrypt($strdata)
	{
		
		 //$regkey=base64_decode(str_replace("@","M",str_replace("!","=",$key)));
		 //echo $key;
		 $j=0;
			$len=strlen($strdata);
			$len=$len-1;
			$str="";
			
			//echo "len".strlen($key);
			while($j<=$len) 
			{
				$v1=substr($strdata,$j,1);
				$j=$j+1;
				//echo $v1." - ";
				$str=$str.array_search($v1,$this->arr);	
			}
			//echo $str."<br>";
			$j=0;
			$len=strlen($str);
			$len=$len-1;
			$re="";
			//echo "len".strlen($key);
			while($j<=$len) 
			{
				$v1=substr($str,$j,1);
				$j=$j+1;
				$v2=substr($str,$j,1);
				$j=$j+1;
				$totv=$v1.$v2;
				//echo $totv." - ";
				//echo "<br>";
				//$str=$str.chr($totv);	
				$re=$re.array_search(chr($totv),$this->arr);			
			}
			return $re;
	}
	Public function convert($strdata)
	{
		 	$j=0;
			$len=strlen($strdata);
			$len=$len-1;
			$str="";
			
			//echo "len".strlen($key);
			while($j<=$len) 
			{
				$v=substr($strdata,$j,1);
				$j=$j+1;
				//echo $v1." - ";
				$str=$str.ord($v)."&";
			}
			
			$j=0;
			$len=strlen($str);
			$len=$len-1;
			$re="";
			//echo "len".strlen($key);
			while($j<=$len) 
			{
				$v1=substr($str,$j,1);
				$j=$j+1;
				if($v1!="&")
				{
					$re=$re.$this->symb[$v1];
				}
				else
				{
					$re=$re."&";
				}			
			}
			return $re;
	}
	Public function retrieve($strtoret)
	{
		 	$strdata=$strtoret;
			 $j=0;
			$len=strlen($strdata);
			$len=$len-1;
			$str="";
			
			//echo "len".strlen($key);
			while($j<=$len) 
			{
				$v=substr($strdata,$j,1);
				$j=$j+1;
				//echo $v1." - ";3
				if($v!="&")
				{
					$str=$str.array_search($v,$this->symb);
				}
				else
				{
					$str=$str."&";
				}
				
			}
			
			$j=0;
			$len=strlen($str);
			$len=$len-1;
			$re="";
			$st="";
			//echo "len".strlen($key);
			while($j<=$len) 
			{
				$v1=substr($str,$j,1);
				$j=$j+1;
				if($v1!="&")
				{
					$st=$st.$v1;
				}
				else
				{
					$re=$re.chr($st);
					$st="";
				}			
			}
			
			return $re;
	}
	public function createPwd($strdata)
	{
		$len=strlen($strdata);
		$j=0;
		$res="";
		
		while($j<$len)
		{
			$no1=substr($strdata,$j,1);
		
			$res=$res.$this->arr[$no1];
			$j+=1;
		}
		return $res;
	}
}
	
?>
