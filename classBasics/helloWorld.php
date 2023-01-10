<?php

/**
 *This page defines the Helloworld class.
 *
 *Written for chapter 4, "Basic Object-Oriented Programming"
 *of the book "PHP Advanced and Object-Oriented Programming"
 *@author Larry Ullman <Larry@LarryUllman.com>
 *@copyright 2012
 */
 
 /**
  *The Helloworld class says "Hello, World!" in different languages.
  *
  *The Helloworld class is mostly for 
  *demonstration purposes.
  It's not really a good use of OOP.
  */

class Helloworld{
	
	/**
	 *Function that says "Hello, world!" in different languages.
	 *@param sting $language Default is "English"
	 *@returns void
	 */
	 
	function sayHello($language = 'English'){
		echo'<p>';
		switch ($language){
			case 'Dutch':
				echo "Hallo, wereld!";
				break;
			case 'French':
				echo "Bonjour, monde!";
				break;
			case 'German':
				echo "Hallo, Welt!";
				break;
			case 'Italian':
				echo 'Ciao, mondo!';
				break;
			case 'Spanish':
				echo '¡Hola, mundo';
				break;
			case 'Swahili':
				echo "Marahaba, dunia!";
				break;
			case 'English':
			default:
				echo "Hello, World!";
				break;
		}
		echo '</p>';
	}
}
		
		