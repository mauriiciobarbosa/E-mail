<?php

require '../Model/Assinatura.class.php';

$assinatura = new Assinatura();

$assinatura->setParams($_POST);
$assinatura->show();

