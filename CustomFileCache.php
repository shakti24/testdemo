<?php
class CustomFileCache
{   
    protected $page;
    private $cachePage;

	public function __construct($url)
    {   
		$path = '';
        $pageUrl = explode($_SERVER['HTTP_HOST'], $url);		
		$args = explode('/', $pageUrl[1]);
		
        foreach($args as $arg)
        {
            if(strstr($arg, '.php'))
                    $arg = "/cache/cache.$arg";
            
            $path .= $arg;
        }
		
		$this->page  = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}{$pageUrl[1]}";
        $this->cachePage = $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . $path;
		$this->pagePath  = $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . $pageUrl[1];
    }
	/*
    public function __construct_old()
    {   
        $args = explode('/', $_SERVER['REQUEST_URI']);		
        $path = '';
        foreach($args as $arg)
        {
            if(strstr($arg, '.php'))
                    $arg = "/cache/cache.$arg";
            
            $path .= $arg;
        }
		$this->page  = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}{$_SERVER["REQUEST_URI"]}";
        $this->cachePage = $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . $path;
    }
    */
    public function readPageContent()
    {
        $file = fopen($this->cachePage, 'r');
        $buffer = '';
        while(!feof($file))
        {
            $buffer .= fread($file, 2048);
        }
        fclose($file);
        return $buffer;
    }
    
    public function readWritePageContent()
    {
        $content = file_get_contents($this->page);
        $cachePage = fopen($this->cachePage, 'w');
        fwrite($cachePage, $content, strlen($content));
        fclose($cachePage);
        return $content;
    }
    
    public function fileCache($cacheTime = 0)
    {   
        if(file_exists($this->cachePage))
        {
			$time = !$cacheTime ? filemtime($this->pagePath): time();
			
            $timeDiff = $time - filemtime($this->cachePage);
            
            if($timeDiff < $cacheTime)
            {     		
				$html = $this->readPageContent($this->cachePage);
            }
			else
			{
				$html = $this->readWritePageContent();
			}
        }
		else
        {
			$html = $this->readWritePageContent();
		}
		//$html = $this->readWritePageContent();
		return $html;
    }    
}
