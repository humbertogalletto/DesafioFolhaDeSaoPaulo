<?php 

/**Desafio Folha de S. Paulo 
 * Desenvolvido por Humberto Galletto dos Santos 
 * 2015-04-12 
 * 
 * Desafio: 
 * Sabe-se que por trás de cada cometa há um OVNI. Esses OVNIs frequentemente buscam 
 * bons desenvolvedores aqui na Terra. Infelizmente só têm espaço para levar um grupo 
 * de devs por vez. Para a seleção, há um engenhoso esquema, da associação do nome do 
 * cometa ao nome do grupo, que possibilita a cada grupo saber se será levado ou não. 
 * Os dois nomes, do grupo e do cometa, são convertidos em um número que representa o 
 * produto das letras do nome, onde "A" é 1 e "Z" é 26. Assim, o grupo "LARANJA" seria 
 * 12 * 1* 18 * 1 * 14 * 10 * 1 = 30240. Se o resto da divisão do número do grupo por 
 * 45 for igual ao resto da divisão do número do cometa por 45, então o grupo será levado. 
 * Para os cometas e grupos abaixo, qual grupo NÃO será levado? 
*/ 

/* 
 Matriz relacionando o Alfabeto e seus respectivos valores. 
 O sinal "-" é para que o range funcione com uma unidade numérica 
 e ao mesmo tempo ofereça um caractere para separar os valores 
*/

$alfa = array_combine (range('A','Z'), range ('-1','-26')); 

/* 
 Matriz associativa com inserção dos dados do desafio 
 relacionados por chave x valor
*/ 

$cometas_e_grupos = array( 
 "HALLEY" => "AMARELO", 
 "ENCKE" => "VERMELHO", 
 "WOLF" => "PRETO", 
 "KUSHIDA" => "AZUL" 
 ); 

//Matriz para armazenar o resultado no caso de termos mais do que um 

$resposta = array(); 

/* 
 Loop que trata os dados. 
 A função strtr substitui as letras pelos valores correspondentes com o sinal "-". 
 O ltrim retira o primeiro sinal "-" para que o explode não porduza a matriz com 
 subscrito vazio. O explode separa os valores em uma matriz e as operações 
 matemáticas são realizadas para compração entre cometas e grupos
*/ 

foreach($cometas_e_grupos as $cometa=>$grupo){ 

   if( 
  
     array_product(explode("-",ltrim(strtr($cometa, $alfa),"-")))%45 
    
     != 
    
     array_product(explode("-",ltrim(strtr($grupo, $alfa),"-")))%45 
  
   ){ 
  
      $resposta[] = $grupo; 
  
   } 

} 

echo "Resposta: ". implode(", ", $resposta); 

/*Fim*/
