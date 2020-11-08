<!-- Author: GitPusmMe (nikita.demin.1996@index.ru) -->
<?php	
			//Start table
			print "<table cellpadding=\"2\">\n<COL span=\"4\" align=\"left\">\n" ;

			$end='</table><br><br><br><br><br><table width="95%" align=center cellpadding=2 cellspacing=2 border=0>
			</table></center></body></html>';

			if (empty($_POST['my_net_info'])){
				tr('Используйте IP адрес и CIDR сетевую маску:&nbsp;', '10.0.0.1/22');
				tr('Или IP адрес и сетевую маску:','10.0.0.1 255.255.252.0');
				tr('Или IP адрес и подстановочную маску:','10.0.0.1 0.0.3.255');
				print $end ;
				exit;
			}

			$my_net_info=rtrim($_POST['my_net_info']);


			if (! mb_ereg('^([0-9]{1,3}\.){3}[0-9]{1,3}(( ([0-9]{1,3}\.){3}[0-9]{1,3})|(/[0-9]{1,2}))$',$my_net_info)){
				tr("Неверно введены данные.");
				tr('Используйте IP адрес и CIDR сетевую маску:&nbsp;', '10.0.0.1/22');
				tr('Или IP адрес и сетевую маску:','10.0.0.1 255.255.252.0');
				tr('Или IP адрес и подстановочную маску:','10.0.0.1 0.0.3.255');
				print $end ;
				exit ;
			}

			if (mb_ereg("/",$my_net_info)){  //if cidr type mask
				$dq_host = strtok("$my_net_info", "/");
				$cdr_nmask = strtok("/");
				if (!($cdr_nmask >= 0 && $cdr_nmask <= 32)){
					tr("Неверное значение CIDR. Попробуйте целове число от 0 до 32.");
					print "$end";
					exit ;
				}
				$bin_nmask=cdrtobin($cdr_nmask);
				$bin_wmask=binnmtowm($bin_nmask);
			} else { //Dotted quad mask?
			    $dqs=explode(" ", $my_net_info);
				$dq_host=$dqs[0];
				$bin_nmask=dqtobin($dqs[1]);
				$bin_wmask=binnmtowm($bin_nmask);
				if (mb_ereg("0",rtrim($bin_nmask, "0"))) {  //Wildcard mask then? hmm?
					$bin_wmask=dqtobin($dqs[1]);
					$bin_nmask=binwmtonm($bin_wmask);
					if (mb_ereg("0",rtrim($bin_nmask, "0"))){ //If it's not wcard, whussup?
						tr("Неверно введена сетевая маска. Попробуйте ещё раз");
						print "$end";
						exit ;
					}
				}
				$cdr_nmask=bintocdr($bin_nmask);
			}

			//Check for valid $dq_host
			if(! mb_ereg('^0.',$dq_host)){
				foreach( explode(".",$dq_host) as $octet ){
			 		if($octet > 255){ 
						tr("Неверно введен IP адрес. Пример ввода: 198.168.0.1");
						print $end ;
						exit;
					}
				
				}
			}

			$bin_host=dqtobin($dq_host);
			$bin_bcast=(str_pad(substr($bin_host,0,$cdr_nmask),32,1));
			$bin_net=(str_pad(substr($bin_host,0,$cdr_nmask),32,0));
			$bin_first=(str_pad(substr($bin_net,0,31),32,1));
			$bin_first_client=(str_pad(substr($bin_first,0,31),32,1));
			$bin_last=(str_pad(substr($bin_bcast,0,31),32,0));
			$host_total=(bindec(str_pad("",(32-$cdr_nmask),1)) - 1);

			if ($host_total <= 0){  //Takes care of 31 and 32 bit masks.
				$bin_first="N/A" ; $bin_last="N/A" ; $host_total="N/A";
				if ($bin_net === $bin_bcast) $bin_bcast="N/A";
			}


			//Determine Class
			if (mb_ereg('^0',$bin_net)){
				$class="A";
				$dotbin_net= "<font color=\"Green\">0</font>" . substr(dotbin($bin_net,$cdr_nmask),1) ;
			}elseif (mb_ereg('^10',$bin_net)){
				$class="B";
				$dotbin_net= "<font color=\"Green\">10</font>" . substr(dotbin($bin_net,$cdr_nmask),2) ;
			}elseif (mb_ereg('^110',$bin_net)){
			  	$class="C";
				$dotbin_net= "<font color=\"Green\">110</font>" . substr(dotbin($bin_net,$cdr_nmask),3) ;
			}elseif (mb_ereg('^1110',$bin_net)){
			  	$class="D";
				$dotbin_net= "<font color=\"Green\">1110</font>" . substr(dotbin($bin_net,$cdr_nmask),4) ;
				$special="<font color=\"Green\">Class D = Multicast Address Space.</font>";
			}else{
			  	$class="E";
				$dotbin_net= "<font color=\"Green\">1111</font>" . substr(dotbin($bin_net,$cdr_nmask),4) ;
				$special="<font color=\"Green\">Class E = Experimental Address Space.</font>";
			}

			// Print Results

			echo '<br> Введенный адрес: <b>' ,"$dq_host",'</b>';
			echo '<br> Длина маски сети (CIDR): /<b>' ,"$cdr_nmask",'</b>';
			echo '<br>';
			echo '<br> Данные: </b>';
			echo '<br> Маска подсети: <b>' ,''.bintodq($bin_nmask)."",'</b>';
			echo '<br> Адрес сети: <b>',''.bintodq($bin_net).'','</b>';
			echo '<br> Адрес шлюза по умолчанию (default gateway): <b>' ,''.bintodq($bin_first).'','</b>';
			echo '<br> Минимальный IP на стороне клиента: <b>' ,''.bintodq($bin_first_client).'','</b>';
			echo '<br> Максимальный IP на стороне клиента: <b>' ,''.bintodq($bin_last).'','</b>';
			echo '<br> Адрес широковещательной рассылки (broadcast): <b>' ,''.bintodq($bin_bcast).'','</b>';
			echo '<br> Количество публичных адресов сети: <b>' ,"$host_total",'</b>';
			echo '<br> Количество публичных адресов на стороне клиента: <b>' ,"$host_total"-1,'</b>';



			print "$end";

			function binnmtowm($binin){
				$binin=rtrim($binin, "0");
				if (!mb_ereg("0",$binin) ){
					return str_pad(str_replace("1","0",$binin), 32, "1");
				} else return "1010101010101010101010101010101010101010";
			}

			function bintocdr ($binin){
				return strlen(rtrim($binin,"0"));
			}

			function bintodq ($binin) {
				if ($binin=="N/A") return $binin;
				$binin=explode(".", chunk_split($binin,8,"."));
				for ($i=0; $i<4 ; $i++) {
					$dq[$i]=bindec($binin[$i]);
				}
			        return implode(".",$dq) ;
			}

			function bintoint ($binin){
			        return bindec($binin);
			}

			function binwmtonm($binin){
				$binin=rtrim($binin, "1");
				if (!mb_ereg("1",$binin)){
					return str_pad(str_replace("0","1",$binin), 32, "0");
				} else return "1010101010101010101010101010101010101010";
			}

			function cdrtobin ($cdrin){
				return str_pad(str_pad("", $cdrin, "1"), 32, "0");
			}

			function dotbin($binin,$cdr_nmask){
				// splits 32 bit bin into dotted bin octets
				if ($binin=="N/A") return $binin;
				$oct=rtrim(chunk_split($binin,8,"."),".");
				if ($cdr_nmask > 0){
					$offset=sprintf("%u",$cdr_nmask/8) + $cdr_nmask ;
					return substr($oct,0,$offset ) . "&nbsp;&nbsp;&nbsp;" . substr($oct,$offset) ;
				} else {
				return $oct;
				}
			}

			function dqtobin($dqin) {
			        $dq = explode(".",$dqin);
			        for ($i=0; $i<4 ; $i++) {
			           $bin[$i]=str_pad(decbin($dq[$i]), 8, "0", STR_PAD_LEFT);
			        }
			        return implode("",$bin);
			}

			function inttobin ($intin) {
			        return str_pad(decbin($intin), 32, "0", STR_PAD_LEFT);
			}

			function tr(){
				echo "\t<tr>";
				for($i=0; $i<func_num_args(); $i++) echo "<td>".func_get_arg($i)."</td>";
				echo "</tr>\n";
			}	

?>