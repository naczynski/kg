<?php

	class Angular {
		private static $koda_angular_init = [];
		private static $koda_angular_params = [];

		private static function clear_context(){
			self::$koda_angular_init = [];
			self::$koda_angular_params = [];
		}

		private static function generate_content($koda_angular_content_file){
			/* Generate body into variable and strone variables in this scope */
			ob_start();
			include $koda_angular_content_file;
			return ob_get_clean();		
		}

		private static function generate_scripts($koda_angular_init,$koda_angular_params){
			/* Generate scripts to include */
			ob_start();
			include get_template_directory().'/angular/angular-scripts.php';
			return ob_get_clean();
		}

		/* Moved to function due to minimalize scope variables */
		private static function generate_angular($koda_angular_content,$koda_angular_params){
			ob_start();
			include get_template_directory().'/angular/angular.php';
			return ob_get_clean();
		}

		private static function generate($koda_angular_content_file){
			$content = self::generate_content($koda_angular_content_file);
			$scripts = self::generate_scripts(self::$koda_angular_init,self::$koda_angular_params);

			$page_without_scripts = self::generate_angular($content,self::$koda_angular_params);

			/* Insert scripts just before end of body tag in body */
			$page_with_scripts =  substr_replace($page_without_scripts,$scripts,strrpos($page_without_scripts,'</body>'),0);

			echo $page_with_scripts;
		}

		/* Call stack 
		/* Angular::should_generate | Angular::should_generate	| -1
		/* Angular:wrap 			| Angular:wrap 				|  0
		/* template 				| template 					|  1
		/*							| Angular:wrap 				|  2
		/*
		*/
		private static function get_content_template(){
			$backtrace = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT,3);
			if($backtrace[2]['file'] != __FILE__){
				return $backtrace[1]['file'];
			}else{
				return null; 
			}
		}

		public static function wrap(){
			$template = self::get_content_template();

			if($template != null){
				self::clear_context();
				self::generate($template);
				return true;
			}else{
				return false;
			}
		}

		public static function params($params){
			self::$koda_angular_params = $params;
		}

		public static function init($name,$data){
			self::$koda_angular_init[$name] = is_string($data)?$data:json_encode($data);
		}
	}
?>