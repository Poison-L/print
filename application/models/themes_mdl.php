<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
2015年2月15日PHP
*/

//主题插件操作
class Themes_mdl extends CI_Model{
	
	//系统所在插件目录
	public $themes_dir = '';
	
	public function __construct(){
		parent::__construct();
		
		//主题皮肤所在路径
		$this->themes_dir = FCPATH. ST_THEMES_DIR . DIRECTORY_SEPARATOR;
	}
	
	//使用主题,传入的参数是新主题的目录
	function activate($theme){
		//更新数据库
		$this->db->query("update settings set value='$theme' where name='current_theme'");
		
		//清空文件和数据库缓存
		$this->utility->clear_file_cache();
		$this->utility->clear_db_cache();
		
	}
	
	/**
	 * 获取单个主题信息
	 *
	 * @access public
	 * @param array $name 主题名称（文件夹名称）
	 * @return array 主题信息
	 */
	function get($theme)
	{
		$path = $this->themes_dir. $theme;
	
		$index_file = $path . DIRECTORY_SEPARATOR . 'index.php';
	
		if(!is_file($path) && file_exists($index_file))
		{
			$fp = fopen($index_file, 'r' );
				
			/** 只取文件头部最多4K的数据进行分析 */
			$plugin_data = fread($fp, 4096);
				
			fclose($fp);
				
			preg_match( '|Theme Name:(.*)$|mi', $plugin_data, $name );
			preg_match( '|Theme URI:(.*)$|mi', $plugin_data, $uri );
			preg_match( '|Version:(.*)|i', $plugin_data, $version );
			preg_match( '|Description:(.*)$|mi', $plugin_data, $description );
			preg_match( '|Author:(.*)$|mi', $plugin_data, $author_name );
			preg_match( '|Author Email:(.*)$|mi', $plugin_data, $author_email );
				
			foreach( array('name', 'uri', 'version', 'description', 'author_name', 'author_email' ) as $field )
			{
				${$field} = (!empty(${$field}))?trim(${$field}[1]):'';
			}
				
			$screen = glob($path . '/screen*.{jpg,png,gif,bmp,jpeg,JPG,PNG,GIF,BMG,JPEG}', GLOB_BRACE);
	
			if($screen)
			{
				$screen_url = base_url(). ST_THEMES_DIR . '/' . $theme . '/' . basename(current($screen));
			}
			else
			{
				$screen_url = base_url(). 'application/views/admin/images/noscreen.gif';
			}
				
			return array(
					'directory' => strtolower($theme),
					'name' => $name,
					'uri' => $uri,
					'description' => $description,
					'author' => $author_name,
					'author_email' => $author_email,
					'version' => $version,
					'screen' => $screen_url
			);
		}
	
		return;
	}
	
	/**
	 * 获取所有主题信息
	 *
	 *
	 *
	 * @access public
	 * @param void
	 * @return array
	 */
	public function get_all()
	{
		$data = array();
	
		$this->load->helper('directory');
	
		$themes = directory_map($this->themes_dir, TRUE);
	
		if($themes)
		{
			foreach($themes as $theme)
			{
				$data[] = $this->get($theme);
			}
		}
	
		return $data;
	}
	
}

/*
End of file
Location:themes_mdl.php
*/