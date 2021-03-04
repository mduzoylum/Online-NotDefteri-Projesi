<?php 
function time_stamp($session_time) 
		{ 
		 
		$time_difference = time() - $session_time ; 
		$seconds = $time_difference ; 
		$minutes = round($time_difference / 60 );
		$hours = round($time_difference / 3600 ); 
		$days = round($time_difference / 86400 ); 
		$weeks = round($time_difference / 604800 ); 
		$months = round($time_difference / 2419200 ); 
		$years = round($time_difference / 29030400 ); 
		
		if($seconds <= 60)
		{
		echo"$seconds saniye önce"; 
		}
		else if($minutes <=60)
		{
		   if($minutes==1)
		   {
			 echo"1 dakika önce"; 
			}
		   else
		   {
		   echo"$minutes dakika önce"; 
		   }
		}
		else if($hours <=24)
		{
		   if($hours==1)
		   {
		   echo"1 saat önce";
		   }
		  else
		  {
		  echo"$hours saat önce";
		  }
		}
		else if($days <=7)
		{
		  if($days==1)
		   {
		   echo"1 gün önce";
		   }
		  else
		  {
		  echo"$days gün önce";
		  }
		
		
		  
		}
		else if($weeks <=4)
		{
		  if($weeks==1)
		   {
		   echo"1 hafta önce";
		   }
		  else
		  {
		  echo"$weeks hafta önce";
		  }
		 }
		else if($months <=12)
		{
		   if($months==1)
		   {
		   echo"1 ay önce";
		   }
		  else
		  {
		  echo"$months ay önce";
		  }
		 
		   
		}
		
		else
		{
		if($years==1)
		   {
		   echo"1 yıl önce";
		   }
		  else
		  {
		  echo"$years yıl önce";
		  }
		
		
		}
		 
		
		
}
?>