<?php

namespace Terrificminds\AroundPlugin\Plugin;

class ExamplePlugin
{


	public function aroundGetTitle(\Terrificminds\AroundPlugin\Controller\Index\Example $subject, callable $proceed)
	{

		echo __METHOD__ . " - Before proceed() </br>";
		 $result = $proceed();
		 echo  $result ."</br>";
		echo __METHOD__ . " - After proceed() </br>";


		echo $result;
	}

}